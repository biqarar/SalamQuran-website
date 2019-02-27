<?php
namespace content\home;

class view
{
	public static function config()
	{
		$title = T_('Quran');
		$desc  = T_("Say hello to Quran!"). ' '. T_("Quran is calling you.");

		if(\dash\data::suraDetail())
		{
			$title = T_('Surah'). ' '. T_(\dash\data::suraDetail_tname());
			// add surah name
			$desc  = T_('Quran'). ' #'. \dash\utility\human::fitNumber(\dash\data::suraDetail_index()). ' '. T_('surah');
			// add total ayah number
			$desc  .= ' | '. \dash\utility\human::fitNumber(\dash\data::suraDetail_ayas()). ' '. T_('ayah');
			// add type
			$desc  .= ' | '. T_(\dash\data::suraDetail_type());
			// add juz
			if(\dash\data::suraDetail_alljuz())
			{
				$desc  .= ' | '. T_('juz'). \dash\utility\human::fitNumber(\dash\data::suraDetail_ayas());
			}

			// add translated name
			$desc  .= ' | '. T_(\dash\data::suraDetail_ename());
			// add arabic name
			$desc  .= ' | '. \dash\data::suraDetail_name();
		}


		\dash\data::page_title($title);
		\dash\data::page_desc($desc);

		if(\dash\url::module() === 'home')
		{
			\dash\data::page_special(true);
		}


		if(\dash\data::sureLoaded())
		{
			$translation_list = \lib\app\translate::current_lang_translate();
			\dash\data::translationList($translation_list);
		}
	}
}
?>