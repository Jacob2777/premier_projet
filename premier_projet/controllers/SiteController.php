<?php

namespace Controller;

use Base\Controller;

class SiteController extends Controller{

    // Affiche la page d'accueil
    public function index() {
       include("views/index.view.php");
    }

}
