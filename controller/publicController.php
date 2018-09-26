<?php

namespace Controller;

use Models\nosModels AS DT;

class publicController{

        public static function welcomeAction($twig){
            $datas = DT::accueilDatas();
            echo $twig->render("accueil.html.twig", ["recup"=>$datas]);
        }

        public static function contactAction($twig){
            if(!empty($_post)){
                $bool = DT::envoieMail($_POST);
                if($bool){
                    header ("Location: ./");
            }else{
                    header ("Location: ./?content=contact&erreur=true");
                }

            }
            $datas = DT::formDatas();
            echo $twig->render("form.html.twig", ["recup"=>$datas]);

    }
}