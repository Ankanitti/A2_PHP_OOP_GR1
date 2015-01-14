<?php
/**
 * Created by PhpStorm.
 * User: Charles
 * Date: 13/01/2015
 * Time: 13:34
 */

$config = include __DIR__.'/config/config.php';

require __DIR__.'/vendor/autoload.php';

Twig_Autoloader::register();

$loader = new Twig_Loader_Filesystem([
    __DIR__.'/view',
]);


$twig = new Twig_Environment($loader, [
    //'cache' => null,
]);

session_start();