<?php
namespace lib\app;


class font_style
{
	public static function zoom_in_url()
	{
		$get = \dash\request::get();
		if(isset($get['zoom']) && is_numeric($get['zoom']))
		{
			$zoom = intval($get['zoom']) + 1;
			if($zoom < 50)
			{
				$get['zoom'] = $zoom;
			}
			else
			{
				$get['zoom'] = 50;
			}
		}
		else
		{
			$get['zoom'] = 2;
		}
		return \dash\url::that() . '?'. http_build_query($get);
	}

	public static function zoom_out_url()
	{
		$get = \dash\request::get();
		if(isset($get['zoom']) && is_numeric($get['zoom']))
		{
			$zoom = intval($get['zoom']) - 1;
			if($zoom > 1)
			{
				$get['zoom'] = $zoom;
			}
			else
			{
				$get['zoom'] = 1;
			}
		}
		else
		{
			$get['zoom'] = 1;
		}
		return \dash\url::that() . '?'. http_build_query($get);
	}



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