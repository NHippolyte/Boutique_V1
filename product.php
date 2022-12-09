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
  <img src="<?php echo $article["picture"]?>.." class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title"><?php echo $article['name'] ?></h5>
    <h4><?php echo $article['price'] ?></h4>
    <h5 class="card-text"><?php echo $article['description'] ?></h5>
    <p><?php echo $article['detailedDescription'] ?></p>
    <a href="#" class="btn btn-secondary">Ajouter au panier</a>
  </div>
</div>



<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>  
</body>
</html>