<?php

namespace Controller;

use Base\Controller;
use Model\Infolettre;

class InfolettreController extends Controller {
    public function ajouter() {
        // Validation des informations du formulaire de l'infolettre
        $nom = $_POST["nom"];
        $courriel = $_POST["courriel"];

        if (empty($nom) || empty($courriel)) {
            // Rediriger l'utilisateur vers l'index en passant les informations d'erreur via les paramètres GET
            header("Location: index?erreur=infos_absentes#infolettre");
            exit();
        }

        // Validation du nom complet
        $nomComplet = trim($nom);
        if (!$this->validerNomComplet($nomComplet)) {
            // Rediriger l'utilisateur vers l'index en passant les informations d'erreur via les paramètres GET
            header("Location: index?erreur=nom_invalide#infolettre");
            exit();
        }

        // Envoie des informations au modèle
        $modele = new Infolettre;
        $succes = $modele->ajouter($nomComplet, $courriel);

        // Rediriger si succès
        if ($succes) {
            // Rediriger l'utilisateur vers l'index en passant les informations de succès via les paramètres GET
            header("Location: index?succes_envoie_infos=1#infolettre");
            exit();
        }

        // Rediriger si échec
        header("Location: index?echec_envoie_infos=1#infolettre");
        exit();
    }

    // Vérifie si un nom et un nom de famille ont bien été entrés lors du remplissage du formulaire
    function validerNomComplet($nomComplet) {

        // Supprimer les espaces au début et à la fin du nom
        $nomComplet = trim($nomComplet);
    
        // Vérifie si un nom a bien été inscrit
        if (empty($nomComplet)) {
            return false;
        }
    
        // Vérifie si le nom contient uniquement des lettres alphabétiques, des espaces et des tirets, y compris les caractères accentués
        if (!preg_match('/^[\p{L}\s\-]+$/u', $nomComplet)) {
            return false;
        }        
    
        // Vérifie la longueur minimale du nom
        $longueurMinimale = 2;
        if (mb_strlen($nomComplet) < $longueurMinimale) {
            return false;
        }
        
        // Vérifie si un nom de famille est entré
        $noms = explode(' ', $nomComplet);
        $nombreNoms = count($noms);
        if ($nombreNoms < 2) {
            return false;
        }
            
        return true;
    }
        
}
