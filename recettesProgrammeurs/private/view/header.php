<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Les Recettes du Programmeur</title>
        <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css" >
        <link rel="stylesheet" href="assets/css/style.css" type="text/css">
    </head>

    <?php

        $use_level = lireSession("use_level");
        $use_login = lireSession("use_login");
    ?>

    <body>
        <header >          
           <!--//////////////////////BARRE DE NAVIGATION//////////////////////////-->
            <nav class="navbar navbar-dark bg-dark  navbar-expand-lg " >
                <div class="container justify-content-between">
                <a class=" navbar-brand justify-content-center" href="#">
                    <img src="assets/galerie/13233.png" width="30" height="30" alt="">
                </a>
                    <div class="row ">
            
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>  
                        <div class="collapse navbar-collapse " id="navbarTogglerDemo02">
                            <ul class=" nav navbar-nav mr-auto mt-2 mt-lg-0 justify-content-end" >
                                <li class="nav-item"><a class="nav-link <?php if ($pageActive == 'accueil') {echo ' active';} ?>" href="index.php">Accueil</a></li>
                                <li class="nav-item"><a class="nav-link <?php if ($pageActive == 'recettes') {echo ' active';} ?>" href="recettes.php">Recettes</a></li>
                                <li class="nav-item"><a class="nav-link <?php if ($pageActive == 'contact') {echo ' active';} ?>" href="contact.php">Contact</a></li>
                                <li class="nav-item"><a class="nav-link <?php if ($pageActive == 'apropos') {echo ' active';} ?>" href="apropos.php">A propos</a></li>

                                <!--//////////////////////SOUS-MENU ADMINISTRATEUR//////////////////////////-->
                                <?php if ($use_level > 9): ?> 
                                    <li class="nav-item dropdown">
                                        <button class="dropdown-toggle btn btn-outline-warning " type="menu" href="login.php" id="monCompteAdmin" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <?php echo $use_login?>
                                        </button>
                                        <div class="dropdown-menu bg-dark" aria-labelledby="monCompteAdmin">                   
                                            <a class="dropdown-item bg-dark text-light <?php if ($pageActive == 'mes-recettes') {echo ' active';} ?>"  href="mes-recettes.php">mes recettes</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item bg-dark text-light <?php if ($pageActive == 'admin-contact') {echo ' active';} ?>"  href="admin-contact.php">Gestion des courriers</a>
                                            <a class="dropdown-item bg-dark text-light <?php if ($pageActive == 'admin-news') {echo ' active';} ?>"  href="admin-newsletter.php">Newsletter</a>
                                            <a class="dropdown-item bg-dark text-light <?php if ($pageActive == 'admin-user') {echo ' active';} ?>"  href="admin-user.php">Gestion des utilisateurs</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item bg-dark text-light"  href="logout.php">Se déconnecter</a>

                                    <!--//////////////////////SOUS-MENU MEMBRE//////////////////////////-->
                                    <?php elseif ($use_level > 0) : ?> 
                                        <li class="nav-item dropdown">
                                        <button class="dropdown-toggle btn btn-outline-warning" type="menu" href="login.php" id="monCompteAdmin" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <?php echo $use_login?>
                                        </button>
                                        <div class="dropdown-menu bg-dark" aria-labelledby="compteMembre">
                                            <a class="dropdown-item bg-dark text-light <?php if ($pageActive == 'mes-recettes') {echo ' active';} ?>"  href="mes-recettes.php">mes recettes</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item bg-dark text-light"  href="logout.php">Se déconnecter</a>

                                    <!--//////////////////////SOUS-MENU VISITEUR//////////////////////////-->
                                    <?php elseif ($use_level == 0)  : ?>  
                                    <li class="nav-item dropdown">
                                        <button class="dropdown-toggle btn btn-outline-warning"type="menu" href="login.php" id="monCompteAdmin" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Mes Recettes
                                        </button>
                                    <div class="dropdown-menu bg-dark" aria-labelledby="monCompte">
                                        <a class="dropdown-item bg-dark  text-light <?php if ($pageActive == 'login') {echo ' active';} ?>"   href="login.php">Se Connecter</a>
                                        <a class="dropdown-item bg-dark  text-light <?php if ($pageActive == 'inscription') {echo ' active';} ?>"   href="inscription.php">S'inscrire</a>
                                    <?php endif; ?>
                                    </div>
                                </li>
                            </div>
                        </div>                
                    </ul>
                </div>
            </div>
        </div>
      </nav>
    </header>
    <main >
