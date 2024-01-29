<?php include('partials/menu.php'); ?>


<! Section Principale>
  <div class="main-content">
    <div class="wrapper">
      <h1 class="text-center">Administration du site</h1>
      <?php
      if (isset($_SESSION['add'])) {
        echo $_SESSION['add'];
        unset($_SESSION['add']); //Suppression du message 

      }
      if (isset($_SESSION['delete'])) {
        echo $_SESSION['delete'];
        unset($_SESSION['delete']);
      }

      if (isset($_SESSION['update'])) {
        echo $_SESSION['update'];
        unset($_SESSION['update']);
      }
      if (isset($_SESSION['user-not-found'])) {
        echo $_SESSION['user-not-found'];
        unset($_SESSION['user-not-found']);
      }

      if (isset($_SESSION['pwd-not-match'])) {
        echo $_SESSION['pwd-not-match'];
        unset($_SESSION['pwd-not-match']);
      }

      if (isset($_SESSION['change-pwd'])) {
        echo $_SESSION['change-pwd'];
        unset($_SESSION['change-pwd']);
      }
      ?>
      <br><br><br><br>

      <!Bouton pour donner le droit de rajouter du contenu>
        <a href="add-admin.php" class="btn-primary">Ajouter des utilisateurs</a>
        <br /><br /><br />

        <table class="tbl-full">
          <tr>
            <th>Identifiant</th>
            <th>Prénom Nom</th>
            <th>Utilisateur</th>
            <th>Droits d'aministration</th>
          </tr>
          <?php
          $sql = "SELECT * from tbl_admin";
          $res = mysqli_query($conn, $sql);
          if ($res == TRUE) {
            //Comptage des enregistrements pour savoir si la table contient des enregistrements 
            $rows = mysqli_num_rows($res);
            if ($rows > 0) {
              $sn = 1; //Variable qui permet l'affichage par donnée croissante 
              //Récupération des données 
              while ($rows = mysqli_fetch_assoc($res)) {
                $id = $rows['id'];
                $full_name = $rows['full_name'];
                $username = $rows['username'];
                //Affichage des données de la table 
          ?>
                <tr>
                  <td><?php echo $sn++; ?> </td>
                  <td><?php echo $full_name; ?></td>
                  <td><?php echo $username; ?></td>
                  <td>
                    <a href="update-password.php?id=<?php echo $id; ?>" class="btn-primary">Modifier mot de passe</a>
                    <a href="update-admin.php?id=<?php echo $id; ?>" class="btn-secondary">Mettre à jour</a>
                    <a href="delete-admin.php?id=<?php echo $id; ?>" class="btn-danger">Effacer</a>
                  </td>
                </tr>
          <?php

              }
            } else {
            }
          }
          ?>
        </table>
    </div>
    <div class="clearfix"></div>
  </div>
  <!Fin Section Principale>

    <?php include('partials/footer.php'); ?>