<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" http-equiv="X-UA-compatible" content="width=device-width, initial-scale=1.0, IE-edge">
    <title>Resultats Gestion</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="result">
        <a href="index.html">Ajouter un produit </a>
        <h3>liste des produits</h3>
        <div class="liste-produits">
            <?php 
            
           
            //nous allons afficher tous les produits ajouté : 
            //connexion à la base de données 
            $con = mysqli_connect("localhost", "root","","produits");
            $req3 = mysqli_query($son , "select * from produit");
            if (mysqli_num_rows($req3) == 0){
                echo "Aucun produit n'a été ajouté";
            }   else {
                while($row = mysqli_fetch_assoc($req3)){
                    echo "<div class='produit'>";
                    echo "<div class='image-prod'>";
                    echo "<img src='img/". $row['image']."' alt=''>";
                    echo "</div>";
                    echo "<div class='text'>";
                    echo "<strong><p class='titre'>".$row['titre']."</p></strong>";
                    echo "<p class='description'>".$row['descrip']."</p>";
                    echo "</div>";
                    echo "</div>";
                }
            }
            ?>
           
        </div>
    </div>
</body>
</html>