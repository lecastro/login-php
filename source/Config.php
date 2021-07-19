<?php

define('SITE', [
    'name'   => 'kabum test',
    'desc'   => 'Esse projeto teste para kabum',
    'domain' => 'localhost.com',
    'locate' => 'pt_BR',
    'root'   => 'http://localhost/kabum/'
]);

if ($_SERVER['SERVER_NAME'] == 'localhost') {
    require __DIR__ . '/Minify.php';
}

define('DATA_LAYER_CONFIG', [
    'driver'   => 'mysql',
    'host'     => 'localhost',
    'port'     => '3306',
    'dbname'   => 'kabum_test',
    'username' => 'root',
    'passwd'   => '',
    'options'  => [
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
        PDO::ATTR_CASE               => PDO::CASE_NATURAL
    ]
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

define('FACEBOOK_LOGIN', []);

define('GOOGLE.LOGIN', []);
