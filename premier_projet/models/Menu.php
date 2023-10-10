<?php

namespace Model;

use Base\Model;

class Menu extends Model {
    protected $table = "menu";

    /**
     * Récupère les plats en fonction de leur catégories
     *
     * @param string $categorie
     * @return bool
     */
    public function platsParCategorie($categorie) {
        $sql = "SELECT * 
                FROM repas 
                WHERE categorie = :categorie
                ORDER BY type";
        
        $requete = $this->pdo()->prepare($sql);
        
        $requete->execute([
            ":categorie" => $categorie
        ]);

        return $requete->fetchAll();
    }
    
    public function categoriesDisponibles()
    {
        $sql = "SELECT DISTINCT categorie 
                FROM repas";

        $requete = $this->pdo()->prepare($sql);

        $requete->execute();

        $categories = $requete->fetchAll();

        return $categories;
    }
}
