<!-- ///////////////////////////PAGE CONNEXION///////////////////////////////// -->
<div class="container-fluid backg backgLogin ">
  <section id="connexion" class="container">
    <div class="row justify-content-center align-items-center">
      <div class="card col-md-6 texture">
        <h1 class="text-center">Se connecter</h1>

        <form   method="POST" action="">
          <div class="form-group">
            <label for="email">Veuillez entrer votre adresse mail<span class="text-danger">*<span></label>
            <input id="email"class="form-control" type="email" name="email" required placeholder="VOTRE EMAIL">
          </div>

          <div class="form-group">
            <label for="password">Veuillez entrer votre mot de passe:<span class="text-danger">*<span></label>
            <input id="password" class="form-control" type="password" name="passwordNoHash" required placeholder="VOTRE PASSWORD">
            <a href="#">Mot de passe oublié ?</a>
          </div>
          <br>
          <button type="submit" class="btn btn-success form-control">Se connecter</button>
          <br>
          <br> 
          <a href="inscription.php" class="btn   btn-warning form-control" role="button" aria-pressed="true">S'inscrire</a>  
          <!-- INFOS TECHNIQUES -->
          <input type="hidden" name="identifiantFormulaire" value="user-login">
          <div class="loginFeedback">
            <?php echo $loginFeedback ?? "" ?>
          </div>
        </form>
      </div>
    </div>
  </section>
</div>

