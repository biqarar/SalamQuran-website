<?php
namespace lib\app;


class qari
{
	public static function list()
	{
		$master_path = 'https://dl.salamquran.com/';
		$qari_image  = \dash\url::site(). '/static/images/qariyan/';

		$list               =
		[
			100  =>
				[
					'type'       => 'murattal',
					'type_title' => T_('murattal'),
					'play_type'  => 'aya',
					'visible'    => true,
					'audio_type' => 'mp3',
					'addr'       => $master_path. 'audio/abdulbaset/ayat/murattal/mp3/',
					'qari_slug'  => 'abdulbaset',
					'image'      => $qari_image. 'basit.png',
					'qari'       => T_('AbdulBaset AbdulSamad'),
				],
			2  =>
				[
					'type'       => 'murattal',
					'type_title' => T_('murattal'),
					'play_type'  => 'aya',
					'visible'    => false,
					'audio_type' => 'mp3',
					'addr'       => $master_path. 'audio/abdulbaset/ayat/Abdul_Basit_Murattal_192kbps/',
					'qari_slug'  => 'abdulbaset',
					'image'      => $qari_image. 'basit.png',
					'qari'       => T_('AbdulBaset AbdulSamad'),
				],
			3  =>
				[
					'type'       => 'murattal',
					'type_title' => T_('murattal'),
					'play_type'  => 'aya',
					'visible'    => false,
					'audio_type' => 'mp3',
					'addr'       => $master_path. 'audio/abdulbaset/ayat/Abdul_Basit_Murattal_64kbps/',
					'qari_slug'  => 'abdulbaset',
					'image'      => $qari_image. 'basit.png',
					'qari'       => T_('AbdulBaset AbdulSamad'),
				],
			4  =>
				[
					'type'       => 'mujawwad',
					'type_title' => T_('mujawwad'),
					'play_type'  => 'aya',
					'visible'    => true,
					'audio_type' => 'mp3',
					'addr'       => $master_path. 'audio/abdulbaset/ayat/mujawwad/mp3/',
					'qari_slug'  => 'abdulbaset',
					'image'      => $qari_image. 'basit.png',
					'qari'       => T_('AbdulBaset AbdulSamad'),
				],
			5  =>
				[
					'type'       => 'mujawwad',
					'type_title' => T_('mujawwad'),
					'play_type'  => 'aya',
					'visible'    => false,
					'audio_type' => 'mp3',
					'addr'       => $master_path. 'audio/abdulbaset/ayat/Abdul_Basit_Mujawwad_128kbps/',
					'qari_slug'  => 'abdulbaset',
					'image'      => $qari_image. 'basit.png',
					'qari'       => T_('AbdulBaset AbdulSamad'),
				],
			6  =>
				[
					'type'       => 'murattal',
					'type_title' => T_('murattal'),
					'play_type'  => 'aya',
					'visible'    => false,
					'audio_type' => 'mp3',
					'addr'       => $master_path. 'audio/alafasy/ayat/Alafasy_128kbps/',
					'qari_slug'  => 'afasy',
					'image'      => $qari_image. 'mashari.png',
					'qari'       => T_('Mishary Rashid Alafasy'),
				],
			1  =>
				[
					'type'       => 'murattal',
					'type_title' => T_('murattal'),
					'play_type'  => 'aya',
					'visible'    => true,
					'audio_type' => 'mp3',
					'addr'       => $master_path. 'audio/alafasy/ayat/mp3/',
					'qari_slug'  => 'afasy',
					'image'      => $qari_image. 'mashari.png',
					'qari'       => T_('Mishary Rashid Alafasy'),
				],
			8  =>
				[
					'type'       => 'murattal',
					'type_title' => T_('murattal'),
					'play_type'  => 'aya',
					'visible'    => false,
					'audio_type' => 'ogg',
					'addr'       => $master_path. 'audio/alafasy/ayat/ogg/',
					'qari_slug'  => 'afasy',
					'image'      => $qari_image. 'mashari.png',
					'qari'       => T_('Mishary Rashid Alafasy'),
				],
			9  =>
				[
					'type'       => 'murattal',
					'type_title' => T_('murattal'),
					'play_type'  => 'aya',
					'visible'    => false,
					'audio_type' => 'mp3',
					'addr'       => $master_path. 'audio/husary/ayat/Husary_128kbps/',
					'qari_slug'  => 'husary',
					'image'      => $qari_image. 'husary.png',
					'qari'       => T_('Mahmoud Khalil Al-Husary'),
				],
			10 =>
				[
					'type'       => 'mujawwad',
					'type_title' => T_('mujawwad'),
					'play_type'  => 'aya',
					'visible'    => false,
					'audio_type' => 'mp3',
					'addr'       => $master_path. 'audio/husary/ayat/Husary_128kbps_Mujawwad/',
					'qari_slug'  => 'husary',
					'image'      => $qari_image. 'husary.png',
					'qari'       => T_('Mahmoud Khalil Al-Husary'),
				],
			11 =>
				[
					'type'       => 'murattal',
					'type_title' => T_('murattal'),
					'play_type'  => 'aya',
					'visible'    => false,
					'audio_type' => 'mp3',
					'addr'       => $master_path. 'audio/husary/ayat/Husary_64kbps/',
					'qari_slug'  => 'husary',
					'image'      => $qari_image. 'husary.png',
					'qari'       => T_('Mahmoud Khalil Al-Husary'),
				],
			12 =>
				[
					'type'       => 'muallim',
					'type_title' => T_('muallim'),
					'play_type'  => 'aya',
					'visible'    => true,
					'audio_type' => 'mp3',
					'addr'       => $master_path. 'audio/husary/ayat/Husary_Muallim_128kbps/',
					'qari_slug'  => 'husary',
					'image'      => $qari_image. 'husary.png',
					'qari'       => T_('Mahmoud Khalil Al-Husary'),
				],
			13 =>
				[
					'type'       => 'mujawwad',
					'type_title' => T_('mujawwad'),
					'play_type'  => 'aya',
					'visible'    => true,
					'audio_type' => 'ogg',
					'addr'       => $master_path. 'audio/husary/ayat/mujawwad/ogg/',
					'qari_slug'  => 'husary',
					'image'      => $qari_image. 'husary.png',
					'qari'       => T_('Mahmoud Khalil Al-Husary'),
				],
			14 =>
				[
					'type'       => 'murattal',
					'type_title' => T_('murattal'),
					'play_type'  => 'aya',
					'visible'    => true,
					'audio_type' => 'ogg',
					'addr'       => $master_path. 'audio/husary/ayat/murattal/ogg/',
					'qari_slug'  => 'husary',
					'image'      => $qari_image. 'husary.png',
					'qari'       => T_('Mahmoud Khalil Al-Husary'),
				],
			15 =>
				[
					'type'       => 'murattal',
					'type_title' => T_('murattal'),
					'play_type'  => 'aya',
					'visible'    => false,
					'audio_type' => 'mp3',
					'addr'       => $master_path. 'audio/minshawi/ayat/Minshawy_Murattal_128kbps/',
					'qari_slug'  => 'minshawi',
					'image'      => $qari_image. 'menshawi.png',
					'qari'       => T_('Mohamed Siddiq al-Minshawi'),
				],
			16 =>
				[
					'type'       => 'mujawwad',
					'type_title' => T_('mujawwad'),
					'play_type'  => 'aya',
					'visible'    => false,
					'audio_type' => 'mp3',
					'addr'       => $master_path. 'audio/minshawi/ayat/mujawwad/mp3-192kbps/',
					'qari_slug'  => 'minshawi',
					'image'      => $qari_image. 'menshawi.png',
					'qari'       => T_('Mohamed Siddiq al-Minshawi'),
				],
			17 =>
				[
					'type'       => 'mujawwad',
					'type_title' => T_('mujawwad'),
					'play_type'  => 'aya',
					'visible'    => true,
					'audio_type' => 'ogg',
					'addr'       => $master_path. 'audio/minshawi/ayat/mujawwad/ogg/',
					'qari_slug'  => 'minshawi',
					'image'      => $qari_image. 'menshawi.png',
					'qari'       => T_('Mohamed Siddiq al-Minshawi'),
				],
			18 =>
				[
					'type'       => 'murattal',
					'type_title' => T_('murattal'),
					'play_type'  => 'aya',
					'visible'    => true,
					'audio_type' => 'mp3',
					'addr'       => $master_path. 'audio/minshawi/ayat/murattal/mp3/',
					'qari_slug'  => 'minshawi',
					'image'      => $qari_image. 'menshawi.png',
					'qari'       => T_('Mohamed Siddiq al-Minshawi'),
				],
			19 =>
				[
					'type'       => 'murattal',
					'type_title' => T_('murattal'),
					'play_type'  => 'aya',
					'visible'    => false,
					'audio_type' => 'ogg',
					'addr'       => $master_path. 'audio/minshawi/ayat/murattal/ogg/',
					'qari_slug'  => 'minshawi',
					'image'      => $qari_image. 'menshawi.png',
					'qari'       => T_('Mohamed Siddiq al-Minshawi'),
				],
			20 =>
				[
					'type'       => 'murattal',
					'type_title' => T_('murattal'),
					'play_type'  => 'aya',
					'visible'    => false,
					'audio_type' => 'mp3',
					'addr'       => $master_path. 'audio/rifai/ayat/Hani_Rifai_192kbps/',
					'qari_slug'  => 'rifai',
					'image'      => $qari_image. 'rifai.png',
					'qari'       => T_('Hani ar-Rifai'),
				],
			21 =>
				[
					'type'       => 'murattal',
					'type_title' => T_('murattal'),
					'play_type'  => 'aya',
					'visible'    => true,
					'audio_type' => 'mp3',
					'addr'       => $master_path. 'audio/rifai/ayat/murattal/mp3/',
					'qari_slug'  => 'rifai',
					'image'      => $qari_image. 'rifai.png',
					'qari'       => T_('Hani ar-Rifai'),
				],
			22 =>
				[
					'type'       => 'murattal',
					'type_title' => T_('murattal'),
					'play_type'  => 'aya',
					'visible'    => false,
					'audio_type' => 'ogg',
					'addr'       => $master_path. 'audio/rifai/ayat/murattal/ogg/',
					'qari_slug'  => 'rifai',
					'image'      => $qari_image. 'rifai.png',
					'qari'       => T_('Hani ar-Rifai'),
				],
			23 =>
				[
					'type'       => 'murattal',
					'type_title' => T_('murattal'),
					'play_type'  => 'aya',
					'visible'    => false,
					'audio_type' => 'mp3',
					'addr'       => $master_path. 'audio/shatri/ayat/Abu_Bakr_Ash-Shaatree_128kbps/',
					'qari_slug'  => 'shatri',
					'image'      => $qari_image. 'shateri.png',
					'qari'       => T_('Abu Bakr al-Shatri'),
				],
			24 =>
				[
					'type'       => 'murattal',
					'type_title' => T_('murattal'),
					'play_type'  => 'aya',
					'visible'    => true,
					'audio_type' => 'mp3',
					'addr'       => $master_path. 'audio/shatri/ayat/murattal/mp3/',
					'qari_slug'  => 'shatri',
					'image'      => $qari_image. 'shateri.png',
					'qari'       => T_('Abu Bakr al-Shatri'),
				],
			25 =>
				[
					'type'       => 'murattal',
					'type_title' => T_('murattal'),
					'play_type'  => 'aya',
					'visible'    => false,
					'audio_type' => 'ogg',
					'addr'       => $master_path. 'audio/shatri/ayat/murattal/ogg/',
					'qari_slug'  => 'shatri',
					'image'      => $qari_image. 'shateri.png',
					'qari'       => T_('Abu Bakr al-Shatri'),
				],
			26 =>
				[
					'type'       => 'murattal',
					'type_title' => T_('murattal'),
					'play_type'  => 'aya',
					'visible'    => false,
					'audio_type' => 'mp3',
					'addr'       => $master_path. 'audio/shuraym/Saood_ash-Shuraym_128kbps/',
					'qari_slug'  => 'shuraym',
					'image'      => $qari_image. 'sharim.png',
					'qari'       => T_('Sa`ud ash-Shuraym'),
				],
			27 =>
				[
					'type'       => 'murattal',
					'type_title' => T_('murattal'),
					'play_type'  => 'aya',
					'visible'    => true,
					'audio_type' => 'mp3',
					'addr'       => $master_path. 'audio/shuraym/mp3/',
					'qari_slug'  => 'shuraym',
					'image'      => $qari_image. 'sharim.png',
					'qari'       => T_('Sa`ud ash-Shuraym'),
				],
			28 =>
				[
					'type'       => 'murattal',
					'type_title' => T_('murattal'),
					'play_type'  => 'aya',
					'visible'    => false,
					'audio_type' => 'ogg',
					'addr'       => $master_path. 'audio/shuraym/ogg/',
					'qari_slug'  => 'shuraym',
					'image'      => $qari_image. 'sharim.png',
					'qari'       => T_('Sa`ud ash-Shuraym'),
				],
			29 =>
				[
					'type'       => 'murattal',
					'type_title' => T_('murattal'),
					'play_type'  => 'aya',
					'visible'    => false,
					'audio_type' => 'mp3',
					'addr'       => $master_path. 'audio/sudais/ayat/Abdurrahmaan_As-Sudais_192kbps/',
					'qari_slug'  => 'sudais',
					'image'      => $qari_image. 'sudais.png',
					'qari'       => T_('Abdur-Rahman as-Sudais'),
				],
			30 =>
				[
					'type'       => 'murattal',
					'type_title' => T_('murattal'),
					'play_type'  => 'aya',
					'visible'    => true,
					'audio_type' => 'mp3',
					'addr'       => $master_path. 'audio/sudais/ayat/murattal/mp3/',
					'qari_slug'  => 'sudais',
					'image'      => $qari_image. 'sudais.png',
					'qari'       => T_('Abdur-Rahman as-Sudais'),
				],
			31 =>
				[
					'type'       => 'murattal',
					'type_title' => T_('murattal'),
					'play_type'  => 'aya',
					'visible'    => false,
					'audio_type' => 'ogg',
					'addr'       => $master_path. 'audio/sudais/ayat/murattal/ogg/',
					'qari_slug'  => 'sudais',
					'image'      => $qari_image. 'sudais.png',
					'qari'       => T_('Abdur-Rahman as-Sudais'),
				],
			32 =>
				[
					'type'       => 'murattal',
					'type_title' => T_('murattal'),
					'play_type'  => 'aya',
					'visible'    => false,
					'audio_type' => 'mp3',
					'addr'       => $master_path. 'audio/sudais/ayat/murattal/mp3/',
					'qari_slug'  => 'sudais',
					'image'      => $qari_image. 'sudais.png',
					'qari'       => T_('Abdur-Rahman as-Sudais'),
				],
			33 =>
				[
					'type'       => 'murattal',
					'type_title' => T_('murattal'),
					'play_type'  => 'aya',
					'visible'    => false,
					'audio_type' => 'ogg',
					'addr'       => $master_path. 'audio/sudais/ayat/murattal/ogg/',
					'qari_slug'  => 'sudais',
					'image'      => $qari_image. 'sudais.png',
					'qari'       => T_('Abdur-Rahman as-Sudais'),
				],
		];

		return $list;
	}


	public static function site_list()
	{
		$list      = self::list();
		$site_list = [];
		$get       = \dash\request::get();

		foreach ($list as $key => $value)
		{
			if(isset($value['visible']) && $value['visible'])
			{
				$get['qari']     = $key;
				$value['url']    = \dash\url::that(). '?'. http_build_query($get);
				$site_list[$key] = $value;
			}
		}

		return $site_list;
	}

	public static function load($_id)
	{
		if(!$_id || !ctype_digit($_id))
		{
			$_id = 1;
		}

		$list = self::list();
		if(!isset($list[$_id]))
		{
			return $list[1];
		}

		return $list[$_id];
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
			$url = $addr. $_sura. $_aya. '.'. $load['audio_type'];
			return $url;
		}
		else
		{
			return false;
		}
	}
}
?>