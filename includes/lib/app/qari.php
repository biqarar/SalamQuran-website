<?php
namespace lib\app;


class qari
{
	public static function list()
	{
		$master_path        = 'https://dl.salamquran.com/';

		$list               =
		[
			1  => 	['type' => 'murattal', 'play_type' => 'aya', 'audio_type' => 'mp3', 'addr' => $master_path. 'audio/abdulbaset/ayat/murattal/mp3/', 'qari' => '',],
			2  =>	['type' => 'murattal', 'play_type' => 'aya', 'audio_type' => 'mp3', 'addr' => $master_path. 'audio/abdulbaset/ayat/Abdul_Basit_Murattal_192kbps/', 'qari' => '',],
			3  =>	['type' => 'murattal', 'play_type' => 'aya', 'audio_type' => 'mp3', 'addr' => $master_path. 'audio/abdulbaset/ayat/Abdul_Basit_Murattal_64kbps/', 'qari' => '',],
			4  =>	['type' => 'murattal', 'play_type' => 'aya', 'audio_type' => 'mp3', 'addr' => $master_path. 'audio/abdulbaset/ayat/mujawwad/mp3/', 'qari' => '',],
			5  =>	['type' => 'murattal', 'play_type' => 'aya', 'audio_type' => 'mp3', 'addr' => $master_path. 'audio/abdulbaset/ayat/Abdul_Basit_Mujawwad_128kbps/', 'qari' => '',],
			6  =>	['type' => 'murattal', 'play_type' => 'aya', 'audio_type' => 'mp3', 'addr' => $master_path. 'audio/alafasy/ayat/Alafasy_128kbps/', 'qari' => '',],
			7  =>	['type' => 'murattal', 'play_type' => 'aya', 'audio_type' => 'mp3', 'addr' => $master_path. 'audio/alafasy/ayat/mp3/', 'qari' => '',],
			8  =>	['type' => 'murattal', 'play_type' => 'aya', 'audio_type' => 'mp3', 'addr' => $master_path. 'audio/alafasy/ayat/ogg/', 'qari' => '',],
			9  =>	['type' => 'murattal', 'play_type' => 'aya', 'audio_type' => 'mp3', 'addr' => $master_path. 'audio/husary/ayat/Husary_128kbps/', 'qari' => '',],
			10 =>	['type' => 'murattal', 'play_type' => 'aya', 'audio_type' => 'mp3', 'addr' => $master_path. 'audio/husary/ayat/Husary_128kbps_Mujawwad/', 'qari' => '',],
			11 => 	['type' => 'murattal', 'play_type' => 'aya', 'audio_type' => 'mp3', 'addr' => $master_path. 'audio/husary/ayat/Husary_64kbps/', 'qari' => '',],
			12 => 	['type' => 'murattal', 'play_type' => 'aya', 'audio_type' => 'mp3', 'addr' => $master_path. 'audio/husary/ayat/Husary_Muallim_128kbps/', 'qari' => '',],
			13 => 	['type' => 'murattal', 'play_type' => 'aya', 'audio_type' => 'mp3', 'addr' => $master_path. 'audio/husary/ayat/mujawwad/ogg/', 'qari' => '',],
			14 => 	['type' => 'murattal', 'play_type' => 'aya', 'audio_type' => 'mp3', 'addr' => $master_path. 'audio/husary/ayat/murattal/ogg/', 'qari' => '',],
			15 => 	['type' => 'murattal', 'play_type' => 'aya', 'audio_type' => 'mp3', 'addr' => $master_path. 'audio/minshawi/ayat/Minshawy_Murattal_128kbps/', 'qari' => '',],
			16 => 	['type' => 'murattal', 'play_type' => 'aya', 'audio_type' => 'mp3', 'addr' => $master_path. 'audio/minshawi/ayat/mujawwad/mp3-192kbps/', 'qari' => '',],
			17 => 	['type' => 'murattal', 'play_type' => 'aya', 'audio_type' => 'mp3', 'addr' => $master_path. 'audio/minshawi/ayat/mujawwad/ogg/', 'qari' => '',],
			18 => 	['type' => 'murattal', 'play_type' => 'aya', 'audio_type' => 'mp3', 'addr' => $master_path. 'audio/minshawi/ayat/murattal/mp3/', 'qari' => '',],
			19 => 	['type' => 'murattal', 'play_type' => 'aya', 'audio_type' => 'mp3', 'addr' => $master_path. 'audio/minshawi/ayat/murattal/ogg/', 'qari' => '',],
			20 => 	['type' => 'murattal', 'play_type' => 'aya', 'audio_type' => 'mp3', 'addr' => $master_path. 'audio/rifai/ayat/Hani_Rifai_192kbps/', 'qari' => '',],
			21 => 	['type' => 'murattal', 'play_type' => 'aya', 'audio_type' => 'mp3', 'addr' => $master_path. 'audio/rifai/ayat/murattal/mp3/', 'qari' => '',],
			22 => 	['type' => 'murattal', 'play_type' => 'aya', 'audio_type' => 'mp3', 'addr' => $master_path. 'audio/rifai/ayat/murattal/ogg/', 'qari' => '',],
			23 => 	['type' => 'murattal', 'play_type' => 'aya', 'audio_type' => 'mp3', 'addr' => $master_path. 'audio/shatri/ayat/Abu_Bakr_Ash-Shaatree_128kbps/', 'qari' => '',],
			24 => 	['type' => 'murattal', 'play_type' => 'aya', 'audio_type' => 'mp3', 'addr' => $master_path. 'audio/shatri/ayat/murattal/mp3/', 'qari' => '',],
			25 => 	['type' => 'murattal', 'play_type' => 'aya', 'audio_type' => 'mp3', 'addr' => $master_path. 'audio/shatri/ayat/murattal/ogg/', 'qari' => '',],
			26 => 	['type' => 'murattal', 'play_type' => 'aya', 'audio_type' => 'mp3', 'addr' => $master_path. 'audio/shuraym/Saood_ash-Shuraym_128kbps/', 'qari' => '',],
			27 => 	['type' => 'murattal', 'play_type' => 'aya', 'audio_type' => 'mp3', 'addr' => $master_path. 'audio/shuraym/mp3/', 'qari' => '',],
			28 => 	['type' => 'murattal', 'play_type' => 'aya', 'audio_type' => 'mp3', 'addr' => $master_path. 'audio/shuraym/ogg/', 'qari' => '',],
			29 => 	['type' => 'murattal', 'play_type' => 'aya', 'audio_type' => 'mp3', 'addr' => $master_path. 'audio/sudais/ayat/Abdurrahmaan_As-Sudais_192kbps/', 'qari' => '',],
			30 => 	['type' => 'murattal', 'play_type' => 'aya', 'audio_type' => 'mp3', 'addr' => $master_path. 'audio/sudais/ayat/murattal/mp3/', 'qari' => '',],
			31 => 	['type' => 'murattal', 'play_type' => 'aya', 'audio_type' => 'mp3', 'addr' => $master_path. 'audio/sudais/ayat/murattal/ogg/', 'qari' => '',],
			32 => 	['type' => 'murattal', 'play_type' => 'aya', 'audio_type' => 'mp3', 'addr' => $master_path. 'audio/sudais/ayat/murattal/mp3/', 'qari' => '',],
			33 => 	['type' => 'murattal', 'play_type' => 'aya', 'audio_type' => 'mp3', 'addr' => $master_path. 'audio/sudais/ayat/murattal/ogg/', 'qari' => '',],
		];

		return $list;
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
		$url = 'salamquran.com/audio/alafasy/ayat/mp3/'. $_sura.$_aya. '.mp3';
		return $url;
	}
}
?>