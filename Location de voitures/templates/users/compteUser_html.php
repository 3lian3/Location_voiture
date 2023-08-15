<!-- page d'affichage du détail des voitures en html -->
<h2>Détail compte client</h2>
<br>
<h4>Nom: <?= $user['nom']?></h4>
<h4>Prenom : <?= $user['prenom']?></h4>
<h4>Numéro de téléphone : <?= $user['numero_de_telephone']?></h4>
<h4>Adresse email : <?= $user['email_adress']?></h4>
<br>
<br>
<h3>Réservations :</h3>
<table class="table">
    <thead>
        <tr>
            <th>Réseravtion #</th>
            <th>Véhicule</th>
            <th>Type</th>
            <th>Date de départ</th>
            <th>Date de retour</th>
            <th>Adresse de collecte</th>
            <th>Adresse de retour</th>
            <th>Prix total</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        if (empty($reservationsDetails)){
            echo "Vous n'avez actuellement aucune réservation en cours.";
        } 
            foreach ($reservationsDetails as $reservationDetail): ?>
            <tr>
                <td><h5>Réservation #<?= $reservationDetail['id'] ?></h5></td>
                <td><p>Véhicule <?= $reservationDetail['name'],$reservationDetail['marque']  ?></p></td>
                <td><p>Type de voiture: <?= $reservationDetail['type'] ?></p></td>
                <td><p>Date de départ : <?= $reservationDetail['date_depart'] ?></p></td>
                <td><p>Date de retour : <?= $reservationDetail['date_retour'] ?></p></td>
                <td><p>Adresse de collecte : <?= $reservationDetail['adress_pickup'] ?></p></td>
                <td><p>Adresse de retour : <?= $reservationDetail['adress_retour'] ?></p></td>
                <td><p>Prix total : <?= $reservationDetail['prix_total']?> €</p></td>
                <td><form action="compteUser.php" method="post">
                    <input type="hidden" name="reservation_id" value="<?= $reservationDetail['id'] ?>">
                    <input type="submit" value="Supprimer" name="delete_reservation">
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>


