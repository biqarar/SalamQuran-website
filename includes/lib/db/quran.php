<?php
namespace lib\db;


class quran
{
	public static function get_db_data_name()
	{
		if(defined('db_data_name'))
		{
			return db_data_name;
		}
		return true;
	}

	public static function get($_where, $_option = [])
	{
		$_option['db_name'] = self::get_db_data_name();
		return \dash\db\config::public_get('1_quran_ayat', $_where, $_option);
	}

}
?>
