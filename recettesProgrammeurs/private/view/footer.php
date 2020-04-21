
  </main>
  <footer class="" >        
    <nav class="navbar bottom navbar-dark bg-dark navbar-expand-lg">
      <div class="container justify-content-center" >
        <div class="row justify-content-center" >
          <ul class=" nav navbar-nav mr-auto mt-2 mt-lg-0"  >
            <li class="nav-item text-center"><a class="nav-link text-center" href='#'>tous droits réservés | 2020</a></li>
          </ul>
        </div>
      </div>
    </nav>

    <nav class="navbar bottom navbar-dark bg-dark navbar-expand-lg">
      <div class="container-fluid justify-content-around" >
        <div class="row justify-content-around" >
          <ul class=" nav navbar-nav mr-auto mt-2 mt-lg-0 justify-content-center" >
            <li class="nav-item"><a class="nav-link" href='#'>Annonceurs - Publicité</a></li>
            <li class="nav-item"><a class="nav-link"  href='#'>Partenariats</a></li>
            <li class="nav-item"><a class="nav-link"  href='#'>Presse</a></li>
            <li class="nav-item"><a class="nav-link"  href='#'>Nous contacter</a></li>
            <li class="nav-item"><a class="nav-link"  href='#'>Mentions légales</a></li>
            <li class="nav-item"><a class="nav-link"  href='#'>Charte de confidentialité</a></li>
            <li class="nav-item"><a class="nav-link" href='#'>Préférences cookies</a></li>
          </ul>
          <form class="form-inline my-2 my-lg-0 justify-content-center" action="" method="POST">
            <!-- FORMULAIRE INSCRIPTION NEWSLETTEUR POUR LE VISITEUR -->
            <input class="form-control mr-sm-2" type="email" name="email" required placeholder="VOTRE EMAIL" maxlength="100">
            <button class="btn btn-outline-warning my-2 my-sm-0" type="submit">Newsletter</button>
              <!-- PARTIE TECHNIQUE -->
            <input type="hidden" name="identifiantFormulaire" value="newsletter-inscription">
            <div class="feedback">
              <?php echo $newsletterFeedback ?? "" ?>
            </div>
          </form>
        </div>
      </div>          
    </nav>
    </div>
  </footer>
        
<script>

/////////////////////JAVASCRIPT FONCTIONS COOKIES//////////////////////////////
function setCookie(cname, cvalue, exdays) {
  var d = new Date();
  d.setTime(d.getTime() + (exdays*24*60*60*1000));
  var expires = "expires="+ d.toUTCString();
  document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}    

function getCookie(cname) {
  var name = cname + "=";
  var decodedCookie = decodeURIComponent(document.cookie);
  var ca = decodedCookie.split(';');
  for(var i = 0; i <ca.length; i++) {
    var c = ca[i];
    while (c.charAt(0) == ' ') {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return "";
}


// TEST
// MEMORISER UNE INFO DANS UN COOKIE
// setCookie("info1", "valeur1", 1);

</script>
<script src="assets/js/script.js"></script>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
<script src="node_modules/jquery/dist/jquery.slim.min.js"></script>
<script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
<script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    </body>
</html>