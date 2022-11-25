<?php
$articles = getArticles();
function getArticles()
{
    return [
        [
            'name' => 'Veste Lacoste',
            'id' => '1',
            'price' => 260.00,
            'description' => 'Veste mi-saison',
            'detailedDescription' => 'De la classe et de l\'élegence (taille unique)',
            'picture' => 'Lacoste.jpg'
        ],
        [
            'name' => 'Veste Jordan',
            'id' => '2',
            'price' => 180.00,
            'description' => 'Jordan Doudoune Essential Hommes',
            'detailedDescription' => ' Rester frais au chaud (taille unique)',
            'picture' => 'Jordan.jpg'
        ],
        [
            'name' => 'Verte The North Face',
            'id' => '3',
            'price' => 330.00,
            'description' => 'VESTE 1996 RETRO NUPTSE POUR HOMME',
            'detailedDescription' => 'Doudoune parfaite pour la saison hivernale (taille unique)',


            'picture' => 'Tnf.jpg'
        ]
    ];
}



function showArticles()
{

    $articles = getArticles();
    foreach ($articles as $article) {
        echo "<div class=\"card col-md-5 col-lg-3 p-3 m-3\" style=\"width: 18rem;\">
        <img class=\"card-img-top\" src=\"images/" . $article['picture'] . "\" alt=\"Card image cap\">
        <div class=\"card-body\">
            <h5 class=\"card-title font-weight-bold\">${article['name']}</h5>
            <p class=\"card-text font-italic\">" . $article['description'] . "</p>
            <p class=\"card-text font-weight-light\">" . $article['price'] . " €</p>
            <form action=\"product.php\" method=\"post\">
                <input type=\"hidden\" name=\"articleToDisplay\" value=\"" . $article['id'] . "\">
                <input class=\"btn btn-light\" type=\"submit\" value=\"Détails produit\">
            </form>
            <form action=\"panier.php\" method=\"post\">
                <input type=\"hidden\" name=\"chosenArticle\" value=\"" . $article['id'] . "\">
                <input class=\"btn btn-dark mt-2\" type=\"submit\" value=\"Ajouter au panier\">
            </form>
        </div>
    </div>";
    }
}


function getArticleFromId($id)
{
    $articles = getArticles();
    foreach ($articles as $article) {
        if ($id == $article["id"]) {
            return $article;
        }
    }
}
/*-----creationpanier---------*/



function creationPanier()
{
    if (!isset($_SESSION['panier']));
    $_SESSION["panier"] = array();
}






/*-----ajoutpanier---------*/


function ajouterArticle($article)
{

    for ($i = 0; $i < count($_SESSION["panier"]); $i++) {
        if ($article["id"] == $_SESSION["panier"][$i]["id"]) {
            echo "<script> alert(\"Article déjà présent dans le panier !\");</script>";
            return;
        }
    }

    $article["qte"] = 1;
    array_push($_SESSION["panier"], $article);
}


/*-----supprimerpanier---------*/


function supprimerArticle($article)
{
    for ($i = 0; $i < count($_SESSION["panier"]); $i++) {
        if ($_SESSION["panier"][$i]["id"]) {
            array_splice($_SESSION["panier"], $i, 1);
            echo "<script> alert(\"Article supprimé !\");</script>";
            return;
        }
    }
}



/*-----vider le panier---------*/

function viderPanier()
{
    $_SESSION["panier"] = [];
    echo "<script> alert(\"panier vide !\");</script>";
}



/*-----modifier le panier---------*/


function modifQuantite()
{
    for ($i = 0; $i < count($_SESSION["panier"]); $i++) {
        if ($_SESSION["panier"][$i]["id"] == $_POST["articleModifie"]) {
            $_SESSION["panier"][$i]["qte"] = $_POST["quantity"];
        }
    }
}



/*-----total panier---------*/

function totalPanier()
{
    $totalPanier = 0;

    for ($i = 0; $i < count($_SESSION["panier"]); $i++) {

        $totalPanier += $_SESSION["panier"][$i]["qte"] * $_SESSION["panier"][$i]["price"];
    }
    return $totalPanier;
}



/*-----frais de port---------*/


function calculFraisport()
{
    $qteTotale = 0;
    foreach ($_SESSION["panier"] as $article) {
        $qteTotale += $article["qte"];
    }
    return $qteTotale * 3;
}



/*------totalgeneral--------*/

function totalGeneral()
{

    return totalPanier() + calculFraisport();
}


/*------afficher la date de livraison--------*/

function showShippingDate(){
    // date affichée ainsi : 6 juin 2021
    setlocale(LC_TIME, 'fr_FR.utf8', 'fra');
    $date = date("Y-m-d");
    echo utf8_encode(strftime("%A %d %B %Y", strtotime($date . " + 1 day")));
}

/*------afficher la date de livraison-------*/


function showDeliveryDate(){
    echo utf8_encode(strftime("%A %d %B %Y", strtotime(date("Y-m-d") . " + 5 days")));
}




?>