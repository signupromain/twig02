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
        return ['content' => '<form action="" name="lui" method="post"><input name="themail" type="email" placeholder="Votre mail" required><br/><textarea name="thetext" placeholder="Votre message" required></textarea><br><input type="submit" value="Envoyer"></form> '];
    }
}
