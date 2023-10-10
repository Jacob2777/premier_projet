<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <?php include_once("views/parts/head.inc.php"); ?>
    <link rel="stylesheet" href="public/css/menu.css?v=5">
</head>
<body>
    <header>
        <?php include_once("views/parts/header.php"); ?>
    </header>

    <!-- Affichage des catégories en tant que liens -->
    <div class="liens">
        <?php
            // Parcours des catégories et génération des liens
            foreach ($categoriesDisponibles as $categorieDisponible) {
                $categorieNom = $categorieDisponible->categorie;
                $categorieActive = ($categorie === $categorieNom) ? 'class="active"' : '';
                $lienCategorie = 'menu?categorie=' . urlencode($categorieNom);
                $affichageCategorie = ucfirst($categorieNom);

                echo '<a href="' . $lienCategorie . '" ' . $categorieActive . '>' . $affichageCategorie . "s" . '</a>';
            }
        ?>
    </div>
    <!-- Boucle php pour les éléments de menu -->
    <div class="cases_menu">
        <?php foreach($plats as $plat) : ?>
            <div class="case_menu">
                <div class="infos">
                    <h2><?=$plat->nom; ?></h2>
                    <div class="description"><?=$plat->description; ?></div>
                    <div class="prix"><?=$plat->prix; ?> $</div>
                </div>
                <img src="<?php echo 'public/img/menu/' . $plat->image; ?>" alt="Image du plat">
            </div>
        <?php endforeach; ?>
    </div>
    
    <footer>
        <?php include_once("views/parts/footer.php"); ?>
    </footer>
</body>
</html>
