<?php

namespace Controller;

use Base\Controller;
use Model\Menu;

class MenuController extends Controller{

    public function menu(){
        // Protection de la route /menu
        if(empty($_GET["categorie"]) == true){
            header("location: index.php");
            exit();
        }

        // Récupération du paramètre GET associcé au lien de menu
        $categorie = $_GET["categorie"];

        // Récupération des plats en fonction de leur catégorie
        $modele = new Menu;
        $plats = $modele->platsParCategorie($categorie);

        // Récupération des catégories disponibles
        $categoriesDisponibles = $modele->categoriesDisponibles();

        // Affiche la page du menu
        include("views/menu.view.php");
    }

}
