<?php

namespace Model;

use Base\Model;

class Admin extends Model {
    protected $table = "admin";

    public function parCourriel($courriel) {
        $sql = "SELECT id, mot_de_passe, role
                FROM administration
                WHERE courriel = :courriel";

        $requete = $this->pdo()->prepare($sql);

        $requete->execute([
            ":courriel" => $courriel
        ]);

        return $requete->fetch();
    }

    public function supprimer($id) {
        $sql = "DELETE FROM repas
                WHERE id = :id";
    
        $requete = $this->pdo()->prepare($sql);
    
        $requete->execute([
            ":id" => $id
        ]);

        return $requete->fetch();
    }
        
    public function modifier() {

    }

    public function tousRepasParId($id){
            $sql = "SELECT *
                    FROM repas
                    WHERE id = :id";
        
            $requete = $this->pdo()->prepare($sql);
        
            $requete->execute([
                ":id" => $id
            ]);
    
            return $requete->fetch();
    
    }

    public function enregistrer($nom, $description, $prix, $image, $categorie, $type) {
        $sql = "UPDATE repas
                SET description = :description, prix = :prix, image = :image, categorie = :categorie, type = :type
                WHERE nom = :nom";
                            
        $requete = $this->pdo()->prepare($sql);
    
        $requete->execute([
            ":nom" => $nom,
            ":description" => $description,
            ":prix" => $prix,
            ":image" => $image,
            ":categorie" => $categorie,
            ":type" => $type
        ]);
    
        // Supprimez cette ligne si vous ne souhaitez pas récupérer les résultats
        return $requete->fetch();
    }
            
    public function verifierExistenceElement($nom) {
        $sql = "SELECT COUNT(*) AS count FROM repas WHERE nom = :nom";
        $requete = $this->pdo()->prepare($sql);
        $requete->execute([":nom" => $nom]);
    
        $resultat = $requete->fetch();
    
        return ($resultat->count > 0);
    }
        
}
