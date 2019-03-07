<?php
namespace lib\db;


class quran
{
	public static function get($_where, $_option = [])
	{
		$_option['db_name'] = \lib\db\db_data_name::get();

		if(!isset($_option['order']))
		{
			$_option['order'] = ' ORDER BY `1_quran_ayat`.`index` ASC ';
		}
		return \dash\db\config::public_get('1_quran_ayat', $_where, $_option);
	}

}
?>
