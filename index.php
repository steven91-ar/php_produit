<?php 
if(isset($_POST['btn-ajouter']))
//connexion à la base de donnée
$con = mysqli_connect("localhost","root","","produits");
// if($con){
//     echo "connexionétablie";
// }else {
//     echo "Erreur de connexion : ";
// }
//recupération des données du formulaires
$titre = $_POST['titre'];
$description = $_POST['description'];
if(!empty($titre) && !empty($description)){
    //insertion des données dans la base de données
    $reql = mysqli_query($con, "SELECT titre, descrip FROM produit WHERE titre = '$titre' AND descrip = '$description'");
    if(mysqli_num_rows($reql) == 0){
    //si le produit existe déja:
    $message = '<p style="color:#ff800">Le produit existe déjà</p>';
}else {
    //sinon
    if(isset($_Files['image'])){
    // verifier si le produit existe déjà dans la base de données. 
    $img_nom = $_FILES['image']['name']; // onrécupère le nom de limage 
    $tmp_nom = $_FILES['image']['tmp_name']; // Nous définissons un nom temporaire 
    $time =time(); //On récupère l'heure actuelle
    //On renomme l'image

    $nouveau_nom_img = $time.$img_nom;

    //on déplace l'image dans le dossier image 
    $deplacer_image = move_uploaded_file($tmp_nom,"image-produits/".$nouveau_nom_img);



    if($deplacer_image){
        //insertion des données dans la base de données
        $req2 = mysqli_query($con,"INSERT INTO produit VALUES (NULL, '$titre', '$description', '$nouveau_nom_img')";
        if($req2){
            $message = '<p style="color:green;">Le produit a été ajouté avec succès</p>';
                } else {
                    //si non
            $message = '<p style="color:red;">Erreur lors de l\'ajout du produit</p>';
        }
    }
}
}
} else {
    //si tous les champs ne sont pas remplie on a :
    $message = '<p style="color:red;">Veuillez remplir tous les champs ! </p>';

}
}
?>
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
            <div class="message">
                <?php 
                if(isset($message)){
                    echo $message;
                }
                
                ?>
            
            </div>
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