<?php
// name of our namspace
namespace Controller;
// use nosModels
use Models\nosModels AS DT;
// Swiftmailer
use Swift_SmtpTransport;
use Swift_Mailer;
use Swift_Message;
// class for publicController
class publicController {
    // method for "acceuil"
    public static function welcomeAction($twig) {
        // recup datas from model
        $datas = DT::accueilDatas();
        // view accueil with $datas in an associative array, with key "recup"
        echo $twig->render("accueil.html.twig", ["recup" => $datas]);
    }
    // method for "contact"
    public static function contactAction($twig) {
        // pas de formulaire envoyé
        if (!empty($_POST)) {
            $themail = filter_var($_POST['themail'], FILTER_VALIDATE_EMAIL);
            $thetext = strip_tags($_POST['thetext']);
            $aqui = "romain@machaharson.com";
            // Create the Transport
            $transport = (new Swift_SmtpTransport('relay.skynet.be', 25))
                ->setUsername('romain')
                ->setPassword('')
            ;
// Create the Mailer using your created Transport
            $mailer = new Swift_Mailer($transport);
// Create a message
            $message = (new Swift_Message('Depuis twig02'))
                ->setFrom([$themail])
                ->setTo([$aqui])
                ->setBody($thetext)
            ;
// Send the message
            $result = $mailer->send($message);
            // si ça a réussi
            if ($result) {
                header("Location: ./");
            } else {
                header("Location: ./?content=contact&erreur=true");
            }
            // affichage du formulaire
        } else {
            // recup form
            $datas = DT::formDatas();
            echo $twig->render("form.html.twig", ["recup" => $datas]);
        }
    }
}