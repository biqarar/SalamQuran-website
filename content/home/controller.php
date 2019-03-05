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

		if(\dash\request::get('t'))
		{
			$meta['translate'] = \dash\request::get('t');
		}

		if(\dash\request::get('mode'))
		{
			$meta['mode'] = \dash\request::get('mode');
		}

		$quran = \lib\app\quran_word::find($url, $meta);

		if($quran)
		{
			\dash\data::sureLoaded(true);
			\dash\data::quranLoaded($quran);
			\dash\open::get();



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