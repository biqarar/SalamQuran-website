<?php
namespace lib\app;


class qari
{
	private static function qari_image($_slug = null)
	{
		$url = \dash\url::site(). '/static/images/qariyan/';
		if($_slug)
		{
			$url .= $_slug. '.png';
		}

		return $url;
	}

	private static function master_path()
	{
		return 'https://dl.salamquran.com/ayat/';
	}

	public static function list()
	{
		$list =
		[
			// ----------------- abdoabaset
			['index' => 1000, 'lang' => 'ar', 'type' => T_('Mujawwad'), 'addr'  => 'abdulbasit-mujawwad-128/', 'slug'  => 'abdulbaset', 'name'  => T_('AbdulBaset AbdulSamad'), 'default' => true],
			['index' => 1001, 'lang' => 'ar', 'type' => T_('Murattal'), 'addr'  => 'abdulbasit-murattal-192/', 'slug'  => 'abdulbaset', 'name'  => T_('AbdulBaset AbdulSamad'),],

			// ----------------- afasy
			['index' => 1020, 'lang' => 'ar', 'type' => T_('Murattal'), 'addr'  => 'alafasy/ayat/Alafasy_128kbps/', 'slug'  => 'afasy', 'name'  => T_('Mishary Rashid Alafasy'),],

			// ----------------- husary
			['index' => 1030, 'lang' => 'ar', 'type' => T_('Murattal'), 'addr'  => 'alafasy/ayat/Alafasy_128kbps/', 'slug'  => 'husary', 'name'  => T_('Mahmoud Khalil Al-Husary'),],
			['index' => 1031, 'lang' => 'ar', 'type' => T_('Mujawwad'), 'addr'  => 'alafasy/ayat/Alafasy_128kbps/', 'slug'  => 'husary', 'name'  => T_('Mahmoud Khalil Al-Husary'),],
			['index' => 1032, 'lang' => 'ar', 'type' => T_('Muallim'), 'addr'  => 'alafasy/ayat/Alafasy_128kbps/', 'slug'  => 'husary', 'name'  => T_('Mahmoud Khalil Al-Husary'),],

			// ----------------- minshawi
			['index' => 1040, 'lang' => 'ar', 'type' => T_('Murattal'), 'addr'  => 'alafasy/ayat/Alafasy_128kbps/', 'slug'  => 'minshawi', 'name'  => T_('Mohamed Siddiq al-Minshawi'),],
			['index' => 1041, 'lang' => 'ar', 'type' => T_('Mujawwad'), 'addr'  => 'alafasy/ayat/Alafasy_128kbps/', 'slug'  => 'minshawi', 'name'  => T_('Mohamed Siddiq al-Minshawi'),],

			// ----------------- rifai
			['index' => 1050, 'lang' => 'ar', 'type' => T_('Murattal'), 'addr'  => 'alafasy/ayat/Alafasy_128kbps/', 'slug'  => 'rifai', 'name'  => T_('Hani ar-Rifai'),],

			// ----------------- shatri
			['index' => 1060, 'lang' => 'ar', 'type' => T_('Murattal'), 'addr'  => 'alafasy/ayat/Alafasy_128kbps/', 'slug'  => 'shatri', 'name'  => T_('Abu Bakr al-Shatri'),],

			// ----------------- shuraym
			['index' => 1070, 'lang' => 'ar', 'type' => T_('Murattal'), 'addr'  => 'alafasy/ayat/Alafasy_128kbps/', 'slug'  => 'shuraym', 'name'  => T_('Sa`ud ash-Shuraym'),],

			// ----------------- sudais
			['index' => 1080, 'lang' => 'ar', 'type' => T_('Murattal'), 'addr'  => 'alafasy/ayat/Alafasy_128kbps/', 'slug'  => 'sudais', 'name'  => T_('Abdur-Rahman as-Sudais'),],

			// ----------------- trnaslate - az - balayev
			['index' => 1081, 'lang' => 'az', 'type' => T_('Translate'), 'addr'  => 'translation-az-balayev/', 'slug'  => 'balayev', 'name'  => T_('Rasim Balayev'),],

			// ----------------- trnaslate - en - ibrahimwalk
			['index' => 1082, 'lang' => 'en', 'type' => T_('Translate'), 'addr'  => 'translation-en-sahih-IbrahimWalk/', 'slug'  => 'ibrahimwalk', 'name'  => T_('Ibrahim Walk'),],

			// ----------------- trnaslate - fa - fouladvand
			['index' => 1083, 'lang' => 'en', 'type' => T_('Translate'), 'addr'  => 'translation-en-sahih-foladvand/', 'slug'  => 'fouladvand', 'name'  => T_('Mohammad mahdi fouladvand'),],

			// ----------------- trnaslate - fa - makarem
			['index' => 1084, 'lang' => 'fa', 'type' => T_('Translate'), 'addr'  => 'translation-fa-kabiri/', 'slug'  => 'makarem', 'name'  => T_('Naser makarem shirazi'),],
			['index' => 1085, 'lang' => 'fa', 'type' => T_('Translate'), 'addr'  => 'translation-fa-kabiri1/', 'slug'  => 'makarem', 'name'  => T_('Naser makarem shirazi'),],

			// ----------------- trnaslate - fa - qeraati
			['index' => 1086, 'lang' => 'fa', 'type' => T_('Translate'), 'addr'  => 'translation-fa-qaraati/', 'slug'  => 'qeraati', 'name'  => T_('Mohsen Qeraati'),],

		];

		return $list;
	}

	private static function ready($_data)
	{
		$get                 = \dash\request::get();
		$get['qari']         = $_data['index'];
		$_data['url']        = \dash\url::that(). '?'. http_build_query($get);
		$_data['addr']       = self::master_path(). $_data['addr'];
		$_data['image']      = self::qari_image($_data['slug']);
		$_data['short_name'] = T_($_data['slug']);
		return $_data;
	}

	public static function site_list()
	{
		$list      = self::list();
		$site_list = array_map(['self', 'ready'], $list);

		return $site_list;
	}

	public static function load($_id)
	{
		if(!$_id || !ctype_digit($_id))
		{
			$_id = 1;
		}

		$list    = self::list();

		$default = null;
		$load    = null;

		foreach ($list as $key => $value)
		{
			if(intval($value['index']) === intval($_id))
			{
				$load = $value;
			}

			if(isset($value['default']) && $value['default'])
			{
				$default = $value;
			}
		}

		if(!$load)
		{
			$load = $default;
		}

		$load = self::ready($load);

		return $load;
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

		$load = self::load($_gari);
		if(isset($load['addr']))
		{
			$addr = $load['addr'];
			$url = $addr. $_sura. $_aya. '.mp3';
			return $url;
		}
		else
		{
			return false;
		}
	}
}
?>