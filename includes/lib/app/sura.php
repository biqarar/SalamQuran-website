<?php
namespace lib\app;


class sura
{

	public static function load($_id)
	{
		$load             = \lib\db\quran::get(['sura' => $_id]);
		$result           = [];
		$result['aye']    = $load;
		$result['detail'] = \lib\db\sure::get(['index' => $_id, 'limit' => 1]);
		return $result;
	}
}
?>