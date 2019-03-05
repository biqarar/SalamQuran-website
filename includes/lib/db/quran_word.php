<?php
namespace lib\db;


class quran_word
{
	public static function get($_where, $_option = [])
	{
		$_option['db_name'] = \lib\db\db_data_name::get();
		$_option['order'] = ' ORDER BY `1_quran_word`.`id` ASC ';
		return \dash\db\config::public_get('1_quran_word', $_where, $_option);
	}

}
?>
