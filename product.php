<?php
session_start();
include("function.php");

?>
<!DOCTYPE html>
<html lang="fr">
<?php
include('./head.php');
?>
<body>

<?php
$id = $_POST["articleToDisplay"];
$article = getArticleFromId($id);
?>




<div class="card" style="width: 18rem;">
  <img src="images/<?php echo $article["picture"]?>.." class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title"><?php echo $article['name'] ?></h5>
    <h4><?php echo $article['price'] ?></h4>
    <h5 class="card-text"><?php echo $article['description'] ?></h5>
    <p><?php echo $article['detailedDescription'] ?></p>
    <a href="#" class="btn btn-primary">Ajouter au panier</a>
  </div>
</div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  
</body>
</html>