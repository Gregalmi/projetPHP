<?php

// Créer une Pagination
function creerPaginationHtml ($limit, $nbPage)
{
    for($i=1; $i <= $nbPage; $i++)
    {
        echo
<<<CODEHTML

            <li><a href="?page=$i">$i</a></li>

CODEHTML;
    }
    
}

// Choix des couleurs selon les catégories
function choisirCouleur ($categorie){
    $color = "";

    if ($categorie == 1){
        $color = "text-primary";
    }
    else if ($categorie == 2){
        $color = "text-success";
    }
    else if ($categorie == 3){
        $color = "text-warning";
    }
    else if ($categorie == 4){
        $color = "text-danger";
    }
    else if ($categorie == 5){
        $color = "text-dark";
    }   
    return $color;
}
