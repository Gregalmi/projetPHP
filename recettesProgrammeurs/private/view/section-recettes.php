<!-- ///////////////////////////////PAGE RECETTES/////////////////////////////// -->
<?php
  // CONNAITRE LE NOMBRE TOTAL DE RECETTES
  $nbLigne = compterLigneSQL("rp_recette");
?>

<!-- //////////////////////////ENTETE AVEC FORMULAIRE DE RECHERCHE//////////////////////////////// -->
<div class="container-fluid  entete enteteRecettes text-white justify-content-center align-items-center" >
  <h1 class="text-center text-light">Toutes nos recettes :</h1>
  <p class="text-center text-light">En manque d'inspiration ? Parcourez toutes les recettes de notre communauté ou choisissez une catégorie.</p>

    <form class=" form-row my-1  justify-content-center" action ='' >
      <select class="form-control  col-md-4">
        <option name="categorie" value="">Nos catégories</option>
        <option name="categorie" value="1">Apéritif</option>
        <option name="categorie" value="2">Entrée</option>
        <option name="categorie" value="3">Plat Principal</option>
        <option name="categorie" value="4">Dessert</option>
        <option name="categorie" value="5">Boissons</option>
      </select>
      <button type="submit" class="btn col-2 justify-self-end btn-danger">Submit</button>
    </form>
  </div>
</div>

<!-- LISTE DE TOUTES LES RECETTES DU SITE -->
<div class="container border template">
  <h6>IL Y A <?php echo $nbLigne ?> RECETTES</h6>
  
  <div class="row justify-content-center">

    <div class="card-columns col-lg-10 listeRecette ">
        <?php

        $listeRecette = lireTableSQL ("rp_recette", "rec_id" , $limit=20, $offset=0);

        foreach($listeRecette as $recette){
          // dump($recette);
            extract($recette);
          //  CHOISIR LA COULEUR DE LA RECETTE
            $color = choisirCouleur($rec_fk_categorie_id);
            //AFFICHER LES RECETTES
          echo
              <<<CODEHTML
                <div class="col mb-4">
                  <div class="card" style="overflow: hidden">
                    <img src="$rec_img" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h4 class="card-title "><a class=" $color" href="template-recette.php?rec_id=$rec_id">$rec_nom</a></h4>  
                    </div>      
                  </div>
                </div>
              CODEHTML;
        }
      ?>
    </div>
  </div>
</div>
   
<!-- /////////////////////////BANIERE GRAPHIQUE BOUTON VERS INSCRIPTION///////////////////////////////// -->
<div class="container-fluid  piedPage text-white justify-content-center align-items-center" >
    <h2 class="text-light text-center">Pour créer mes propres recettes ?</h2>
    <p class="text-light text-center">Faites partie de la communauté en vous inscrivant dès à présent, vous pourrez poster vos propres recettes.</p>
<div class="row justify-content-center">
    <a href="inscription.php" class="btn btn-lg  col-lg-6 btn-outline-light color" role="button" aria-pressed="true">S'inscrire</a>
</div>
</div>

