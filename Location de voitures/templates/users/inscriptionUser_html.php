    <form class="row g-3 m-5 " method="POST" action="#" >
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-6">
            <label for="nom" class="form-label">Nom</label>
            <input type="text" name="nom"  class="form-control" id="nom" placeholder="Nom" >
          </div>
          <div class="col-md-6">
            <label for="prenom" class="form-label">Prenom</label>
            <input type="text" name="prenom" class="form-control" id="prenom" placeholder="Prenom">
          </div>
          <div class="col-6">
            <label for="numero_de_telephone" class="form-label">Téléphone</label>
            <input type="tel" name="numero_de_telephone" class="form-control" id="numero_de_telephone" placeholder="Numéro de téléphone">
          </div>
          <div class="col-md-6">
            <label for="email_adress" class="form-label">Email</label>
            <input type="email" name="email_adress" class="form-control" id="email_adress" placeholder="Email" >
          </div>
          <div class="col-md-6">
            <label for="sexe" class="form-label">Sexe</label>
            <select id="sexe" name="sexe" class="form-select">
              <option selected>Choix</option>
              <option>Masculin</option>
              <option>Feminin</option>
            </select>
          </div>
          <div class="col-md-6">
            <label for="mot_de_passe" class="form-label">password</label>
            <input type="password" name="mot_de_passe" class="form-control" id="mot_de_passe" placeholder="Password">
          </div>
         
          <div class="col-12">
          <br>
          <input type="submit" class="btn btn-primary" value="S'inscrire">
          </div>
  
            <?php if (isset($message)) : ?>
            <p><?php echo $message; ?></p>
            <?php endif; ?>

          </div>
      </div>

</form>



