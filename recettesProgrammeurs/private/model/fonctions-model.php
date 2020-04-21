<?php


// LECTURE 
function lireSession ($cle)
{
  
    if ( ! isset($_SESSION))
    {
        session_start();    // CREE LE TABLEAU $_SESSION POUR NOUS
    }
    $valeur = $_SESSION[$cle] ?? "";    // ?? => PROTECTION SI NON CONNECTE
    return $valeur;
}

// ECRITURE
function ecrireSession ($cle, $valeur)
{
    
    if ( ! isset($_SESSION))
    {
        session_start();    // CREE LE TABLEAU $_SESSION POUR NOUS
    }
    // ON STOCKE DANS LE TABLEAU ASSOCIATIF
    // (ET ENSUITE PHP VA GARDER LA CLE ET LA VALEUR A PART...)
    $_SESSION[$cle] = $valeur;
}

// Lire les jointures
function lireJointureSQL ($nomTable, $valeurColonne, $nomColonne, $nomTableJointure)
{
    // CONSTRUIRE UNE REQUETE PREPAREE
    $requetePrepareeSQL =
<<<CODESQL
  
SELECT * 
FROM `$nomTable`
INNER JOIN `$nomTableJointure`
ON $nomTableJointure.id = $nomTable.{$nomTableJointure}_id
WHERE $nomTable.$nomColonne = :$nomColonne

CODESQL;

    // UN TOKEN DANS LA REQUETE PREPAREE
    $tabAssoColonneValeur = [ $nomColonne => $valeurColonne ];

    // ENVOYER LA REQUETE SQL
    // SECURITE: PROTECTION CONTRE LES INJECTIONS SQL
    // ON SEPARE LES INFOS EXTERIEURES DE LA REQUETE PREPAREE
    $objetPDOStatement = envoyerRequeteSQL($requetePrepareeSQL, $tabAssoColonneValeur);
    
    // POUR POUVOIR PARCOURIR AVEC LA BOUCLE foreach
    return $objetPDOStatement;    
}

//rajout de variables pour les jointures
function lireJointureSQLGREG ($nomTable, $valeurColonne, $nomColonne, $nomTableJointure, $nomColonneJointure, $nomColonneTable)
{
    // CONSTRUIRE UNE REQUETE PREPAREE
    $requetePrepareeSQL =
<<<CODESQL

SELECT * 
FROM `$nomTable`
INNER JOIN `$nomTableJointure`
ON $nomTableJointure.$nomColonneJointure = $nomTable.$nomColonneTable
WHERE $nomTable.$nomColonne = :$nomColonne

CODESQL;

    // UN TOKEN DANS LA REQUETE PREPAREE
    $tabAssoColonneValeur = [ $nomColonne => $valeurColonne ];

    // ENVOYER LA REQUETE SQL
    // SECURITE: PROTECTION CONTRE LES INJECTIONS SQL
    // ON SEPARE LES INFOS EXTERIEURES DE LA REQUETE PREPAREE
    $objetPDOStatement = envoyerRequeteSQL($requetePrepareeSQL, $tabAssoColonneValeur);
    
    // POUR POUVOIR PARCOURIR AVEC LA BOUCLE foreach
    return $objetPDOStatement;    
}




// ON A BESOIN DE CHERCHER UNE LIGNE DANS UNE TABLE SQL 
// SUIVANT LA VALEUR D'UNE COLONNE
function lireLigneSQL ($nomTable, $valeurColonne, $nomColonne)
{
    // CONSTRUIRE UNE REQUETE PREPAREE
    $requetePrepareeSQL =
<<<CODESQL

SELECT * 
FROM `$nomTable`
WHERE $nomColonne = :$nomColonne

CODESQL;

    // UN TOKEN DANS LA REQUETE PREPAREE
    $tabAssoColonneValeur = [ $nomColonne => $valeurColonne ];

    // ENVOYER LA REQUETE SQL
    // SECURITE: PROTECTION CONTRE LES INJECTIONS SQL
    // ON SEPARE LES INFOS EXTERIEURES DE LA REQUETE PREPAREE
    $objetPDOStatement = envoyerRequeteSQL($requetePrepareeSQL, $tabAssoColonneValeur);
    
    // POUR POUVOIR PARCOURIR AVEC LA BOUCLE foreach
    return $objetPDOStatement;    
}


