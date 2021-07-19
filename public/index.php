<?php

error_reporting(E_ALL & ~E_WARNING & ~E_NOTICE);

ob_start();

ini_set('session.save_path', '../tmp');

session_start();

require __DIR__ . '/../vendor/autoload.php';

require __DIR__ . '/../source/Routes.php';

ob_end_flush();
