<?php

require_once('social.php');
require_once('payment.php');
require_once('sms.php');


self::$language =
[
	'default' => 'en',
	'list'    => ['fa','en',],
];
/**
 * system default lanuage
 */
self::$config['site']['title']         = "Dash";
self::$config['site']['desc']          = "Free PHP Framework & CMS!";
self::$config['site']['slogan']        = "The simple framework for php programmers ;)";


self::$config['enter']['force_verify'] = false;

self::$config['coming'] = true;

self::$config['api_v6']['appkey']   = [];
self::$config['api_v6']['appkey'][] = null;
?>