// ON A BESOIN D'UNE FONCTION QUI COMPTE LE NOMBRE DE LIGNES DANS UNE TABLE SQL
// LA FONCTION RENVERRA UN NOMBRE DIRECTEMENT
function compterLigneSQL ($nomTable, $nomColonne="", $valeurColonne="")
{
    // IL SE PEUT QU'IL Y AIT UNE CLAUSE WHERE
    $clauseWhere = "";
    // PAS DE TOKEN DANS LA REQUETE PREPAREE
    $tabAssoColonneValeur = [ ];

    // SI ON A $nomColonne QUI N'EST PAS VIDE
    // ALORS ON AJOUTE UNE CLAUSE WHERE
    if ($nomColonne != "")
    {
        $clauseWhere = "WHERE $nomColonne = :$nomColonne";
        // UN TOKEN DANS LA REQUETE PREPAREE
        $tabAssoColonneValeur = [ $nomColonne => $valeurColonne ];
    }
    
    // CONSTRUIRE UNE REQUETE PREPAREE
    $requetePrepareeSQL =
<<<CODESQL

SELECT count(*) as NbLigne
FROM `$nomTable`
$clauseWhere

CODESQL;


    // ENVOYER LA REQUETE SQL
    // SECURITE: PROTECTION CONTRE LES INJECTIONS SQL
    // ON SEPARE LES INFOS EXTERIEURES DE LA REQUETE PREPAREE
    $objetPDOStatement = envoyerRequeteSQL($requetePrepareeSQL, $tabAssoColonneValeur);
    
    // ON VA RECUPERER DIRECTEMENT LA VALEUR DE LA COLONNE
 
    $nbLigne = $objetPDOStatement->fetchColumn();
    
    return $nbLigne;
}


// SUPPRIMER UNE LIGNE DANS UNE TABLE SQL
function supprimerLigneSQL ($nomTable, $id)
{
    // CONSTRUIRE UNE REQUETE PREPAREE
    $requetePrepareeSQL =
<<<CODESQL

DELETE FROM `$nomTable`
WHERE
id = :id

CODESQL;

    // UN TOKEN DANS LA REQUETE PREPAREE
    $tabAssoColonneValeur = [ "id" => $id ];

    // ENVOYER LA REQUETE SQL
    // SECURITE: PROTECTION CONTRE LES INJECTIONS SQL
    // ON SEPARE LES INFOS EXTERIEURES DE LA REQUETE PREPAREE
    $objetPDOStatement = envoyerRequeteSQL($requetePrepareeSQL, $tabAssoColonneValeur);
    
    // POUR POUVOIR PARCOURIR AVEC LA BOUCLE foreach
    return $objetPDOStatement;
    
}

// Supprimer un User
function supprimerLigneSQLUser ($nomTable, $use_id)
{
    // CONSTRUIRE UNE REQUETE PREPAREE
    $requetePrepareeSQL =
<<<CODESQL
DELETE FROM `$nomTable`
WHERE
use_id = :use_id
CODESQL;
    // UN TOKEN DANS LA REQUETE PREPAREE
    $tabAssoColonneValeur = [ "use_id" => $use_id ];
    // ENVOYER LA REQUETE SQL
    // SECURITE: PROTECTION CONTRE LES INJECTIONS SQL
    // ON SEPARE LES INFOS EXTERIEURES DE LA REQUETE PREPAREE
    $objetPDOStatement = envoyerRequeteSQL($requetePrepareeSQL, $tabAssoColonneValeur);
    // POUR POUVOIR PARCOURIR AVEC LA BOUCLE foreach
    return $objetPDOStatement;
}

