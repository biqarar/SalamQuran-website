<?php
namespace lib\db;


class sure
{

	// public static function insert()
	// {
	// 	return \dash\db\config::public_insert('sure', ...func_get_args());
	// }


	// public static function multi_insert()
	// {
	// 	return \dash\db\config::public_multi_insert('sure', ...func_get_args());
	// }


	// public static function update()
	// {
	// 	return \dash\db\config::public_update('sure', ...func_get_args());
	// }


	public static function get()
	{
		return \dash\db\config::public_get('sure', ...func_get_args());
	}

	public static function get_count()
	{
		return \dash\db\config::public_get_count('sure', ...func_get_args());
	}


	public static function search()
	{
		$result = \dash\db\config::public_search('sure', ...func_get_args());
		return $result;
	}

}
?>
