<!-- /////////////////////////PAGE MES-RECETTES-CREATE///////////////////////////////////// -->
<div class="container template border">
    <div class="row justify-content-between">
        <a href="recettes.php" class="btn  btn-outline-secondary" role="button" aria-pressed="true">Toutes les recettes</a>
        <a href="mes-recettes.php" class="btn   btn-outline-success" role="button" aria-pressed="true">Mes recettes</a>
    </div>   

    <section >
        <h1 class="text-center">Créer une nouvelle recette:</h1>
        <p>Les champs marqués d'un * sont obligatoires</p>
    </section>

    <section >
        <form class="formCreation" method="POST" action="" enctype="multipart/form-data">
            <h4>Votre Recette:</h4>
         <!-- :::::::::::::::::::::::NOM DE LA RECETTE::::::::::::::::::::::::::::::::::: -->
             <div class="form-group">
                <label for="rec_nom">Indiquez le titre de votre recette:<span class="text-danger">*</span></label>
                <input id="rec_nom" class="form-control" type="text" name="rec_nom" placeholder="Titre de la recette" requi >
            </div>

            <div class="form-group">
                <label for="rec_description">Note du Programmeur:</label>
                <textarea id="rec_description"class="form-control" type="text" name="rec_description"  placeholder="Donnez une légère description de votre recette"></textarea>
            </div>

            <div class="form-group">
                <input type="file" class="" type="file" name="rec_img"  placeholder="l'image de votre recette">
            </div>
            <hr>

         
        
            <h4>Ses Caractéristiques:</h4>
            <!-- :::::::::::::::::::::::CATEGORIES::::::::::::::::::::::::::::::::::: -->
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="rec_fk_categorie_id">Catégorie de la recette:<span class="text-danger">*</span></label>
                    <select class="form-control" name="rec_fk_categorie_id" id="rec_fk_categorie_id">
                        <option name="rec_fk_categorie_id" value="">Veuillez choisir la catégorie de votre recette:</option>
                    <option name="rec_fk_categorie_id" value="1">Apéritif</option>
                        <option name="rec_fk_categorie_id" value="2">Entrée</option>
                        <option name="rec_fk_categorie_id" value="3">Plat principal</option>
                        <option name="rec_fk_categorie_id" value="4">Dessert</option>
                        <option name="rec_fk_categorie_id" value="5">Boisson</option>
                    </select>
                </div>

                <div class="form-group col-md-6">
                    <label for="rec_fk_prix_id">Coût moyen de la recette:<span class="text-danger">*</span></label>
                    <!-- :::::::::::::::::::::::PRIX::::::::::::::::::::::::::::::::::: -->
                    <select class="form-control" name="rec_fk_prix_id" id="rec_fk_prix_id">
                        <option name="rec_fk_prix_id" value="">Veuillez choisir le prix de la recette:</option>
                        <option name="rec_fk_prix_id" value="1">très bon marché</option>
                        <option name="rec_fk_prix_id" value="2">bon marché</option>
                        <option name="rec_fk_prix_id" value="3">cher</option>
                        <option name="rec_fk_prix_id" value="4">très cher</option>
                    </select>
                </div>

                <div class="form-group col-md-6">
                    <label for="rec_fk_difficulte_id">Niveau de difficulte de la recette:<span class="text-danger">*</span></label>
                        <!-- :::::::::::::::::::::::DIFFICULTE::::::::::::::::::::::::::::::::::: -->
                    <select class="form-control" name="rec_fk_difficulte_id" id="rec_fk_difficulte_id">
                        <option name="rec_fk_difficulte_id" value="">Veuillez choisir le niveau de difficulte de la recette:</option>
                        <option name="rec_fk_difficulte_id" value="1">très facile</option>
                        <option name="rec_fk_difficulte_id" value="2">facile</option>
                        <option name="rec_fk_difficulte_id" value="3">difficile</option>
                        <option name="rec_fk_difficulte_id" value="4">très difficile</option>
                    </select>
                </div>

                <!-- :::::::::::::::::::::::TEMPS DE PREPARATION::::::::::::::::::::::::::::::::::: -->
                <div class="form-group col-md-6 preparation">
                    <label for="rec_temps">Temps total de préparation:<span class="text-danger">*</span></label>        
                    <input id="rec_temps" class="form-control" type="time" name="rec_temps" placeholder="Temps total de préparation...">
                    <!-- <input type="time" name="preparation" placeholder="Temps de préparation...">
                    <input type="time" name="cuisson" placeholder="Temps de cuisson"> -->
                </div>
            </div>
            <hr>

         <!-- :::::::::::::::::::::::INGREDIENTS::::::::::::::::::::::::::::::::::: -->
            <h4>Ses Ingrédients:</h4>
            <div class="form-row  justify-content-between"id="ingr">
                <div class="form-group col-md-4">
                    <label for="ing_nom">Indiquez le nom de l'ingrédient:<span class="text-danger">*</span></label>
                    <input id="ing_nom"class="form-control " type="text" name="ing_nom" placeholder="ingredient">
                </div>
                <div class="form-group col-md-3">
                    <label for="qua_quantite">Quantité:<span class="text-danger">*</span></label>
                    <input id="qua_quantite" class="form-control " type="number" name="qua_quantite" placeholder="quantite de l'ingrédient">
                </div>
                <div class="form-group col-md-3">
                    <label for="qua_mesure">Mesure utilisée(g, ml,...):<span class="text-danger">*</span></label>
                    <input id='qua_mesure' class="form-control " type="text" name="qua_mesure" placeholder="mesure de l'ingrédient">
                </div>            
                <a class="col-md-1 align-self-center" href="javascript:ajouterIng();" id="ajouterIngredient" name=" ajouter" value="ajouterIngredient"> + 1</a>
            </div>

            <!-- :::::::::::::::::::::::ETAPES DE  LA RECETTES::::::::::::::::::::::::::::::::::: -->
            <hr>
            <h4>Les Etapes de sa Préparation :</h4>
            <div class="form-group">
                <label for="etape1">Indiquez les différentes étapes de votre ressette:<span class="text-danger">*</span></label>
                <!-- faire une fonction pour  faire apparaitre d'autre lignes ETAPE si besoin -->
                <input id="etape1" class="form-control" type="text" name="etape1"  placeholder="etape1">
            </div>
            <div class="form-group">
                <input id="etape2"class="form-control" type="text" name="etape2"  placeholder="etape2">
            </div>
            <div class="form-group">
                <input id="etape3"class="form-control" type="text" name="etape3" placeholder="etape3">
            </div>
            <div class="form-group">
                <input id="etape4"class="form-control" type="text" name="etape4"  placeholder="etape4">
            </div>
            <div class="form-group">
                <input id="etape5"class="form-control" type="text" name="etape5" placeholder="etape5"> 
            </div>
            <div class="form-group">
                <input id="etape6"class="form-control"  type="text" name="etape6" placeholder="etape6">
            </div>
            <div class="form-group">
                <input id="etape7"class="form-control" type="text" name="etape7" placeholder="etape7">
            </div>
            <div class="form-group">
                <input id="etape8"class="form-control" type="text" name="etape8" placeholder="etape8">
            </div>
            <div class="form-group">
                <input id="etape9"class="form-control" type="text" name="etape9"  placeholder="etape9">
            </div>
            <div class="form-group">
                <input id="etape10"class="form-control" type="text" name="etape10" placeholder="etape10">
            </div>
            <!-- <span id="etape" onclick="ajouter('ajouterEtape')">+</span> -->    

            <!-- :::::::::::::::::::::::ENVOYER LE FORLULAIRE::::::::::::::::::::::::::::::::::: -->
            <button class="btn btn-success form-control"type="submit">Publier votre Recette</button>
            <!-- PARTIE TECHNIQUE -->
            <input type="hidden" name="identifiantFormulaire" value="recette-create">
            <div class="feedback">
                <?php echo $recetteFeedback ?? "" ?>              
            </div>    
        </form>
    </section>
</div>


<script language="javascript" type="text/javascript">
            function ajouterIng() {
                let ajout = document.getElementById("ingr");
                ajout.insertAdjacentHTML ('afterend', 
                    `<div class="form-row  justify-content-between">
                        <div class="form-group col-md-4">
                            <input class="form-control" type="text" name="ing_nom" placeholder="ingredient">
                        </div>
                        <div class="form-group col-md-3">
                            <input class="form-control" type="number" name="quantite-ingredient" placeholder="quantite de l'ingrédient">
                        </div>
                        <div class="form-group col-md-3">
                            <input class="form-control" type="text" name="qua_mesure" placeholder="mesure de l'ingrédient">
                        </div>                    
                        <span class="col-md-1 align-self-center" > <span class="text-danger">
                    </div>`);
            }
</script> 








