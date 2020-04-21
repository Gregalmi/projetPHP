<?php


// Déclaration des variables 
    $etapes=array(filtrerInfo("etape1"),filtrerInfo("etape2"),filtrerInfo("etape3"),
    filtrerInfo("etape4"),filtrerInfo("etape5"),filtrerInfo("etape6"),
    filtrerInfo("etape7"),filtrerInfo("etape8"),filtrerInfo("etape9"), filtrerInfo("etape10"));   
  
    $rec_id     = filtrerInfo("rec_id");
    $rec_nom    = filtrerInfo("rec_nom");
    $rec_fk_prix_id = filtrerInfo("rec_fk_prix_id");
    $rec_fk_difficulte_id = filtrerInfo("rec_fk_difficulte_id");
    $rec_temps = filtrerInfo("rec_temps");
    $rec_fk_categorie_id = filtrerInfo("rec_fk_categorie_id");
    $qua_fk_recette_id = $rec_id;
    $rec_description = filtrerInfo("rec_description");
    $rec_img = filtrerUpload("rec_img");
    $ing_id = filtrerInfo("ing_id");
    $ing_nom = filtrerInfo("ing_nom");
    $qua_fk_ingredient_id = $ing_id;
    $qua_quantite = filtrerInfo("qua_quantite");
    $qua_mesure = filtrerInfo("qua_mesure");


  //ETAPE 1 :  Vérification du nom de recette
if ( ($rec_nom != "") && ($rec_description != "") && ($rec_fk_categorie_id != ""))
{
                    
//         // DONNER LE MESSAGE A AFFICHER EN FEEDBACK
    
    $datePublication = date("Y-m-d H:i:s"); 
    $rec_fk_user_id = lireSession("use_id");               // ON RECUPERE user_id DE LA SESSION
    
    // STOCKER LES INFOS DANS LA TABLE SQL Recette
    
    $objetPDOStatement = insererLigneSQL("rp_recette", [
        "rec_nom"             => $rec_nom,
        "rec_temps"           => $rec_temps,
        "rec_description"   => $rec_description,
        "rec_img"          => $rec_img,
        "rec_fk_user_id"         => $_SESSION["use_id"],
        "rec_fk_prix_id"          => $rec_fk_prix_id,
        "rec_fk_difficulte_id"          => $rec_fk_difficulte_id,
        "rec_fk_categorie_id"          => $rec_fk_categorie_id,
        "rec_date"   => $datePublication,
        // "re_fk_us_id"           => $user_id,
        ]);
    
            // IL ME FAUT id QUI VIENT D'ETRE CREE POUR LA NOUVELLE LIGNE
    $last_rec_id = $objetPDOStatement->monLastInsertId;
    
    // DONNER LE MESSAGE A AFFICHER EN FEEDBACK
    $recetteFeedback = "Votre recette a bien été publiée.";

      
          
        
          
    // Etape 2 INGREDIENT :

        $ing_nom_count = compterLigneSQL("rp_ingredient", "ing_nom", $ing_nom);

        $ing_nom_lire = lireLigneSQL("rp_ingredient", $ing_nom, "ing_nom");
       
    // Si aucun ingrédient avec ce nom est en BDD, alors l'insérer
    if($ing_nom_count < 1 ) {

            $objetPDOStatement = insererLigneSQL("rp_ingredient", [
                "ing_nom"             => $ing_nom,
                
                ]);

                // dernière id de l'ingrédient
            $last_ing_id = $objetPDOStatement->monLastInsertId;

            
        }// Si déja en BDD, récupérer son ID
        else{

            foreach($ing_nom_lire as $ing_col_lire){

                extract($ing_col_lire);
            };
          


            $last_ing_id = $ing_id;

        }
    }
        

        // ETAPE 3: Insérer les quantités et mesures de chaque ingrédient pour une recette
        
        
        $objetPDOStatement = insererLigneSQL("rp_quantite", [
            "qua_fk_recette_id"             => $last_rec_id,
            "qua_fk_ingredient_id"           => $last_ing_id,
            "qua_quantite"          => $qua_quantite,
            "qua_mesure"         => $qua_mesure,
            ]);
        

        // ETAPE 4: Insérer toutes les etapes d'une recette dans la table ETAPE

            for($i = 0;$i<count($etapes);$i++){
     
                if($etapes[$i] != ""){
                    $objetPDOStatement = insererLigneSQL("rp_etape", [

                    "eta_text" => $etapes[$i],
                    "eta_fk_recette_id" => $last_rec_id,

                 ]);
            }
            
        

    }
         
    // Affichage de bonne création de la recette sur le Navigateur.
<<<CODEHTML

        <p>VOTRE RECETTE EST PUBLIEE</p>
        <div><a href="template-recette.php?id=$rec_id">CLIQUER ICI POUR VOIR VOTRE RECETTE</a></div>
       
CODEHTML;
   


// if(ingredientAlreadyInRecette($ingredientID,$recetteID,$bdd
// )){
//  return;
// }
//  $bdd->exec("INSERT INTO
// recette_ingredients(fkrecetteID,fkingredientID,quantite,mes
// ure) VALUES
// ($recetteID,$ingredientID,$quantite,'$mesure')");

//  } 
?>


