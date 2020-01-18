<?php 
Namespace Model;
use Model\Database;
/**
 * 
 */
class Category extends Table
{
	protected $table = 'category';

	public function getItembyAlias($alias) {
		if($this->table)
			return $this->select($this->table, null, array(array('column'=>'alias', 'condition'=>'=','value'=>$alias)));
		else
			return null;
	}
	public function getCategoriesHaveNoAlias($column = null) {
		$where = array(
			array('condition' => 'IS' , 'value' => null, 'column' =>  'alias')
		);
		return $this->select($this->table, $column, $where);
	}
	public function getCategoriesHaveAlias($column = null) {
		$where = array(
			array('condition' => 'IS NOT' , 'value' => null, 'column' =>  'alias')
		);
		return $this->select($this->table, $column, $where);
	}
}
