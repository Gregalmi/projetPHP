<!-- /////////////////////////////PAGE D'UNE RECETTE////////////////////////////////// -->

<section class="container template border">
    <div class="row justify-content-between">
        <a href="recettes.php" class="btn  btn-outline-secondary" role="button" aria-pressed="true">Toutes les recettes</a>
        
        <!-- APPARITION DU BOUTON VERS MES RECETTES DANS MEMBRE -->
        <?php
            $use_level = lireSession("use_level");
            if ($use_level >= 1){
                echo 
                    <<<CODEHTML
                        <a href="mes-recettes.php" class="btn   btn-outline-success" role="button" aria-pressed="true">Mes recettes</a>
                    CODEHTML;
            }
        ?>
    </div>   
    
    <!-- FAIRE APPARAITRE TOUTES LES DONNEES D'UNE RECETTE -->
    <?php
        function lireJointureSQLGREGetape($nomTable, $valeurColonne, $nomColonne, $nomTableJointure, $nomColonneJointure, $nomColonneTable){
            // CONSTRUIRE UNE REQUETE PREPAREE
            $requetePrepareeSQL =
                <<<CODESQL
                    SELECT `eta_text`
                    FROM `$nomTable`
                    INNER JOIN `$nomTableJointure`
                    ON $nomTableJointure.$nomColonneJointure = $nomTable.$nomColonneTable
                    WHERE `rp_recette`.$nomColonne = :$nomColonne
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


        function lireJointureSQLGREG3 ($nomTable, $valeurColonne, $nomColonne, $nomTableJointure, $nomTableJointure2, $nomColonneJointure, $nomColonneTable, $nomColonneTable2, $nomColonneJoiture2){
            // CONSTRUIRE UNE REQUETE PREPAREE
            $requetePrepareeSQL =
                <<<CODESQL
                    SELECT `ing_nom`, `qua_quantite`, `qua_mesure` 
                    FROM `$nomTable`
                    INNER JOIN `$nomTableJointure`
                    ON $nomTableJointure.$nomColonneJointure = $nomTable.$nomColonneTable
                    INNER JOIN `$nomTableJointure2`
                    ON $nomTableJointure.$nomColonneTable2	= $nomTableJointure2.$nomColonneJoiture2
                    WHERE $nomTable.$nomColonne = :$nomColonne;
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

        // ON VA AFFICHER LA LISTE DES RECETTES
        $rec_id             = filtrerEntier("rec_id");
        $eta_id             = filtrerEntier("eta_id");
        //$listeRecette   = lireLigneSQL("rp_recette", $rec_id, "rec_id");
        $listeRecette   = lireJointureSQLGREG("rp_recette", $rec_id, "rec_id", "rp_user", "use_id", "rec_fk_user_id");
        $listeRecette2   = lireJointureSQLGREG("rp_recette", $rec_id, "rec_id", "rp_categorie", "cat_id", "rec_fk_categorie_id");
        $listeRecette3   = lireJointureSQLGREG("rp_recette", $rec_id, "rec_id", "rp_difficulte", "dif_id", "rec_fk_difficulte_id");
        $listeRecette4   = lireJointureSQLGREG("rp_recette", $rec_id, "rec_id", "rp_prix", "pri_id", "rec_fk_prix_id");
        $listeRecette5 = lireJointureSQLGREG3("rp_recette", $rec_id, "rec_id", "rp_quantite", "rp_ingredient", "qua_fk_recette_id", "rec_id", "qua_fk_ingredient_id", "ing_id" );
        $listeRecette6 = lireJointureSQLGREGetape("rp_etape", $rec_id, "rec_id", "rp_recette","rec_id", "eta_fk_recette_id");

        foreach($listeRecette4 as $recette4)
        {
            extract($recette4);
        }
        foreach($listeRecette3 as $recette3)
        {
            extract($recette3);
        }
        foreach($listeRecette2 as $recette2)
        {
            extract($recette2);
        }
        // PARCOURIR LA LISTE POUR RECUPERER CHAQUE LIGNE
        foreach($listeRecette as $recette)
        {
         
            extract($recette);
        }
   
        $color = choisirCouleur($rec_fk_categorie_id);
        echo
            <<<CODEHTML
                <h1 class="text-center $color">$rec_nom</h1>
                <h6 class="text-center">Créé par $use_login le $rec_date</h6>
                <span class="badge badge-secondary text-center">{$cat_nom}</span>
                <div class="row justify-content-center">
                    <figure><img src="$rec_img" class="img-fluid rounded mx-auto d-block"></figure>
                    <div class="row justify-content-around col-lg-8">
                        <h5 class="text-center">Temps: $rec_temps</h5>
                        <h5 class="text-center">Difficulté : $dif_nom</h5>
                        <h5 class="text-center">Coût : $pri_nom</h5>
                    </div>
                    <br><br> <br><br> 
                </div>
                <div class="row">
                    <div class="col-4">
                        <h2 class="$color">Les ingrédients</h2>
                            <ul class="list-group list-group-flush">
            CODEHTML;

            while ($ingredients = $listeRecette5->fetch()){
                echo '<li class="list-group-item">';
                foreach ($ingredients as $key => $value){
                    echo ' '.$value.' ';
                }
                echo "</li>";
            }
            echo 
                <<<CODEHTML
                    </div>
                    <div class="col-8">
                        <h2 class="$color">Préparation:</h2>
                        <ol class="list-group list-group-flush">
                CODEHTML;

                while ($etapes = $listeRecette6->fetch()){
                    echo '<li class="list-group-item">';
                    foreach ($etapes as $key => $value) {
                        echo $value;
                    }
                    echo "</li>";
                }
                echo 
                    <<<CODEHTML
                                            <div class="col-12">
                                            <h4>Note du Programmeur:</h4>
                                            <p >$rec_description</p>
                                        </div> 
                                    </ol> 
                                </div>
                            </div>
                        </div>
                    CODEHTML;
    ?>
</section>