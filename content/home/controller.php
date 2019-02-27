<?php
namespace content\home;

class controller
{
	public static function routing()
	{
		$module = \dash\url::module();

		$module = intval(str_replace('s', '', $module));
		if($module >= 1 && $module <= 114)
		{
			$load_sura = \lib\app\sura::load($module);
			\dash\data::sura($load_sura['aye']);
			\dash\data::suraDetail($load_sura['detail']);
			\dash\open::get();
		}

	}
}
?>