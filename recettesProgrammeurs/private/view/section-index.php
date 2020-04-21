
<!-- //////////////////////////////PAGE ACCUEIL////////////////////////////////// -->
<div class="container-fluid  entete enteteAccueil text-white justify-content-center align-items-center">
  
 <div class="container"><!-- TITRE -->
    <h1 class="text-center text-light">&lt;	&#47;Les Recettes du Progr@mmeur&gt;</h1>
    <p class="text-center text-light">&#123;Bienvenue sur le site officiel de la communauté des progr@mmeurs cuisiniers ! &#125;</p>
    <?php
        $recetteHonneur= lireJointureSQLGREG("rp_recette", "31", "rec_id", "rp_categorie", "cat_id", "rec_fk_categorie_id");
        // RECUPERER CHAQUE LIGNES
        ////////////////////RECETTE A L'HONNEUR///////////////////////
        foreach($recetteHonneur as $recette){  
          extract($recette); 
          $color= choisirCouleur("rec_fk_categorie_id");          
          echo
            <<<CODEHTML
                  <h2 class="text-light text-center"><a class="text-light text-center" href="template-recette.php?rec_id=$rec_id">&#47;&#47;	La Recette du jour :</a></h2>
                </div>
              </div>
              <div class="container border template">
                <div class="row justify-content-center">
                  <div class="card col-lg-8  col-mb-4 card-honneur container" style="margin-top:-10%;">
                    <div class="card-body listeRecette row justify-content-center">
                      <img class="card-img-top img-honneur" src="$rec_img" alt="Card image cap" style="margin: 1%; width: 99% ">
                        <p class="text-center badge badge-danger">$cat_nom</p>
                        <h3 class="card-title $color text-center"><a class="text-danger" href="template-recette.php?rec_id=$rec_id" >$rec_nom</a></h3>
                        <p class="text-card">$rec_description</p>
                    </div> 
            CODEHTML;
        }
    ?>
  </div>  
</div> 
<br>
<br>
<hr>
<br>
<!-- //////////////////////////MENU DU JOUR///////////////////////////////// -->
<section class="container ">
  <h2 class="text-center">Menu du jour</h2>
  <h6 class="text-center">Équilibre et plaisir pour toute la famille</h6>
  <br>
  <div class="">
    <div class="row justify-content-center">
      <div class="card-deck col-lg-10" >
        <?php
          // 2, 3, 4
          $entreeJour= lireJointureSQLGREG("rp_recette", "33", "rec_id", "rp_categorie", "cat_id", "rec_fk_categorie_id");
          $platJour= lireJointureSQLGREG("rp_recette", "35", "rec_id", "rp_categorie", "cat_id", "rec_fk_categorie_id");
          $dessertJour= lireJointureSQLGREG("rp_recette", "38", "rec_id", "rp_categorie", "cat_id", "rec_fk_categorie_id");          
          //  RECUPERER CHAQUE RECETTE
          //////////////////////ENTREE///////////////////////
          foreach($entreeJour as $entree){  
            extract($entree);
            echo
              <<<CODEHTML
                <div class="card">
                  <img src="$rec_img" class="card-img-top" alt="entrée">
                  <div class="card-body">
                    <h5 class="card-title text-center"><a class="text-success" href="template-recette.php?rec_id=$rec_id" >$rec_nom</a></h5>
                    <p class="card-text">$rec_description</p>
                  </div>
                  <div class="card-footer bg-success text-light">
                    <h6>$cat_nom<h6>
                  </div>
                </div>
              CODEHTML;

              ////////////////////PLAT///////////////////////
              foreach($platJour as $plat){  
                extract($plat); 
                echo
                  <<<CODEHTML
                    <div class="card">
                      <img src="$rec_img" class="card-img-top" alt="entrée">
                      <div class="card-body">
                        <h5 class="card-title text-warning text-center"><a class="text-warning" href="template-recette.php?rec_id=$rec_id" >$rec_nom</a></h5>
                        <p class="card-text">$rec_description</p>
                      </div>
                      <div class="card-footer bg-warning">
                        <h6>$cat_nom<h6>
                      </div>
                    </div>
                  CODEHTML;

              /////////////////////DESSERT/////////////////////
              foreach($dessertJour as $dessert){             
                extract($dessert); 
                echo
                  <<<CODEHTML
                    <div class="card">
                      <img src="$rec_img" class="card-img-top" alt="entrée">
                      <div class="card-body">
                        <h5 class="card-title text-danger text-center"><a class="text-danger" href="template-recette.php?rec_id=$rec_id" >$rec_nom</a></h5>
                        <p class="card-text">$rec_description</p>
                      </div>
                      <div class="card-footer bg-danger text-light">
                        <h6>$cat_nom<h6>
                      </div>
                    </div>
                  CODEHTML;
                }
              }
            }
        ?>
      </div>
    </div>
  </div> 
</section>
<br>
<br>

<!-- ////////////////////////////////BOUTON VERS MES RECETTES///////////////////////////////// -->
<div class="container">
    <div class="row justify-content-center align-items-center">
      <a href="recettes.php" class="btn btn-lg btn-lg-10 btn-primary " role="button" aria-pressed="true">Je veux manger autre chose</a>
    </div>
  </div>
</div>

<!-- /////////////////////////////////BANDEAU APPEL ACTION VERS  CONTACT/////////////////////////// -->
<div class="container-fluid  piedPage color text-white justify-content-center align-items-center" >
  <h2 class="text-light text-center">Envie de nous écrire ?</h2>
  <p class="card-text text-center">Surtout n'hésitez pas et suivez le lien!</p>
  <div class="row justify-content-center ">
    <a href="contact.php" class="btn btn-lg  col-lg-6 btn-outline-light" role="button" aria-pressed="true">Nous contacter</a>
  </div>
</div>


