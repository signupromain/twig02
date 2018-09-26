<?php
/**
 * Front controller
 */

require_once "./vendor/autoload.php";

require_once "controller/publicController.php";

require_once "models/nosModels.php";

use Controller\publicController AS PC;

$loader = new Twig_Loader_Filesystem('./views');

$twig = new Twig_Environment($loader, array(
//'cache'=>'cache',

));
if(!isset($_GET['content'])){
    PC:: welcomeAction($twig);
}else{
    switch ($_GET['content']){
        case "contact":
            break;
        case "map":

            break;

        default:
            PC:: welcomeAction($twig);
    }
}
PC::welcomeAction($twig);