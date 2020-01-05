<?php 
Namespace Model;
use Model\Database as DatabaseModel;
/**
 * 
 */
class DatabaseSite extends DatabaseModel
{
	public function getItembyAlias($table, $alias) {
		return $this->select($table, null, array(array('column'=>'alias', 'condition'=>'=','value'=>$alias)));
	}
}
