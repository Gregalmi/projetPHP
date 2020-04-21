<?php

// CHARGER LES FONCTIONS
require_once "private/controller/traitement.php";

// BLOQUER L'ACCES A L'UTILISATEUR
ecrireSession("use_level", 0 );  // (INFERIEUR A ZERO)

// REDIRIGER VERS LA PAGE login.php
header("Location: login.php");

