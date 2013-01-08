<?php defined('SYSPATH') or die('No direct script access.');

return array(
		'driver' => 'smtp',
		'options' => array(
			'hostname'=>'smtp.gmail.com',
			'username'=>'kamilsmtptest@gmail.com',
			'password'=>'123edcxzaqws',
			'port'=>'465',
            'encryption' => 'ssl',
		),
);
