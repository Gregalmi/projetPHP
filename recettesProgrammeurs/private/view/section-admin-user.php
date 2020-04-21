<!-- ///////////////////////////GESTION DES UTILISATEURS////////////////////////////////// -->
        <div class="container border  template ">
            <section >
                <h1 class="text-center">Gestion des Utilisateurs</h1>  
                <p class="text-center">Cher administrateur, ici, vous pourrez effectuer la gestion de vos inscrits. Il est possible d'inscrire un membre et de le supprimer.</p>  
                <br>
                <div class="row justify-content-center">                
                    <!-- ////////////////FORMULAIRE DE CREATION D'UN UTILISATEUR/////////////////  -->
                    <form class="formLogin col-8" action="" method="POST">
                        <h2 class="text-center">Créer un nouvel utilisateur</h2>
                        
                        <div class="form-group">
                            <label for="admLogin">Indiquez le pseudo:<span class="text-danger">*<span></label>
                            <input class="form-control" id="admLogin" type="text" name="login" required placeholder="VOTRE LOGIN" maxlength="100">
                        </div>

                        <div class="form-group">
                            <label for="admEmail">Indiquez l'adresse mail:<span class="text-danger">*<span></label>
                            <input class="form-control" id="admEmail" type="email" name="email" required placeholder="VOTRE EMAIL" maxlength="100">
                        </div>

                        <div class="form-group">
                            <label for="admPassword">Indiquez le mot de passe:<span class="text-danger">*<span></label>  <!-- ATTRIBUT pattern PERMET DE FORCER UN FORMAT PRECIS DANS UNE BALISE INPUT -->
                            <input class="form-control" id="admPassword" type="password" name="password" required placeholder="VOTRE PASSWORD" maxlength="100" 
                            pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$" title="IL FAUT AU MOINS UNE MAJUSCULE, une minuscule ET 1 CHIFFRE">
                        </div>

                        <div class="form-group">
                            <label for="admPassword2">Confirmez le mot de passe:<span class="text-danger">*<span></label>
                            <input class="form-control"id="admPassword2"type="password" name="password2" required placeholder="CONFIRMEZ VOTRE PASSWORD" maxlength="100">
                            <div>(IL FAUT AU MOINS UNE MAJUSCULE, une minuscule ET 1 CHIFFRE)</div>
                        </div>
                        <button class="btn btn-success form-control" type="submit">Créer un utilisateur</button>
                
                        <!-- PARTIE TECHNIQUE -->
                        <input type="hidden" name="identifiantFormulaire" value="user-create">
                        <div class="feedback"><?php echo $userFeedback ?? "" ?></div>
                    </form>
                    </div>
                    <br>
                    <hr>
                    <script>
                        /////////////////////VERIFICATION DES MOTS DE PASSES///////////////////////////
                        document.addEventListener('DOMContentLoaded', function() {
                        var formLogin = document.querySelector(".formLogin");
                        formLogin.addEventListener("submit", function(event) {
                            var password1 = document.querySelector("input[name=password]").value;
                            var password2 = document.querySelector("input[name=password2]").value;
                            console.log(password1);
                            console.log(password2);
                            if (password1 != password2){
                                event.preventDefault();
                                alert('VERIFIEZ LES 2 MOTS DE PASSE');
                            }});
                        });
                    </script>
            </section>

            <?php
                // NOMBRE TOTAL DE MEMBRES
                $nbLigne = compterLigneSQL("rp_user");
            ?>

            <br>
            <section>
                <!-- //////////////////////////////////LISTE DES MEMBRES////////////////////////////////// -->
                <h2 class="text-center">Liste des utilisateurs:</h2>
                <h5>(Il y a <?php echo $nbLigne ?> inscrits)</h5>
                <div class="table-container">
                    <table class="table table-hover">
                        <caption>
                            <div class='row justify-content-center'>                                
                                <img src="assets/galerie/45515.png" class="img-fluid d-block" width="25px" alt="supprimer un utilisateur"> :Supprimer un utilisateur
                            </div>
                        </caption>
                    <thead>
                        <?php
                            $listeLigne = lireTableSQL("rp_user", "use_id");
                            echo
                                <<<CODEHTML
                                            <tr>
                                                <th scope="col">Id</b></th>
                                                <th scope="col">Authorisation</th>
                                                <th scope="col">Pseudo </th>
                                                <th scope="col">Email</th>
                                                <th scope="col">Date d'inscription</th>
                                                <th scope="col">Avatar</th>
                                                <th scope="col"><img src="assets/galerie/45515.png" class="img-fluid rounded mx-auto d-block" width="25px" alt="supprimer un utilisateur"></th>
                                            <tr>
                                        </thead>
                                    <tbody>
                                CODEHTML;

                            foreach($listeLigne as $tabLigne){
                                extract($tabLigne);
                                // CONSTRUIRE LE CODE HTML AVEC CES INFOS
                                echo
                                    <<<CODEHTML
                                        <tr>
                                            <th scope="row">$use_id</th>
                                            <td>$use_level</td>
                                            <td> $use_login </td>
                                            <td>$use_email</td>
                                            <td>$use_date</td>
                                            <td>$use_img</td>
                                            <td><a href="?identifiantFormulaire=user-delete&use_id=$use_id" class="text-danger"><img src="assets/galerie/45515.png" class="img-fluid rounded mx-auto d-block" width="25px" alt="supprimer un utilisateur" title="supprimer un utilisateur"></a></td>
                                        </tr>    
                                    CODEHTML;
                            }
                        ?>
                            </tbody>
                        </table>
                    </div>
                </div>            
            </section>
        </div>