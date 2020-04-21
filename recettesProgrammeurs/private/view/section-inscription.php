<!-- /////////////////////////////INSCRIPTION///////////////////////////////// -->

<div class="container-fluid backg backgLogin">
  <section id="inscription" class="container">
    <div class="row justify-content-center align-items-center">
      <div class="card col-md-6 texture" >
        <h1 class="text-center">S'inscrire</h1>
          <!-- NE PAS UTILISER GET SINON LE MOT DE PASSE APPARAIT EN CLAIR DANS L'URL -->

        <form   class="formInscription" method="POST" action="">
          <div class="form-group">
            <label for="email">Veuillez entrer votre pseudo:</label>
            <input id="loginIns"class="form-control" type="login" name="login" required placeholder="VOTRE pseudo"> 
          </div>

          <div class="form-group">
            <label for="email">Veuillez entrer votre adresse mail<span class="text-danger">*<span></label>
            <input id="emailIns"class="form-control" type="email" name="email" required placeholder="VOTRE EMAIL">
          </div>

          <div class="form-group">
            <label for="passwordNoHash">Veuillez entrer votre mot de passe:<span class="text-danger">*<span></label>
            <input id="passwordNoHash" class="form-control" type="password" name="passwordNoHash" required placeholder="VOTRE PASSWORD">
          </div>
  
          <div class="form-group">
            <label for="passwordDouble">Veuillez confirmer votre mot de passe:<span class="text-danger">*<span></label>
            <input id="passwordNoHash" class="form-control" type="password" name="password2" placeholder="VOTRE PASSWORD">
          </div>
  
          <button type="submit" class="btn btn-success form-control">S'inscrire</button>

          <input type="hidden" name="identifiantFormulaire" value="user-inscription">
          <div class="inscriptionFeedback">
            <?php echo $inscriptionFeedback ?? "" ?>
          </div>
        </form>
      </div>
    </div>
  </section>
</div>


<script>
   /////////////////////VERIFICATION DES MOTS DE PASSES///////////////////////////
  document.addEventListener('DOMContentLoaded', function() {
  var formLogin = document.querySelector(".formInscription");
  formLogin.addEventListener("submit", function(event) {
      var password1 = document.querySelector("input[name=passwordNoHash]").value;
      var password2 = document.querySelector("input[name=password2]").value;
      console.log(password1);
      console.log(password2);
       if (password1 != password2){
          event.preventDefault();
          alert('VERIFIEZ LES 2 MOTS DE PASSE');
      }});
  });
</script>
