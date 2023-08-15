<!-- page html  -->
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Donkey Cars - <?= $pageTitle ?></title>
    <link rel="stylesheet" href="https://bootswatch.com/5/flatly/bootstrap.min.css">
</head>
<body>
<nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="true" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
      <div class="collapse navbar-collapse" id="navbarColor01">
        <ul class="navbar-nav me-auto">
          <li class="nav-item">
            <a class="nav-link" href="index.php">Accueil
            </a>
          </li>  
          <?php if(isset($_SESSION['logdin']) && $_SESSION['logdin']):?>
          <li class="nav-item"><a class="nav-link" href="compteUser.php">Mon compte</a>
          </li>
          <li class="nav-item"><a class="nav-link" href="deconnexionUser.php">Déconnexion</a>
          </li>
          <?php else: ?>
          <li class="nav-item"><a class="nav-link" href="inscriptionUser.php">Inscription</a>
          </li> 
          <li class="nav-item"><a class="nav-link" href="connexionUser.php">Connexion</a>
          </li>
          <?php endif; ?>
          </li>
          </ul>
          <form class="d-flex" action="index.php" method="POST">
              <!-- Input pour la recherche -->
              <input class="form-control me-sm-2" type="search" name="barreRecherche" id="barreRecherche" placeholder="Recherche">
              
              <!-- Dropdown pour le carburant -->
              <select name="carburant" class="form-control me-sm-2">
                  <option value="#" selected disabled>--Carburant--</option>
                  <option value="essence">Essence</option>
                  <option value="diesel">Diesel</option>
                  <option value="electrique">Electrique</option>
              </select>
              
              <!-- Dropdown pour le type -->
              <select name="type" class="form-control me-sm-2">
                  <option value="#" selected disabled>--Type--</option>
                  <option value="berline">Berline</option>
                  <option value="SUV">SUV</option>
              </select>
              
              <!-- Bouton de soumission -->
              <button class="btn btn-secondary my-2 my-sm-0" type="submit" name="rechercher">Recherche</button>
          </form>

          <!-- <ul class="nav justify-content-end">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="true" for="carburant">Carburant</a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="#" value="essence">Essence</a>
              <a class="dropdown-item" href="#" value="diesel">Diesel</a>
              <a class="dropdown-item" href="#" value="electrique">Electrique</a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="true" for="type">Type</a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="#" value="Berline">Berline</a>
              <a class="dropdown-item" href="#" value="SUV">SUV</a>
            </div>
          </li>
          </ul>
        <form class="d-flex">
          <input class="form-control me-sm-2" type="search" name="barreRecherche" id="barreRecherche" placeholder="Recherche">
          <button class="btn btn-secondary my-2 my-sm-0" type="submit">Recherche</button>
        </form> -->
      </div>
  </div>
</nav>
<div>


<!-- c'est un lien php qui permet de faire la liaison entre les page à executer et la page html pour l'affichage -->
<?= $pageContent ?> 
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>

