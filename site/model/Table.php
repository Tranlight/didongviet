<?php 
Namespace Model;
use Model\Database;
/**
 * 
 */
class Table extends Database
{
	protected $table = '';
	
	public function getItembyId($id, $fields = null) {
		if($this->table)
			return $this->select($this->table, $fields, array(array('column' => 'id', 'condition' => '=', 'value' => $id)));
		else
			return null;
	}

	public function getAll($fields = null) {
		if($this->table)
			return $this->select($this->table, $fields);
		else
			return null;
	}

	public function size() {
		if($this->table) {
			$total = $this->select($this->table, array('count(id) as total'));
			if($total) {
				return $total[0]['total'];
			}
		}
		return null;
	}
}
