<?php

namespace Model;

use Base\Model;

class Infolettre extends Model {
    protected $table = "menu";

    /**
     * Ajoute les informations relativent à l'infolettre
     *
     * @param string $nom
     * @param string $courriel
     * 
     * @return bool
     */
    public function ajouter(string $nom, string $courriel){
        $sql = "INSERT INTO infolettre
                    (nom, courriel) 
                VALUES 
                    (:nom, :courriel)";

        $requete = $this->pdo()->prepare($sql);

        return $requete->execute([
            ":nom" => $nom,
            ":courriel" => $courriel,
        ]);
    }
    
}
