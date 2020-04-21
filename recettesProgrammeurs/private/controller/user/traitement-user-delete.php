<?php

// RETROUVER LE $level A PARTIR DE LA SESSION
$use_level = lireSession("use_level");
if ($use_level >= 10)
{

    // ETAPE1: RECUPERER ET FILTRER LES INFOS
    $use_id = filtrerInfo("use_id");
 
    // ETAPE2: SECURITE VALIDER QUE LES INFOS SONT CORRECTES
    if ($use_id > 0)
    {

        supprimerLigneSQLUser("rp_user", $use_id);


        supprimerLigneSQLRecette("rp_recette", $use_id);

    }
}
