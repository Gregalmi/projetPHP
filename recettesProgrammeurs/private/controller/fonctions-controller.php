<?php

//ON FILTRE LES INFOS RENTRER;
function filtrerInfo ($name, $valeurDefault="")
{
    // ON DOIT SE PROTEGER DES ATTAQUES DES HACKERS
    // PROTECTION1: SI L'INFO N'EST PAS PRESENTE, JE METS LA VALEUR ""
    $valeur = $_REQUEST[$name] ?? $valeurDefault;
    // PROTECTION2: ENLEVER LES BALISES HTML ET PHP
    $valeur = strip_tags($valeur);
    // PROTECTION3: ENLEVER LES ESPACES INUTILES AU DEBUT ET A LA FIN
    $valeur = trim($valeur);
    
    // RENVOIE LA VALEUR FILTREE
    return $valeur;
}

function filterArray($array, $valeurDefault="" ){

    $arrayValeurs = $_REQUEST[$array]?? $valeurDefault;
    print $arrayValeurs;
}

function filtrerEmail($name)
{
    //ON PASSE PAR LA FONCTION filtrerInfo POUR RECUPERER LE TEXTE
    $text = filtrerInfo($name);    
    // ON AJOUTE UN FILTRE SUPPLEMENTAIRE
    $emailFiltre = filter_var($text, FILTER_VALIDATE_EMAIL);
    
    return $emailFiltre;
}


function filtrerEntier($name, $valeurDefault="")
{
    //ON PASSE PAR LA FONCTION filtrerInfo POUR RECUPERER LE TEXTE
    $text = filtrerInfo($name, $valeurDefault);    
    // ON AJOUTE UN FILTRE SUPPLEMENTAIRE
    // POUR CONVERTIR EN NOMBRE
    $nombre = intval($text);
    
    return $nombre;
}

//POUR LE TRAITEMENT DES IMAGES (A VERIFIER);
function filtrerUpload ($nameInput)
{
    $cheminImage = "";
    
    // VERIFIER SI IL Y A UN FICHIER UPLOADE

    if (isset($_FILES[$nameInput]))
    {
        // JE RECUPERE LE TABLEAU ASSOCIATIF DES INFOS SUR L'UPLOAD
        $tabInfoUpload = $_FILES[$nameInput];
        // JE CREE DES VARIABLES A PARTIR DES CLES
        extract($tabInfoUpload);
        // $error, $size, $name, $type, $tmp_name
        if ($error == 0)
        {
            // OK LE FICHIER A ETE CORRECTEMENT TRANSFERE
            if ($size < 10 * 1024 * 1024)       // LIMITE A 10 Mo
            {
                // OK TAILLE RENTRE DANS LE QUOTA
                // ON VA EXTRAIRE DU NOM DU FICHIER SON EXTENSION
               
                $extension = pathinfo($name, PATHINFO_EXTENSION);
                // FILTRE: CONVERTIR EN MINUSCULE
                
                $extension = strtolower($extension);
                $tabExtensionOK = [ "jpg", "jpeg", "gif", "png", "txt" ];  // A COMPLETER SUIVANT LES BESOINS
                
                if (in_array($extension, $tabExtensionOK))
                {
                    // OK L'EXTENSION EST AUTORISEE
                    // NETTOYER LE NOM DU FICHIER
                    $filename = pathinfo($name, PATHINFO_FILENAME);
                    // REMPLACER LES CARACTERES NON lettres OU CHIFFRE PAR -
                   
                    $filename = preg_replace("/[^a-zA-Z0-9]/i", "-", $filename);
                    // FILTRER: CONVERTIR EN minuscules
                    $filename = strtolower($filename);
                    
                    // JE PEUX DECIDER DE SORTIR LE FICHIER DE SA QUARANTAINE
                 
                    // ATTENTION: IL FAUT AVOIR CREE LES DOSSIERS AVANT
                    // EN PHP mkdir
                  
                    // REMPLIR LA VALEUR DE $cheminImage
                    $cheminImage = "assets/upload/$filename.$extension";
                    move_uploaded_file($tmp_name, $cheminImage);
                    
                    // SI ON A UNE IMAGE ALORS ON VA CREER UNE MINIATURE
                    $tabExtensionImage = [ "jpeg", "jpg", "gif", "png" ];
                    if (in_array($extension, $tabExtensionImage))
                    {
                        $cheminMini = "assets/mini/$filename.$extension";
                        
                        creerMini($cheminImage, $cheminMini, 300, 300);
                    }
                }
                else
                {
                    // KO EXTENSION INTERDITE
                }
                
            }
            else
            {
                // KO TAILLE DU FICHIER TROP GRAND
            }
        }
        else
        {
            // KO ERREUR LORS DE L'UPLOAD
        }
    }
    return $cheminImage;
}


