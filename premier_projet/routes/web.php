<?php

$routes = [
    // route => [controller, méthode]
    "index" => ["SiteController", "index"],
    
    // Redirige vers la page menu
    "menu" => ["MenuController", "menu"],

    // Envoie les informations de l'infolettre afin de les ajouter à la base de données
    "infolettre" => ["InfolettreController", "ajouter"],

    // Redirige à la page de login de l'admin
    "pg4-login" => ["AdminController", "login"],

    // connexion à la page d'administration
    "connecter" => ["AdminController", "connecter"], 

    // Redirige à la page admin
    "pg4-admin" => ["AdminController", "admin"],

    // Appelle la fonction pour supprimer un élément du menu
    "supprimer" => ["AdminController", "supprimer"],

    // Appelle la fonction pour modifier un élément du menu
    "modifier" => ["AdminController", "modifier"],

    // Appelle la fonction pour déconnecter un utilisateur
    "deconnexion" => ["AdminController", "deconnexion"],

    // Appelle la fonction pour ajouter un repas
    "ajouter" => ["AdminController", "ajouter"],

    // Appelle la fonction pour enregistrer les modifications d'un repas
    "traiter-modifications" => ["AdminController", "traiterModification"],
];