<?php

define('SITE', [
    'name'   => 'kabum test',
    'desc'   => 'Esse projeto teste para kabum',
    'domain' => 'localhost.com',
    'locate' => 'pt_BR',
    'root'   => 'http://localhost:3333/login-php'
]);

if ($_SERVER['SERVER_NAME'] == 'localhost') {
    require __DIR__ . '/Minify.php';
}

define('ELOQUENT_ORM_CONFIG', [
    'driver'    => 'mysql',
    'host'      => '127.0.0.1',
    'database'  => 'kabum_test',
    'username'  => 'root',
    'password'  => 'root',
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
]);

define('SOCIAL', [
    'facebook_page'   => '',
    'facebook_author' => '',
    'facebook_appId'  => '',
    'twitter_creator' => '',
    'twitter_site'    => ''
]);

define('MAIL', [
    'host'       => 'smtp.mailtrap.io',
    'port'       => '2525',
    'user'       => '5c0600df851571',
    'passwd'     => 'bc730ac2572eeb',
    'from_name'  => 'Lucas E. Castro',
    'from_email' => 'Login@teste.com',
]);
