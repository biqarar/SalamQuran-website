<?php
namespace content\about;


class view
{
	public static function config()
	{
		\dash\data::page_title(T_('About Salam Quran'));
		\dash\data::page_desc(\dash\data::site_desc());
	}
}
?>