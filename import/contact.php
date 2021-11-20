<?php

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <link type="text/css" rel="stylesheet" href="css/style.css" />
</head>

<body>
    <div class="navbar">

        <?php

        include "menu.php";
        ?>
    </div>

    <div class="navbar">

        <div class="global">
            <h1>Contactez-nous</h1>
            <div class="separation"></div>
            <div class="corps-formulaire">
                <div class="gauche">
                    <div class="groupe">


                        <p>Veuillez laisser un message si vous voulez me contactez.</p>
                        <?php
                        if (isset($message)) :
                        ?>
                            <h3><?= $message ?></h3>
                            <h4>Pour en savoir plus sur les mails</h4>
                            <p><a href="https://www.php.net/manual/fr/function.mail.php" target="_blank">https://www.php.net/manual/fr/function.mail.php</a></p>
                        <?php
                        endif;
                        ?>
                        <form action="" name="contact" method="POST">
                            <input name="thename" placeholder="Votre nom" required /><br>
                            <input name="themail" placeholder="Votre adresse mail" required /><br>
                            <textarea name="thetext" placeholder="Votre texte" required></textarea><br>
                            <input type="submit" value="Envoyer votre message" />
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <img src="images/arr.png" alt="">
        <footer>
            @copyright 2021 - Vitor Lucas Santos
        </footer>


</body>

</html>