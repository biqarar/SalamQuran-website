<?php
namespace content\vision;


class view
{
	public static function config()
	{
		\dash\data::page_title(T_('Salam Quran Vision'));
		\dash\data::page_desc(\dash\data::site_desc());
	}
}
?>