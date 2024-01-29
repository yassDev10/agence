<?php include('partials/menu.php'); ?>


<div class="main-content">
  <div class="wrapper">
    <br><br>
    <h1 class="text-center">Ajouter des utilisateurs</h1>
    <?php

    if (isset($_SESSION['add'])) {
      echo $_SESSION['add'];
      unset($_SESSION['add']);
    }

    ?>

<form action="" method="POST" class="user-form">
    <table class="user-table">
        <tr>
            <td class="user-label">Prénom Nom</td>
            <td><input type="text" name="full_name" class="user-input" placeholder="Saisir prénom et nom"></td>
        </tr>
        <tr>
            <td class="user-label">Utilisateur</td>
            <td><input type="text" name="username" class="user-input" placeholder="Saisir utilisateur"></td>
        </tr>
        <tr>
            <td class="user-label">Mot de passe</td>
            <td><input type="password" name="password" class="user-input" placeholder="Saisir mot de passe"></td>
        </tr>
        <tr>
            <td colspan="2">
                <input type="submit" name="submit" value="Ajouter utilisateur" class="user-button">
            </td>
        </tr>
    </table>
</form>

  </div>
</div>

<?php include('partials/footer.php'); ?>

<!Envoi du formulaire vers la base>

  <!Récupération des données du formulaire>

    <?php
    if (isset($_POST['submit'])) {
      $full_name = $_POST['full_name'];
      $username = $_POST['username'];
      $password = md5($_POST['password']); //Encryption du mot de passe avec MD5 
      //Requète SQL pour envoyer les données vers la base 
      $sql = "INSERT INTO tbl_admin SET  
      full_name = '$full_name', 
      username = '$username', 
      password = '$password' 
    ";

      //Exécution de la requète, la connexion est réalisée dans menu.php 
      $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));

      //Vérification de l'insertion dans la base 
      if ($res == TRUE) {
        $_SESSION['add'] = "<div class='success'>Utilisateur ajouté.</div>";
        //Redirection de la page 
        header("location:". 'add-admin.php');
      } else {
        $_SESSION['add'] = "<div class='error'>Echec création utilisateur.</div>";
        //Redirection de la page 
        header("location:" . 'add-admin.php');
      }
    }
    ?>