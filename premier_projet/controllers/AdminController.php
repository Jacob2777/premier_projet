<?php

namespace Controller;

use Base\Controller;
use Model\Admin;
use Model\Menu;

class AdminController extends Controller{

    // Affiche la page de connexion de l'admin
    public function login() {
        include("views/login.view.php");
    }

    // Connecte l'utilisateur à son compte s'il existe
    public function connecter() { 
        // Valider les paramètres POST
        if(empty($_POST["nom"]) ||
           empty($_POST["courriel"]) ||
           empty($_POST["mdp"])) {
            header("location: pg4-login?infos_requises=1");
            exit();
        }

        // Récupérer l'utilisateur
        $modele = new Admin;
        $utilisateur = $modele->parCourriel($_POST["courriel"]);

        // Valider que l'utilisateur existe ET que son mot de passe est valide
        if(!$utilisateur || !password_verify($_POST["mdp"], $utilisateur->mot_de_passe)){
            header("location: pg4-login?infos_invalides=1");
            exit();
        }

        // Créer la session
        $_SESSION["utilisateur_id"] = $utilisateur->id;
        $_SESSION["est_connecte"] = true;

        // Vérifie le rôle de l'utilisateur et le redirige
        if ($utilisateur->role === "admin") {
            // Utilisateur est un administrateur
            header("location: pg4-admin?succes_connexion_admin=1");
            exit();
        } elseif ($utilisateur->role === "employe") {
            // Utilisateur est un employé
            header("location: pg4-admin?succes_connexion_employe=1");
            exit();
        } else {
            // Rôle inconnu ou non autorisé
            header("location: pg4-login?role_invalide=1");
            exit();
        }

    }

    public function admin() {
        // Protection de la route /admin
        if(empty($_SESSION["utilisateur_id"]) == true){
            header("location: index");
            exit();
        }


        // Vérifier si le paramètre 'categorie' existe dans l'URL
        if (isset($_GET["categorie"])) {
            $categorie = $_GET["categorie"];
        } else {
            // Par défaut, définir la catégorie sur "entree"
            $categorie = "entree";
        }
    
        $modele = new Menu;
        $plats = $modele->platsParCategorie($categorie);

        // Récupération des catégories disponibles
        $categoriesDisponibles = $modele->categoriesDisponibles();

    
        include("views/admin.view.php");
    }

    public function supprimer() {
        // Vérifiez si la clé "id" est définie dans $_GET
        if (isset($_GET["id"])) {
            $id = $_GET["id"];
        
            $modele = new Admin;
            $modele->supprimer($id);
        
            // Redirection après la suppression
            header("location: pg4-admin?succes_suppression=1");
            exit();
        } else{
            header("location: pg4-admin?erreur_suppression=1");
            exit();
        }
    }
        
    public function modifier() {
        // Protection de la route /admin
        if (empty($_SESSION["utilisateur_id"]) == true) {
            header("location: index");
            exit();
        }
    
        // Vérifiez si la clé "id" est définie dans $_GET
        if (isset($_GET["id"])) {
            $id = $_GET["id"];
    
            $modele = new Admin;
            $plat = $modele->tousRepasParId($id);
    
            if (!$plat) {
                // Gérer le cas où le plat n'existe pas
                header("location: pg4-admin?erreur_id=1");
                exit();
            }
    
            include("views/modifier.view.php");
        } else {
            header("location: pg4-admin?erreur_id=1");
            exit();
        }
    }
    
    public function traiterModification() {
        // Protection de la route /admin
        if (empty($_SESSION["utilisateur_id"]) == true) {
            header("location: index");
            exit();
        }
    
        // Vérifiez si la clé "id" est définie dans $_POST
        if (isset($_POST["id"])) {
            $id = $_POST["id"];
    
            // Effectuez les opérations de modification nécessaires
            // Utilisez les valeurs de $_POST pour mettre à jour le plat avec l'ID spécifié
    
            // Redirection après la modification
            header("location: pg4-admin?succes_modification=1");
            exit();
        } else {
            header("location: pg4-admin?erreur_id=1");
            exit();
        }
    }    
                
    public function enregistrer() {
        $nom = $_POST["nom"];
        $description = $_POST["description"];
        $prix = $_POST["prix"];
        $image = $_POST["image"];
        $categorie = $_POST["categorie"];
        $type = $_POST["type"];
    
        if (empty($nom) || empty($description) || empty($prix) || empty($image) || empty($categorie)) {
            header("Location: modifier?echec_modification=1");
            exit();
        }
        
        $modele = new Admin;
        $existe = $modele->verifierExistenceElement($nom);
        
        if (!$existe) {
            header("Location: pg4-admin?element_inexistant=1");
            exit();
        }
        
        $succes = $modele->enregistrer($nom, $description, $prix, $image, $categorie, $type);
        
        if ($succes) {
            // Rediriger l'utilisateur vers la page admin avec un message de succès
            header("Location: pg4-admin?succes_modification=1");
            exit();
        } else {
            // Gérer l'échec de la modification
            header("Location: pg4-admin?erreur_modification=1");
            exit();
        }
    }
}
