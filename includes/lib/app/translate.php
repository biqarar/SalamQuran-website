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
			if(isset($value['index']) && isset($value['language']))
			{
				if(substr($_id, 0, 2) === $value['language'] && intval(substr($_id, 2)) === $value['index'])
				{
					return $value;
				}
			}
		}
		return false;
	}


	public static function translate_list()
	{
		$translate =
		[
			'am_sadiq'           => ['id' => 1, 'index' => 1,   'language' => 'am', 'name' => 'sadiq', 'localname' => 'sadiq', 'table_name' => 'am_sadiq'],

			'ar_jalalayn'        => ['id' => 2, 'index' => 1,   'language' => 'ar', 'name' => 'jalalayn', 'localname' => 'jalalayn', 'table_name' => 'ar_jalalayn'],
			'ar_muyassar'        => ['id' => 3, 'index' => 2,   'language' => 'ar', 'name' => 'muyassar', 'localname' => 'muyassar', 'table_name' => 'ar_muyassar'],

			'az_mammadaliyev'    => ['id' => 4, 'index' => 1,   'language' => 'az', 'name' => 'mammadaliyev', 'localname' => 'mammadaliyev', 'table_name' => 'az_mammadaliyev'],
			'az_musayev'         => ['id' => 5, 'index' => 2,   'language' => 'az', 'name' => 'musayev', 'localname' => 'musayev', 'table_name' => 'az_musayev'],

			'be_mensur'          => ['id' => 6, 'index' => 1,   'language' => 'be', 'name' => 'mensur', 'localname' => 'mensur', 'table_name' => 'be_mensur'],

			'bg_theophanov'      => ['id' => 7, 'index' => 1,   'language' => 'bg', 'name' => 'theophanov', 'localname' => 'theophanov', 'table_name' => 'bg_theophanov'],

			'bn_bengali'         => ['id' => 8, 'index' => 1,   'language' => 'bn', 'name' => 'bengali', 'localname' => 'bengali', 'table_name' => 'bn_bengali'],
			'bn_hoque'           => ['id' => 9, 'index' => 2,   'language' => 'bn', 'name' => 'hoque', 'localname' => 'hoque', 'table_name' => 'bn_hoque'],

			'bs_korkut'          => ['id' => 10, 'index' => 1,  'language' => 'bs', 'name' => 'korkut', 'localname' => 'korkut', 'table_name' => 'bs_korkut'],
			'bs_mlivo'           => ['id' => 11, 'index' => 2,  'language' => 'bs', 'name' => 'mlivo', 'localname' => 'mlivo', 'table_name' => 'bs_mlivo'],

			'cs_hrbek'           => ['id' => 12, 'index' => 1,  'language' => 'cs', 'name' => 'hrbek', 'localname' => 'hrbek', 'table_name' => 'cs_hrbek'],
			'cs_nykl'            => ['id' => 13, 'index' => 2,  'language' => 'cs', 'name' => 'nykl', 'localname' => 'nykl', 'table_name' => 'cs_nykl'],

			'de_aburida'         => ['id' => 14, 'index' => 1,  'language' => 'de', 'name' => 'aburida', 'localname' => 'aburida', 'table_name' => 'de_aburida'],
			'de_bubenheim'       => ['id' => 15, 'index' => 2,  'language' => 'de', 'name' => 'bubenheim', 'localname' => 'bubenheim', 'table_name' => 'de_bubenheim'],
			'de_khoury'          => ['id' => 16, 'index' => 3,  'language' => 'de', 'name' => 'khoury', 'localname' => 'khoury', 'table_name' => 'de_khoury'],
			'de_zaidan'          => ['id' => 17, 'index' => 4,  'language' => 'de', 'name' => 'zaidan', 'localname' => 'zaidan', 'table_name' => 'de_zaidan'],

			'dv_divehi'          => ['id' => 18, 'index' => 1,  'language' => 'dv', 'name' => 'divehi', 'localname' => 'divehi', 'table_name' => 'dv_divehi'],

			'en_ahmedali'        => ['id' => 19, 'index' => 1,  'language' => 'en', 'name' => 'ahmedali', 'localname' => 'ahmedali', 'table_name' => 'en_ahmedali'],
			'en_ahmedraza'       => ['id' => 20, 'index' => 2,  'language' => 'en', 'name' => 'ahmedraza', 'localname' => 'ahmedraza', 'table_name' => 'en_ahmedraza'],
			'en_arberry'         => ['id' => 21, 'index' => 3,  'language' => 'en', 'name' => 'arberry', 'localname' => 'arberry', 'table_name' => 'en_arberry'],
			'en_daryabadi'       => ['id' => 22, 'index' => 4,  'language' => 'en', 'name' => 'daryabadi', 'localname' => 'daryabadi', 'table_name' => 'en_daryabadi'],
			'en_hilali'          => ['id' => 23, 'index' => 5,  'language' => 'en', 'name' => 'hilali', 'localname' => 'hilali', 'table_name' => 'en_hilali'],
			'en_itani'           => ['id' => 24, 'index' => 6,  'language' => 'en', 'name' => 'itani', 'localname' => 'itani', 'table_name' => 'en_itani'],
			'en_maududi'         => ['id' => 25, 'index' => 7,  'language' => 'en', 'name' => 'maududi', 'localname' => 'maududi', 'table_name' => 'en_maududi'],
			'en_mubarakpuri'     => ['id' => 26, 'index' => 8,  'language' => 'en', 'name' => 'mubarakpuri', 'localname' => 'mubarakpuri', 'table_name' => 'en_mubarakpuri'],
			'en_pickthall'       => ['id' => 27, 'index' => 9,  'language' => 'en', 'name' => 'pickthall', 'localname' => 'pickthall', 'table_name' => 'en_pickthall'],
			'en_qarai'           => ['id' => 28, 'index' => 10, 'language' => 'en', 'name' => 'qarai', 'localname' => 'qarai', 'table_name' => 'en_qarai'],
			'en_qaribullah'      => ['id' => 29, 'index' => 11, 'language' => 'en', 'name' => 'qaribullah', 'localname' => 'qaribullah', 'table_name' => 'en_qaribullah'],
			'en_sahih'           => ['id' => 30, 'index' => 12, 'language' => 'en', 'name' => 'sahih', 'localname' => 'sahih', 'table_name' => 'en_sahih'],
			'en_sarwar'          => ['id' => 31, 'index' => 13, 'language' => 'en', 'name' => 'sarwar', 'localname' => 'sarwar', 'table_name' => 'en_sarwar'],
			'en_shakir'          => ['id' => 32, 'index' => 14, 'language' => 'en', 'name' => 'shakir', 'localname' => 'shakir', 'table_name' => 'en_shakir'],
			'en_transliteration' => ['id' => 33, 'index' => 15, 'language' => 'en', 'name' => 'transliteration', 'localname' => 'transliteration', 'table_name' => 'en_transliteration'],
			'en_wahiduddin'      => ['id' => 34, 'index' => 16, 'language' => 'en', 'name' => 'wahiduddin', 'localname' => 'wahiduddin', 'table_name' => 'en_wahiduddin'],
			'en_yusufali'        => ['id' => 35, 'index' => 17, 'language' => 'en', 'name' => 'yusufali', 'localname' => 'yusufali', 'table_name' => 'en_yusufali'],

			'es_bornez'          => ['id' => 36, 'index' => 1,  'language' => 'es', 'name' => 'bornez', 'localname' => 'bornez', 'table_name' => 'es_bornez'],
			'es_cortes'          => ['id' => 37, 'index' => 2,  'language' => 'es', 'name' => 'cortes', 'localname' => 'cortes', 'table_name' => 'es_cortes'],
			'es_garcia'          => ['id' => 38, 'index' => 3,  'language' => 'es', 'name' => 'garcia', 'localname' => 'garcia', 'table_name' => 'es_garcia'],

			'fa_ansarian'        => ['id' => 39, 'index' => 1,  'language' => 'fa', 'name' => 'ansarian', 'localname' => 'انصاریان', 'table_name' => 'fa_ansarian'],
			'fa_ayati'           => ['id' => 40, 'index' => 2,  'language' => 'fa', 'name' => 'ayati', 'localname' => 'آیتی', 'table_name' => 'fa_ayati'],
			'fa_bahrampour'      => ['id' => 41, 'index' => 3,  'language' => 'fa', 'name' => 'bahrampour', 'localname' => 'بهرام‌پور', 'table_name' => 'fa_bahrampour'],
			'fa_fooladvand'      => ['id' => 42, 'index' => 4,  'language' => 'fa', 'name' => 'fooladvand', 'localname' => 'فولادوند', 'table_name' => 'fa_fooladvand'],
			'fa_gharaati'        => ['id' => 43, 'index' => 5,  'language' => 'fa', 'name' => 'gharaati', 'localname' => 'قرائتی', 'table_name' => 'fa_gharaati'],
			'fa_ghomshei'        => ['id' => 44, 'index' => 6,  'language' => 'fa', 'name' => 'ghomshei', 'localname' => 'قمشه‌ای', 'table_name' => 'fa_ghomshei'],
			'fa_khorramdel'      => ['id' => 45, 'index' => 7,  'language' => 'fa', 'name' => 'khorramdel', 'localname' => 'خرم‌دل', 'table_name' => 'fa_khorramdel'],
			'fa_khorramshahi'    => ['id' => 46, 'index' => 8,  'language' => 'fa', 'name' => 'khorramshahi', 'localname' => 'خرم‌شاهی', 'table_name' => 'fa_khorramshahi'],
			'fa_makarem'         => ['id' => 47, 'index' => 9,  'language' => 'fa', 'name' => 'makarem', 'localname' => 'مکارم', 'table_name' => 'fa_makarem'],
			'fa_moezzi'          => ['id' => 48, 'index' => 10, 'language' => 'fa', 'name' => 'moezzi', 'localname' => 'معزی', 'table_name' => 'fa_moezzi'],
			'fa_mojtabavi'       => ['id' => 49, 'index' => 11, 'language' => 'fa', 'name' => 'mojtabavi', 'localname' => 'مجتبوی', 'table_name' => 'fa_mojtabavi'],
			'fa_sadeqi'          => ['id' => 50, 'index' => 12, 'language' => 'fa', 'name' => 'sadeqi', 'localname' => 'صادقی', 'table_name' => 'fa_sadeqi'],

			'fr_hamidullah'      => ['id' => 51, 'index' => 1,  'language' => 'fr', 'name' => 'hamidullah', 'localname' => 'hamidullah', 'table_name' => 'fr_hamidullah'],

			'ha_gumi'            => ['id' => 52, 'index' => 1,  'language' => 'ha', 'name' => 'gumi', 'localname' => 'gumi', 'table_name' => 'ha_gumi'],

			'hi_farooq'          => ['id' => 53, 'index' => 1,  'language' => 'hi', 'name' => 'farooq', 'localname' => 'farooq', 'table_name' => 'hi_farooq'],
			'hi_hindi'           => ['id' => 54, 'index' => 2,  'language' => 'hi', 'name' => 'hindi', 'localname' => 'hindi', 'table_name' => 'hi_hindi'],

			'id_indonesian'      => ['id' => 55, 'index' => 1,  'language' => 'id', 'name' => 'indonesian', 'localname' => 'indonesian', 'table_name' => 'id_indonesian'],
			'id_jalalayn'        => ['id' => 56, 'index' => 2,  'language' => 'id', 'name' => 'jalalayn', 'localname' => 'jalalayn', 'table_name' => 'id_jalalayn'],
			'id_muntakhab'       => ['id' => 57, 'index' => 3,  'language' => 'id', 'name' => 'muntakhab', 'localname' => 'muntakhab', 'table_name' => 'id_muntakhab'],

			'it_piccardo'        => ['id' => 58, 'index' => 1,  'language' => 'it', 'name' => 'piccardo', 'localname' => 'piccardo', 'table_name' => 'it_piccardo'],

			'ja_japanese'        => ['id' => 59, 'index' => 1,  'language' => 'ja', 'name' => 'japanese', 'localname' => 'japanese', 'table_name' => 'ja_japanese'],

			'ko_korean'          => ['id' => 60, 'index' => 1,  'language' => 'ko', 'name' => 'korean', 'localname' => 'korean', 'table_name' => 'ko_korean'],

			'ku_asan'            => ['id' => 61, 'index' => 1,  'language' => 'ku', 'name' => 'asan', 'localname' => 'asan', 'table_name' => 'ku_asan'],

			'ml_abdulhameed'     => ['id' => 62, 'index' => 1,  'language' => 'ml', 'name' => 'abdulhameed', 'localname' => 'abdulhameed', 'table_name' => 'ml_abdulhameed'],
			'ml_karakunnu'       => ['id' => 63, 'index' => 2,  'language' => 'ml', 'name' => 'karakunnu', 'localname' => 'karakunnu', 'table_name' => 'ml_karakunnu'],

			'ms_basmeih'         => ['id' => 64, 'index' => 1,  'language' => 'ms', 'name' => 'basmeih', 'localname' => 'basmeih', 'table_name' => 'ms_basmeih'],

			'nl_keyzer'          => ['id' => 65, 'index' => 1,  'language' => 'nl', 'name' => 'keyzer', 'localname' => 'keyzer', 'table_name' => 'nl_keyzer'],
			'nl_leemhuis'        => ['id' => 66, 'index' => 2,  'language' => 'nl', 'name' => 'leemhuis', 'localname' => 'leemhuis', 'table_name' => 'nl_leemhuis'],
			'nl_siregar'         => ['id' => 67, 'index' => 3,  'language' => 'nl', 'name' => 'siregar', 'localname' => 'siregar', 'table_name' => 'nl_siregar'],

			'no_berg'            => ['id' => 68, 'index' => 1,  'language' => 'no', 'name' => 'berg', 'localname' => 'berg', 'table_name' => 'no_berg'],

			'pl_bielawskiego'    => ['id' => 69, 'index' => 1,  'language' => 'pl', 'name' => 'bielawskiego', 'localname' => 'bielawskiego', 'table_name' => 'pl_bielawskiego'],

			'ps_abdulwali'       => ['id' => 70, 'index' => 1,  'language' => 'ps', 'name' => 'abdulwali', 'localname' => 'abdulwali', 'table_name' => 'ps_abdulwali'],

			'pt_elhayek'         => ['id' => 71, 'index' => 1,  'language' => 'pt', 'name' => 'elhayek', 'localname' => 'elhayek', 'table_name' => 'pt_elhayek'],

			'ro_grigore'         => ['id' => 72, 'index' => 1,  'language' => 'ro', 'name' => 'grigore', 'localname' => 'grigore', 'table_name' => 'ro_grigore'],

			'ru_abuadel'         => ['id' => 73, 'index' => 1,  'language' => 'ru', 'name' => 'abuadel', 'localname' => 'abuadel', 'table_name' => 'ru_abuadel'],
			'ru_krachkovsky'     => ['id' => 74, 'index' => 2,  'language' => 'ru', 'name' => 'krachkovsky', 'localname' => 'krachkovsky', 'table_name' => 'ru_krachkovsky'],
			'ru_kuliev'          => ['id' => 75, 'index' => 3,  'language' => 'ru', 'name' => 'kuliev', 'localname' => 'kuliev', 'table_name' => 'ru_kuliev'],
			'ru_muntahab'        => ['id' => 76, 'index' => 4,  'language' => 'ru', 'name' => 'muntahab', 'localname' => 'muntahab', 'table_name' => 'ru_muntahab'],
			'ru_osmanov'         => ['id' => 77, 'index' => 5,  'language' => 'ru', 'name' => 'osmanov', 'localname' => 'osmanov', 'table_name' => 'ru_osmanov'],
			'ru_porokhova'       => ['id' => 78, 'index' => 6,  'language' => 'ru', 'name' => 'porokhova', 'localname' => 'porokhova', 'table_name' => 'ru_porokhova'],
			'ru_sablukov'        => ['id' => 79, 'index' => 7,  'language' => 'ru', 'name' => 'sablukov', 'localname' => 'sablukov', 'table_name' => 'ru_sablukov'],

			'sd_amroti'          => ['id' => 80, 'index' => 1,  'language' => 'sd', 'name' => 'amroti', 'localname' => 'amroti', 'table_name' => 'sd_amroti'],

			'so_abduh'           => ['id' => 81, 'index' => 1,  'language' => 'so', 'name' => 'abduh', 'localname' => 'abduh', 'table_name' => 'so_abduh'],

			'sq_ahmeti'          => ['id' => 82, 'index' => 1,  'language' => 'sq', 'name' => 'ahmeti', 'localname' => 'ahmeti', 'table_name' => 'sq_ahmeti'],
			'sq_mehdiu'          => ['id' => 83, 'index' => 2,  'language' => 'sq', 'name' => 'mehdiu', 'localname' => 'mehdiu', 'table_name' => 'sq_mehdiu'],
			'sq_nahi'            => ['id' => 84, 'index' => 3,  'language' => 'sq', 'name' => 'nahi', 'localname' => 'nahi', 'table_name' => 'sq_nahi'],

			'sv_bernstrom'       => ['id' => 85, 'index' => 1,  'language' => 'sv', 'name' => 'bernstrom', 'localname' => 'bernstrom', 'table_name' => 'sv_bernstrom'],

			'sw_barwani'         => ['id' => 86, 'index' => 1,  'language' => 'sw', 'name' => 'barwani', 'localname' => 'barwani', 'table_name' => 'sw_barwani'],

			'ta_tamil'           => ['id' => 87, 'index' => 1,  'language' => 'ta', 'name' => 'tamil', 'localname' => 'tamil', 'table_name' => 'ta_tamil'],

			'tg_ayati'           => ['id' => 88, 'index' => 1,  'language' => 'tg', 'name' => 'ayati', 'localname' => 'ayati', 'table_name' => 'tg_ayati'],

			'th_thai'            => ['id' => 89, 'index' => 1,  'language' => 'th', 'name' => 'thai', 'localname' => 'thai', 'table_name' => 'th_thai'],

			'tr_ates'            => ['id' => 90, 'index' => 1,  'language' => 'tr', 'name' => 'ates', 'localname' => 'ates', 'table_name' => 'tr_ates'],
			'tr_bulac'           => ['id' => 91, 'index' => 2,  'language' => 'tr', 'name' => 'bulac', 'localname' => 'bulac', 'table_name' => 'tr_bulac'],
			'tr_diyanet'         => ['id' => 92, 'index' => 3,  'language' => 'tr', 'name' => 'diyanet', 'localname' => 'diyanet', 'table_name' => 'tr_diyanet'],
			'tr_golpinarli'      => ['id' => 93, 'index' => 4,  'language' => 'tr', 'name' => 'golpinarli', 'localname' => 'golpinarli', 'table_name' => 'tr_golpinarli'],
			'tr_ozturk'          => ['id' => 94, 'index' => 5,  'language' => 'tr', 'name' => 'ozturk', 'localname' => 'ozturk', 'table_name' => 'tr_ozturk'],
			'tr_transliteration' => ['id' => 95, 'index' => 6,  'language' => 'tr', 'name' => 'transliteration', 'localname' => 'transliteration', 'table_name' => 'tr_transliteration'],
			'tr_vakfi'           => ['id' => 96, 'index' => 7,  'language' => 'tr', 'name' => 'vakfi', 'localname' => 'vakfi', 'table_name' => 'tr_vakfi'],
			'tr_yazir'           => ['id' => 97, 'index' => 8,  'language' => 'tr', 'name' => 'yazir', 'localname' => 'yazir', 'table_name' => 'tr_yazir'],
			'tr_yildirim'        => ['id' => 98, 'index' => 9,  'language' => 'tr', 'name' => 'yildirim', 'localname' => 'yildirim', 'table_name' => 'tr_yildirim'],
			'tr_yuksel'          => ['id' => 99, 'index' => 10, 'language' => 'tr', 'name' => 'yuksel', 'localname' => 'yuksel', 'table_name' => 'tr_yuksel'],

			'tt_nugman'          => ['id' => 100, 'index' => 1, 'language' => 'tt', 'name' => 'nugman', 'localname' => 'nugman', 'table_name' => 'tt_nugman'],

			'ug_saleh'           => ['id' => 101, 'index' => 1, 'language' => 'ug', 'name' => 'saleh', 'localname' => 'saleh', 'table_name' => 'ug_saleh'],

			'ur_ahmedali'        => ['id' => 102, 'index' => 1, 'language' => 'ur', 'name' => 'ahmedali', 'localname' => 'ahmedali', 'table_name' => 'ur_ahmedali'],
			'ur_jalandhry'       => ['id' => 103, 'index' => 2, 'language' => 'ur', 'name' => 'jalandhry', 'localname' => 'jalandhry', 'table_name' => 'ur_jalandhry'],
			'ur_jawadi'          => ['id' => 104, 'index' => 3, 'language' => 'ur', 'name' => 'jawadi', 'localname' => 'jawadi', 'table_name' => 'ur_jawadi'],
			'ur_junagarhi'       => ['id' => 105, 'index' => 4, 'language' => 'ur', 'name' => 'junagarhi', 'localname' => 'junagarhi', 'table_name' => 'ur_junagarhi'],
			'ur_kanzuliman'      => ['id' => 106, 'index' => 5, 'language' => 'ur', 'name' => 'kanzuliman', 'localname' => 'kanzuliman', 'table_name' => 'ur_kanzuliman'],
			'ur_maududi'         => ['id' => 107, 'index' => 6, 'language' => 'ur', 'name' => 'maududi', 'localname' => 'maududi', 'table_name' => 'ur_maududi'],
			'ur_najafi'          => ['id' => 108, 'index' => 7, 'language' => 'ur', 'name' => 'najafi', 'localname' => 'najafi', 'table_name' => 'ur_najafi'],
			'ur_qadri'           => ['id' => 109, 'index' => 8, 'language' => 'ur', 'name' => 'qadri', 'localname' => 'qadri', 'table_name' => 'ur_qadri'],

			'uz_sodik'           => ['id' => 110, 'index' => 1, 'language' => 'uz', 'name' => 'sodik', 'localname' => 'sodik', 'table_name' => 'uz_sodik'],

			'zh_jian'            => ['id' => 111, 'index' => 1, 'language' => 'zh', 'name' => 'jian', 'localname' => 'jian', 'table_name' => 'zh_jian'],
			'zh_majian'          => ['id' => 112, 'index' => 2, 'language' => 'zh', 'name' => 'majian', 'localname' => 'majian', 'table_name' => 'zh_majian'],
		];
		return $translate;
	}
}
?>