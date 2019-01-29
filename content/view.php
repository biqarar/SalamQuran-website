<?php
namespace content;

class view
{
	public static function config()
	{
		// define default value for global
		\dash\data::site_title(T_("Salam Quran"));
		\dash\data::site_desc(T_("Say hello to Quran!"). ' '. T_("Quran is calling you."). ' '. T_("Access to Quran in your language."). ' '. T_("Free and Easy."));
		\dash\data::site_slogan(T_("Quran Anywhere Anytime"));
		\dash\data::page_desc(\dash\data::site_desc(). ' | '. \dash\data::site_slogan());
	}
}
?>