function creerMini ($cheminImageSrc, $cheminImageMini, $largeurMini, $hauteurMini)
{
    // CHARGER L'IMAGE A PARTIR DU FICHIER ORIGINE VERS LA MEMOIRE PHP
    $extension = pathinfo($cheminImageSrc, PATHINFO_EXTENSION);
    // FILTRE: CONVERTIR EN MINUSCULE

    $extension = strtolower($extension);
    switch($extension)
    {
        case "jpg":
        case "jpeg":
            
            $imageSource = imagecreatefromjpeg($cheminImageSrc);
            break;
        case "gif":
           
            $imageSource = imagecreatefromgif($cheminImageSrc);
            break;
        case "png":
            
            $imageSource = imagecreatefrompng($cheminImageSrc);
            break;
        default:
            $imageSource = null;
            break;
    }

    // ON COMMENCE AVEC SEULEMENT jpg
    if ($imageSource)
    {
        // LARGEUR ET HAUTEUR ORIGINE
        
        $largeurSource = imagesx($imageSource);
        $hauteurSource = imagesy($imageSource);
        
        // POUR EVITER LA DIVISION PAR ZERO
        if ( ($largeurSource > 0) && ($hauteurSource > 0) )
        {
            // ON PEUT CALCULER LA LARGEUR ET LA HAUTEUR MINIATURE
            // ON VA GARDER LE RATIO DE L'IMAGE SOURCE
            // ET ON VA AJUSTER L'IMAGE MINIATURE AU CARRE DEMANDE EN PARAMETRE
            if ($largeurSource > $hauteurSource)
            {
                // PAYSAGE
                $hauteurCible = $hauteurMini;
                $largeurCible = $largeurSource * $hauteurMini / $hauteurSource;
            }
            else
            {
                // PORTRAIT (OU CARRE)
                $largeurCible = $largeurMini;
                $hauteurCible = $hauteurSource * $largeurMini / $largeurSource;
            }
            
            // JE PEUX CREER L'IMAGE MINIATURE DANS LA MEMOIRE PHP
           
            $imageCible = imagecreatetruecolor($largeurCible, $hauteurCible);
            
            // ATTENTION: IL FAUT AJOUTER CES PARAMETRES POUR GARDER LA TRANSPARENCE
            // SUR LES IMAGES GIF ET PNG
           
            imagealphablending($imageCible, false);
            
            imagesavealpha($imageCible, true);
            
            // COPIER L'IMAGE SOURCE DANS L'IMAGE CIBLE
            
            imagecopyresampled (
                $imageCible, $imageSource,
                0, 0,                       // REMPLIT TOUTE LA MINIATURE
                0, 0,                       // COPIE TOUTE L'IMAGE
                $largeurCible, $hauteurCible,
                $largeurSource, $hauteurSource);
            
            // SAUVEGARDER L'IMAGE DANS UN FICHIER
            // ATTENTION: IL FAUT AVOIR CREE LE DOSSIER AVANT

            switch($extension)
            {
                case "jpg":
                case "jpeg":
                    imagejpeg($imageCible, $cheminImageMini);
                    break;
                case "gif":
                    imagegif($imageCible, $cheminImageMini);
                    break;
                case "png":
                    imagepng($imageCible, $cheminImageMini);
                    break;
                default:
                    break;
            }
        }
    }
    
}
