<?php
namespace Model;

class Database
{
    /**
     * Variables
     *
     * @var [string] $Host
     * @var [string] $Database
     * @var [string] $User
     * @var [string] $Password
     * @var [mysqli] $Instance
     */
    protected $Host;
    protected $MysqlPort;
    protected $Database;
    protected $User;
    protected $Sql;
    protected $Password;
    protected $Instance;
    /**
     * Database::__construct()
     * Constructor & destructor
     */
    public function __construct()
    {
        $this->setup();
    }
    public function __destruct()
    {}
    /**
     * Database::setup()
     * This function is a kind of parametrized constructor. Sets up the database's host, user, etc.
     * Very useful when playing with different databases, as well as for unit testing.
     *
     * @return void
     */
    public function setup($host = false, $username = false, $password = false, $database = false, $port = false)
    {
        $this->Host = $host ?: getenv("DB_HOSTNAME");
        $this->User = $username ?: getenv("DB_USERNAME");
        $this->Password = $password ?: getenv("DB_PASSWORD");
        $this->Database = $database ?: getenv("DB_DATABASE");
        $this->MysqlPort = $port ?: getenv("DB_PORT");
    }
    /**
     * Database::connect()
     * Opens up the connection to the database based on the object's attributes¸
     *
     * @return void
     */
    public function connect()
    {
        if($this->Instance)
            return $this->Instance;
        $con = mysqli_connect($this->Host, $this->User, $this->Password, $this->Database, $this->MysqlPort);
        mysqli_set_charset($con, 'utf8');
        if (mysqli_connect_errno()) {
            die($this->getError());
        } else {
            $this->Instance = $con;
        }
        return $this->Instance;
    }
    /**
     * Database::disconnect()
     * Closes the database's connection to avoid conflict and release memory
     *
     * @return void
     */
    public function disconnect()
    {
        if (!mysqli_close($this->Instance)) {
            die($this->getError());
        }
    }
    /**
     * Database::select()
     * Format SQL and returns query content
     *
     * @param [string] $table
     * @param [array] $columns is array(0=>'column_name', ...)
     * @param [array] $wheres is array(array(column=>'', condition=>'', value=>''), ...)
     * @param [array] $joins is array(array(orientation=>'', referenced_column=>'', referenced_table=>'', referenced_table=>'', referenced_table=>''), ...)
     * @param [array] $orderbys is array(0=>'column_name', ...)
     * @return [array] $results
     */
    public function select($table, $columns = null, $wheres = null, $joins = null, $orderbys = null, $limit = null)
    {
        //Variables
        $return = array();

        if ($table != "" || $table != null) {
            //Open up connection
            $this->connect();

            //SELECT statement
            $this->Sql = "SELECT ";

            //COLUMNS
            if ($columns != "" || $columns != null) {
                foreach ($columns as $index => $column) {
                    if ($index == 0) {
                        $this->Sql .= $column;
                    } else {
                        $this->Sql .= ", " . $column;
                    }
                }
            } else {
                $this->Sql .= "*";
            }

            //FROM statement
            $this->Sql .= " FROM " . $table;

            //LIMIT
            if(($limit != "") && ($limit != null) && !empty($limit)) {
                $this->Sql .= " LIMIT " . $limit[0] . "," . $limit[1];
            }

            //JOINS
            if ($joins != "" || $joins != null) {
                foreach ($joins as $join) {
                    $this->Sql .= ' ' . $join["orientation"] . " JOIN " . $join["referenced_table"] . " ON " . $join["table_name"] . "." . $join["column_name"] . " = " . $join["referenced_table"] . "." . $join["referenced_column"];
                }
            }

            //WHERE statement
            if ($wheres != "" || $wheres != null) {
                foreach ($wheres as $index => $where) {
                    //if string format SQL
                    if($where["value"] == null) {
                        $where["value"] = "NULL";
                    }
                    elseif (gettype($where["value"]) == "string" && !is_numeric($where["value"])) {
                        $where["value"] = "'" . $where["value"] . "'";
                        $where["condition"] = "LIKE";
                    }

                    if ($index == 0) {
                        $this->Sql .= " WHERE " . $where["column"] . " " . $where["condition"] . " " . $where["value"];
                    } else {
                        if (sizeof($wheres) == $index) {
                            $this->Sql .= " " . $where["column"] . " " . $where["condition"] . " " . $where["value"];
                        } else {
                            $this->Sql .= " " . $where["operation"] . " " . $where["column"] . " " . $where["condition"] . " " . $where["value"];
                        }
                    }
                }
            }

            //ORDER BY statement
            if ($orderbys != "" || $orderbys != null) {
                foreach ($orderbys as $index => $orderby) {
                    if ($index == 0) {
                        $this->Sql .= " ORDER BY " . $orderby;
                    } else {
                        $this->Sql .= ", " . $orderby;
                    }
                }
            }

            $this->Sql .= ";";

            $a =$this->Sql;
            $results = $this->Instance->query($this->Sql);

            if (!$results) {
                die($this->getError());
            }

            while ($row = $results->fetch_assoc()) {
                $return[] = $row;
            }

            array_walk_recursive($return, function (&$item, $key) {
                $item = $item;
            });
            return $return;
        } else
            die("Must provide a table to query the database.");
    }
    /**
     * Database::insert()
     * Format SQL and inserts into database
     *
     * @param [type] $table as String
     * @param [array] $columns as array()
     * @param [array] $values as
     * @return void
     */
    public function insert($table, $columns, $values)
    {
        if ($table != "" || $table != null) {
            $this->connect();
            $this->Sql = "INSERT INTO " . $table;

            if (($columns != "" || $columns != null) || sizeof($columns) != sizeof($values)) {
                $this->Sql .= "(";

                //COLUMNS
                foreach ($columns as $index => $column) {
                    if ($index == 0) {
                        $this->Sql .= $column;
                    } else {
                        $this->Sql .= ", " . $column;
                    }
                }

                $this->Sql .= ") VALUES (";

                if ($values != "" || $values != null) {

                    //VALUES
                    foreach ($values as $index => $value) {
                        if (gettype($value) == "string" && !is_numeric($value)) {
                            $value = "'" . trim(htmlspecialchars_decode($value)) . "'";
                        }

                        if ($index == 0) {
                            $this->Sql .= $value;
                        } else {
                            $this->Sql .= ", " . $value;
                        }
                    }

                    $this->Sql .= ");";

                    //insert into database
                    if(!$this->Instance->query($this->Sql))
                        die($this->getError());
                    else
                        return true;
                }
            } else
                die("Either set columns or set the same amount of columns/values to insert");
        } else {
            die("Must provide a table to insert to");
        }
    }
    /**
     * Database::delete()
     * Format SQL and deletes the specific row in the database
     *
     * @param [string] $table
     * @param [array] $columns
     * @param [array] $values
     * @return [boolean] ? (true) row deleted : error;
     */
    public function delete($table, $wheres = null)
    {
        if ($table != "" || $table != null) {
            $this->connect();
            $this->Sql = "DELETE FROM " . $table;

            //WHERE
            if ($wheres != "" || $wheres != null) {
                foreach ($wheres as $index => $where) {
                    //if string format SQL
                    if (gettype($where["value"]) == "string" && !is_numeric($where["value"])) {
                        $where["value"] = "'" . trim($where["value"]) . "'";
                        $where["value"] = ($where["value"]);
                        $where["condition"] = "LIKE";
                    }

                    if ($index == 0) {
                        $this->Sql .= " WHERE " . $where["column"] . " " . $where["condition"] . " " . $where["value"];
                    } else {
                        if (sizeof($wheres) == $index) {
                            $this->Sql .= " " . $where["column"] . " " . $where["condition"] . " " . $where["value"];
                        } else {
                            $this->Sql .= " " . $where["operation"] . " " . $where["column"] . " " . $where["condition"] . " " . $where["value"];
                        }
                    }
                }
            }

            $this->Sql .= ";";

            //delete from database
            if (!$this->Instance->query($this->Sql)) {
                die($this->getError());
            }

            $this->disconnect();
        } else {
            die("Must provide a table to delete from");
        }
    }
    /**
     * Database::update()
     * Format SQL and updates the specific row in the database
     *
     * @return [boolean] ? (true) row updated : error;
     */
    public function update($table, $columns, $values, $wheres = null)
    {
        if ($table != "" || $table != null) {
            $this->connect();
            $this->Sql = "UPDATE " . $table;

            //SET columns, [...]
            if (($columns != "" || $columns != null) || sizeof($columns) != sizeof($values)) {
                $this->Sql .= " SET ";

                //COLUMNS
                foreach ($columns as $index => $column) {
                    if (gettype($values[$index]) == "string" && !is_numeric($values[$index])) {
                        $values[$index] = "'" . trim($values[$index]) . "'";
                        $values[$index] = ($values[$index]);
                    }

                    if ($index == 0) {
                        $this->Sql .= "" . $column . " = " . $values[$index];
                    } else {
                        $this->Sql .= ", " . $column . " = " . $values[$index];
                    }
                }
            } else {
                die("Either set columns or set the same amount of columns/values to insert");
            }

            //WHERE
            if ($wheres != "" || $wheres != null) {
                foreach ($wheres as $index => $where) {
                    //if string format SQL
                    if (gettype($where["value"]) == "string" && !is_numeric($where["value"])) {
                        $where["value"] = "'" . $where["value"] . "'";
                        $where["value"] = trim(($where["value"]));
                        $where["condition"] = "LIKE";
                    }

                    if ($index == 0) {
                        $this->Sql .= " WHERE " . $where["column"] . " " . $where["condition"] . " " . $where["value"];
                    } else {
                        if (sizeof($wheres) == $index) {
                            $this->Sql .= " " . $where["column"] . " " . $where["condition"] . " " . $where["value"];
                        } else {
                            $this->Sql .= " " . $where["operation"] . " " . $where["column"] . " " . $where["condition"] . " " . $where["value"];
                        }
                    }
                }
            }

            $this->Sql .= ";";

            //update in database
            if (!$this->Instance->query($this->Sql)) {
                die($this->getError());
            }

            $this->disconnect();
        } else {
            die("Must provide a table to delete from");
        }
    }
    public function getKeys($table, $type = "primary")
    {
        $this->connect();

        if ($type == "primary") {
            $this->Sql = "SHOW COLUMNS FROM " . $table . ";";
            $results = $this->Instance->query($this->Sql);
            foreach ($results as $row) {
                if ($row["Key"] == "PRI") {
                    $this->disconnect();
                    return $row["Field"];
                }
            }
        } else if ($type == "foreign") {
            $fk_array = array();
            $return = array();
            $this->Sql = "SHOW CREATE TABLE " . $table;
            $results = $this->Instance->query($this->Sql);

            while ($row = $results->fetch_assoc()) {
                $fk_array[] = $row;
            }

            $fk_array = explode("FOREIGN KEY", $fk_array[0]["Create Table"]);

            foreach ($fk_array as $fk) {
                if (strpos($fk, "REFERENCES")) {
                    $column_name = substr($fk, 3, strpos($fk, ")") - 4);
                    $return[] = array($column_name);
                }
            }
            $this->disconnect();
            return $return;
        }
    }
    public function getJoinsArray($table)
    {
        $fk_array = array();
        $return = array();
        $this->Sql = "SHOW CREATE TABLE " . $table;

        $results = $this->Instance->query($this->Sql);

        if (!$results) {
            die($this->getError());
        }

        while ($row = $results->fetch_assoc()) {
            $fk_array[] = $row;
        }

        $fk_array = explode("FOREIGN KEY", $fk_array[0]["Create Table"]);

        foreach ($fk_array as $fk) {
            if (strpos($fk, "REFERENCES")) {
                //Isolate referenced table
                $referenced_table = substr($fk, strpos($fk, "REFERENCES"));
                $referenced_table = substr($referenced_table, strpos($referenced_table, "`") + 1);
                $referenced_table = substr($referenced_table, 0, strpos($referenced_table, "`"));
                //Isolate referenced column
                $referenced_column = substr($fk, strrpos($fk, "(") + 2);
                $referenced_column = substr($referenced_column, 0, strpos($fk, ")") - 4);
                //Isolate current table's column (should be the same as referenced)
                $column_name = substr($fk, 3, strpos($fk, ")") - 4);

                $return[] = array(
                    "orientation" => "INNER",
                    "referenced_table" => $referenced_table,
                    "referenced_column" => $referenced_column,
                    "column_name" => $column_name,
                    "table_name" => $table,
                );
            }
        }

        return $return;
    }
    public function getSql()
    {
        return $this->Sql;
    }
    private function getError()
    {
        return "<br/>" . $this->Sql . "<br/> SQL Exception #" . $this->Instance->errno . " : " . $this->Instance->error . "<br/>";
    }
}
