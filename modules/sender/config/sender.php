<?php defined('SYSPATH') or die('No direct script access.');

return array(
		'driver' => 'smtp',
		'options' => array(
			'hostname'=>'smtp.gmail.com',
			'username'=>'user',
			'password'=>'pass',
			'port'=>'465',
            'encryption' => 'ssl',
		),
);
