<?php

/*
CSS
*/
$minCSS = new \MatthiasMullie\Minify\CSS();
$minCSS->add(dirname(__DIR__, 1) . '/views/assets/css/style.css');
$minCSS->add(dirname(__DIR__, 1) . '/views/assets/css/form.css');
$minCSS->add(dirname(__DIR__, 1) . '/views/assets/css/button.css');
$minCSS->add(dirname(__DIR__, 1) . '/views/assets/css/message.css');
$minCSS->add(dirname(__DIR__, 1) . '/views/assets/css/load.css');
$minCSS->minify(dirname(__DIR__, 1) . '/views/assets/style.min.css');

/*
js
*/
$minJS = new \MatthiasMullie\Minify\JS();
$minCSS->add(dirname(__DIR__, 1) . '/views/assets/js/jquery.js');
$minCSS->add(dirname(__DIR__, 1) . '/views/assets/js/jquery-ui.js');
$minCSS->minify(dirname(__DIR__, 1) . '/views/assets/scripts.min.js');
