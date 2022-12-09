<?php
session_start();
include("function.php");

?>
<!DOCTYPE html>
<html lang="en">
<?php
include('./head.php');
?>

<body>

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

    <div class="container">
        <div class="row totalachats">
            Total des achats <?php echo totalPanier() ?>
        </div>

    </div>


    <div class="frais">
        prix frais de port <?php echo calculFraisport() ?>
    </div>


    <div class="total">
        prix total <?php echo totalGeneral() ?>

    </div>


    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Confirmé la commande
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
                </div>
                <div class="modal-body">
                Elle sera expédiée le
                            <span class="font-weight-bold">
                                <?php
                                showShippingDate()
                                ?>
                            </span><br><br>
                         
                            Livraison prévue le
                            <span class="font-weight-bold">
                                <?php showDeliveryDate() ?>
                                <?php  totalGeneral() ?>
                            </span><br><br>
                </div>
                <div class="modal-footer">
                <form action="index.php" method="post">
                <input type="hidden" name="commandeValidee">
                <input class="btn btn-dark mt-2" type="submit" value="retour à l'accueil">
                </form>
                    
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>

</html>