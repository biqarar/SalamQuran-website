<?php
namespace lib\app;


class qari
{
	private static function qari_image($_slug = null)
	{
		$url = \dash\url::site(). '/static/images/qariyan/';
		if($_slug)
		{
			$url .= $_slug. '.png';
		}

		return $url;
	}

	private static function master_path()
	{
		return 'https://dl.salamquran.com/ayat/';
	}

	public static function list()
	{
		$list =
		[
			// ----------------- abdoabaset
			['index' => 1000, 'lang' => 'ar', 'type' => T_('Mujawwad'), 'addr'  => 'abdulbasit-mujawwad-128/', 'slug'  => 'abdulbaset', 'name'  => T_('AbdulBaset AbdulSamad'), 'default' => true],
			['index' => 1001, 'lang' => 'ar', 'type' => T_('Mujawwad'), 'addr'  => 'abdulbasit-murattal-192/', 'slug'  => 'abdulbaset', 'name'  => T_('AbdulBaset AbdulSamad'),],

			// // ----------------- abdoabaset
			// 2  =>
			// 	[
			// 		'type'       => 'murattal',
			// 		'type_title' => T_('murattal'),
			// 		'play_type'  => 'aya',
			// 		'visible'    => false,
			// 		'audio_type' => 'mp3',
			// 		'addr'       => $master_path. 'audio/abdulbaset/ayat/Abdul_Basit_Murattal_192kbps/',
			// 		'qari_slug'  => 'abdulbaset',
			// 		'short_name' => T_('abdulbaset'),
			// 		'image'      => $qari_image. 'basit.png',
			// 		'qari'       => T_('AbdulBaset AbdulSamad'),
			// 	],

			// // ----------------- abdoabaset
			// 3  =>
			// 	[
			// 		'type'       => 'murattal',
			// 		'type_title' => T_('murattal'),
			// 		'play_type'  => 'aya',
			// 		'visible'    => false,
			// 		'audio_type' => 'mp3',
			// 		'addr'       => $master_path. 'audio/abdulbaset/ayat/Abdul_Basit_Murattal_64kbps/',
			// 		'qari_slug'  => 'abdulbaset',
			// 		'short_name' => T_('abdulbaset'),
			// 		'image'      => $qari_image. 'basit.png',
			// 		'qari'       => T_('AbdulBaset AbdulSamad'),
			// 	],
			// 4  =>
			// 	[
			// 		'type'       => 'mujawwad',
			// 		'type_title' => T_('mujawwad'),
			// 		'play_type'  => 'aya',
			// 		'visible'    => true,
			// 		'audio_type' => 'mp3',
			// 		'addr'       => $master_path. 'audio/abdulbaset/ayat/mujawwad/mp3/',
			// 		'qari_slug'  => 'abdulbaset',
			// 		'short_name' => T_('abdulbaset'),
			// 		'image'      => $qari_image. 'basit.png',
			// 		'qari'       => T_('AbdulBaset AbdulSamad'),
			// 	],
			// 5  =>
			// 	[
			// 		'type'       => 'mujawwad',
			// 		'type_title' => T_('mujawwad'),
			// 		'play_type'  => 'aya',
			// 		'visible'    => false,
			// 		'audio_type' => 'mp3',
			// 		'addr'       => $master_path. 'audio/abdulbaset/ayat/Abdul_Basit_Mujawwad_128kbps/',
			// 		'qari_slug'  => 'abdulbaset',
			// 		'short_name' => T_('abdulbaset'),
			// 		'image'      => $qari_image. 'basit.png',
			// 		'qari'       => T_('AbdulBaset AbdulSamad'),
			// 	],
			// 6  =>
			// 	[
			// 		'type'       => 'murattal',
			// 		'type_title' => T_('murattal'),
			// 		'play_type'  => 'aya',
			// 		'visible'    => false,
			// 		'audio_type' => 'mp3',
			// 		'addr'       => $master_path. 'audio/alafasy/ayat/Alafasy_128kbps/',
			// 		'qari_slug'  => 'afasy',
			// 		'short_name' => T_('afasy'),
			// 		'image'      => $qari_image. 'mashari.png',
			// 		'qari'       => T_('Mishary Rashid Alafasy'),
			// 	],
			// 1  =>
			// 	[
			// 		'type'       => 'murattal',
			// 		'type_title' => T_('murattal'),
			// 		'play_type'  => 'aya',
			// 		'visible'    => true,
			// 		'audio_type' => 'mp3',
			// 		'addr'       => $master_path. 'audio/alafasy/ayat/mp3/',
			// 		'qari_slug'  => 'afasy',
			// 		'short_name' => T_('afasy'),
			// 		'image'      => $qari_image. 'mashari.png',
			// 		'qari'       => T_('Mishary Rashid Alafasy'),
			// 	],
			// 8  =>
			// 	[
			// 		'type'       => 'murattal',
			// 		'type_title' => T_('murattal'),
			// 		'play_type'  => 'aya',
			// 		'visible'    => false,
			// 		'audio_type' => 'ogg',
			// 		'addr'       => $master_path. 'audio/alafasy/ayat/ogg/',
			// 		'qari_slug'  => 'afasy',
			// 		'short_name' => T_('afasy'),
			// 		'image'      => $qari_image. 'mashari.png',
			// 		'qari'       => T_('Mishary Rashid Alafasy'),
			// 	],
			// 9  =>
			// 	[
			// 		'type'       => 'murattal',
			// 		'type_title' => T_('murattal'),
			// 		'play_type'  => 'aya',
			// 		'visible'    => false,
			// 		'audio_type' => 'mp3',
			// 		'addr'       => $master_path. 'audio/husary/ayat/Husary_128kbps/',
			// 		'qari_slug'  => 'husary',
			// 		'short_name' => T_('husary'),
			// 		'image'      => $qari_image. 'husary.png',
			// 		'qari'       => T_('Mahmoud Khalil Al-Husary'),
			// 	],
			// 10 =>
			// 	[
			// 		'type'       => 'mujawwad',
			// 		'type_title' => T_('mujawwad'),
			// 		'play_type'  => 'aya',
			// 		'visible'    => false,
			// 		'audio_type' => 'mp3',
			// 		'addr'       => $master_path. 'audio/husary/ayat/Husary_128kbps_Mujawwad/',
			// 		'qari_slug'  => 'husary',
			// 		'short_name' => T_('husary'),
			// 		'image'      => $qari_image. 'husary.png',
			// 		'qari'       => T_('Mahmoud Khalil Al-Husary'),
			// 	],
			// 11 =>
			// 	[
			// 		'type'       => 'murattal',
			// 		'type_title' => T_('murattal'),
			// 		'play_type'  => 'aya',
			// 		'visible'    => false,
			// 		'audio_type' => 'mp3',
			// 		'addr'       => $master_path. 'audio/husary/ayat/Husary_64kbps/',
			// 		'qari_slug'  => 'husary',
			// 		'short_name' => T_('husary'),
			// 		'image'      => $qari_image. 'husary.png',
			// 		'qari'       => T_('Mahmoud Khalil Al-Husary'),
			// 	],
			// 12 =>
			// 	[
			// 		'type'       => 'muallim',
			// 		'type_title' => T_('muallim'),
			// 		'play_type'  => 'aya',
			// 		'visible'    => true,
			// 		'audio_type' => 'mp3',
			// 		'addr'       => $master_path. 'audio/husary/ayat/Husary_Muallim_128kbps/',
			// 		'qari_slug'  => 'husary',
			// 		'short_name' => T_('husary'),
			// 		'image'      => $qari_image. 'husary.png',
			// 		'qari'       => T_('Mahmoud Khalil Al-Husary'),
			// 	],
			// 13 =>
			// 	[
			// 		'type'       => 'mujawwad',
			// 		'type_title' => T_('mujawwad'),
			// 		'play_type'  => 'aya',
			// 		'visible'    => true,
			// 		'audio_type' => 'ogg',
			// 		'addr'       => $master_path. 'audio/husary/ayat/mujawwad/ogg/',
			// 		'qari_slug'  => 'husary',
			// 		'short_name' => T_('husary'),
			// 		'image'      => $qari_image. 'husary.png',
			// 		'qari'       => T_('Mahmoud Khalil Al-Husary'),
			// 	],
			// 14 =>
			// 	[
			// 		'type'       => 'murattal',
			// 		'type_title' => T_('murattal'),
			// 		'play_type'  => 'aya',
			// 		'visible'    => true,
			// 		'audio_type' => 'ogg',
			// 		'addr'       => $master_path. 'audio/husary/ayat/murattal/ogg/',
			// 		'qari_slug'  => 'husary',
			// 		'short_name' => T_('husary'),
			// 		'image'      => $qari_image. 'husary.png',
			// 		'qari'       => T_('Mahmoud Khalil Al-Husary'),
			// 	],
			// 15 =>
			// 	[
			// 		'type'       => 'murattal',
			// 		'type_title' => T_('murattal'),
			// 		'play_type'  => 'aya',
			// 		'visible'    => false,
			// 		'audio_type' => 'mp3',
			// 		'addr'       => $master_path. 'audio/minshawi/ayat/Minshawy_Murattal_128kbps/',
			// 		'qari_slug'  => 'minshawi',
			// 		'short_name' => T_('minshawi'),
			// 		'image'      => $qari_image. 'menshawi.png',
			// 		'qari'       => T_('Mohamed Siddiq al-Minshawi'),
			// 	],
			// 16 =>
			// 	[
			// 		'type'       => 'mujawwad',
			// 		'type_title' => T_('mujawwad'),
			// 		'play_type'  => 'aya',
			// 		'visible'    => false,
			// 		'audio_type' => 'mp3',
			// 		'addr'       => $master_path. 'audio/minshawi/ayat/mujawwad/mp3-192kbps/',
			// 		'qari_slug'  => 'minshawi',
			// 		'short_name' => T_('minshawi'),
			// 		'image'      => $qari_image. 'menshawi.png',
			// 		'qari'       => T_('Mohamed Siddiq al-Minshawi'),
			// 	],
			// 17 =>
			// 	[
			// 		'type'       => 'mujawwad',
			// 		'type_title' => T_('mujawwad'),
			// 		'play_type'  => 'aya',
			// 		'visible'    => true,
			// 		'audio_type' => 'ogg',
			// 		'addr'       => $master_path. 'audio/minshawi/ayat/mujawwad/ogg/',
			// 		'qari_slug'  => 'minshawi',
			// 		'short_name' => T_('minshawi'),
			// 		'image'      => $qari_image. 'menshawi.png',
			// 		'qari'       => T_('Mohamed Siddiq al-Minshawi'),
			// 	],
			// 18 =>
			// 	[
			// 		'type'       => 'murattal',
			// 		'type_title' => T_('murattal'),
			// 		'play_type'  => 'aya',
			// 		'visible'    => true,
			// 		'audio_type' => 'mp3',
			// 		'addr'       => $master_path. 'audio/minshawi/ayat/murattal/mp3/',
			// 		'qari_slug'  => 'minshawi',
			// 		'short_name' => T_('minshawi'),
			// 		'image'      => $qari_image. 'menshawi.png',
			// 		'qari'       => T_('Mohamed Siddiq al-Minshawi'),
			// 	],
			// 19 =>
			// 	[
			// 		'type'       => 'murattal',
			// 		'type_title' => T_('murattal'),
			// 		'play_type'  => 'aya',
			// 		'visible'    => false,
			// 		'audio_type' => 'ogg',
			// 		'addr'       => $master_path. 'audio/minshawi/ayat/murattal/ogg/',
			// 		'qari_slug'  => 'minshawi',
			// 		'short_name' => T_('minshawi'),
			// 		'image'      => $qari_image. 'menshawi.png',
			// 		'qari'       => T_('Mohamed Siddiq al-Minshawi'),
			// 	],
			// 20 =>
			// 	[
			// 		'type'       => 'murattal',
			// 		'type_title' => T_('murattal'),
			// 		'play_type'  => 'aya',
			// 		'visible'    => false,
			// 		'audio_type' => 'mp3',
			// 		'addr'       => $master_path. 'audio/rifai/ayat/Hani_Rifai_192kbps/',
			// 		'qari_slug'  => 'rifai',
			// 		'short_name' => T_('rifai'),
			// 		'image'      => $qari_image. 'rifai.png',
			// 		'qari'       => T_('Hani ar-Rifai'),
			// 	],
			// 21 =>
			// 	[
			// 		'type'       => 'murattal',
			// 		'type_title' => T_('murattal'),
			// 		'play_type'  => 'aya',
			// 		'visible'    => true,
			// 		'audio_type' => 'mp3',
			// 		'addr'       => $master_path. 'audio/rifai/ayat/murattal/mp3/',
			// 		'qari_slug'  => 'rifai',
			// 		'short_name' => T_('rifai'),
			// 		'image'      => $qari_image. 'rifai.png',
			// 		'qari'       => T_('Hani ar-Rifai'),
			// 	],
			// 22 =>
			// 	[
			// 		'type'       => 'murattal',
			// 		'type_title' => T_('murattal'),
			// 		'play_type'  => 'aya',
			// 		'visible'    => false,
			// 		'audio_type' => 'ogg',
			// 		'addr'       => $master_path. 'audio/rifai/ayat/murattal/ogg/',
			// 		'qari_slug'  => 'rifai',
			// 		'short_name' => T_('rifai'),
			// 		'image'      => $qari_image. 'rifai.png',
			// 		'qari'       => T_('Hani ar-Rifai'),
			// 	],
			// 23 =>
			// 	[
			// 		'type'       => 'murattal',
			// 		'type_title' => T_('murattal'),
			// 		'play_type'  => 'aya',
			// 		'visible'    => false,
			// 		'audio_type' => 'mp3',
			// 		'addr'       => $master_path. 'audio/shatri/ayat/Abu_Bakr_Ash-Shaatree_128kbps/',
			// 		'qari_slug'  => 'shatri',
			// 		'short_name' => T_('shatri'),
			// 		'image'      => $qari_image. 'shateri.png',
			// 		'qari'       => T_('Abu Bakr al-Shatri'),
			// 	],
			// 24 =>
			// 	[
			// 		'type'       => 'murattal',
			// 		'type_title' => T_('murattal'),
			// 		'play_type'  => 'aya',
			// 		'visible'    => true,
			// 		'audio_type' => 'mp3',
			// 		'addr'       => $master_path. 'audio/shatri/ayat/murattal/mp3/',
			// 		'qari_slug'  => 'shatri',
			// 		'short_name' => T_('shatri'),
			// 		'image'      => $qari_image. 'shateri.png',
			// 		'qari'       => T_('Abu Bakr al-Shatri'),
			// 	],
			// 25 =>
			// 	[
			// 		'type'       => 'murattal',
			// 		'type_title' => T_('murattal'),
			// 		'play_type'  => 'aya',
			// 		'visible'    => false,
			// 		'audio_type' => 'ogg',
			// 		'addr'       => $master_path. 'audio/shatri/ayat/murattal/ogg/',
			// 		'qari_slug'  => 'shatri',
			// 		'short_name' => T_('shatri'),
			// 		'image'      => $qari_image. 'shateri.png',
			// 		'qari'       => T_('Abu Bakr al-Shatri'),
			// 	],
			// 26 =>
			// 	[
			// 		'type'       => 'murattal',
			// 		'type_title' => T_('murattal'),
			// 		'play_type'  => 'aya',
			// 		'visible'    => false,
			// 		'audio_type' => 'mp3',
			// 		'addr'       => $master_path. 'audio/shuraym/Saood_ash-Shuraym_128kbps/',
			// 		'qari_slug'  => 'shuraym',
			// 		'short_name' => T_('shuraym'),
			// 		'image'      => $qari_image. 'sharim.png',
			// 		'qari'       => T_('Sa`ud ash-Shuraym'),
			// 	],
			// 27 =>
			// 	[
			// 		'type'       => 'murattal',
			// 		'type_title' => T_('murattal'),
			// 		'play_type'  => 'aya',
			// 		'visible'    => true,
			// 		'audio_type' => 'mp3',
			// 		'addr'       => $master_path. 'audio/shuraym/mp3/',
			// 		'qari_slug'  => 'shuraym',
			// 		'short_name' => T_('shuraym'),
			// 		'image'      => $qari_image. 'sharim.png',
			// 		'qari'       => T_('Sa`ud ash-Shuraym'),
			// 	],
			// 28 =>
			// 	[
			// 		'type'       => 'murattal',
			// 		'type_title' => T_('murattal'),
			// 		'play_type'  => 'aya',
			// 		'visible'    => false,
			// 		'audio_type' => 'ogg',
			// 		'addr'       => $master_path. 'audio/shuraym/ogg/',
			// 		'qari_slug'  => 'shuraym',
			// 		'short_name' => T_('shuraym'),
			// 		'image'      => $qari_image. 'sharim.png',
			// 		'qari'       => T_('Sa`ud ash-Shuraym'),
			// 	],
			// 29 =>
			// 	[
			// 		'type'       => 'murattal',
			// 		'type_title' => T_('murattal'),
			// 		'play_type'  => 'aya',
			// 		'visible'    => false,
			// 		'audio_type' => 'mp3',
			// 		'addr'       => $master_path. 'audio/sudais/ayat/Abdurrahmaan_As-Sudais_192kbps/',
			// 		'qari_slug'  => 'sudais',
			// 		'short_name' => T_('sudais'),
			// 		'image'      => $qari_image. 'sudais.png',
			// 		'qari'       => T_('Abdur-Rahman as-Sudais'),
			// 	],
			// 30 =>
			// 	[
			// 		'type'       => 'murattal',
			// 		'type_title' => T_('murattal'),
			// 		'play_type'  => 'aya',
			// 		'visible'    => true,
			// 		'audio_type' => 'mp3',
			// 		'addr'       => $master_path. 'audio/sudais/ayat/murattal/mp3/',
			// 		'qari_slug'  => 'sudais',
			// 		'short_name' => T_('sudais'),
			// 		'image'      => $qari_image. 'sudais.png',
			// 		'qari'       => T_('Abdur-Rahman as-Sudais'),
			// 	],
			// 31 =>
			// 	[
			// 		'type'       => 'murattal',
			// 		'type_title' => T_('murattal'),
			// 		'play_type'  => 'aya',
			// 		'visible'    => false,
			// 		'audio_type' => 'ogg',
			// 		'addr'       => $master_path. 'audio/sudais/ayat/murattal/ogg/',
			// 		'qari_slug'  => 'sudais',
			// 		'short_name' => T_('sudais'),
			// 		'image'      => $qari_image. 'sudais.png',
			// 		'qari'       => T_('Abdur-Rahman as-Sudais'),
			// 	],
			// 32 =>
			// 	[
			// 		'type'       => 'murattal',
			// 		'type_title' => T_('murattal'),
			// 		'play_type'  => 'aya',
			// 		'visible'    => false,
			// 		'audio_type' => 'mp3',
			// 		'addr'       => $master_path. 'audio/sudais/ayat/murattal/mp3/',
			// 		'qari_slug'  => 'sudais',
			// 		'short_name' => T_('sudais'),
			// 		'image'      => $qari_image. 'sudais.png',
			// 		'qari'       => T_('Abdur-Rahman as-Sudais'),
			// 	],
			// 33 =>
			// 	[
			// 		'type'       => 'murattal',
			// 		'type_title' => T_('murattal'),
			// 		'play_type'  => 'aya',
			// 		'visible'    => false,
			// 		'audio_type' => 'ogg',
			// 		'addr'       => $master_path. 'audio/sudais/ayat/murattal/ogg/',
			// 		'qari_slug'  => 'sudais',
			// 		'short_name' => T_('sudais'),
			// 		'image'      => $qari_image. 'sudais.png',
			// 		'qari'       => T_('Abdur-Rahman as-Sudais'),
			// 	],
			// 500 =>
			// 	[
			// 		'addr'       => $master_path. 'audio/translation-az-balayev/',
			// 		'type'       => 'translate',
			// 		'type_title' => T_("Translate"),
			// 		'play_type'  => 'aya',
			// 		'visible'    => true,
			// 		'audio_type' => 'mp3',
			// 		'qari_slug'  => 'balayev',
			// 		'short_name' => T_("Balayev"),
			// 		'qari'       => T_("Balayev"),
			// 	],
			// 501 =>
			// 	[
			// 		'addr'       => $master_path. 'audio/translation-en-sahih-IbrahimWalk/',
			// 		'type'       => 'translate',
			// 		'type_title' => T_("Translate"),
			// 		'play_type'  => 'aya',
			// 		'visible'    => true,
			// 		'audio_type' => 'mp3',
			// 		'qari_slug'  => null,
			// 		'short_name' => null,
			// 		'qari'       => null,
			// 	],
			// 502 =>
			// 	[
			// 		'addr'       => $master_path. 'audio/translation-fa-foladvand/',
			// 		'type'       => 'translate',
			// 		'type_title' => T_("Translate"),
			// 		'play_type'  => 'aya',
			// 		'visible'    => true,
			// 		'audio_type' => 'mp3',
			// 		'qari_slug'  => null,
			// 		'short_name' => null,
			// 		'qari'       => null,
			// 	],
			// 503 =>
			// 	[
			// 		'addr'       => $master_path. 'audio/translation-fa-kabiri/',
			// 		'type'       => 'translate',
			// 		'type_title' => T_("Translate"),
			// 		'play_type'  => 'aya',
			// 		'visible'    => true,
			// 		'audio_type' => 'mp3',
			// 		'qari_slug'  => null,
			// 		'short_name' => null,
			// 		'qari'       => null,
			// 	],
			// 504 =>
			// 	[
			// 		'addr'       => $master_path. 'audio/translation-fa-kabiri1/',
			// 		'type'       => 'translate',
			// 		'type_title' => T_("Translate"),
			// 		'play_type'  => 'aya',
			// 		'visible'    => true,
			// 		'audio_type' => 'mp3',
			// 		'qari_slug'  => null,
			// 		'short_name' => null,
			// 		'qari'       => null,
			// 	],
			// 505 =>
			// 	[
			// 		'addr'       => $master_path. 'audio/translation-fa-qaraati/',
			// 		'type'       => 'translate',
			// 		'type_title' => T_("Translate"),
			// 		'play_type'  => 'aya',
			// 		'visible'    => true,
			// 		'audio_type' => 'mp3',
			// 		'qari_slug'  => null,
			// 		'short_name' => null,
			// 		'qari'       => null,
			// 	],
		];

		return $list;
	}

