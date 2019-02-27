<?php
namespace lib\app;


class quran
{
	public static $find_by = null;
	public static $key1    = null;
	public static $key2    = null;

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

		if(intval($_id) >= 1 && intval($_id) <= 114)
		{
			if($_aye)
			{
				$load       = \lib\db\quran::get(['sura' => $_id, 'aya' => $_aye]);
			}
			else
			{
				$load = \lib\db\quran::get(['sura' => $_id]);
			}

			$result           = [];
			$result['aye']    = $load;
			$result['detail'] = \lib\db\sure::get(['index' => $_id, 'limit' => 1]);

			$result['translate'] = self::load_translate($load, $_meta);

			self::$find_by    = 'sure';
			return $result;
		}
		else
		{
			return false;
		}
	}

	private static function aye($_id, $_meta = [])
	{
		// load aye
		$_id = intval($_id);
		if(intval($_id) >= 1 && intval($_id) <= 6236 )
		{
			$load             = \lib\db\quran::get(['index' => $_id]);
			$result           = [];
			$result['aye']    = $load;

			if(isset($load[0]['sura']))
			{
				$result['detail'] = \lib\db\sure::get(['index' => $load[0]['sura'], 'limit' => 1]);
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
			$load             = \lib\db\quran::get(['page' => $_id]);
			$result           = [];
			$result['aye']    = $load;

			if(isset($load[0]['sura']))
			{
				$result['detail'] = \lib\db\sure::get(['index' => $load[0]['sura'], 'limit' => 1]);
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
			$load                = \lib\db\quran::get(['juz' => $_id]);
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
			$load                = \lib\db\quran::get(['hezb' => $_id]);
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

		$table_name = \lib\app\translate::table_name($_meta['translate']);
		if(!$table_name)
		{
			return null;
		}

		$indexs = array_column($_data, 'index');
		$indexs = array_filter($indexs);
		$indexs = array_unique($indexs);

		if($indexs)
		{
			$load = \lib\db\translate::load($table_name, ['index' => ["IN", "(". implode(',', $indexs).")"]]);
			if(is_array($load))
			{
				$load = array_combine(array_column($load, 'index'), $load);
			}
			return $load;
		}

		return null;
	}
}
?>