// Supprimer une Ligne de Recette
function supprimerLigneSQLRecette ($nomTable, $rec_id)
{
    // CONSTRUIRE UNE REQUETE PREPAREE
    $requetePrepareeSQL =
<<<CODESQL
DELETE FROM `$nomTable`
WHERE
rec_id = :rec_id
CODESQL;
    // UN TOKEN DANS LA REQUETE PREPAREE
    $tabAssoColonneValeur = [ "rec_id" => $rec_id ];
    // ENVOYER LA REQUETE SQL
    // SECURITE: PROTECTION CONTRE LES INJECTIONS SQL
    // ON SEPARE LES INFOS EXTERIEURES DE LA REQUETE PREPAREE
    $objetPDOStatement = envoyerRequeteSQL($requetePrepareeSQL, $tabAssoColonneValeur);
    // POUR POUVOIR PARCOURIR AVEC LA BOUCLE foreach
    return $objetPDOStatement;
}

// Supprimer Ligne Contact
function supprimerLigneSQLContact ($nomTable, $con_id)
{
    // CONSTRUIRE UNE REQUETE PREPAREE
    $requetePrepareeSQL =
<<<CODESQL
DELETE FROM `$nomTable`
WHERE
con_id = :con_id
CODESQL;
    // UN TOKEN DANS LA REQUETE PREPAREE
    $tabAssoColonneValeur = [ "con_id" => $con_id ];
    // ENVOYER LA REQUETE SQL
    // SECURITE: PROTECTION CONTRE LES INJECTIONS SQL
    // ON SEPARE LES INFOS EXTERIEURES DE LA REQUETE PREPAREE
    $objetPDOStatement = envoyerRequeteSQL($requetePrepareeSQL, $tabAssoColonneValeur);
    // POUR POUVOIR PARCOURIR AVEC LA BOUCLE foreach
    return $objetPDOStatement;
}

// User peut supprimer Sa Recette 
function supprimerLigneSQLRecetteFK ($nomTable, $rec_fk_user_id)
{
    // CONSTRUIRE UNE REQUETE PREPAREE
    $requetePrepareeSQL =
<<<CODESQL
DELETE FROM `$nomTable`
WHERE
rec_fk_user_id = :rec_fk_user_id
CODESQL;
    // UN TOKEN DANS LA REQUETE PREPAREE
    $tabAssoColonneValeur = [ "rec_fk_user_id" => $rec_fk_user_id ];
    // ENVOYER LA REQUETE SQL
    // SECURITE: PROTECTION CONTRE LES INJECTIONS SQL
    // ON SEPARE LES INFOS EXTERIEURES DE LA REQUETE PREPAREE
    $objetPDOStatement = envoyerRequeteSQL($requetePrepareeSQL, $tabAssoColonneValeur);
    // POUR POUVOIR PARCOURIR AVEC LA BOUCLE foreach
    return $objetPDOStatement;
}

// Supprimer Recette Etape
function supprimerLigneSQLRecetteEtape ($nomTable, $eta_fk_recette_id)
{
    // CONSTRUIRE UNE REQUETE PREPAREE
    $requetePrepareeSQL =
<<<CODESQL
DELETE FROM `$nomTable`
WHERE
eta_fk_recette_id = :eta_fk_recette_id
CODESQL;
    // UN TOKEN DANS LA REQUETE PREPAREE
    $tabAssoColonneValeur = [ "eta_fk_recette_id" => $eta_fk_recette_id ];
    // ENVOYER LA REQUETE SQL
    // SECURITE: PROTECTION CONTRE LES INJECTIONS SQL
    // ON SEPARE LES INFOS EXTERIEURES DE LA REQUETE PREPAREE
    $objetPDOStatement = envoyerRequeteSQL($requetePrepareeSQL, $tabAssoColonneValeur);
    // POUR POUVOIR PARCOURIR AVEC LA BOUCLE foreach
    return $objetPDOStatement;
}



