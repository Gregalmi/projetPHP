<?php

// Déclaration des variables
$con_nom        = filtrerInfo("con_nom");
$con_email      = filtrerEmail("con_email");
$con_text    = filtrerInfo("con_text");
$con_sujet    = filtrerInfo("con_sujet");

// Vérification des variables contacts
if ( ($con_nom != "") && ($con_email != "") && ($con_text != "") && ($con_sujet !="") )
{
    $dateMessage = date("Y-m-d H:i:s");     // FORMAT DATETIME SQL
    
    // Insertion du message contact en Base de données
    insererLigneSQL("rp_contact", [
        "con_nom"               => $con_nom,
        "con_email"             => $con_email,
        "con_text"           => $con_text,
        "con_sujet"           => $con_sujet,
        "con_date"       => $dateMessage,
        ]);
        
    $contactFeedback = "Votre message sera traité rapidement, nous vous répondrons à l'adresse email suivante $con_email. </br>
    Merci $con_nom";
    
    
   
   // mail($email, "message sur notre site", "merci $nom de votre message. \n$message.");
        
}// S'il manque une variable du formulaire, message d'erreur
else
{
    $contactFeedback = "Désolé, nous vous connaissons pas, veuillez vous inscrire ! ";
}


