<!-- //////////////////////PAGE GESTION DES CONTACTS///////////////////////// -->
    <div class="container template border">
        <section>
            <h2 class="text-center">Gestion des Contacts</h2>
            <p>Ici cher administrateur, vous pourrez vérifier tous les messages qui vous sont envoyés et les suprimer.</p>
            <br><br>
        </section>
            <?php
                //NOMBRE DE MEMBRES INSCRITS
                $nbLigne = compterLigneSQL("rp_contact");
            ?>
        <section>
            <h6>(Il y a <?php echo $nbLigne ?> message(s))</h6>
            <div class="table-container">      
                <!-- ////////////////////////////////TABLES MESSAGES///////////////////////-->
                <?php
                    $listeLigne = lireTableSQLAll("rp_contact");
                        echo
                            <<<CODEHTML
                                <table class="table table-hover"> 
                                    <caption>
                                        <div class='row justify-content-center'>                                
                                            <img src="assets/galerie/45515.png" class="img-fluid d-block" width="25px" alt="supprimer un courier"> :Supprimer un courier
                                        </div>
                                    </caption>
                                    <thead>
                                        <tr>
                                            <th scope="col">Id</th>
                                            <th scope="col">Utilisateur</th> 
                                            <th scope="col">Objet</th>
                                            <th scope="col">Message</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Date de réception</th>
                                            <th scope="col"><img src="assets/galerie/45515.png" class="img-fluid rounded mx-auto d-block" width="25px" alt="supprimer un courier"></th>
                                        <tr>
                                    </thead>
                                <tbody>
    
                            CODEHTML;


                        foreach($listeLigne as $tabLigne){
                            // EXTRAIRE LES INFOS DE CHAQUE COLONNE
                            extract($tabLigne);
                            echo
                                <<<CODEHTML
                                    <tr>
                                        <th scope="col">$con_id</th>
                                        <td> $con_nom </td>
                                        <td>$con_sujet</td>
                                        <td>$con_text</td>
                                        <td>$con_email</td>
                                        <td>$con_date</td>
                                        <td><a href="?identifiantFormulaire=contact-delete&con_id=$con_id">
                                            <img src="assets/galerie/45515.png" class="img-fluid rounded mx-auto d-block" width="25px" alt="supprimer le message" title="supprimer le message"></a></td>
                                        </tr>    
                                    CODEHTML;
                        }
                ?>
                    </tbody>
                </table>
            </div>
        </section>
    </div>