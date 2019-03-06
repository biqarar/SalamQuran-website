<?php
namespace lib\app;


class qari
{
	public static function list()
	{
		$list                = [];

		$abdoalbaset         = [];
		$abdoalbaset['ayat'] = 'abdoalbaset/ayat';

		$list[1]             = $abdoalbaset;

		return $list;
	}
}
?>