<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" http-equiv="X-UA-compatible" content="width=device-width, initial-scale=1.0, IE-edge">
    <title>Produit Gestion</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <section class="input_add">
        <form action="" method="post" enctype="multipart/form-data">
            <label>Nom du produit</label>
            <input type="text" name="title">
            <label>Description du produit</label>
            <textarea name="description" cols="30" rows="10"></textarea>
            <label>Ajouter une image</label>
            <input type="file" name="image">
            <input type="submit" value="Ajouter" name="btn-ajouter">
            <a class="btn-liste-prod" href="resultats.html"> Liste des produits </a>
        </form>
    </section>
</body>
</html>