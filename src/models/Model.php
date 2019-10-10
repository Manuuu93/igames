<?php

namespace models;

use components\Db;

abstract class Model
{
	const TABLE = '';

	public $id;

	public static function findAll()
	{
		$db = Db::instance();
		return $db->query(
			'select * from ' . static::TABLE,
			static::class
		);
	}

	public static function findById($id)
	{
		$db = Db::instance();
		$data = $db->query(
			'select * from ' . static::TABLE . ' where id = :id',
			static::class,
			[':id' => $id]
		);

		if($data)
		    return $data[0];
	}

	public function isNew()
	{
		return empty($this->id);
	}

	protected function insert($columns, $values)
	{
		$sql = 'insert into ' . static::TABLE . ' (' . implode(',', $columns) . ')' . ' values (' . implode(',', array_keys($values)) . ')';
		$db = DB::instance();
		$db->execute($sql, $values);	
		return $this->id = $db->getLastInsertedId();
	}

	protected function update($columns, $values)
	{		
		$sql = 'update ' . static::TABLE . ' set ';

		foreach($columns as $column) {
			$sql .= $column . ' = ' . ' :' . $column . ','; 
		};

		$sql = substr($sql, 0, -1);
		$sql .= ' where id = ' . $this->id;

		$db = DB::instance();
		return $db->execute($sql, $values);
	}

	public function save()
	{
		$columns = [];
		$values = [];
		foreach($this as $k => $v) {
			if ('id' == $k) {
				continue;
			}
			$columns[] = $k;
			$values[':' . $k] = $v;
		};

		if($this->isNew()) {
			return $this->insert($columns, $values);
		} else {
			return $this->update($columns, $values);
		}
	}
	
	function delete()
	{
		if($this->isNew())
			return;
		
		$sql = 'delete from ' . static::TABLE . ' where id = :id';
		$values = [':id' => $this->id];
		
		$db = DB::instance();
		return $db->execute($sql, $values);
	}
}