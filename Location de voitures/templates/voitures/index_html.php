<div id="carouselExampleCaptions" class="carousel slide">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active" style="background-image: url(sources/mercedes-amg-gtr.jpg)">
      <div class="carousel-caption d-none d-md-block">
        <?php
        if (isset($_SESSION['logdin']) && $_SESSION['logdin'] === true) {
            echo '<strong><p>Bonjour ' . $_SESSION['prenom'] . ', bienvenue sur notre site!</p></strong>';
        }
        if (isset($_SESSION['logdout']) && $_SESSION['logdout'] === true) {
            echo '<strong><p>A bientôt ' . $_SESSION['prenom'] . ', sur notre site!</p></strong>';
        }
        ?>
      <h5>DonkeyCar</h5>
      </div>
    </div>
    <div class="carousel-item">
      <img src="sources/maserati.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
      </div>
    </div>
    <div class="carousel-item">
      <img src="sources/mastg.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
<br>
<div class="container text-center">
  <div class="row justify-content-center">
    <div class="col-md-12">
        <h1>Nos voitures</h1> 
        <?php foreach ($voitures as $voiture) : ?>
          <img src="<?=$voiture['img_voiture']?>" alt="voiture">
          <div>
              <h2><?= $voiture['marque']." ".$voiture['name'] ?></h2>
              <h3>Carburant : <?=$voiture['carburant']?> - nombre de personne : <?=$voiture['nombre_de_siege']?></h3>
              <a href="detailVoiture.php?id=<?= $voiture['id'] ?>"><button type='button'>En savoir plus</button></a>
          </div>
        <?php endforeach ?>
    </div>
  </div>
</div>



