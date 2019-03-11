<?php
namespace lib\app;


class juz
{

	public static function detail($_id, $_field = null)
	{
		$addr = root. '/content_api/v6/juz/juz.json';
		if(is_file($addr))
		{
			$get = \dash\file::read($addr);
			$get = json_decode($get, true);
			if(is_array($get))
			{
				if(isset($get[$_id]))
				{
					if(!$_field)
					{
						return $get[$_id];
					}
					elseif(isset($get[$_id][$_field]))
					{
						return $get[$_id][$_field];
					}
					else
					{
						return null;
					}
				}
			}
		}
		return null;
	}
}
?>