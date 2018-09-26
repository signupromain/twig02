<?php
/**
 * Front controller
 */

require_once "./vendor/autoload.php";

$loader = new Twig_Loader_Filesystem('/views');

$loader = new \Twig_Environment($loader, array(
'cache'=>'/cache',
    )

);

require_once "controller/publicController.php";