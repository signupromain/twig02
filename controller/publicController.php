<?php
// name of our namspace
namespace Controller;
// use nosModels
use Models\nosModels AS DT;
// Swiftmailer -> advanced sender email
use Swift_SmtpTransport;
use Swift_Mailer;
use Swift_Message;
// advanced validator email
use Egulias\EmailValidator\EmailValidator;
use Egulias\EmailValidator\Validation\DNSCheckValidation;
use Egulias\EmailValidator\Validation\MultipleValidationWithAnd;
use Egulias\EmailValidator\Validation\RFCValidation;
// class for publicController
class publicController
{
    // method for "acceuil"
    public static function welcomeAction($twig)
    {
        // recup datas from model
        $datas = DT::accueilDatas();
        // view accueil with $datas in an associative array, with key "recup"
        echo $twig->render("accueil.html.twig", ["recup" => $datas]);
    }
    // method for "contact"
    public static function contactAction($twig)
    {
        // pas de formulaire envoyé
        if (!empty($_POST)) {
            // création de la validation d'email
            $validator = new EmailValidator();
            // on va vérifier la validité du mail, son format ET l'existance DNS du nom de domaine
            $multipleValidations = new MultipleValidationWithAnd([
                new RFCValidation(),
                new DNSCheckValidation()
            ]);
            // si le mail est valide
            $true = $validator->isValid($_POST['themail'], $multipleValidations); //true
            // Le mail est valide
            if ($true) {
                //$themail = filter_var($_POST['themail'], FILTER_VALIDATE_EMAIL);
                $thetext = $_POST['thetext'];
                $aqui = "michaeljpitz@gmail.com";
                // Create the Transport
                $transport = (new Swift_SmtpTransport('relay.skynet.be', 25))
                    ->setUsername('michael')
                    ->setPassword('');
// Create the Mailer using your created Transport
                $mailer = new Swift_Mailer($transport);
// Create a message
                $message = (new Swift_Message('Depuis twig02'))
                    ->setFrom([$_POST['themail']])
                    ->setTo([$aqui])
                    ->setBody($thetext);
// Send the message
                $result = $mailer->send($message);
                // si ça a réussi
                if ($result) {
                    header("Location: ./");
                } else {
                    header("Location: ./?content=contact&erreur=true");
                }
                // un problème de mail, on affiche l'erreur
            } else {
                // warning
                if ($validator->hasWarnings()) {
                    $error = 'Warning! ' . $_POST['themail'] . ' has unusual/deprecated features (result code ' . var_export($validator->getWarnings(), true) . ')';
                    // email non valide, on l'affiche également
                } else {
                    $error = $_POST['themail'] . ' is not a valid email address (result code ' . $validator->getError() . ')';
                }
                // recup error with form
                $datas = DT::formDatas();
                echo $twig->render("error.html.twig", ["recup" => $datas,"erreur"=>$error
                ]);
            }
            // affichage du formulaire
        } else {
            // recup form
            $datas = DT::formDatas();
            echo $twig->render("form.html.twig", ["recup" => $datas]);
        }
    }
}