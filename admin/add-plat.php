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

    <form action="" method="POST" class="user-form" enctype="multipart/form-data">
      <!-- Add enctype attribute to handle file uploads -->
      <table class="plat-table">
        <tr>
          <td class="plat-label">Intitulé</td>
          <td><input type="text" name="intitule" class="user-input" placeholder="Intitulé"></td>
        </tr>
        <tr>
          <td class="plat-label">Image</td>
          <td>
            <label class="custom-file-upload">
              Choisir une image
              <input type="file" name="file" class="user-input" accept="image/*">
            </label>
          </td>
        </tr>
        <tr>
          <td class="plat-label">Mise en avant</td>
          <td><input type="text" name="mise" class="user-input" placeholder="Mise en avant"></td>
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

<?php
// Check if the form was submitted
if (isset($_POST['submit'])) {
  $intitule = $_POST['intitule'];
  $image = $_FILES['file']; // Use 'file' as the input name
  $mise = $_POST['mise'];

  if ($image['error'] === 0) {
    $tmpName = $image['tmp_name'];

    // Move the uploaded file to a directory
    $uploadPath = 'C:\wamp64\www\Agence\Projet PHP MySQL\img\\' . $image['name'];
    move_uploaded_file($tmpName, $uploadPath);
    $uploadPath = $image['name'];

    // Save the file path in the database
    $sql = "INSERT INTO plat (intitule, image, mise_en_avant) VALUES ('$intitule', '$uploadPath', '$mise')";

    // Execute the SQL query
    $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));

    // Check if the query was successful
    if ($res) {
      $_SESSION['add'] = "<div class='success'>Plat ajouté.</div>";
    } else {
      $_SESSION['add'] = "<div class='error'>Echec création plat.</div>";
    }

    // Redirect to the page
    header("location: manage-categories.php");
  } else {
    $_SESSION['add'] = "<div class='error'>Erreur lors de l'upload du fichier.</div>";
    header("location: manage-categories.php");
  }
}
?>