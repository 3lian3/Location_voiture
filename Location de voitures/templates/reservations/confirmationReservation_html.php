
<div class="container text-center">
    <div class="row justify-content-center">
        <div  class="col-md-12">
<br>
        <h1>Confirmation de votre réservation</h1>
<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo '<p class="success">Réservation validée ! Votre numéro de réservation est ' . $reservationDetails['id'] . '</p>';
}
if (isset($reservationDetails)):
?>
<br>
<p>Numéro de réservation : <?= $reservationDetails['id'] ?></p>
<p>Date de départ : <?= $reservationDetails['date_depart'] ?></p>
<p>Date de retour : <?= $reservationDetails['date_retour'] ?></p>
<p>Adresse de collecte : <?= $reservationDetails['adress_pickup'] ?></p>
<p>Adresse de retour : <?= $reservationDetails['adress_retour'] ?></p>
<p>Prix total : <?= $reservationDetails['prix_total']?> €</p>

<?php endif; ?>

<a href="index.php">Retour à la page d'accueil</a>
</div>
    </div>
</div>
