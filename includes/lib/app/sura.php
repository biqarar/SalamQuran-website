<?php
namespace lib\app;


class sura
{

	public static function load($_id)
	{
		$load = \lib\db\quran::get(['sura' => $_id]);
		return $load;
	}
}
?>