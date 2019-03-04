<?php
namespace content_api\v6;


class quran
{
	public static function find()
	{
		$child = \dash\url::child();
		switch ($child) {
			case 'sura':
				return self::sura();
				break;

			default:
				\content_api\v6::no(404);
				break;
		}
	}


	private static function sura()
	{
		$wbw = false;

		if(\dash\url::subchild() === 'list')
		{
			if(\dash\url::dir(3))
			{
				\content_api\v6::no(404);
			}

			\content_api\v6::bye(self::list());
		}
		elseif(\dash\url::subchild() === 'wbw')
		{
			if(\dash\url::dir(3))
			{
				\content_api\v6::no(404);
			}

			$wbw = true;
		}
		else
		{
			if(\dash\url::subchild())
			{
				\content_api\v6::no(404);
			}
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

		if($wbw)
		{
			$sura = \lib\db\quran_word::get(['sura' => $index]);
		}
		else
		{
			$sura = \lib\db\quran::get(['sura' => $index]);
		}

		\content_api\v6::bye($sura);
	}


	private static function list()
	{
		$dir = __DIR__. '/sura/sura.json';
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