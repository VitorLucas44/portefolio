<?php

/*
Contrôleur frontal
*/

// chargement des dépendances
require_once "config.php"; // configuration
        // si on a un fichier de fonctions on le charge ici

// si on a besoin de se connecter à une base de donnée, on se connecte ici!

// Routeur
if(!isset($_GET['pg'])){
    // chargement de l'accueil
    include_once "import/acceuil.php";
}else{
    // pas sur l'accueil
    switch($_GET['pg']){
        case "cv":  
            // import du cv
            include_once "import/curriculum.php";
            break;
        case "tuto":
            // import de la page des tutos
            include_once "import/tutoriels.php";
            break;
        default:    
            // chargement de l'accueil
            include_once "import/acceuil.php";
            break;
            case "galerie":
                // import de la page de la galerie
                include_once "import/galerie.php";
                break;
    
          
            case "contact":
                // import de la page des contact
                include_once "import/contact.php";
                break;
            case "liens":
                // import de la page du login
                include_once "import/liens.php";
                break;

                case "login":
                    // import de la page du login
                    include_once "import/login.php";
                    break;
               
    }
}



// modification de variables de configuration du serveur, utile pour le mail sur un serveur local (change le contenu de php.ini pour cette page seulement), inutile d'utiliser ini_set pour envoyer un mail sur un serveur distant, il suffit de paramétrer le smtp comme dans votre doc (gmail.com outlook etc...)
ini_set('SMTP',SMTP_HOST);
ini_set('smtp_port',SMTP_PORT);
ini_set('sendmail_from',MAIL_ADMIN);

// si le formulaire a été envoyé
if(!empty($_POST)){
    // traîtement des variables (htmlspecialchars est souvant inutile sans insertion dans la DB)
    $thename = htmlspecialchars(trim($_POST['thename']),ENT_QUOTES);
    $themail = filter_var(trim($_POST['themail']), FILTER_VALIDATE_EMAIL);
    $thetext = strip_tags(trim($_POST['thetext']));
    // si au moins 1 équivalante à vide ou false
    if(empty($thename) || !$themail || empty($thetext)){
        // création d'une variable pour l'erreur
        $message = "Votre mail n'a pas été envoyé, veuillez recommencer";
    }else{
        // on va créer nos variables pour l'envoi des mails

        // premier, envoi du mail à l'admin
        $aQui   = MAIL_ADMIN;
        $sujet = 'Réponse à votre formulaire pour Vitor Lucas Santos';
        $message = $thename." à écrit : \n".$thetext;
        $entete = 'Content-Type: text/plain; charset="utf-8"' . "\r\n"  .
        'From: ' . $themail  . "\r\n" .
        'Reply-To: ' . $themail  . "\r\n" .
        'X-Mailer: PHP/' . phpversion();
        

        mail($aQui, $sujet, $message, $entete);

        // envoi du mail de confirmation à l'utilisateur
        $aQui   = $themail;
        $sujet = 'Merci pour votre mail à Vitor Lucas Santos';
        $message = "Vous recevrez une reponse dans les plus brefs delais";
        $entete =  'Content-Type: text/plain; charset="utf-8"' . "\r\n"  .
        'From: ' . MAIL_ADMIN  . "\r\n" .
        'Reply-To: ' . MAIL_ADMIN  . "\r\n" .
        'X-Mailer: PHP/' . phpversion();

        mail($aQui, $sujet, $message, $entete);

        // mail($themail, 'Depuis 23-mail', $thename." à écrit : \n".$thetext);
        // création de la variable de confirmation
        $message = "Votre mail a bien été envoyé, merci";
    }
}
