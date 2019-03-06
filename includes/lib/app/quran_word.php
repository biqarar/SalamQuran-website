<?php
namespace lib\app;


class quran_word
{
	public static $find_by        = null;
	public static $load_translate = false;
	public static $translate      = [];


	public static function find($_url, $_meta = [])
	{
		$default_meta =
		[
			'translate' => null,
		];

		if(!is_array($_meta))
		{
			$_meta = [];
		}

		$_meta = array_merge($default_meta, $_meta);

		if(strpos($_url, '/') === false)
		{

			$first_character = mb_strtolower(substr($_url, 0, 1));
			$number          = substr($_url, 1);

			if($first_character === 's' && ctype_digit($number))
			{
				return self::sure($number, null, $_meta);
			}
			elseif($first_character === 'j' && ctype_digit($number))
			{
				return self::juz($number, $_meta);
			}
			elseif($first_character === 'p' && ctype_digit($number))
			{
				return self::page($number, $_meta);
			}
			elseif($first_character === 'a' && ctype_digit($number))
			{
				return self::aye($number, $_meta);
			}
			elseif($first_character === 'h' && ctype_digit($number))
			{
				return self::hezb($number, $_meta);
			}
		}
		else
		{
			$split           = explode('/', $_url);
			$first_character = null;
			$number          = 0;

			if(isset($split[0]) && isset($split[1]))
			{
				$first_character = mb_strtolower(substr($split[0], 0, 1));
				$number          = substr($split[0], 1);
				$number2         = $split[1];
				if($first_character === 's' && ctype_digit($number) && ctype_digit($number2))
				{
					return self::sure($number, $number2, $_meta);
				}

			}
		}

		return false;
	}


	private static function sure($_id, $_aye = null, $_meta = [])
	{
		// load sure
		$_id = intval($_id);
		$result           = [];

		if(intval($_id) < 1 && intval($_id) > 114)
		{
			return false;
		}

		$get_quran         = [];
		$get_quran['sura'] = $_id;

		if($_aye)
		{
			$get_quran['aya'] = $_aye;
		}

		$load = \lib\db\quran_word::get($get_quran);

		self::load_translate($load, $_meta);

		$quran = [];

		foreach ($load as $key => $value)
		{
			if(!isset($quran['aya'][$value['aya']]['detail']))
			{
				$quran['aya'][$value['aya']]['detail'] =
				[
					'aya'       => $value['aya'],
					'sura'      => $value['sura'],
					'verse_key' => $value['verse_key'],
					'page'      => $value['page'],
					'audio'     => self::get_aya_audio($value['sura'], $value['aya'], $_meta),
					'translate' => self::get_translation($value['sura'], $value['aya'], $_meta),
				];
			}

			if(!isset($quran['aya'][$value['aya']]['word']))
			{
				$quran['aya'][$value['aya']]['word'] = [];
			}
			if(isset($value['audio']))
			{
				$my_sura = intval($value['sura']);

				if($my_sura < 10)
				{
					$my_sura = '00'. $my_sura;
				}
				elseif($my_sura < 100)
				{
					$my_sura = '0'. $my_sura;
				}

				$value['audio'] = $my_sura. $value['audio'];
			}
			$quran['aya'][$value['aya']]['word'][] = $value;
		}

		$result['text']    = $quran;

		$result['mode_quran'] = false;

		$result['detail'] = \lib\db\sura::get(['index' => $_id, 'limit' => 1]);

		\dash\notif::api($result);

		self::$find_by    = 'sure';
		return $result;

	}


	private static function get_aya_audio($_sura, $_aya, $_meta)
	{
		if(!isset($_meta['qari']))
		{
			$_meta['qari'] = 1;
		}

		if(!ctype_digit($_meta['qari']))
		{
			$_meta['qari'] = 1;
		}

		// $get_url = \lib\app\qari::get_aya_url($_meta['qary'], $_sura, $_aya);
		// return $get_url;


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


		$url = '/'. $_sura.$_aya. '.mp3';
		return $url;
	}