	private static function ready($_data)
	{
		$get                 = \dash\request::get();
		$get['qari']         = $_data['index'];
		$_data['url']        = \dash\url::that(). '?'. http_build_query($get);
		$_data['addr']       = self::master_path(). $_data['addr'];
		$_data['image']      = self::qari_image($_data['slug']);
		$_data['short_name'] = T_($_data['slug']);
		return $_data;
	}

	public static function site_list()
	{
		$list      = self::list();
		$site_list = array_map(['self', 'ready'], $list);

		return $site_list;
	}

	public static function load($_id)
	{
		if(!$_id || !ctype_digit($_id))
		{
			$_id = 1;
		}

		$list    = self::list();

		$default = null;
		$load    = null;

		foreach ($list as $key => $value)
		{
			if(intval($value['index']) === intval($_id))
			{
				$load = $value;
			}

			if(isset($value['default']) && $value['default'])
			{
				$default = $value;
			}
		}

		if(!$load)
		{
			$load = $default;
		}

		$load = self::ready($load);

		return $load;
	}


	public static function get_aya_url($_gari, $_sura, $_aya)
	{

		$_sura = intval($_sura);
		$_aya  = intval($_aya);

		if($_sura < 10)
		{
			$_sura = '00'. $_sura;
		}
		elseif($_sura < 100)
		{
			$_sura = '0'. $_sura;
		}

		if($_aya < 10)
		{
			$_aya = '00'. $_aya;
		}
		elseif($_aya < 100)
		{
			$_aya = '0'. $_aya;
		}

		$load = self::load($_gari);
		if(isset($load['addr']))
		{
			$addr = $load['addr'];
			$url = $addr. $_sura. $_aya. '.mp3';
			return $url;
		}
		else
		{
			return false;
		}
	}
}
?>