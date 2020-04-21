<!-- /////////////////////////PAGE MES RECETTES//////////////////////////// -->
<div class="container-fluid entete enteteMesRecettes justify-content-center align-items-center" >
    <?php
        $use_login = lireSession("use_login");
        echo 
            <<<CODEHTML
                <h1 class="text-center text-white">Les recettes de $use_login</h1>
                <p class="text-center text-white">Bonjour $use_login,</p> 
            CODEHTML;

            //NOMBRE TOTAL DE RECETTES
        $nbLigne = compterLigneSQL("rp_recette", "rec_fk_user_id", $_SESSION["use_id"]);
    ?>
</div>

<div class="container template border">
    <div class="row justify-content-between">        
        <a href="index.php" class="btn   btn-outline-success" role="button" aria-pressed="true">Retour Accueil</a>
        <a href="logout.php" class="btn  btn-outline-danger" role="button" aria-pressed="true">Se déconnecter</a>
    </div>   
    <br>
    <br>
    <h6 class="text-center">De nouvelles idées à partager ? Je fonce...</h6>
    <br>
    <br>
    <!-- ////////////////////////BOUTON VERS LE FORMULAIRE DE CREATION DE RECETTES///////////////////////// -->
    <div class="row justify-content-center">
        <a href="mes-recettes-create.php" class="btn btn-lg  col-lg-6 btn-success text-center" role="button" aria-pressed="true">Créer une nouvelle recette</a>
    </div>
    <hr>
    <h3 class="text-center">Liste de mes recettes</h3>
    <br>
    <h6>(Vous avez <?php echo $nbLigne ?> recettes)</h6>
    <nav>
         <ul>
            <?php
                // BOUCLE POUR CREER LE BON NOMBRE DE LIENS DE PAGINATION
                $limit  = 5;                    
                // ARRONDIR AU SUPERIEUR
                $nbPage = ceil($nbLigne / $limit);
                creerPaginationHtml($limit, $nbPage);
            ?>
        </ul>
    </nav>
    <table>
        
    <?php
        // ON RECUPERE LA PAGE A AFFICHER DEPUIS L'URL EN GET ?page=123
        $page   = filtrerEntier("page", 1);
        $offset = ($page -1) * $limit;
        // SI ON NE PRECISE PAS LA PAGE ALORS ON EST SUR LA PAGE 1
        $listeRecette = lireLigneSQL("rp_recette", $_SESSION["use_id"],"rec_fk_user_id" );
        // LECTURE DES RESULTATS
        /////////////////////////////TABLEAU DE RECETTES////////////////////////////////////
        echo
            <<<CODEHTML
                <br>
                    <table class="table table-hover">
                        <caption>
                            <div class='row justify-content-center'>
                                <img src="assets/galerie/51651.png" class="img-fluid d-block" width="30px"  alt="Voir ma recette"> :Voir ma recette |
                                <img src="assets/galerie/44314.png" class="img-fluid d-block" width="25px"  alt="Modifier ma recette"> :Modifier ma recette |
                                <img src="assets/galerie/45515.png" class="img-fluid d-block" width="25px" alt="supprimer ma recette"> :Supprimer ma recette
                            </div>
                        </caption>
                    <thead>
                        <tr>
                            <th scope="col">Photo</th>
                            <th scope="col">Nom</th>
                            <th scope="col">Description</th>
                            <th scope="col">Publication</th>
                            <th scope="col"><img src="assets/galerie/51651.png" class="img-fluid  d-block" width="30px"  alt="voir ma recette"></th>
                            <th scope="col"><img src="assets/galerie/44314.png" class="img-fluid  d-block" width="25px"  alt="modifier ma recette"></th>
                            <th scope="col"><img src="assets/galerie/45515.png" class="img-fluid  d-block" width="25px" alt="supprimer ma recette"></th>
                        </tr>
                    </thead>
                <tbody>
            CODEHTML;

            foreach($listeRecette as $tabRecette){
                //ON RECUPERE LA LISTE DES RECETTES
                extract($tabRecette);
                // var_dump($tabRecette);
                $description =substr($rec_description, 0, 20).'...';
                // $rec_miniSrc = str_replace("/upload/", "/mini/", $rec_img);
                echo 
                    <<<CODEHTML
                        <tr>
                            
                            <td scope="row"> <img src="$rec_img" class="img-fluid rounded mx-auto d-block" width="200px" ></td> 
                            <td>$rec_nom</td>
                            <td>$description</td>
                            <td> $rec_date</td>
                            <td><a href="template-recette.php?rec_id=$rec_id"><img src="assets/galerie/51651.png" class="img-fluid  d-block" width="30px"  alt="voir ma recette" title="voir ma recette"></a></td>
                            <td><a href="mes-recette-update.php?rec_id=$rec_id"><img src="assets/galerie/44314.png" class="img-fluid  d-block" width="25px"  alt="modifier ma recette" title="modifier ma recette"></a></td>
                            <td><a href="?identifiantFormulaire=recette-delete&rec_id=$rec_id" class="text-danger"><img src="assets/galerie/45515.png" class="img-fluid  d-block" width="25px" alt="supprimer ma recette" title="supprimer ma recette"></a></td>
                        </tr>
                    CODEHTML;
            }

    ?>        
        </table>
    </div>
</section>

