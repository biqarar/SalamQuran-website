<?php
namespace lib\app;


class font_style
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

		$font_style =
		[
			'default' =>
				[
					'default' => true,
					'name'    => 'default',
					'font'    => null,
					'class'   => 'list',
					'url'     => $master. http_build_query(array_merge($get, [])),
				],

			'uthmani' =>
				[
					'default' => false,
					'name'    => 'uthmani',
					'font'    => null,
					'class'   => 'book',
					'url'     => $master. http_build_query(array_merge($get, ['font' => 'uthmani'])),
				],
		];
		return $font_style;
	}
}
?>