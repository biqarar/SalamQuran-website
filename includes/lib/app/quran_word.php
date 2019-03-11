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
				if(intval($number) >= 1 && intval($number) <= 114 )
				{
					return self::load_quran('sura', $number, null, $_meta);
				}
				else
				{
					return false;
				}
			}
			elseif($first_character === 'j' && ctype_digit($number))
			{
				if(intval($number) >= 1 && intval($number) <= 30 )
				{
					return self::load_quran('juz', $number, null, $_meta);
				}
				else
				{
					return false;
				}
			}
			elseif($first_character === 'h' && ctype_digit($number))
			{
				if(intval($number) >= 1 && intval($number) <= 60 )
				{
					return self::load_quran('hizb', $number, null, $_meta);
				}
				else
				{
					return false;
				}
			}
			elseif($first_character === 'p' && ctype_digit($number))
			{
				if(intval($number) >= 1 && intval($number) <= 604 )
				{
					return self::load_quran('page', $number, null, $_meta);
				}
				else
				{
					return false;
				}
			}
			elseif($first_character === 'a' && ctype_digit($number))
			{
				if(intval($number) >= 1 && intval($number) <= 6236 )
				{
					return self::load_quran('aya', $number, null, $_meta);
				}
				else
				{
					return false;
				}
			}
			elseif($first_character === 'r' && ctype_digit($number))
			{
				if(intval($number) >= 1 && intval($number) <= 240 )
				{
					return self::load_quran('rub', $number, null, $_meta);
				}
				else
				{
					return false;
				}
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

	private static function pagination_current()
	{
		$pagination = self::pagination(...func_get_args());
		foreach ($pagination as $key => $value)
		{
			if(isset($value['current']) && $value['current'])
			{
				return $value['limit_array'];
			}
		}
		return [1, 2];
	}

	private static function pagination($_type, $_id, $_meta)
	{
		$this_link  = \dash\url::that();
		$pagination = [];
		if($_type === 'sura')
		{
			$ayas = intval(\lib\app\sura::detail($_id, 'ayas'));
			$ayas_split = ceil($ayas / 20);

			$pagination = [];

			$get       = \dash\request::get();
			$currnet_get = isset($get['a']) ? intval($get['a']) : 1;
			if($currnet_get > $ayas_split || $currnet_get < 1)
			{
				$currnet_get = 1;
			}

			unset($get['a']);

			for ($myAya = 0; $myAya < $ayas_split; $myAya++)
			{
				$end   = ($myAya + 1) * 20;
				$end   = $end > $ayas ? $ayas : $end;
				$start = ($myAya * 20) + 1;

				$title = $start;
				$title .= '-';
				$title .= $end;

				$get['a'] = $myAya + 1;
				$link     = $this_link. '?'. http_build_query($get);
				$current = $myAya + 1 === $currnet_get ? true : false;
				$pagination[] =
				[
					'current'     => $current,
					'class'       => $current ? 'active' : null,
					'limit_array' => [$start, $end],
					'link'        => $link,
					'text'        => \dash\utility\human::fitNumber($title),
				];
			}
		}
		elseif($_type === 'juz')
		{
			$startpage   = intval(\lib\app\juz::detail($_id, 'startpage'));
			$endpage     = intval(\lib\app\juz::detail($_id, 'endpage'));

			$get         = \dash\request::get();
			$currnet_get = isset($get['p']) ? intval($get['p']) : $startpage;

			if($currnet_get > $endpage || $currnet_get < $startpage)
			{
				$currnet_get = $startpage;
			}


			for ($page = $startpage; $page <= $endpage ; $page++)
			{
				$title    = $page;
				$get['p'] = $page;
				$link     = $this_link. '?'. http_build_query($get);
				$current  = $page === $currnet_get ? true : false;

				$pagination[] =
				[
					'current'     => $current,
					'class'       => $current ? 'active' : null,
					'limit_array' => [$page, $page],
					'link'        => $link,
					'text'        => \dash\utility\human::fitNumber($title),
				];
			}
		}

		return $pagination;
	}


	private static function load_quran($_type, $_id, $_aye = null, $_meta = [])
	{
		// load sure
		$_id = intval($_id);
		$result           = [];

		$get_quran         = [];

		if($_type === 'aya')
		{
			$get_quran['index'] = $_id;
		}
		else
		{
			$get_quran[$_type] = $_id;
		}

		if($_aye)
		{
			$get_quran['aya'] = $_aye;
		}

		$mode              = null;

		if(isset($_meta['mode']))
		{
			$mode = $_meta['mode'];
		}

		if(!in_array($mode, ['quran', 'default']))
		{
			$mode = null;
		}

		$startpage               = intval(\lib\app\sura::detail($_id, 'startpage'));
		$endpage                 = intval(\lib\app\sura::detail($_id, 'endpage'));

		$a                       = isset($_meta['a']) && is_numeric($_meta['a']) ? intval($_meta['a']) : 0;

		$pagination_current = self::pagination_current($_type, $_id, $_meta);

		$pagination              = self::pagination($_type, $_id, $_meta);

		if($mode === 'quran')
		{

			unset($get_quran['sura']);
			if($startpage != $endpage)
			{
				$startpagePlus = $startpage + 1;
				$get_quran['1.1'] = ['= 1.1 AND', " `page` IN ($startpage, $startpagePlus)"];
			}
			else
			{
				$get_quran['page'] = $startpage;
			}

			$load           = \lib\db\quran_word::get($get_quran);
			$load_quran_aya = \lib\db\quran::get($get_quran);
		}
		else
		{
			if($_type === 'sura')
			{
				$get_quran['2.2'] = [' = 2.2 AND', " `aya` >= $pagination_current[0] AND `aya` <= $pagination_current[1] "];
			}
			elseif($_type === 'juz')
			{
				$get_quran['2.2'] = [' = 2.2 AND', " `page` >= $pagination_current[0] AND `page` <= $pagination_current[1] "];
			}
			elseif($_type === 'hizb')
			{
				// nothing
			}
			elseif($_type === 'page')
			{
				// nothing
			}
			elseif($_type === 'aya')
			{
				// nothing
			}
			elseif($_type === 'rub')
			{
				// nothing
			}

			$load           = \lib\db\quran_word::get($get_quran);

			$load_quran_aya = \lib\db\quran::get($get_quran);
		}
		$quran_aya      = [];

		foreach ($load_quran_aya as $key => $value)
		{
			$quran_aya[$value['sura']. '_'. $value['aya']] = $value;
		}


		self::load_translate($load, $_meta);

		$quran             = [];

		$first_verse = [];

		foreach ($load as $key => $value)
		{
			if($mode === 'quran')
			{
				$myKey      = 'line';
				$myArrayKey = $value['sura']. '_'. $value['line'];
			}
			else
			{
				$myKey      = 'aya';
				$myArrayKey = $value['sura']. '_'. $value['aya'];
			}

			if(!isset($quran[$myKey][$myArrayKey]['detail']))
			{
				$quran_aya_key = $value['sura']. '_'. $value['aya'];

				$verse_title = null;
				$verse_title .= T_("Quran");
				$verse_title .= ' - ';
				$verse_title .= T_("Sura");
				$verse_title .= ' ';
				$verse_title .= \dash\utility\human::fitNumber($value['sura']). ' '. T_(\lib\app\sura::detail($value['sura'], 'tname'));
				$verse_title .= ' - ';
				$verse_title .= T_("Aya");
				$verse_title .= ' ';
				$verse_title .= \dash\utility\human::fitNumber($value['aya']);

				$verse_url = \dash\url::kingdom();
				$verse_url .= '/s'. $value['sura'];
				$verse_url .= '/'. $value['aya'];

				if(!$first_verse)
				{
					$first_verse['title'] = $verse_title;
					$first_verse['url']   = $verse_url;
					$first_verse['audio'] = self::get_aya_audio($value['sura'], $value['aya'], $_meta);
				}

				$quran[$myKey][$myArrayKey]['detail'] =
				[
					'index'         => isset($quran_aya[$quran_aya_key]['index']) ? $quran_aya[$quran_aya_key]['index'] : null,
					'text'          => isset($quran_aya[$quran_aya_key]['text']) ? self::normalize($quran_aya[$quran_aya_key]['text']) : null,
					'simple'        => isset($quran_aya[$quran_aya_key]['simple']) ? $quran_aya[$quran_aya_key]['simple'] : null,
					'juz'           => isset($quran_aya[$quran_aya_key]['juz']) ? $quran_aya[$quran_aya_key]['juz'] : null,
					'hizb'          => isset($quran_aya[$quran_aya_key]['hizb']) ? $quran_aya[$quran_aya_key]['hizb'] : null,
					'word'          => isset($quran_aya[$quran_aya_key]['word']) ? $quran_aya[$quran_aya_key]['word'] : null,
					'sajdah'        => isset($quran_aya[$quran_aya_key]['sajdah']) ? $quran_aya[$quran_aya_key]['sajdah'] : null,
					'sajdah_number' => isset($quran_aya[$quran_aya_key]['sajdah_number']) ? $quran_aya[$quran_aya_key]['sajdah_number'] : null,
					'rub'           => isset($quran_aya[$quran_aya_key]['rub']) ? $quran_aya[$quran_aya_key]['rub'] : null,
					'word'          => isset($quran_aya[$quran_aya_key]['word']) ? $quran_aya[$quran_aya_key]['word'] : null,
					'aya'           => $value['aya'],
					'sura'          => $value['sura'],
					'verse_key'     => $value['verse_key'],
					'verse_title'   => $verse_title,
					'verse_url'     => $verse_url,
					'page'          => $value['page'],
					'audio'         => self::get_aya_audio($value['sura'], $value['aya'], $_meta),
					'translate'     => self::get_translation($value['sura'], $value['aya'], $_meta),
				];
			}

			if(!isset($quran[$myKey][$myArrayKey]['word']))
			{
				$quran[$myKey][$myArrayKey]['word'] = [];
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

			if(isset($value['text']))
			{
				$value['text'] = self::normalize($value['text']);
			}

			$quran[$myKey][$myArrayKey]['word'][] = $value;
		}

		$result['text']    = $quran;

		$result['mode_quran'] = false;

		$next_sura = intval($_id) + 1;
		$prev_sura = intval($_id) - 1;

		if($next_sura > 114)
		{
			$next_sura = null;
		}

		if($prev_sura < 1)
		{
			$prev_sura = null;
		}

		$quran_detail = \lib\app\sura::detail($_id);

		$quran_detail['beginning'] = ['title' => T_("Beginning of Surah"), 'link' => \dash\url::that(). '?'. \dash\url::query()];

		if($_type === 'sura')
		{
			if($next_sura)
			{
				$quran_detail['next'] =
				[
					'index'    => $next_sura,
					'url'      => \dash\url::kingdom(). '/s'. $next_sura. '?'. \dash\url::query(),
					'title'    => T_("Next Surah"),
					'subtitle' => T_(\lib\app\sura::detail($next_sura, 'tname')),
				];
			}

			if($prev_sura)
			{
				$quran_detail['prev'] =
				[
					'index' => $prev_sura,
					'url'   => \dash\url::kingdom(). '/s'. $prev_sura. '?'. \dash\url::query(),
					'title' => T_("Previous Surah"),
					'subtitle' => T_(\lib\app\sura::detail($prev_sura, 'tname')),
				];
			}
		}
		elseif($_type === 'juz')
		{
			$next_juz = intval($_id) + 1;
			$prev_juz = intval($_id) - 1;

			if($next_juz > 30)
			{
				$next_juz = null;
			}

			if($prev_juz < 1)
			{
				$prev_juz = null;
			}

			$quran_detail = [];
			$quran_detail['beginning'] = ['title' => T_("Beginning of Juz"), 'link' => \dash\url::that(). '?'. \dash\url::query()];

			if($next_juz)
			{
				$quran_detail['next'] =
				[
					'index'    => $next_juz,
					'url'      => \dash\url::kingdom(). '/j'. $next_juz. '?'. \dash\url::query(),
					'title'    => T_("Next juz"),
					'subtitle' => T_('juz') . ' '. \dash\utility\human::fitNumber($next_juz),
				];
			}

			if($prev_juz)
			{
				$quran_detail['prev'] =
				[
					'index'    => $prev_juz,
					'url'      => \dash\url::kingdom(). '/j'. $prev_juz. '?'. \dash\url::query(),
					'title'    => T_("Previous juz"),
					'subtitle' => T_('juz') . ' '. \dash\utility\human::fitNumber($prev_juz),
				];
			}

		}
		elseif($_type === 'hizb')
		{
			$next_hizb = intval($_id) + 1;
			$prev_hizb = intval($_id) - 1;

			if($next_hizb > 60)
			{
				$next_hizb = null;
			}

			if($prev_hizb < 1)
			{
				$prev_hizb = null;
			}

			$quran_detail = [];
			$quran_detail['beginning'] = ['title' => T_("Beginning of Hizb"), 'link' => \dash\url::that(). '?'. \dash\url::query()];

			if($next_hizb)
			{
				$quran_detail['next'] =
				[
					'index'    => $next_hizb,
					'url'      => \dash\url::kingdom(). '/h'. $next_hizb. '?'. \dash\url::query(),
					'title'    => T_("Next hizb"),
					'subtitle' => T_('hizb') . ' '. \dash\utility\human::fitNumber($next_hizb),
				];
			}

			if($prev_hizb)
			{
				$quran_detail['prev'] =
				[
					'index'    => $prev_hizb,
					'url'      => \dash\url::kingdom(). '/h'. $prev_hizb. '?'. \dash\url::query(),
					'title'    => T_("Previous hizb"),
					'subtitle' => T_('hizb') . ' '. \dash\utility\human::fitNumber($prev_hizb),
				];
			}
		}
		elseif($_type === 'page')
		{
			$next_page = intval($_id) + 1;
			$prev_page = intval($_id) - 1;

			if($next_page > 604)
			{
				$next_page = null;
			}

			if($prev_page < 1)
			{
				$prev_page = null;
			}

			$quran_detail = [];
			$quran_detail['beginning'] = ['title' => T_("Beginning of page"), 'link' => \dash\url::that(). '?'. \dash\url::query()];

			if($next_page)
			{
				$quran_detail['next'] =
				[
					'index'    => $next_page,
					'url'      => \dash\url::kingdom(). '/p'. $next_page. '?'. \dash\url::query(),
					'title'    => T_("Next page"),
					'subtitle' => T_('page') . ' '. \dash\utility\human::fitNumber($next_page),
				];
			}

			if($prev_page)
			{
				$quran_detail['prev'] =
				[
					'index'    => $prev_page,
					'url'      => \dash\url::kingdom(). '/p'. $prev_page. '?'. \dash\url::query(),
					'title'    => T_("Previous page"),
					'subtitle' => T_('page') . ' '. \dash\utility\human::fitNumber($prev_page),
				];
			}
		}
		elseif($_type === 'aya')
		{
			$next_aya = intval($_id) + 1;
			$prev_aya = intval($_id) - 1;

			if($next_aya > 6236)
			{
				$next_aya = null;
			}

			if($prev_aya < 1)
			{
				$prev_aya = null;
			}

			$quran_detail = [];
			$quran_detail['beginning'] = ['title' => T_("Beginning of aya"), 'link' => \dash\url::that(). '?'. \dash\url::query()];

			if($next_aya)
			{
				$quran_detail['next'] =
				[
					'index'    => $next_aya,
					'url'      => \dash\url::kingdom(). '/a'. $next_aya. '?'. \dash\url::query(),
					'title'    => T_("Next aya"),
					'subtitle' => T_('aya') . ' '. \dash\utility\human::fitNumber($next_aya),
				];
			}

			if($prev_aya)
			{
				$quran_detail['prev'] =
				[
					'index'    => $prev_aya,
					'url'      => \dash\url::kingdom(). '/a'. $prev_aya. '?'. \dash\url::query(),
					'title'    => T_("Previous aya"),
					'subtitle' => T_('aya') . ' '. \dash\utility\human::fitNumber($prev_aya),
				];
			}
		}
		elseif($_type === 'rub')
		{
			$next_rub = intval($_id) + 1;
			$prev_rub = intval($_id) - 1;

			if($next_rub > 240)
			{
				$next_rub = null;
			}

			if($prev_rub < 1)
			{
				$prev_rub = null;
			}

			$quran_detail = [];
			$quran_detail['beginning'] = ['title' => T_("Beginning of rub"), 'link' => \dash\url::that(). '?'. \dash\url::query()];

			if($next_rub)
			{
				$quran_detail['next'] =
				[
					'index'    => $next_rub,
					'url'      => \dash\url::kingdom(). '/p'. $next_rub. '?'. \dash\url::query(),
					'title'    => T_("Next rub"),
					'subtitle' => T_('rub') . ' '. \dash\utility\human::fitNumber($next_rub),
				];
			}

			if($prev_rub)
			{
				$quran_detail['prev'] =
				[
					'index'    => $prev_rub,
					'url'      => \dash\url::kingdom(). '/p'. $prev_rub. '?'. \dash\url::query(),
					'title'    => T_("Previous rub"),
					'subtitle' => T_('rub') . ' '. \dash\utility\human::fitNumber($prev_rub),
				];
			}
		}

		$sura_detail['first_verse'] = $first_verse;

		$result['detail']           = $quran_detail;
		$result['pagination']  = $pagination;

		// \dash\notif::api($result);

		self::$find_by    = $_type;
		return $result;
	}


	private static function get_aya_audio($_sura, $_aya, $_meta = [])
	{
		if(!isset($_meta['qari']))
		{
			$_meta['qari'] = 1;
		}

		if(!ctype_digit($_meta['qari']))
		{
			$_meta['qari'] = 1;
		}

		$get_url = \lib\app\qari::get_aya_url($_meta['qari'], $_sura, $_aya);
		return $get_url;
	}


	public static function normalize($_text)
	{
		if(is_callable(['Normalizer', 'normalize']))
		{
			return \Normalizer::normalize($_text);
		}
		return $_text;
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
		$i         = 0;

		foreach ($get as $key => $value)
		{
			$translate = \lib\app\translate::table_name($value);

			if(!isset($translate['table_name']))
			{
				continue;
			}

			$i++;
			if($i > 20)
			{
				\dash\notif::warn(T_("Only 20 translate can be show"));
				break;
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

				if(!\dash\url::content())
				{
					$get       = \dash\request::get();
					$getTrans  = isset($get['t']) ? $get['t'] : '';
					$getTrans  = explode('-', $getTrans);
					$getTrans  = array_filter($getTrans);
					$getTrans  = array_unique($getTrans);

					$thisTransKey = $translate['language']. $translate['index'];

					if(in_array($thisTransKey, $getTrans))
					{
						unset($getTrans[array_search($thisTransKey, $getTrans)]);
					}

					$get['t']        = implode('-', $getTrans);
					$url             = \dash\url::that(). '?'. http_build_query($get);
					$translate['remove_url'] = $url;

				}

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