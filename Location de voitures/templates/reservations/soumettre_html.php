<?php
if (!isset($voiture) || !isset($reservationDetails)) {
    echo '<p class="erreur">Erreur : Aucun détail de voiture ou de réservation disponible</p>';
    exit;
}
?>
<div class="container text-center">
    <div class="row justify-content-center">
      <div class="mb-6">
        <img src="<?=$voiture['img_voiture']?>" alt="voiture">
        <h1><?= $voiture['marque']." ". $voiture['name']?></h1>
        <h4>Type : <?= $voiture['type']?></h4>
        <h4>Boite de vitesse : <?= $voiture['boiteVitesse']?></h4>
        <h4>Puissance : <?= $voiture['puissance']?></h4>
        <h4>Carburant : <?= $voiture['carburant']?></h4>
        <h4>Nombre de porte : <?= $voiture['nombre_de_porte']?></h4>
        <h4>Nombre de personne : <?= $voiture['nombre_de_siege']?></h4>
        <h4>Date de départ : <?= $reservationDetails['date_depart']?></h4>
        <h4>Date de retour : <?= $reservationDetails['date_retour']?></h4>
        <h4>Adresse de collecte : <?= $reservationDetails['adress_pickup']?></h4>
        <h4>Adresse de retour : <?= $reservationDetails['adress_retour']?></h4>
        <h4>Prix/jour : <?= $voiture['prix_jour']?> €</h4>
        <strong><h2>Prix total : <?= $reservationDetails['prix_total']?> €</h2></strong>
        <br>
        <form action="validationReservation.php" method="POST">
        <input type="hidden" name="id" value="<?= $voiture['id'] ?>">
        <input type="submit" value="Réserver">
        </form>
      </div>
    </div>
</div>