	private static function sure_old($_id, $_aye = null, $_meta = [])
	{
		// load sure
		$_id = intval($_id);
		$result           = [];

		if(intval($_id) < 1 && intval($_id) > 114)
		{
			return false;
		}

		$get_quran         = [];
		$get_quran['sura'] = $_id;

		if($_aye)
		{
			$get_quran['aya'] = $_aye;
		}

		$mode_quran = false;

		if(isset($_meta['mode']) && $_meta['mode'] === 'quran')
		{
			$mode_quran = true;
		}

		$option = [];

		if($mode_quran)
		{
			$first_word = \lib\db\quran_word::sura_first_word($_id);
			if(isset($first_word['page']))
			{
				$start_page = intval($first_word['page']);
			}
			else
			{
				return false;
			}

			if($start_page % 2 === 0)
			{
				$other_page = $start_page - 1;
			}
			else
			{
				$other_page = $start_page + 1;
			}

			$get_quran['1.1'] = [' = 1.1 AND ', " page IN ($start_page, $other_page)"];
			unset($get_quran['sura']);

			// $load_sura_detail = \lib\db\sura::get_id($_id);
			// if(!$load_sura_detail)
			// {
			// 	return;
			// }
		}

		$load = \lib\db\quran_word::get($get_quran);

		if(!$mode_quran)
		{
			$translate_raw = self::load_translate($load, $_meta);
			$translate     = [];

			$translate_detail = $translate_raw;
			unset($translate_detail['data']);
			unset($translate_detail['table_name']);
			unset($translate_detail['id']);

			if(isset($translate_raw['data']) && is_array($translate_raw['data']))
			{
				foreach ($translate_raw['data'] as $key => $value)
				{
					if(!isset($translate[$value['sura'].'_'. $value['aya']]))
					{
						$translate[$value['sura'].'_'. $value['aya']]['text']   = $value['text'];
						$translate[$value['sura'].'_'. $value['aya']]['detail'] = $translate_detail;
					}
				}
			}
		}

		if($mode_quran)
		{
			$quran = [];

			foreach ($load as $key => $value)
			{
				// if(!isset($quran['line'][$value['page']. '_'. $value['line']]['detail']))
				// {
				// 	$quran['line'][$value['page']. '_'. $value['line']]['detail'] =
				// 	[
				// 		'sura'      => $value['sura'],
				// 		'page'      => $value['page'],
				// 		'audio'     => null,
				// 	];
				// }

				if(!isset($quran[$value['page']][$value['page']. '_'. $value['line']]['word']))
				{
					$quran[$value['page']][$value['page']. '_'. $value['line']]['word'] = [];
				}

				$quran[$value['page']][$value['page']. '_'. $value['line']]['word'][] = $value;
			}
			$result['text']    = $quran;
		}
		else
		{
			// load without font
			// load aya by aya

			$quran = [];

			foreach ($load as $key => $value)
			{
				if(!isset($quran['aya'][$value['aya']]['detail']))
				{
					$aya_translate = [];
					if(isset($translate[$value['sura']. '_'. $value['aya']]))
					{
						$aya_translate[] = $translate[$value['sura']. '_'. $value['aya']];
					}

					$quran['aya'][$value['aya']]['detail'] =
					[
						'aya'       => $value['aya'],
						'sura'      => $value['sura'],
						'verse_key' => $value['verse_key'],
						'page'      => $value['page'],
						'audio'     => null,
						'translate' => $aya_translate,
					];
				}

				if(!isset($quran['aya'][$value['aya']]['word']))
				{
					$quran['aya'][$value['aya']]['word'] = [];
				}

				$quran['aya'][$value['aya']]['word'][] = $value;
			}
			$result['text']    = $quran;
		}

		$result['mode_quran'] = $mode_quran;

		$result['detail'] = \lib\db\sura::get(['index' => $_id, 'limit' => 1]);

		// \dash\notif::api($result);

		self::$find_by    = 'sure';
		return $result;

	}