// ON A BESOIN D'UNE FONCTION POUR LIRE LES LIGNES DANS UNE TABLE SQL
function lireTableSQL ($nomTable, $colonneTri, $limit=100, $offset=0)
{
    // CONSTRUIRE UNE REQUETE PREPAREE
    $requetePrepareeSQL =
<<<CODESQL

SELECT *
FROM `$nomTable`
ORDER BY $colonneTri DESC
LIMIT $limit
OFFSET $offset

CODESQL;

    // PAS DE TOKEN DANS LA REQUETE PREPAREE => TABLEAU VIDE
    $tabAssoColonneValeur = [];

    // ENVOYER LA REQUETE SQL
    // SECURITE: PROTECTION CONTRE LES INJECTIONS SQL
    // ON SEPARE LES INFOS EXTERIEURES DE LA REQUETE PREPAREE
    $objetPDOStatement = envoyerRequeteSQL($requetePrepareeSQL, $tabAssoColonneValeur);
    
    // POUR POUVOIR PARCOURIR AVEC LA BOUCLE foreach
    return $objetPDOStatement;
}

// Lire toute la Table
function lireTableSQLAll ($nomTable)
{
    // CONSTRUIRE UNE REQUETE PREPAREE
    $requetePrepareeSQL =
<<<CODESQL

SELECT *
FROM `$nomTable`


CODESQL;

    // PAS DE TOKEN DANS LA REQUETE PREPAREE => TABLEAU VIDE
    $tabAssoColonneValeur = [];

    // ENVOYER LA REQUETE SQL
    // SECURITE: PROTECTION CONTRE LES INJECTIONS SQL
    // ON SEPARE LES INFOS EXTERIEURES DE LA REQUETE PREPAREE
    $objetPDOStatement = envoyerRequeteSQL($requetePrepareeSQL, $tabAssoColonneValeur);
    
    // POUR POUVOIR PARCOURIR AVEC LA BOUCLE foreach
    return $objetPDOStatement;
}

//  INSERER UNE LIGNE DANS UNE TABLE SQL
function insererLigneSQL ($nomTable, $tabAssoColonneValeur)
{
    // CETTE FONCTION DOIT CREER LE CODE SQL 
    // POUR AJOUTER UNE LIGNE DANS UNE TABLE SQL
    // SECURITE: NE PAS UTILISER DES INFOS EXTERIEURES
    // UTILISER DES JETONS/TOKENS...
    $listeColonne = "";
    $listeToken   = "";
    // JE VAIS PARCOURIR LE TABLEAU ASSO $tabAssoColonneValeur
    // POUR RECUPERER LES CLES
    // JE TESTE SI ON EST AU DEBUT OU PAS
    $compteur = 0;
    foreach($tabAssoColonneValeur as $colonne => $valeur)
    {
        if ($compteur != 0)
        {
            // AJOUTER UNE VIRGULE AVANT
            $listeColonne .= ", $colonne";
            $listeToken   .= ", :$colonne";
        }
        else
        {
            // NE PAS AJOUTER UNE VIRGULE
            $listeColonne .= "$colonne";
            $listeToken   .= ":$colonne";
        }
        
        // NE PAS OUBLIER D'INCREMENTER LE COMPTEUR
        $compteur++;
    }
    
    $requetePrepareeSQL =
<<<CODESQL

INSERT INTO `$nomTable`
( $listeColonne )
VALUES
( $listeToken )

CODESQL;

    // ENVOYER LA REQUETE SQL
    // SECURITE: PROTECTION CONTRE LES INJECTIONS SQL
    // ON SEPARE LES INFOS EXTERIEURES DE LA REQUETE PREPAREE
    $objetPDOStatement = envoyerRequeteSQL($requetePrepareeSQL, $tabAssoColonneValeur);
    
    // RENVOYER $objetPDOStatement POUR AVOIR AUSSI lastInsertId
    return $objetPDOStatement;
}

