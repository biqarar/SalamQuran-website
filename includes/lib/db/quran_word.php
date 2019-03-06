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


	public static function sura_first_word($_id)
	{
		if(is_numeric($_id) && intval($_id) >= 1 && intval($_id) <= 114 )
		{
			$_id = intval($_id);
			return self::get(['sura' => $_id, 'limit' => 1]);
		}

		return false;
	}

}
?>
