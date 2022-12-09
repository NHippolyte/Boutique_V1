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
            'detailedDescription' => ' Rester frais au chaud (Disponible en S et L seulement)',
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
        <img class=\"card-img-top\" src=\"./img/" . $article['picture'] . "\" class=\"card-img-top\" alt=\"images des produits\" . $article ['picture'] .\" alt=\"Card image cap\">
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
/*--------Creer le panier---------*/



function creationPanier()
{
    if (!isset($_SESSION['panier']));
    $_SESSION["panier"] = array();
}


/*--------Ajouter au panier---------*/


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


/*--------Supprimer du panier---------*/


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



/*---------Vider le panier---------*/

function viderPanier()
{
    $_SESSION["panier"] = [];
    echo "<script> alert(\"panier vide !\");</script>";
}



/*---------- Modifier le panier---------*/


function modifQuantite()
{
    for ($i = 0; $i < count($_SESSION["panier"]); $i++) {
        if ($_SESSION["panier"][$i]["id"] == $_POST["articleModifie"]) {
            $_SESSION["panier"][$i]["qte"] = $_POST["quantity"];
        }
    }
}



/*----- Total du panier---------*/

function totalPanier()
{
    $totalPanier = 0;

    for ($i = 0; $i < count($_SESSION["panier"]); $i++) {

        $totalPanier += $_SESSION["panier"][$i]["qte"] * $_SESSION["panier"][$i]["price"];
    }
    return $totalPanier;
}



/*-----Ajout frais de port ---------*/


function calculFraisport()
{
    $qteTotale = 0;
    foreach ($_SESSION["panier"] as $article) {
        $qteTotale += $article["qte"];
    }
    return $qteTotale * 3;
}



/*------ Total --------*/

function totalGeneral()
{

    return totalPanier() + calculFraisport();
}


/*------ Date de livraison--------*/

function showShippingDate(){
    // date affichée ainsi : 6 juin 2021
    setlocale(LC_TIME, 'fr_FR.utf8', 'fra');
    $date = date("Y-m-d");
    echo utf8_encode(strftime("%A %d %B %Y", strtotime($date . " + 1 day")));
}

/*------ Afficher la date de livraison-------*/


function showDeliveryDate(){
    echo utf8_encode(strftime("%A %d %B %Y", strtotime(date("Y-m-d") . " + 5 days")));
}

// ***************** vérifier que l'e-mail est déjà utilisé ************************

function checkEmail($email)
{
    $db = getConnection();

    $query = $db->prepare("SELECT * FROM clients WHERE email = ?");
    $query->execute([$email]);
$user = $query->fetch();
    if ($user) {
        return true;
    } else {
        return false;
    }
}

function inscription()
{
    /*détail de la fonction : 
    1) connexion à la bdd
    */
    $db = getConnection();
    /*
    2) // vérif si champs vides => message d'erreur si c'est le cas
    */

    /*
    3)  // vérif si longeur des champs correcte
    4) // vérif si email déjà utilisé
    5) // vérif si mdp réunit les critères requis (avec fonction checkpassword ci-dessous)
    6) hâchage du mot de passe (avec password_hash)
    7) sauvegarde de l'utilisateur en bb
    8) récupération de son id : $id = $db->lastInsertId();
    9) insertion de l'adresse en bdd
    10) message de succès
    */
}

?>