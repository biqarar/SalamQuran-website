<?php
namespace lib\app;


class translate
{
	public static function get_translate($_lang)
	{
		$list = self::translate_list();
		$result = [];
		foreach ($list as $key => $value)
		{
			if(isset($value['language']) && $value['language'] === $_lang)
			{
				$result[] = $value;
			}
		}

		return $result;
	}


	public static function current_lang_translate()
	{
		return self::get_translate(\dash\language::current());
	}


	public static function table_name($_id)
	{
		$list = self::translate_list();

		foreach ($list as $key => $value)
		{
			if(isset($value['id']) && intval($value['id']) === intval($_id))
			{
				return $key;
			}
		}
		return false;
	}


	public static function translate_list()
	{
		$translate =
		[
			'am_sadiq'           => ['id' => 1, 'index' => 1,   'language' => 'am', 'name' => 'sadiq', 'localname' => 'sadiq'],

			'ar_jalalayn'        => ['id' => 2, 'index' => 1,   'language' => 'ar', 'name' => 'jalalayn', 'localname' => 'jalalayn'],
			'ar_muyassar'        => ['id' => 3, 'index' => 2,   'language' => 'ar', 'name' => 'muyassar', 'localname' => 'muyassar'],

			'az_mammadaliyev'    => ['id' => 4, 'index' => 1,   'language' => 'az', 'name' => 'mammadaliyev', 'localname' => 'mammadaliyev'],
			'az_musayev'         => ['id' => 5, 'index' => 2,   'language' => 'az', 'name' => 'musayev', 'localname' => 'musayev'],

			'be_mensur'          => ['id' => 6, 'index' => 1,   'language' => 'be', 'name' => 'mensur', 'localname' => 'mensur'],

			'bg_theophanov'      => ['id' => 7, 'index' => 1,   'language' => 'bg', 'name' => 'theophanov', 'localname' => 'theophanov'],

			'bn_bengali'         => ['id' => 8, 'index' => 1,   'language' => 'bn', 'name' => 'bengali', 'localname' => 'bengali'],
			'bn_hoque'           => ['id' => 9, 'index' => 2,   'language' => 'bn', 'name' => 'hoque', 'localname' => 'hoque'],

			'bs_korkut'          => ['id' => 10, 'index' => 1,  'language' => 'bs', 'name' => 'korkut', 'localname' => 'korkut'],
			'bs_mlivo'           => ['id' => 11, 'index' => 2,  'language' => 'bs', 'name' => 'mlivo', 'localname' => 'mlivo'],

			'cs_hrbek'           => ['id' => 12, 'index' => 1,  'language' => 'cs', 'name' => 'hrbek', 'localname' => 'hrbek'],
			'cs_nykl'            => ['id' => 13, 'index' => 2,  'language' => 'cs', 'name' => 'nykl', 'localname' => 'nykl'],

			'de_aburida'         => ['id' => 14, 'index' => 1,  'language' => 'de', 'name' => 'aburida', 'localname' => 'aburida'],
			'de_bubenheim'       => ['id' => 15, 'index' => 2,  'language' => 'de', 'name' => 'bubenheim', 'localname' => 'bubenheim'],
			'de_khoury'          => ['id' => 16, 'index' => 3,  'language' => 'de', 'name' => 'khoury', 'localname' => 'khoury'],
			'de_zaidan'          => ['id' => 17, 'index' => 4,  'language' => 'de', 'name' => 'zaidan', 'localname' => 'zaidan'],

			'dv_divehi'          => ['id' => 18, 'index' => 1,  'language' => 'dv', 'name' => 'divehi', 'localname' => 'divehi'],

			'en_ahmedali'        => ['id' => 19, 'index' => 1,  'language' => 'en', 'name' => 'ahmedali', 'localname' => 'ahmedali'],
			'en_ahmedraza'       => ['id' => 20, 'index' => 2,  'language' => 'en', 'name' => 'ahmedraza', 'localname' => 'ahmedraza'],
			'en_arberry'         => ['id' => 21, 'index' => 3,  'language' => 'en', 'name' => 'arberry', 'localname' => 'arberry'],
			'en_daryabadi'       => ['id' => 22, 'index' => 4,  'language' => 'en', 'name' => 'daryabadi', 'localname' => 'daryabadi'],
			'en_hilali'          => ['id' => 23, 'index' => 5,  'language' => 'en', 'name' => 'hilali', 'localname' => 'hilali'],
			'en_itani'           => ['id' => 24, 'index' => 6,  'language' => 'en', 'name' => 'itani', 'localname' => 'itani'],
			'en_maududi'         => ['id' => 25, 'index' => 7,  'language' => 'en', 'name' => 'maududi', 'localname' => 'maududi'],
			'en_mubarakpuri'     => ['id' => 26, 'index' => 8,  'language' => 'en', 'name' => 'mubarakpuri', 'localname' => 'mubarakpuri'],
			'en_pickthall'       => ['id' => 27, 'index' => 9,  'language' => 'en', 'name' => 'pickthall', 'localname' => 'pickthall'],
			'en_qarai'           => ['id' => 28, 'index' => 10, 'language' => 'en', 'name' => 'qarai', 'localname' => 'qarai'],
			'en_qaribullah'      => ['id' => 29, 'index' => 11, 'language' => 'en', 'name' => 'qaribullah', 'localname' => 'qaribullah'],
			'en_sahih'           => ['id' => 30, 'index' => 12, 'language' => 'en', 'name' => 'sahih', 'localname' => 'sahih'],
			'en_sarwar'          => ['id' => 31, 'index' => 13, 'language' => 'en', 'name' => 'sarwar', 'localname' => 'sarwar'],
			'en_shakir'          => ['id' => 32, 'index' => 14, 'language' => 'en', 'name' => 'shakir', 'localname' => 'shakir'],
			'en_transliteration' => ['id' => 33, 'index' => 15, 'language' => 'en', 'name' => 'transliteration', 'localname' => 'transliteration'],
			'en_wahiduddin'      => ['id' => 34, 'index' => 16, 'language' => 'en', 'name' => 'wahiduddin', 'localname' => 'wahiduddin'],
			'en_yusufali'        => ['id' => 35, 'index' => 17, 'language' => 'en', 'name' => 'yusufali', 'localname' => 'yusufali'],

			'es_bornez'          => ['id' => 36, 'index' => 1,  'language' => 'es', 'name' => 'bornez', 'localname' => 'bornez'],
			'es_cortes'          => ['id' => 37, 'index' => 2,  'language' => 'es', 'name' => 'cortes', 'localname' => 'cortes'],
			'es_garcia'          => ['id' => 38, 'index' => 3,  'language' => 'es', 'name' => 'garcia', 'localname' => 'garcia'],

			'fa_ansarian'        => ['id' => 39, 'index' => 1,  'language' => 'fa', 'name' => 'ansarian', 'localname' => 'انصاریان'],
			'fa_ayati'           => ['id' => 40, 'index' => 2,  'language' => 'fa', 'name' => 'ayati', 'localname' => 'آیتی'],
			'fa_bahrampour'      => ['id' => 41, 'index' => 3,  'language' => 'fa', 'name' => 'bahrampour', 'localname' => 'بهرام‌پور'],
			'fa_fooladvand'      => ['id' => 42, 'index' => 4,  'language' => 'fa', 'name' => 'fooladvand', 'localname' => 'فولادوند'],
			'fa_gharaati'        => ['id' => 43, 'index' => 5,  'language' => 'fa', 'name' => 'gharaati', 'localname' => 'قرائتی'],
			'fa_ghomshei'        => ['id' => 44, 'index' => 6,  'language' => 'fa', 'name' => 'ghomshei', 'localname' => 'قمشه‌ای'],
			'fa_khorramdel'      => ['id' => 45, 'index' => 7,  'language' => 'fa', 'name' => 'khorramdel', 'localname' => 'خرم‌دل'],
			'fa_khorramshahi'    => ['id' => 46, 'index' => 8,  'language' => 'fa', 'name' => 'khorramshahi', 'localname' => 'خرم‌شاهی'],
			'fa_makarem'         => ['id' => 47, 'index' => 9,  'language' => 'fa', 'name' => 'makarem', 'localname' => 'مکارم'],
			'fa_moezzi'          => ['id' => 48, 'index' => 10, 'language' => 'fa', 'name' => 'moezzi', 'localname' => 'معزی'],
			'fa_mojtabavi'       => ['id' => 49, 'index' => 11, 'language' => 'fa', 'name' => 'mojtabavi', 'localname' => 'مجتبوی'],
			'fa_sadeqi'          => ['id' => 50, 'index' => 12, 'language' => 'fa', 'name' => 'sadeqi', 'localname' => 'صادقی'],

			'fr_hamidullah'      => ['id' => 51, 'index' => 1,  'language' => 'fr', 'name' => 'hamidullah', 'localname' => 'hamidullah'],

			'ha_gumi'            => ['id' => 52, 'index' => 1,  'language' => 'ha', 'name' => 'gumi', 'localname' => 'gumi'],

			'hi_farooq'          => ['id' => 53, 'index' => 1,  'language' => 'hi', 'name' => 'farooq', 'localname' => 'farooq'],
			'hi_hindi'           => ['id' => 54, 'index' => 2,  'language' => 'hi', 'name' => 'hindi', 'localname' => 'hindi'],

			'id_indonesian'      => ['id' => 55, 'index' => 1,  'language' => 'id', 'name' => 'indonesian', 'localname' => 'indonesian'],
			'id_jalalayn'        => ['id' => 56, 'index' => 2,  'language' => 'id', 'name' => 'jalalayn', 'localname' => 'jalalayn'],
			'id_muntakhab'       => ['id' => 57, 'index' => 3,  'language' => 'id', 'name' => 'muntakhab', 'localname' => 'muntakhab'],

			'it_piccardo'        => ['id' => 58, 'index' => 1,  'language' => 'it', 'name' => 'piccardo', 'localname' => 'piccardo'],

			'ja_japanese'        => ['id' => 59, 'index' => 1,  'language' => 'ja', 'name' => 'japanese', 'localname' => 'japanese'],

			'ko_korean'          => ['id' => 60, 'index' => 1,  'language' => 'ko', 'name' => 'korean', 'localname' => 'korean'],

			'ku_asan'            => ['id' => 61, 'index' => 1,  'language' => 'ku', 'name' => 'asan', 'localname' => 'asan'],

			'ml_abdulhameed'     => ['id' => 62, 'index' => 1,  'language' => 'ml', 'name' => 'abdulhameed', 'localname' => 'abdulhameed'],
			'ml_karakunnu'       => ['id' => 63, 'index' => 2,  'language' => 'ml', 'name' => 'karakunnu', 'localname' => 'karakunnu'],

			'ms_basmeih'         => ['id' => 64, 'index' => 1,  'language' => 'ms', 'name' => 'basmeih', 'localname' => 'basmeih'],

			'nl_keyzer'          => ['id' => 65, 'index' => 1,  'language' => 'nl', 'name' => 'keyzer', 'localname' => 'keyzer'],
			'nl_leemhuis'        => ['id' => 66, 'index' => 2,  'language' => 'nl', 'name' => 'leemhuis', 'localname' => 'leemhuis'],
			'nl_siregar'         => ['id' => 67, 'index' => 3,  'language' => 'nl', 'name' => 'siregar', 'localname' => 'siregar'],

			'no_berg'            => ['id' => 68, 'index' => 1,  'language' => 'no', 'name' => 'berg', 'localname' => 'berg'],

			'pl_bielawskiego'    => ['id' => 69, 'index' => 1,  'language' => 'pl', 'name' => 'bielawskiego', 'localname' => 'bielawskiego'],

			'ps_abdulwali'       => ['id' => 70, 'index' => 1,  'language' => 'ps', 'name' => 'abdulwali', 'localname' => 'abdulwali'],

			'pt_elhayek'         => ['id' => 71, 'index' => 1,  'language' => 'pt', 'name' => 'elhayek', 'localname' => 'elhayek'],

			'ro_grigore'         => ['id' => 72, 'index' => 1,  'language' => 'ro', 'name' => 'grigore', 'localname' => 'grigore'],

			'ru_abuadel'         => ['id' => 73, 'index' => 1,  'language' => 'ru', 'name' => 'abuadel', 'localname' => 'abuadel'],
			'ru_krachkovsky'     => ['id' => 74, 'index' => 2,  'language' => 'ru', 'name' => 'krachkovsky', 'localname' => 'krachkovsky'],
			'ru_kuliev'          => ['id' => 75, 'index' => 3,  'language' => 'ru', 'name' => 'kuliev', 'localname' => 'kuliev'],
			'ru_muntahab'        => ['id' => 76, 'index' => 4,  'language' => 'ru', 'name' => 'muntahab', 'localname' => 'muntahab'],
			'ru_osmanov'         => ['id' => 77, 'index' => 5,  'language' => 'ru', 'name' => 'osmanov', 'localname' => 'osmanov'],
			'ru_porokhova'       => ['id' => 78, 'index' => 6,  'language' => 'ru', 'name' => 'porokhova', 'localname' => 'porokhova'],
			'ru_sablukov'        => ['id' => 79, 'index' => 7,  'language' => 'ru', 'name' => 'sablukov', 'localname' => 'sablukov'],

			'sd_amroti'          => ['id' => 80, 'index' => 1,  'language' => 'sd', 'name' => 'amroti', 'localname' => 'amroti'],

			'so_abduh'           => ['id' => 81, 'index' => 1,  'language' => 'so', 'name' => 'abduh', 'localname' => 'abduh'],

			'sq_ahmeti'          => ['id' => 82, 'index' => 1,  'language' => 'sq', 'name' => 'ahmeti', 'localname' => 'ahmeti'],
			'sq_mehdiu'          => ['id' => 83, 'index' => 2,  'language' => 'sq', 'name' => 'mehdiu', 'localname' => 'mehdiu'],
			'sq_nahi'            => ['id' => 84, 'index' => 3,  'language' => 'sq', 'name' => 'nahi', 'localname' => 'nahi'],

			'sv_bernstrom'       => ['id' => 85, 'index' => 1,  'language' => 'sv', 'name' => 'bernstrom', 'localname' => 'bernstrom'],

			'sw_barwani'         => ['id' => 86, 'index' => 1,  'language' => 'sw', 'name' => 'barwani', 'localname' => 'barwani'],

			'ta_tamil'           => ['id' => 87, 'index' => 1,  'language' => 'ta', 'name' => 'tamil', 'localname' => 'tamil'],

			'tg_ayati'           => ['id' => 88, 'index' => 1,  'language' => 'tg', 'name' => 'ayati', 'localname' => 'ayati'],

			'th_thai'            => ['id' => 89, 'index' => 1,  'language' => 'th', 'name' => 'thai', 'localname' => 'thai'],

			'tr_ates'            => ['id' => 90, 'index' => 1,  'language' => 'tr', 'name' => 'ates', 'localname' => 'ates'],
			'tr_bulac'           => ['id' => 91, 'index' => 2,  'language' => 'tr', 'name' => 'bulac', 'localname' => 'bulac'],
			'tr_diyanet'         => ['id' => 92, 'index' => 3,  'language' => 'tr', 'name' => 'diyanet', 'localname' => 'diyanet'],
			'tr_golpinarli'      => ['id' => 93, 'index' => 4,  'language' => 'tr', 'name' => 'golpinarli', 'localname' => 'golpinarli'],
			'tr_ozturk'          => ['id' => 94, 'index' => 5,  'language' => 'tr', 'name' => 'ozturk', 'localname' => 'ozturk'],
			'tr_transliteration' => ['id' => 95, 'index' => 6,  'language' => 'tr', 'name' => 'transliteration', 'localname' => 'transliteration'],
			'tr_vakfi'           => ['id' => 96, 'index' => 7,  'language' => 'tr', 'name' => 'vakfi', 'localname' => 'vakfi'],
			'tr_yazir'           => ['id' => 97, 'index' => 8,  'language' => 'tr', 'name' => 'yazir', 'localname' => 'yazir'],
			'tr_yildirim'        => ['id' => 98, 'index' => 9,  'language' => 'tr', 'name' => 'yildirim', 'localname' => 'yildirim'],
			'tr_yuksel'          => ['id' => 99, 'index' => 10, 'language' => 'tr', 'name' => 'yuksel', 'localname' => 'yuksel'],

			'tt_nugman'          => ['id' => 100, 'index' => 1, 'language' => 'tt', 'name' => 'nugman', 'localname' => 'nugman'],

			'ug_saleh'           => ['id' => 101, 'index' => 1, 'language' => 'ug', 'name' => 'saleh', 'localname' => 'saleh'],

			'ur_ahmedali'        => ['id' => 102, 'index' => 1, 'language' => 'ur', 'name' => 'ahmedali', 'localname' => 'ahmedali'],
			'ur_jalandhry'       => ['id' => 103, 'index' => 2, 'language' => 'ur', 'name' => 'jalandhry', 'localname' => 'jalandhry'],
			'ur_jawadi'          => ['id' => 104, 'index' => 3, 'language' => 'ur', 'name' => 'jawadi', 'localname' => 'jawadi'],
			'ur_junagarhi'       => ['id' => 105, 'index' => 4, 'language' => 'ur', 'name' => 'junagarhi', 'localname' => 'junagarhi'],
			'ur_kanzuliman'      => ['id' => 106, 'index' => 5, 'language' => 'ur', 'name' => 'kanzuliman', 'localname' => 'kanzuliman'],
			'ur_maududi'         => ['id' => 107, 'index' => 6, 'language' => 'ur', 'name' => 'maududi', 'localname' => 'maududi'],
			'ur_najafi'          => ['id' => 108, 'index' => 7, 'language' => 'ur', 'name' => 'najafi', 'localname' => 'najafi'],
			'ur_qadri'           => ['id' => 109, 'index' => 8, 'language' => 'ur', 'name' => 'qadri', 'localname' => 'qadri'],

			'uz_sodik'           => ['id' => 110, 'index' => 1, 'language' => 'uz', 'name' => 'sodik', 'localname' => 'sodik'],

			'zh_jian'            => ['id' => 111, 'index' => 1, 'language' => 'zh', 'name' => 'jian', 'localname' => 'jian'],
			'zh_majian'          => ['id' => 112, 'index' => 2, 'language' => 'zh', 'name' => 'majian', 'localname' => 'majian'],
		];
		return $translate;
	}
}
?>