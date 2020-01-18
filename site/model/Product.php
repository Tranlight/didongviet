<?php 
Namespace Model;
use Model\Database;
/**
 * 
 */
class Product extends Table
{
	protected $table = 'product';

	public function getItembyAlias($alias) {
		if($this->table)
			return $this->select($this->table, null, array(array('column'=>'alias', 'condition'=>'=','value'=>$alias)));
		else
			return null;
	}
}