// Modifier une Ligne SQL
function modifierLigneSQL ($nomTable, $tabAssoColVal, $id)
{
    // CREER LA REQUETE SQL POUR LIRE DANS LA TABLE
    
    $listeColToken = "";
    foreach($tabAssoColVal as $nomCol => $valeurCol)
    {
        $listeColToken .= "$nomCol = :$nomCol, ";
    }
    // ENLEVER LA VIRGULE EN TROP A LA FIN
    $listeColToken = trim($listeColToken, ", ");
    
    // POUR PASSER $id DIRECTEMENT DANS MA REQUETE PREPAREE
    // JE SECURISE EN LE CONVERTISSANT EN NOMBRE
    $id = intval($id);
    
    $requetePrepareeSQL =
<<<CODESQL

UPDATE $nomTable
SET
$listeColToken
WHERE
id = '$id';

CODESQL;

    // CONNECTER A MYSQL
    // ENVOYER LA REQUETE
    // RECUPERER LA LISTE DES LIGNES SELECTIONNEES
    $listeLigne = envoyerRequeteSQL($requetePrepareeSQL, $tabAssoColVal);
    
    // ON RENVOIE $listeLigne POUR POUVOIR FAIRE UNE BOUCLE 
    // ET AINSI AFFICHER LES INFOS 
    return $listeLigne;    

}


/*  Préparation d'une connexion en PDO, avec la Database, userSQL et son password. 
Permets de préparer de façon sécurisé les Requettes SQL au dessus                          */
function envoyerRequeteSQL ($requetePrepareeSQL, $tabAssoColonneValeur)
{
    // ETAPE1: CONNECTER A LA DATABASE MYSQL
    // DSN
    $userSQL     = "root";
    $passwordSQL = "";
    $hostSQL     = "localhost";
    $databaseSQL = "";      
    
    $tabParamProjet = lireParametreProjet();
    // ON VA ECRASER LES ANCIENNES VALEURS 
    // AVEC LES CLES/VALEURS DU TABLEAU ASSOCIATIF
    extract($tabParamProjet);
    
    $dsn = "mysql:localhost=$hostSQL;dbname=$databaseSQL;charset=utf8";
    
    // CREER UN OBJET PDO POUR GERER LA CONNEXION
    $objetPDO = new PDO($dsn, $userSQL, $passwordSQL);
    
    // AFFICHER LES ERREURS SQL EN MODE ERREUR PHP
    $objetPDO -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

    // ETAPE2: PREPARER LA REQUETE SQL
    $objetPDOStatement = $objetPDO->prepare($requetePrepareeSQL);
    
    // ETAPE3: EXECUTE LA REQUETE AVEC LES VALEURS QUI REMPLACENT LES JETONS
    $objetPDOStatement->execute($tabAssoColonneValeur);
    
    // RECUPERER LE DERNIER id D'UNE NOUVELLE LIGNE 
    $objetPDOStatement->monLastInsertId = $objetPDO->lastInsertId();
    
    // A DECOMMENTER POUR DEBUGGER PLUS FACILEMENT
   // $objetPDOStatement->debugDumpParams();
    
    // OPTIMISATION POUR RECUPERER LES INFOS SOUS LA FORME D'UN TABLEAU ASSOCIATIF
    $objetPDOStatement->setFetchMode(PDO::FETCH_ASSOC);
    
    // ON RENVOIE $objPDOStatement
    return $objetPDOStatement;
}
// function addRecetteIngredient($ingrNom,$quantite,$mesure,$bdd){
    
//     $recetteID = $bdd->query("SELECT COUNT(recetteID) FROM recette")->fetchColumn();
//     addingredient($ingrNom,$bdd);
//     $ingredientID = $bdd->query("SELECT ingredientID from ingredient WHERE ingredientNom = '$ingrNom'")->fetchColumn();
//     if(ingredientAlreadyInRecette($ingredientID,$recetteID,$bdd)){
//         return;
//     }
//     $bdd->exec("INSERT INTO recette_ingredients(fkrecetteID,fkingredientID,quantite,mesure) VALUES ($recetteID,$ingredientID,$quantite,'$mesure')");
    
// }