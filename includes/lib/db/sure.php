<?php
namespace lib\db;


class sure
{
	public static function get($_where, $_option = [])
	{
		$_option['db_name'] = \lib\db\db_data_name::get();
		return \dash\db\config::public_get('1_sura', $_where, $_option);
	}

}
?>
