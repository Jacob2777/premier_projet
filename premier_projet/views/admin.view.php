<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administration</title>
    <link rel="stylesheet" href="public/css/admin.css?v=2">
</head>
<body>
    <a class="retour" href="deconnexion">Déconnexion</a>

    <!-- Affichage des catégories en tant que liens -->
    <div class="liens">
        <?php

            // Parcours des catégories et génération des liens
            foreach ($categoriesDisponibles as $categorieDisponible) {
                $categorieNom = $categorieDisponible->categorie;
                $categorieActive = ($categorie === $categorieNom) ? 'class="active"' : '';
                $lienCategorie = 'pg4-admin?categorie=' . urlencode($categorieNom);
                $affichageCategorie = ucfirst($categorieNom);

                echo '<a href="' . $lienCategorie . '" ' . $categorieActive . '>' . $affichageCategorie . "s" . '</a>';
            }
        ?>
    </div>

    <!-- Boucle php pour les éléments de menu -->
    <div class="plats">
        <?php foreach($plats as $plat) : ?>
            <div class="plat">
                <h3><?=$plat->nom; ?></h3>
                <a href="supprimer?id=<?= $plat->id ?>" class="supprimer">Supprimer le plat</a>
                <a href="modifier?id=<?= $plat->id ?>" class="modifier">Modifier le plat</a>
            </div>
        <?php endforeach; ?>
    </div>
    <a href="ajouter">Ajouter un plat</a>
</body>
</html>
