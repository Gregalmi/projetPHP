<?php
// VARIABLES GLOBALES
$pageActive = 'admin-news';


// ATTENTION: LE TRAITEMENT N'EST PAS PROTEGE
require_once "private/controller/traitement.php";

// RETROUVER LE $level A PARTIR DE LA SESSION
$level = lireSession("use_level");
if ($level >= 11)
{
    // OK ACCES PERMIS
    require_once "private/view/header.php";
    require_once "private/view/section-admin-newsletter.php";
    require_once "private/view/footer.php";
    
}
else
{
    // ACCES INTERDIT
    // REDIRIGER VERS LA PAGE login.php
    // https://www.php.net/manual/fr/function.header.php
    header("Location: login.php");
    
    // DEBUG
    echo "ACCES INTERDIT";
}

