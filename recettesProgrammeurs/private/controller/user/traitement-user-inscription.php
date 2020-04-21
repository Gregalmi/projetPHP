<?php

// ETAPE1: RECUPERER ET FILTRER LES INFOS DU FORMULAIRE
$login              = filtrerInfo("login");
$email              = filtrerEmail("email");
$passwordNoHash     = filtrerInfo("passwordNoHash");

// ETAPE2: VERIFIER QUE LES CHAMPS NE SONT PAS VIDES
if ( ($login != "") && ($email != "") && ($passwordNoHash != ""))
{
    // ON VA VERIFIER SI L'EMAIL EST DEJA UTILISE PAR UN UTILISATEUR DEJA CREE
    $nbEmailDuplicate = compterLigneSQL("rp_user", "use_email", $email);
    $nbLoginDuplicate = compterLigneSQL("rp_user", "use_login", $login);
    if (($nbEmailDuplicate == 0) && ($nbLoginDuplicate == 0))
    {
        // ETAPE3: COMPLETER LES INFOS MANQUANTES
        $dateInscription = date("Y-m-d H:i:s");     // FORMAT DATETIME SQL
        $level           = 1;                       // USER INACTIF
        
        // SECURITE: ON HASHE LE MOT DE PASSE
        $passwordHash    = password_hash($passwordNoHash, PASSWORD_DEFAULT);
        
        
        // JE VAIS APPELER LA FONCTION insererLigneSQL
        insererLigneSQL("rp_user", [
            "use_login"             => $login,
            "use_email"             => $email,
            "use_password"          => $passwordHash,       // ON STOCKE LE MOT DE PASSE HASHE
            "use_level"             => $level,
            "use_date"   => $dateInscription,
            ]);
            
        //MESSAGE A AFFICHER EN FEEDBACK
        $inscriptionFeedback = "Votre compte a bien été crée. Merci $login. ($email). Vous pouvez désormais vous connecter";
        
        
    }
    else
    {
        $inscriptionFeedback = "DESOLE CET EMAIL OU LOGIN EST DEJA PRIS ($email)";
    }
}