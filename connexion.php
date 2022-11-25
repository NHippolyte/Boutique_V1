<?php
session_start();

include('function.php');

if (isset($_POST["nom"])) {
  creerUtilisateur();
}


?>

<!DOCTYPE html>
<html lang="en">
<?php
include('./head.php');
?>

  <div class="connection">
    <h5>Connexion</h5>
  </div>

  <div class="container w-50 border border-dark bg-light mb-4 p-5">
    <form action="index.php" method="post">
      <input type="hidden" name="userConnection">
      <div class="form-group">
        <label for="email">Email</label>
        <input name="email" type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="paul.dupont@exemple.fr">
        <small id="emailHelp" class="form-text text-muted">Nous ne partagerons jamais votre e-mail avec des tiers.</small>
      </div>
      <div class="form-group">
        <label for="password">Mot de passe</label>
        <input name="password" type="password" class="form-control" id="password" placeholder="entrez le mot de passe">
      </div>
      <div class="connection-gost">
      <button type="submit" class="btn btn-dark">Valider</button>

      </div>

    </form>

  </div>

  <p class="connection-div">Pas encore inscrit ?</p>

  <div class="button2_connect">

    <button type="submit" class="btn btn-primary"><a href="inscription.php"> Inscription</a></button>
  </div>

</body>

</html>