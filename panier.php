<?php
session_start();
include("function.php");

if (isset($_POST["chosenArticle"])) {
  $article = getArticleFromId($_POST["chosenArticle"]);
  ajouterArticle($article);
}

if (isset($_POST["deletedArticle"])) {
  supprimerArticle($_POST["deletedArticle"]);
}


if (isset($_POST["viderpanier"])) {
  viderPanier();
}


if (isset($_POST["quantity"])) {
  modifQuantite();
}


?>
<!DOCTYPE html>
<html lang="en">
<?php
include('./head.php');
?>

<body>

  <div class="container text-center">

    <?php
    foreach ($_SESSION["panier"] as $article) {
      echo

      "<div class=\"row row-cols-2 row-cols-lg-5 g-2 g-lg-3\"width: 5rem;\">
     <div class=\"col\">
     <img class=\"card-img-top\" src=\"./img/"  . $article['picture'] . "\" alt=\"Card image cap\">
     </div>
     <div class=\"col\">
     <h5 class=\"\">${article['name']}</h5>
     </div>
     <div class=\"col\">
     <p class=\"\">" . $article['description'] . "</p>
     </div>
     <div class=\"col\">
     <p class=\"\">" . $article['price'] . " €</p>
     </div>
     <div class=\"col\">
     <form action=\"panier.php\" method=\"post\">
     <input type=\"hidden\" name=\"deletedArticle\" value=\"" . $article['id'] . "\">
     <input class=\"btn btn-dark mt-2\" type=\"submit\" value=\"supprimer article\">
    </form>
    <form action=\"panier.php\" method=\"post\">
    <input type=\"hidden\" name=\"articleModifie\" value=\"" . $article["id"] . "\">
    <label for=\"quantity\">Quantity:</label>
    <input type=\"number\" id=\"quantity\" name=\"quantity\" min=\"1\" max=\"10\">
    <input type=\"submit\" value=\"OK\">
  </form>
 
     </div>

   </div>
 </div>";
    }


    ?>



    <?php $total = totalPanier() ?>
    <div class="total"><?php echo totalPanier() ?> €</div>

  </div>
  <div class="btndanger">
    <form action="panier.php" method="post">
      <input type="hidden" name="viderpanier">
      <input class="btn btn-info" type="submit" value="vider panier">
    </form>
  </div>



  <div class="validation">
    <a href="validation.php"><button type="button" class="btn btn-dark">Valider la commande </button></a>
  </div>


  </div>


  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>