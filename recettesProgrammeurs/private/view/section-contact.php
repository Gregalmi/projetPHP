<!-- /////////////////////////////////PAGE CONTACT///////////////////////////////////// -->
<div class="container-fluid backg backgContact ">
    <section id="contact" class="container" >
        <div class="row justify-content-center align-items-center">
            <div class="card col-lg-8 texture" style="padding:4rem">
                <h2 class="text-center">Nous contacter</h2>
    
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="nom">Indiquez votre nom:</label>
                        <input id="nom" type="text" class="form-control"name="con_nom" required placeholder="VOTRE NOM" maxlength="100">
                    </div>

                    <div class="form-group">    
                        <label for="con_email">Indiquez votre email:</label> 
                        <input id="con_email" type="email" class="form-control"name="con_email" required placeholder="VOTRE EMAIL" maxlength="100">
                    </div>

                    <div class="form-group">    
                        <label for="objet">Indiquez l'objet de votre message:</label> 
                        <input id="objet" class="form-control" type="text" name="con_sujet" required placeholder="Le sujet de votre demande" maxlength="100">
                 </div>

                    <div class="form-group">
                        <label for="message">Votre message:</label>
                        <textarea id="email" class="form-control"required name="con_text" placeholder="VOTRE MESSAGE"></textarea>
                    </div>

                    <button type="submit" class="btn btn-success form-control">Envoyer</button>
                    <!-- PARTIE TECHNIQUE -->
                    <input type="hidden" name="identifiantFormulaire" value="contact-visiteur">
                    <div class="feedback">
                        <?php echo $contactFeedback ?? "" ?>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
