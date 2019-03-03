<?php
namespace content_api\v6\sura;


class controller
{
	public static function routing()
	{
		if(\dash\url::subchild() === 'list')
		{
			if(\dash\url::dir(3))
			{
				\content_api\v6::no(404);
			}

			\content_api\v6::bye(self::list());
		}

		if(\dash\url::subchild())
		{
			\content_api\v6::no(404);
		}

		$index = \dash\request::get('index');
		if(!$index)
		{
			\content_api\v6::no(400, T_("Index not set"));
		}

		if(!ctype_digit($index) || intval($index) < 1 || intval($index) > 114)
		{
			\content_api\v6::no(400, T_("Invalid index"));
		}

		$sura = \lib\db\quran::get(['sura' => $index]);

		\content_api\v6::bye($sura);
	}


	private static function list()
	{
		$dir = __DIR__. '/sura.json';
		if(is_file($dir))
		{
			$get = \dash\file::read($dir);
			$get = json_decode($get, true);
			return $get;
		}

		return null;
	}
}
?>