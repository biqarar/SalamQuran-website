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