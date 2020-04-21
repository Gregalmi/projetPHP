<?php


// ETAPE0: VERIFIER LE level DU VISITEUR
// RETROUVER LE $level A PARTIR DE LA SESSION
$level = lireSession("use_level");
if ($level >= 10)
{
    // ETAPE1: RECUPERER ET FILTRER LES INFOS DU FORMULAIRE
    $login      = filtrerInfo("login");
    $email      = filtrerInfo("email");
    $password   = filtrerInfo("password");
    
    // ETAPE2:  IF VERIFIER QUE LES CHAMPS NE SONT PAS VIDES
    
    if ( ($login != "") && ($email != "") && ($password != ""))
    {
        // ON VA VERIFIER SI L'EMAIL EST DEJA UTILISE PAR UN UTILISATEUR DEJA CREE
        $nbEmailDuplicate = compterLigneSQL("rp_user", "use_email", $email);
        $nbLoginDuplicate = compterLigneSQL("rp_user", "use_login", $login);
        if (($nbEmailDuplicate == 0) && ($nbLoginDuplicate == 0))
        {
            // ETAPE3: COMPLETER LES INFOS MANQUANTES
            $dateInscription = date("Y-m-d H:i:s");     // FORMAT DATETIME SQL
            $level           = 10;                       // USER ACTIF IMMEDIATEMENT
            
            // SECURITE: ON HASHE LE MOT DE PASSE
            $passwordHash    = password_hash($password, PASSWORD_DEFAULT);
            
            
            insererLigneSQL("rp_user", [
                "use_login"             => $login,
                "use_email"             => $email,
                "use_password"          => $passwordHash,       // ON STOCKE LE MOT DE PASSE HASHE
                "use_level"             => $level,
                "use_date"   => $dateInscription,
                ]);
                
            //MESSAGE A AFFICHER EN FEEDBACK
            $userFeedback = "VOTRE USER EST CREE. MERCI $login. ($email)";
        }
        else
        {
            $userFeedback = "DESOLE CET EMAIL OU LOGIN EST DEJA PRIS ($email)";
        }
    }
}
