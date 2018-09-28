<?php
/**
 * Created by PhpStorm.
 * User: webform
 * Date: 26/09/2018
 * Time: 10:42
 */
namespace Models;
class nosModels
{
    public static function accueilDatas()
    {
        // return a table with datas for accueil
        return ['title' => 'Notre page d\'accueil',
            'h1' => "Bienvenues",
            'h2' => "Sur notre site",
            'content' => ["Premier paragraphe", "Deuxième paragraphe", "Paragraphe final"]
        ];
    }

    public static function formDatas()
    {
        return ['title' => 'Notre page de contact',
            'h1' => "Formulaire",
            'h2' => "nous contacter:",'content' => '<form action="" name="lui" method="post"><input name="themail" type="email" placeholder="Votre mail" required><br/><textarea name="thetext" placeholder="Votre message" required></textarea><br><input type="submit" value="Envoyer"></form> '];
    }

    public static function mapDatas()
    {
        // return a table with datas for accueil
        return ['title' => 'Notre page de localisation',
            'h1' => "Localisation",
            'h2' => "Nous trouver"
            ,'content' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d20158.67780652147!2d4.307420252591753!3d50.83422518991884!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x96f406ef5208ebd9!2sCentre+de+Formation+2mille+asbl!5e0!3m2!1sfr!2sbe!4v1538128375820" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>'
        ];
    }

}
