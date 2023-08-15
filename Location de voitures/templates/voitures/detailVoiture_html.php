<div class="container text-center">
    <div class="row justify-content-center">
        <div  class="col-md-12">
            <?php if (isset($_GET['error'])) {
                echo '<h2 class="error" style="color: orange">' . htmlspecialchars($_GET['error']) . '</h2>';}?>
            <img src="<?=$voiture['img_voiture']?>" alt="voiture">

            <h1><?= $voiture['marque']." ". $voiture['name']?></h1>
            <h4>Type : <?= $voiture['type']?></h4>
            <h4>Boite de vitesse : <?= $voiture['boiteVitesse']?></h4>
            <h4>Puissance : <?= $voiture['puissance']?></h4>
            <h4>Carburant : <?= $voiture['carburant']?></h4>
            <h4>Nombre de porte : <?= $voiture['nombre_de_porte']?></h4>
            <h4>Nombre de personne : <?= $voiture['nombre_de_siege']?></h4>
            <strong><h2>Prix/jour : <?= $voiture['prix_jour']?> €</h4></strong>
        </div>
    </div>
</div>
<br>
<div class="container text-center">
    <div class="row justify-content-center">
        <div  class="col-md-12">
            <form action="" method="POST">
            <label for="date_depart">Date de départ :</label>
            <input type="date" name="date_depart" id="date_depart" required>
            <label for="date_retour">Date de retour :</label>
            <input type="date" name="date_retour" id="date_retour" required>
        </div>
    </div>
</div>
<br>
<div class="container text-center">
    <div class="row justify-content-center">
        <div  class="col-md-12">
            <label for="adress_pickup">Agence de départ :</label>
            <select name="adress_pickup" id="adress_pickup" required="required">
                <option value="#" selected disabled>--Départ--</option>
                <option value="aeroportCDG">Aéroport Charles de Gaulle</option>
                <option value="aeroportOrly">Aéroport Orly</option>
                <option value="disneyland">DisneyLand Paris</option>
                <option value="champsElysee">Champs Elysée - Paris 8</option>
                <option value="republique">République - Paris 3</option>
            </select>
            <label for="adress_retour">Agence de retour :</label>
            <select name="adress_retour" id="adress_retour" required="required">
                <option value="#" selected disabled>--Retour--</option>
                <option value="aeroportCDG">Aéroport Charles de Gaulle</option>
                <option value="aeroportOrly">Aéroport Orly</option>
                <option value="disneyland">DisneyLand Paris</option>
                <option value="champsElysee">Champs Elysée - Paris 8</option>
                <option value="republique">République - Paris 3</option>
            </select>
        </div>
    </div>
</div>
<br>
<div class="container text-center">
    <div class="row justify-content-center">
        <div  class="col-md-12">
            <input type="hidden" name="id" value="<?= $voiture['id'] ?>">
            <input type="submit" value="Soumettre">
            </form>
        </div>
    </div>
</div>



