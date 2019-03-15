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
			foreach ($list as $key => $value)
			{
				if($value['default'])
				{
					return $value;
				}
			}
			return null;
		}

		return $list[$_mode];
	}

	public static function list()
	{
		$get = \dash\request::get();

		$master = \dash\url::that(). '?';

		$read_mode =
		[
			'aye' =>
			[
				'default' => false,
				'name'    => T_('Aye Block'),
				'font'    => null,
				'class'   => 'align-right',
				'url'     => $master. http_build_query(array_merge($get, ['mode' => 'aye'])),
			],

			'onepage' =>
			[
				'default' => true,
				'name'    => T_('One page'),
				'font'    => null,
				'class'   => 'book',
				'url'     => $master. http_build_query(array_merge($get, ['mode' => 'onepage'])),
			],

			'twopage' =>
			[
				'default' => false,
				'name'    => T_('Two page'),
				'font'    => null,
				'class'   => 'book',
				'url'     => $master. http_build_query(array_merge($get, ['mode' => 'twopage'])),
			],
		];
		return $read_mode;
	}
}
?>