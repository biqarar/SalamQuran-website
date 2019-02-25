<?php
namespace content\home;

class view
{
	public static function config()
	{
		\dash\data::page_title(T_("Salam Quran"));
		\dash\data::page_desc(T_("Say hello to Quran!"). ' '. T_("Quran is calling you."));
		\dash\data::page_special(true);

	}
}
?>