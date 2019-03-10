<?php
namespace lib\app;


class read_mode
{

	public static function site_list()
	{
		$list = self::list();
		return $list;
	}


	public static function load($_mode)
	{
		$list = self::list();
		if(!isset($list[$_mode]) || !$_mode)
		{
			return $list['default'];
		}

		return $list[$_mode];
	}

	public static function list()
	{
		$get = \dash\request::get();

		$master = \dash\url::that(). '?';

		$read_mode =
		[
			'default' =>
				[
					'default' => true,
					'name'    => T_('Default'),
					'font'    => null,
					'class'   => 'list',
					'url'     => $master. http_build_query(array_merge($get, [])),
				],

			'quran' =>
				[
					'default' => false,
					'name'    => T_('Quran'),
					'font'    => null,
					'class'   => 'book',
					'url'     => $master. http_build_query(array_merge($get, ['mode' => 'quran'])),
				],
		];
		return $read_mode;
	}
}
?>