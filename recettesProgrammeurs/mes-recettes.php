<?php

// VARIABLES GLOBALES
// $menu = "membre";
$pageActive = 'mes-recettes';
require_once "private/controller/traitement.php";

// RETROUVER LE $level A PARTIR DE LA SESSION
 $use_level = lireSession("use_level");
if ($use_level >= 1)
{
    // OK ACCES PERMIS
    require_once "private/view/header.php";
    require_once "private/view/section-mes-recettes.php";
    require_once "private/view/footer.php";
    
 }
 else
 {
    // ACCES INTERDIT
    // REDIRIGER VERS LA PAGE login.php
    header("Location: login.php");
    
    //DEBUG
    echo "ACCES INTERDIT";
}

