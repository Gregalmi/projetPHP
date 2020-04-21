<?php

// ETAPE1:  RECUPERER ET FILTRER LES INFOS DU FORMULAIRE
$email            = filtrerInfo("email");

$passwordNoHash   = filtrerInfo("passwordNoHash");

// ETAPE2: VERIFIER SI LES CHAMPS NE SONT PAS VIDES
if ( ($email != "") && ($passwordNoHash != ""))
{
   
    // ON NE DEVRAIT EN TROUVER QUE 0 OU 1 LIGNE
    // (PAS DE DOUBLON...)
    $listeLigne = lireLigneSQL("rp_user", $email, "use_email");
    // LECTURE DES RESULTATS
    $password;
    foreach($listeLigne as $tabLigne)
    {
        extract($tabLigne);
        var_dump($tabLigne);
        
        //ON VERIFIE QUE LES MOTS DE PASSE CORRESPONDENT
        
        if (password_verify($passwordNoHash, $use_password))
        {
            if ($use_level > 0)
            {
                // OK LE COMPTE EST ACTIF
                $loginFeedback = "BIENVENUE $use_login";
                
                // ON VA MEMORISER DANS UNE SESSION LES INFOS DE L'UTILISATEUR
                ecrireSession("use_level", $use_level);
                ecrireSession("use_login", $use_login);
                ecrireSession("use_email", $use_email);
                ecrireSession("use_id", $use_id);

                header("Location: mes-recettes.php");

            }
            else
            {
                // KO LE COMPTE EST DESACTIVE
                $loginFeedback = "Désolé, votre compte est désactivé $login";
            }
        }
        else
        {
            // KO LES MOTS DE PASSE NE CORRESPONDENT PAS
            $loginFeedback = "LE MOT DE PASSE EST INVALIDE";
        }
    }
    
    // CAS ERREUR MAUVAIS EMAIL
    if (empty($tabLigne)) 
    {
        // MAUVAIS EMAIL    
        $loginFeedback = "EMAIL INVALIDE";
        
        // POSSIBLE POUR DETECTER LES HACKERS...
        // MEMORISER LE NOMBRE D'ECHECS
        $nbEchec = lireSession("nbEchec");
        ecrireSession("nbEchec", $nbEchec++);
    }
}