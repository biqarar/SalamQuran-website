<?php
namespace lib\app;


class quran
{
	public static function find($_url)
	{
		if(strpos($_url, '/') === false)
		{

			$first_character = mb_strtolower(substr($_url, 0, 1));
			$number          = substr($_url, 1);

			if($first_character === 's' && ctype_digit($number))
			{
				return self::sure($number);
			}
			elseif($first_character === 'j' && ctype_digit($number))
			{
				return self::joze($number);
			}
			elseif($first_character === 'p' && ctype_digit($number))
			{
				return self::page($number);
			}
			elseif($first_character === 'a' && ctype_digit($number))
			{
				return self::aye($number);
			}
			elseif($first_character === 'h' && ctype_digit($number))
			{
				return self::hezb($number);
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
					return self::sure($number, $number2);
				}

			}
		}

		return false;
	}


	private static function sure($_id, $_aye = null)
	{
		// load sure
		$_id = intval($_id);
		if(intval($_id) >= 1 && intval($_id) <= 114 )
		{
			if($_aye)
			{
				$load = \lib\db\quran::get(['sura' => $_id, 'aya' => $_aye]);
			}
			else
			{
				$load = \lib\db\quran::get(['sura' => $_id]);
			}

			$result           = [];
			$result['aye']    = $load;
			$result['detail'] = \lib\db\sure::get(['index' => $_id, 'limit' => 1]);
			return $result;
		}
		else
		{
			return false;
		}
	}

	private static function aye($_id)
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
			return $result;
		}
		else
		{
			return false;
		}
	}


	private static function page($_id)
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

			return $result;
		}
		else
		{
			return false;
		}
	}

	private static function hezb($_id)
	{
		// load hezb
		$_id = intval($_id);
		if(intval($_id) >= 1 && intval($_id) <= 604 )
		{
			$load             = \lib\db\quran::get(['hezb' => $_id]);
			$result           = [];
			$result['aye']    = $load;
			return $result;
		}
		else
		{
			return false;
		}
	}

}
?>