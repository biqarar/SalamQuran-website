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


	public static function translate_list()
	{
		$translate =
		[
			'am_sadiq'           => ['id' => 1,   'language' => 'am', 'name' => 'sadiq', 'localname' => 'sadiq'],
			'ar_jalalayn'        => ['id' => 2,   'language' => 'ar', 'name' => 'jalalayn', 'localname' => 'jalalayn'],
			'ar_muyassar'        => ['id' => 3,   'language' => 'ar', 'name' => 'muyassar', 'localname' => 'muyassar'],
			'az_mammadaliyev'    => ['id' => 4,   'language' => 'az', 'name' => 'mammadaliyev', 'localname' => 'mammadaliyev'],
			'az_musayev'         => ['id' => 5,   'language' => 'az', 'name' => 'musayev', 'localname' => 'musayev'],
			'be_mensur'          => ['id' => 6,   'language' => 'be', 'name' => 'mensur', 'localname' => 'mensur'],
			'bg_theophanov'      => ['id' => 7,   'language' => 'bg', 'name' => 'theophanov', 'localname' => 'theophanov'],
			'bn_bengali'         => ['id' => 8,   'language' => 'bn', 'name' => 'bengali', 'localname' => 'bengali'],
			'bn_hoque'           => ['id' => 9,   'language' => 'bn', 'name' => 'hoque', 'localname' => 'hoque'],
			'bs_korkut'          => ['id' => 10,   'language' => 'bs', 'name' => 'korkut', 'localname' => 'korkut'],
			'bs_mlivo'           => ['id' => 11,   'language' => 'bs', 'name' => 'mlivo', 'localname' => 'mlivo'],
			'cs_hrbek'           => ['id' => 12,   'language' => 'cs', 'name' => 'hrbek', 'localname' => 'hrbek'],
			'cs_nykl'            => ['id' => 13,   'language' => 'cs', 'name' => 'nykl', 'localname' => 'nykl'],
			'de_aburida'         => ['id' => 14,   'language' => 'de', 'name' => 'aburida', 'localname' => 'aburida'],
			'de_bubenheim'       => ['id' => 15,   'language' => 'de', 'name' => 'bubenheim', 'localname' => 'bubenheim'],
			'de_khoury'          => ['id' => 16,   'language' => 'de', 'name' => 'khoury', 'localname' => 'khoury'],
			'de_zaidan'          => ['id' => 17,   'language' => 'de', 'name' => 'zaidan', 'localname' => 'zaidan'],
			'dv_divehi'          => ['id' => 18,   'language' => 'dv', 'name' => 'divehi', 'localname' => 'divehi'],
			'en_ahmedali'        => ['id' => 19,   'language' => 'en', 'name' => 'ahmedali', 'localname' => 'ahmedali'],
			'en_ahmedraza'       => ['id' => 20,   'language' => 'en', 'name' => 'ahmedraza', 'localname' => 'ahmedraza'],
			'en_arberry'         => ['id' => 21,   'language' => 'en', 'name' => 'arberry', 'localname' => 'arberry'],
			'en_daryabadi'       => ['id' => 22,   'language' => 'en', 'name' => 'daryabadi', 'localname' => 'daryabadi'],
			'en_hilali'          => ['id' => 23,   'language' => 'en', 'name' => 'hilali', 'localname' => 'hilali'],
			'en_itani'           => ['id' => 24,   'language' => 'en', 'name' => 'itani', 'localname' => 'itani'],
			'en_maududi'         => ['id' => 25,   'language' => 'en', 'name' => 'maududi', 'localname' => 'maududi'],
			'en_mubarakpuri'     => ['id' => 26,   'language' => 'en', 'name' => 'mubarakpuri', 'localname' => 'mubarakpuri'],
			'en_pickthall'       => ['id' => 27,   'language' => 'en', 'name' => 'pickthall', 'localname' => 'pickthall'],
			'en_qarai'           => ['id' => 28,   'language' => 'en', 'name' => 'qarai', 'localname' => 'qarai'],
			'en_qaribullah'      => ['id' => 29,   'language' => 'en', 'name' => 'qaribullah', 'localname' => 'qaribullah'],
			'en_sahih'           => ['id' => 30,   'language' => 'en', 'name' => 'sahih', 'localname' => 'sahih'],
			'en_sarwar'          => ['id' => 31,   'language' => 'en', 'name' => 'sarwar', 'localname' => 'sarwar'],
			'en_shakir'          => ['id' => 32,   'language' => 'en', 'name' => 'shakir', 'localname' => 'shakir'],
			'en_transliteration' => ['id' => 33,   'language' => 'en', 'name' => 'transliteration', 'localname' => 'transliteration'],
			'en_wahiduddin'      => ['id' => 34,   'language' => 'en', 'name' => 'wahiduddin', 'localname' => 'wahiduddin'],
			'en_yusufali'        => ['id' => 35,   'language' => 'en', 'name' => 'yusufali', 'localname' => 'yusufali'],
			'es_bornez'          => ['id' => 36,   'language' => 'es', 'name' => 'bornez', 'localname' => 'bornez'],
			'es_cortes'          => ['id' => 37,   'language' => 'es', 'name' => 'cortes', 'localname' => 'cortes'],
			'es_garcia'          => ['id' => 38,   'language' => 'es', 'name' => 'garcia', 'localname' => 'garcia'],
			'fa_ansarian'        => ['id' => 39,   'language' => 'fa', 'name' => 'ansarian', 'localname' => 'انصاریان'],
			'fa_ayati'           => ['id' => 40,   'language' => 'fa', 'name' => 'ayati', 'localname' => 'آیتی'],
			'fa_bahrampour'      => ['id' => 41,   'language' => 'fa', 'name' => 'bahrampour', 'localname' => 'بهرام‌پور'],
			'fa_fooladvand'      => ['id' => 42,   'language' => 'fa', 'name' => 'fooladvand', 'localname' => 'فولادوند'],
			'fa_gharaati'        => ['id' => 43,   'language' => 'fa', 'name' => 'gharaati', 'localname' => 'قرائتی'],
			'fa_ghomshei'        => ['id' => 44,   'language' => 'fa', 'name' => 'ghomshei', 'localname' => 'قمشه‌ای'],
			'fa_khorramdel'      => ['id' => 45,   'language' => 'fa', 'name' => 'khorramdel', 'localname' => 'خرم‌دل'],
			'fa_khorramshahi'    => ['id' => 46,   'language' => 'fa', 'name' => 'khorramshahi', 'localname' => 'خرم‌شاهی'],
			'fa_makarem'         => ['id' => 47,   'language' => 'fa', 'name' => 'makarem', 'localname' => 'مکارم'],
			'fa_moezzi'          => ['id' => 48,   'language' => 'fa', 'name' => 'moezzi', 'localname' => 'معزی'],
			'fa_mojtabavi'       => ['id' => 49,   'language' => 'fa', 'name' => 'mojtabavi', 'localname' => 'مجتبوی'],
			'fa_sadeqi'          => ['id' => 50,   'language' => 'fa', 'name' => 'sadeqi', 'localname' => 'صادقی'],
			'fr_hamidullah'      => ['id' => 51,   'language' => 'fr', 'name' => 'hamidullah', 'localname' => 'hamidullah'],
			'ha_gumi'            => ['id' => 52,   'language' => 'ha', 'name' => 'gumi', 'localname' => 'gumi'],
			'hi_farooq'          => ['id' => 53,   'language' => 'hi', 'name' => 'farooq', 'localname' => 'farooq'],
			'hi_hindi'           => ['id' => 54,   'language' => 'hi', 'name' => 'hindi', 'localname' => 'hindi'],
			'id_indonesian'      => ['id' => 55,   'language' => 'id', 'name' => 'indonesian', 'localname' => 'indonesian'],
			'id_jalalayn'        => ['id' => 56,   'language' => 'id', 'name' => 'jalalayn', 'localname' => 'jalalayn'],
			'id_muntakhab'       => ['id' => 57,   'language' => 'id', 'name' => 'muntakhab', 'localname' => 'muntakhab'],
			'it_piccardo'        => ['id' => 58,   'language' => 'it', 'name' => 'piccardo', 'localname' => 'piccardo'],
			'ja_japanese'        => ['id' => 59,   'language' => 'ja', 'name' => 'japanese', 'localname' => 'japanese'],
			'ko_korean'          => ['id' => 60,   'language' => 'ko', 'name' => 'korean', 'localname' => 'korean'],
			'ku_asan'            => ['id' => 61,   'language' => 'ku', 'name' => 'asan', 'localname' => 'asan'],
			'ml_abdulhameed'     => ['id' => 62,   'language' => 'ml', 'name' => 'abdulhameed', 'localname' => 'abdulhameed'],
			'ml_karakunnu'       => ['id' => 63,   'language' => 'ml', 'name' => 'karakunnu', 'localname' => 'karakunnu'],
			'ms_basmeih'         => ['id' => 64,   'language' => 'ms', 'name' => 'basmeih', 'localname' => 'basmeih'],
			'nl_keyzer'          => ['id' => 65,   'language' => 'nl', 'name' => 'keyzer', 'localname' => 'keyzer'],
			'nl_leemhuis'        => ['id' => 66,   'language' => 'nl', 'name' => 'leemhuis', 'localname' => 'leemhuis'],
			'nl_siregar'         => ['id' => 67,   'language' => 'nl', 'name' => 'siregar', 'localname' => 'siregar'],
			'no_berg'            => ['id' => 68,   'language' => 'no', 'name' => 'berg', 'localname' => 'berg'],
			'pl_bielawskiego'    => ['id' => 69,   'language' => 'pl', 'name' => 'bielawskiego', 'localname' => 'bielawskiego'],
			'ps_abdulwali'       => ['id' => 70,   'language' => 'ps', 'name' => 'abdulwali', 'localname' => 'abdulwali'],
			'pt_elhayek'         => ['id' => 71,   'language' => 'pt', 'name' => 'elhayek', 'localname' => 'elhayek'],
			'ro_grigore'         => ['id' => 72,   'language' => 'ro', 'name' => 'grigore', 'localname' => 'grigore'],
			'ru_abuadel'         => ['id' => 73,   'language' => 'ru', 'name' => 'abuadel', 'localname' => 'abuadel'],
			'ru_krachkovsky'     => ['id' => 74,   'language' => 'ru', 'name' => 'krachkovsky', 'localname' => 'krachkovsky'],
			'ru_kuliev'          => ['id' => 75,   'language' => 'ru', 'name' => 'kuliev', 'localname' => 'kuliev'],
			'ru_muntahab'        => ['id' => 76,   'language' => 'ru', 'name' => 'muntahab', 'localname' => 'muntahab'],
			'ru_osmanov'         => ['id' => 77,   'language' => 'ru', 'name' => 'osmanov', 'localname' => 'osmanov'],
			'ru_porokhova'       => ['id' => 78,   'language' => 'ru', 'name' => 'porokhova', 'localname' => 'porokhova'],
			'ru_sablukov'        => ['id' => 79,   'language' => 'ru', 'name' => 'sablukov', 'localname' => 'sablukov'],
			'sd_amroti'          => ['id' => 80,   'language' => 'sd', 'name' => 'amroti', 'localname' => 'amroti'],
			'so_abduh'           => ['id' => 81,   'language' => 'so', 'name' => 'abduh', 'localname' => 'abduh'],
			'sq_ahmeti'          => ['id' => 82,   'language' => 'sq', 'name' => 'ahmeti', 'localname' => 'ahmeti'],
			'sq_mehdiu'          => ['id' => 83,   'language' => 'sq', 'name' => 'mehdiu', 'localname' => 'mehdiu'],
			'sq_nahi'            => ['id' => 84,   'language' => 'sq', 'name' => 'nahi', 'localname' => 'nahi'],
			'sv_bernstrom'       => ['id' => 85,   'language' => 'sv', 'name' => 'bernstrom', 'localname' => 'bernstrom'],
			'sw_barwani'         => ['id' => 86,   'language' => 'sw', 'name' => 'barwani', 'localname' => 'barwani'],
			'ta_tamil'           => ['id' => 87,   'language' => 'ta', 'name' => 'tamil', 'localname' => 'tamil'],
			'tg_ayati'           => ['id' => 88,   'language' => 'tg', 'name' => 'ayati', 'localname' => 'ayati'],
			'th_thai'            => ['id' => 89,   'language' => 'th', 'name' => 'thai', 'localname' => 'thai'],
			'tr_ates'            => ['id' => 90,   'language' => 'tr', 'name' => 'ates', 'localname' => 'ates'],
			'tr_bulac'           => ['id' => 91,   'language' => 'tr', 'name' => 'bulac', 'localname' => 'bulac'],
			'tr_diyanet'         => ['id' => 92,   'language' => 'tr', 'name' => 'diyanet', 'localname' => 'diyanet'],
			'tr_golpinarli'      => ['id' => 93,   'language' => 'tr', 'name' => 'golpinarli', 'localname' => 'golpinarli'],
			'tr_ozturk'          => ['id' => 94,   'language' => 'tr', 'name' => 'ozturk', 'localname' => 'ozturk'],
			'tr_transliteration' => ['id' => 95,   'language' => 'tr', 'name' => 'transliteration', 'localname' => 'transliteration'],
			'tr_vakfi'           => ['id' => 96,   'language' => 'tr', 'name' => 'vakfi', 'localname' => 'vakfi'],
			'tr_yazir'           => ['id' => 97,   'language' => 'tr', 'name' => 'yazir', 'localname' => 'yazir'],
			'tr_yildirim'        => ['id' => 98,   'language' => 'tr', 'name' => 'yildirim', 'localname' => 'yildirim'],
			'tr_yuksel'          => ['id' => 99,   'language' => 'tr', 'name' => 'yuksel', 'localname' => 'yuksel'],
			'tt_nugman'          => ['id' => 100,  'language' => 'tt', 'name' => 'nugman', 'localname' => 'nugman'],
			'ug_saleh'           => ['id' => 101,  'language' => 'ug', 'name' => 'saleh', 'localname' => 'saleh'],
			'ur_ahmedali'        => ['id' => 102,  'language' => 'ur', 'name' => 'ahmedali', 'localname' => 'ahmedali'],
			'ur_jalandhry'       => ['id' => 103,  'language' => 'ur', 'name' => 'jalandhry', 'localname' => 'jalandhry'],
			'ur_jawadi'          => ['id' => 104,  'language' => 'ur', 'name' => 'jawadi', 'localname' => 'jawadi'],
			'ur_junagarhi'       => ['id' => 105,  'language' => 'ur', 'name' => 'junagarhi', 'localname' => 'junagarhi'],
			'ur_kanzuliman'      => ['id' => 106,  'language' => 'ur', 'name' => 'kanzuliman', 'localname' => 'kanzuliman'],
			'ur_maududi'         => ['id' => 107,  'language' => 'ur', 'name' => 'maududi', 'localname' => 'maududi'],
			'ur_najafi'          => ['id' => 108,  'language' => 'ur', 'name' => 'najafi', 'localname' => 'najafi'],
			'ur_qadri'           => ['id' => 109,  'language' => 'ur', 'name' => 'qadri', 'localname' => 'qadri'],
			'uz_sodik'           => ['id' => 110,  'language' => 'uz', 'name' => 'sodik', 'localname' => 'sodik'],
			'zh_jian'            => ['id' => 111,  'language' => 'zh', 'name' => 'jian', 'localname' => 'jian'],
			'zh_majian'          => ['id' => 112,  'language' => 'zh', 'name' => 'majian', 'localname' => 'majian'],
		];
		return $translate;
	}
}
?>