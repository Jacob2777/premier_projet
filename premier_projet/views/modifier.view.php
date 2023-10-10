<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier</title>
</head>
<body>
    <form action="traiter-modifications" method="POST" enctype="multipart/form-data">
        <label>
            Nom du plat
            <input type="text" name="nom" value="<?= $plat->nom ?>">
        </label>
        <label>
            Description du plat
            <textarea name="description" cols="30" rows="10"><?= $plat->description ?></textarea>
        </label>
        <label>
            Prix du plat (Sans $)
            <input type="text" name="prix" value="<?= $plat->prix ?>">
        </label>
        <label>
            Nom de l'image
            <input type="text" name="image" value="<?= $plat->image ?>">
        </label>
        <label>
            Categorie du plat
            <input type="text" name="categorie" value="<?= $plat->categorie ?>">
        </label>
        <label>
            Type de plat
            <input type="text" name="type" value="<?= $plat->type ?>">
        </label>
        <div>
            <input type="submit" value="Modifier">
        </div>
    </form>
</body>
</html>