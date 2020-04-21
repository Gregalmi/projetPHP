<?php

/*

TEST  :  Recherche de recettes par catégorie   */
$cat = filtrerInfo("categorie1");

// var_dump($cat);


$noscat = lireLigneSQL ("rp_recette", $cat, "rec_fk_categorie_id");
foreach($noscat as $catego)
{
    extract($catego);

    <<<CODEHTML
  <div class="col mb-4">
    <div class="card" style="overflow: hidden">
      <img src="$rec_img" class="card-img-top" alt="...">
      <div class="card-body">
        <h3 class="card-title text-danger"><a href="template-recette.php?rec_id=$rec_id">$rec_nom</a></h3>  
      </div>
      
    </div>
  </div>
  CODEHTML;
    
  

}


//au cas ou
// function lireTableSQLAllcat ($nomTable, $nomColonne, $valueColonne)
// {
//     // CONSTRUIRE UNE REQUETE PREPAREE
//     $requetePrepareeSQL =
// <<<CODESQL

// SELECT *
// FROM `$nomTable`
// WHERE `$nomColonne` = `$valueColonne`;


// CODESQL;

//     // PAS DE TOKEN DANS LA REQUETE PREPAREE => TABLEAU VIDE
//     $tabAssoColonneValeur = [];

//     // ENVOYER LA REQUETE SQL
//     // SECURITE: PROTECTION CONTRE LES INJECTIONS SQL
//     // ON SEPARE LES INFOS EXTERIEURES DE LA REQUETE PREPAREE
//     $objetPDOStatement = envoyerRequeteSQL($requetePrepareeSQL, $tabAssoColonneValeur);
    
//     // POUR POUVOIR PARCOURIR AVEC LA BOUCLE foreach
//     return $objetPDOStatement;
// }