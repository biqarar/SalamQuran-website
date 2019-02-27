<?php
namespace content\home;

class controller
{
	public static function routing()
	{
		$module = \dash\url::module();

		$url    = $module;

		$child  = \dash\url::child();

		if($child)
		{
			$url .= '/'. $child;
		}

		$quran = \lib\app\quran::find($url);

		if($quran)
		{
			if(isset($quran['aye']))
			{
				\dash\data::sura($quran['aye']);
			}
			if(isset($quran['detail']))
			{
				\dash\data::suraDetail($quran['detail']);
			}
			\dash\open::get();
		}
	}
}
?>