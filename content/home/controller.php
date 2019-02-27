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

		$meta = [];

		if(\dash\request::get('t') && ctype_digit(\dash\request::get('t')))
		{
			$meta['translate'] = \dash\request::get('t');
		}

		$quran = \lib\app\quran::find($url, $meta);

		if($quran)
		{
			if(isset($quran['aye']) && $quran['aye'])
			{
				\dash\data::sureLoaded(true);
				\dash\data::sura($quran['aye']);
				\dash\open::get();
			}

			if(isset($quran['detail']))
			{
				\dash\data::suraDetail($quran['detail']);
			}


			if(isset($quran['translate']))
			{
				\dash\data::translateList($quran['translate']);
			}
		}
	}
}
?>