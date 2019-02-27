<?php
namespace content\misssion;


class view
{
	public static function config()
	{
		\dash\data::page_title(T_('Salam Quran Mission'));
		\dash\data::page_desc(\dash\data::site_desc());
	}
}
?>