<?php

// Lire le niveau de l'user
$level = lireSession("use_level");

// Si niveau admin, supprime le contact de la BDD
if($level >= 10) {
    $con_id = filtrerEntier("con_id");
    if ($con_id > 0) {
        supprimerLigneSQLContact("rp_contact", $con_id);
    }
}