<?php


require_once "config.php"; // configuration

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




ini_set('SMTP',SMTP_HOST);
ini_set('smtp_port',SMTP_PORT);
ini_set('sendmail_from',MAIL_ADMIN);


if(!empty($_POST)){
    
    $thename = htmlspecialchars(trim($_POST['thename']),ENT_QUOTES);
    $themail = filter_var(trim($_POST['themail']), FILTER_VALIDATE_EMAIL);
    $thetext = strip_tags(trim($_POST['thetext']));
 
    if(empty($thename) || !$themail || empty($thetext)){
        
        $message = "Votre mail n'a pas été envoyé, veuillez recommencer";
    }else{
      
        $aQui   = MAIL_ADMIN;
        $sujet = 'Réponse à votre formulaire pour Vitor Lucas Santos';
        $message = $thename." à écrit : \n".$thetext;
        $entete = 'Content-Type: text/plain; charset="utf-8"' . "\r\n"  .
        'From: ' . $themail  . "\r\n" .
        'Reply-To: ' . $themail  . "\r\n" .
        'X-Mailer: PHP/' . phpversion();
        

        mail($aQui, $sujet, $message, $entete);

        
        $aQui   = $themail;
        $sujet = 'Merci pour votre mail à Vitor Lucas Santos';
        $message = "Vous recevrez une reponse dans les plus brefs delais";
        $entete =  'Content-Type: text/plain; charset="utf-8"' . "\r\n"  .
        'From: ' . MAIL_ADMIN  . "\r\n" .
        'Reply-To: ' . MAIL_ADMIN  . "\r\n" .
        'X-Mailer: PHP/' . phpversion();

        mail($aQui, $sujet, $message, $entete);

    
        $message = "Votre mail a bien été envoyé, merci";
    }
}
