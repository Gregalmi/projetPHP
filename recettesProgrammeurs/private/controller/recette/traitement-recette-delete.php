<?php


// Lire le niveau de l'utilisateur
$level = lireSession("use_level");

// Si membres, possibilité de supprimer une de ces Recettes
if($level >= 1) {
    $rec_id = filtrerEntier("rec_id");
    if ($rec_id > 0) {
        supprimerLigneSQLRecette("rp_recette", $rec_id);
    }
}

