 <?php

    $action = htmlspecialchars($_SERVER["PHP_SELF"]);
    $erreur = false;



    if ($_SERVER['REQUEST_METHOD'] == "POST") {

        if (empty($_POST['gender'])) {
            $erreur_gender = 'Veuillez indiquer votre genre';
            $erreur = true;
        } else {
            $gender = $_POST['gender'];
        }

        if (empty($_POST['firstname'])) {
            $erreur_firstname = 'Veuillez indiquer votre prénom';
            $erreur = true;
        } else {
            $firstname = $_POST['firstname'];
        }

        if (empty($_POST['name'])) {
            $erreur_name = 'Veuillez indiquer votre nom';
            $erreur = true;
        } else {
            $name = $_POST['name'];
        }

        if (empty($_POST['postal-code'])) {
            $erreur_cp = 'Veuillez indiquer votre code postal';
            $erreur = true;
        } else {
            $postalCode = $_POST['postal-code'];
        }

        if (empty($_POST['city'])) {
            $erreur_city = 'Veuillez indiquer votre ville';
            $erreur = true;
        } else {
            $city = $_POST['city'];
        }

        if (empty($_POST['company'])) {
            $erreur_company = 'Veuillez indiquer votre société';
            $erreur = true;
        } else {
            $company = $_POST['company'];
        }

        if (empty($_POST['tel'])) {
            $erreur_tel = 'Veuillez indiquer votre téléphone';
            $erreur = true;
        } else {
            if (!preg_match("#^[0-9]{2}([-. ]?[0-9]{2}){4}$#", $_POST['tel'])) {
                $erreur_tel = 'Votre numéro est incorrect: 10 chiffres attendus (.,-, espace) ';
                $erreur = true;
            } else {
                $tel = $_POST['tel'];
            }
        }

        if (empty($_POST['request'])) {
            $erreur_request = 'Veuillez faire un choix';
            $erreur = true;
        } else {
            $request = $_POST['request'];
        }
    }
    ?>
 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <link rel="stylesheet" href="public/css/main.css">
     <title>Formulaire Up</title>
 </head>

 <body>

     <main class="container">
         <header class="row header">
             <img src="public/assets/images/logo-up.png" alt="logo" class="logo">
             <h1>Titre</h1>
         </header>


         <?php
            if (isset($_POST['firstname'])) {
                if (!$erreur) {
                    echo '<div class="infos">';
                    echo "Le message a été envoyé avec les informations suivantes:<br> ";
                    echo "<b>" . $gender . " " . $firstname . " " . $name . "</b> demande informations pour : ";
                    foreach ($request as $result) {
                        echo "<b>" . $result . "</b>";
                    }
                    echo "<br>";
                    echo "Code postal : " . "<b>" . $postalCode . "</b> ";
                    echo "<br> Société : " .  "<b>" . $company . "</b> ";
                    echo "<br> Tél :  <b>" . $tel . "</b>";
                    echo '</div>';
                    //exit;
                    $_POST = array();
                }
            }
            ?>

         <section class="row section__form">
             <div class="col-sm section__form__datas">

                 <form action="<?= $action ?>" method="POST">
                     <span class="section__form__datas__error--gender"><?php if (isset($erreur_gender)) echo $erreur_gender; ?></span><br>
                     <label>Civilité&ast;</label>
                     <div class="form-check form-check-inline">
                         <input class="form-check-input" type="radio" name="gender" id="female" value="Madame" checked>
                         <label class="form-check-label" for="female">Mme</label>
                     </div>
                     <div class="form-check form-check-inline">
                         <input class="form-check-input" type="radio" name="gender" id="male" value="Monsieur">
                         <label class="form-check-label" for="male">Mr</label>
                     </div>

                     <br><span class="section__form__datas__error"><?php if (isset($erreur_firstname)) echo $erreur_firstname; ?></span>
                     <input class="form-control" type="text" name="firstname" placeholder="Prénom&ast;" value="<?php if (isset($firstname)) echo $firstname; ?>">

                     <span class="section__form__datas__error"><?php if (isset($erreur_name)) echo $erreur_name; ?></span>
                     <input class="form-control" type="text" name="name" placeholder="Nom&ast;" value="<?php if (isset($name)) echo $name; ?>">

                     <span class="section__form__datas__error"><?php if (isset($erreur_cp)) echo $erreur_cp; ?></span>
                     <input class="form-control" type="number" name="postal-code" placeholder="Code postal&ast;" value="<?php if (isset($postalCode)) echo $postalCode; ?>">

                     <span class="section__form__datas__error"><?php if (isset($erreur_city)) echo $erreur_city; ?></span>
                     <input class="form-control" type="text" name="city" placeholder="Ville&ast;" value="<?php if (isset($city)) echo $city; ?>">

                     <span class="section__form__datas__error"><?php if (isset($erreur_company)) echo $erreur_company; ?></span>
                     <input class="form-control" type="text" name="company" placeholder="Raison sociale&ast;" value="<?php if (isset($company)) echo $company; ?>">

                     <span class="section__form__datas__error"><?php if (isset($erreur_tel)) echo $erreur_tel; ?></span>
                     <input class="form-control" type="tel" name="tel" placeholder="Téléphone&ast;" value="<?php if (isset($tel)) echo $tel; ?>">

             </div>

             <fieldset class="col-sm section__form__request">
                 <h2>Votre demande concerne :</h2>
                 <span class="section__form__request__error"><?php if (isset($erreur_request)) echo $erreur_request; ?></span><br>
                 <div class="form-check">
                     <input class="form-check-input" type="radio" name="request[]" id="dej" value="Cheque Dejeuner" checked>
                     <label class="form-check-label" for="dej">
                         Chèque déjeuner
                     </label>
                 </div>
                 <div class="form-check">
                     <input class="form-check-input" type="radio" name="request[]" id="cadhoc" value="Cheque Cadhoc">
                     <label class="form-check-label" for="cadhoc">
                         Cadhoc
                     </label>
                 </div>
                 <div class="form-check">
                     <input class="form-check-input" type="radio" name="request[]" id="domicile" value="Cheque Domicile">
                     <label class="form-check-label" for="domicile">
                         Chèque domicile
                     </label>
                 </div>
                 <button type="submit" class="btn btn-success btn-lg submit-btn">&#202;tre recontacté</button>
             </fieldset>
         </section>
         </form>
     </main>
 </body>

 </html>