	private static function aye($_id, $_meta = [])
	{
		// load aye
		$_id = intval($_id);
		if(intval($_id) >= 1 && intval($_id) <= 6236 )
		{
			$load             = \lib\db\quran_word::get(['index' => $_id]);
			$result           = [];
			$result['aye']    = $load;

			if(isset($load[0]['sura']))
			{
				$result['detail'] = \lib\db\sura::get(['index' => $load[0]['sura'], 'limit' => 1]);
			}

			$result['translate'] = self::load_translate($load, $_meta);

			self::$find_by = 'aye';

			return $result;
		}
		else
		{
			return false;
		}
	}


	private static function page($_id, $_meta = [])
	{
		// load page
		$_id = intval($_id);
		if(intval($_id) >= 1 && intval($_id) <= 604 )
		{
			$load             = \lib\db\quran_word::get(['page' => $_id]);
			$result           = [];
			$result['aye']    = $load;

			if(isset($load[0]['sura']))
			{
				$result['detail'] = \lib\db\sura::get(['index' => $load[0]['sura'], 'limit' => 1]);
			}

			$result['translate'] = self::load_translate($load, $_meta);

			self::$find_by = 'page';

			return $result;
		}
		else
		{
			return false;
		}
	}

	private static function juz($_id, $_meta = [])
	{
		// load juz
		$_id = intval($_id);
		if(intval($_id) >= 1 && intval($_id) <= 30 )
		{
			$load                = \lib\db\quran_word::get(['juz' => $_id]);
			$result              = [];
			$result['aye']       = $load;
			$result['translate'] = self::load_translate($load, $_meta);
			self::$find_by       = 'juz';

			return $result;
		}
		else
		{
			return false;
		}
	}

	private static function hezb($_id, $_meta = [])
	{
		// load hezb
		$_id = intval($_id);
		if(intval($_id) >= 1 && intval($_id) <= 120 )
		{
			$load                = \lib\db\quran_word::get(['hezb' => $_id]);
			$result              = [];
			$result['aye']       = $load;
			$result['translate'] = self::load_translate($load, $_meta);
			self::$find_by       = 'hezb';

			return $result;
		}
		else
		{
			return false;
		}
	}


	private static function load_translate($_data, $_meta)
	{
		if(!is_array($_data))
		{
			return null;
		}

		if(!is_array($_meta))
		{
			return null;
		}

		if(!isset($_meta['translate']))
		{
			return null;
		}

		if(!$_meta['translate'])
		{
			return null;
		}

		$get = explode('-', $_meta['translate']);
		$result = [];
		foreach ($get as $key => $value)
		{
			$translate = \lib\app\translate::table_name($value);

			if(!isset($translate['table_name']))
			{
				continue;
			}

			$sura = array_column($_data, 'sura');
			$sura = array_filter($sura);
			$sura = array_unique($sura);

			$aya = array_column($_data, 'aya');
			$aya = array_filter($aya);
			$aya = array_unique($aya);

			if($sura && $aya)
			{
				$load = \lib\db\translate::load($translate['table_name'], ['sura' => ["IN", "(". implode(',', $sura).")"], 'aya' => ["IN", "(". implode(',', $aya).")"]]);
				$data = [];

				unset($translate['table_name']);
				unset($translate['id']);

				foreach ($load as $key => $value)
				{
					if(!isset($data[$value['sura'].'_'. $value['aya']]))
					{
						$data[$value['sura'].'_'. $value['aya']]['text']   = $value['text'];
						$data[$value['sura'].'_'. $value['aya']]['detail'] = $translate;
					}
				}

				$translate['data'] = $data;

				$result[] = $translate;
			}
		}
		self::$load_translate = true;
		self::$translate = $result;

	}


	private static function get_translation($_sura, $_aya, $_meta = null)
	{
		if(!self::$load_translate)
		{
			return false;
		}

		$result = [];
		foreach (self::$translate as $key => $value)
		{
			if(isset($value['data'][$_sura. '_'. $_aya]))
			{
				$result[] = $value['data'][$_sura. '_'. $_aya];
			}
		}

		return $result;
	}
}
?>