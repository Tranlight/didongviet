<?php 
Namespace Model;
use Model\Database;
/**
 * 
 */
class Category extends Table
{
	protected $table = 'category';

	public function getCategoriesHasNotAlias($column = null) {
		$where = array(
			array('condition' => 'IS' , 'value' => null, 'column' =>  'alias')
		);
		return $this->select($this->table, $column, $where);
	}
}
