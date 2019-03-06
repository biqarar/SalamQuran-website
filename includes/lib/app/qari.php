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


	public static function get_aya_url($_gari, $_sura, $_aya)
	{

		$_sura = intval($_sura);
		$_aya  = intval($_aya);

		if($_sura < 10)
		{
			$_sura = '00'. $_sura;
		}
		elseif($_sura < 100)
		{
			$_sura = '0'. $_sura;
		}

		if($_aya < 10)
		{
			$_aya = '00'. $_aya;
		}
		elseif($_aya < 100)
		{
			$_aya = '0'. $_aya;
		}

		$url = 'https://dl.salamquran.com/audio/alafasy/ayat/mp3/'. $_sura.$_aya. '.mp3';
		return $url;
	}
}
?>