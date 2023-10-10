<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <?php include_once("views/parts/head.inc.php"); ?>
</head>
<body>
    <section class="container">
        <h1>Connectez-vous</h1>
        
        <?php
            // Inclusion du fichier d'erreurs en passant les paramètres GET
            $erreurs = array();
            if (isset($_GET["erreur"])) {
                $erreurs[] = $_GET["erreur"];
            }
            include("views/parts/index.inc.php");
        ?>

        <form action="connecter" method="POST">
            <label>
                <input type="text" name="nom" placeholder="Nom" autofocus>
            </label>
            <label>
                <input type="email" name="courriel" placeholder="Courriel">
            </label>
            <label
                ><input type="password" name="mdp" placeholder="Mot de passe">
            </label>
            <label>
                <input class="btn" type="submit" value="Envoyer">
            </label>
        </form>
    </section>
</body>
</html>