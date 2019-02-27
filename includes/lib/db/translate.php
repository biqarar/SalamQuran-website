<?php
namespace lib\db;


class translate
{
	public static function get_db_trans_name()
	{
		if(defined('db_trans_name'))
		{
			return db_trans_name;
		}
		return true;
	}

	public static function load($_table_name, $_where)
	{
		$where = \dash\db\config::make_where($_where);
		if(!$where)
		{
			return null;
		}

		$query = "SELECT * FROM `$_table_name` WHERE $where ";
		$result = \dash\db::get($query, null, false, self::get_db_trans_name());
		return $result;
	}
}
?>
