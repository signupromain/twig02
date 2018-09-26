<?php

namespace Controller;

use Models\nosModels AS DT;

class publicController{

        public static function welcomeAction($twig){
            $datas = DT::accueilDatas();
            echo $twig->render("accueil.html.twig", ["recup"=>$datas]);
        }

        public static function contactAction($twig){
$datas = DT::formDatas();
            echo $twig->render("form.html.twig", ["recup"=>$datas]);
        }
}