<?php
namespace lib\db;


class quran_word
{

	// public static function insert()
	// {
	// 	return \dash\db\config::public_insert('quran_word', ...func_get_args());
	// }


	// public static function multi_insert()
	// {
	// 	return \dash\db\config::public_multi_insert('quran_word', ...func_get_args());
	// }


	// public static function update()
	// {
	// 	return \dash\db\config::public_update('quran_word', ...func_get_args());
	// }


	public static function get()
	{
		return \dash\db\config::public_get('quran_word', ...func_get_args());
	}

	public static function get_count()
	{
		return \dash\db\config::public_get_count('quran_word', ...func_get_args());
	}


	public static function search()
	{
		$result = \dash\db\config::public_search('quran_word', ...func_get_args());
		return $result;
	}

}
?>
