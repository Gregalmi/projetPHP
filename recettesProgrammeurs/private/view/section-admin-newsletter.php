
            <section>
                <h2>ADMIN NEWSLETTER</h2>
                <!-- FORMULAIRE DE CREATION D'UNE LIGNE DANS LA TABLE SQL newsletter -->
                <form action="" method="POST">
                    <!-- POUR LE VISITEUR -->
                    <input type="text" name="nom" required placeholder="VOTRE NOM" maxlength="100">
                    <input type="email" name="email" required placeholder="VOTRE EMAIL" maxlength="100">
                    <button type="submit">INSCRIPTION</button>
                    <!-- PARTIE TECHNIQUE -->
                    <input type="hidden" name="identifiantFormulaire" value="newsletter-create">
                    <div class="feedback">
                        <?php echo $newsletterFeedback ?? "" ?>
                    </div>
                </form>
            </section>
            
            <section>
                <h2>LISTE DES INSCRITS A LA NEWSLETTER</h2>
                <table>
                    <tbody>
<?php

// IL FAUT UTILISER PHP POUR EXTRAIRE LES LIGNES DE LA TABLE SQL newsletter
// ET ENSUITE CONSTRUIRE LE CODE HTML POUR AFFICHER CHAQUE LIGNE
// UTILISER UNE FONCTION MODEL lireTableSQL
require_once "private/model/fonctions-model.php";

$listeLigne = lireTableSQL("newsletter", "id");
// $listeLigne EST COMME UN TABLEAU ORDONNE
// QUI CONTIENT EN VALEURS DES TABLEAUX ASSOCIATIFS
foreach($listeLigne as $tabLigne)
{
    // EXTRAIRE LES INFOS DE CHAQUE COLONNE
    // https://www.php.net/manual/fr/function.extract.php
    // ON VA CREER UNE VARIABLE PAR COLONNE
    // $id $nom $email $dateInscription
    extract($tabLigne);
    
    // CONSTRUIRE LE CODE HTML AVEC CES INFOS
    echo
<<<CODEHTML

    <tr>
        <td>$id</td>
        <td>$nom</td>
        <td>$email</td>
        <td>$dateInscription</td>
        <td>
            <a href="?identifiantFormulaire=newsletter-delete&id=$id">supprimer</a>
        </td>
        <td>
            <form method="GET" action="">
                <input type="hidden" name="identifiantFormulaire" value="newsletter-delete">
                <input type="hidden" name="id" value="$id">
                <button type="submit">supprimer</button>
            </form>
        </td>
    </tr>
    
CODEHTML;

}

?>
                    </tbody>
                </table>
            </section>
