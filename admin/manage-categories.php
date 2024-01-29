<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1 class="text-center">Gestion des plats</h1>
        <?php
        if (isset($_SESSION['add'])) {
            echo $_SESSION['add'];
            unset($_SESSION['add']);
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

        <!-- Bouton pour ajouter un plat -->
        <a href="add-plat.php" class="btn-primary">Ajouter des plats</a>
        <br /><br /><br />

        <table class="tbl-full">
            <tr>
                <th>Identifiant</th>
                <th>Intitulé</th>
                <th>Image</th>
                <th>Mise en avant</th>
                <th>Actions</th>
            </tr>
            <?php
            $sql = "SELECT * from plat";
            $res = mysqli_query($conn, $sql);
            if ($res == TRUE) {
                // Comptage des enregistrements pour savoir si la table contient des enregistrements
                $rows = mysqli_num_rows($res);
                if ($rows > 0) {
                    $sn = 1;
                    while ($row = mysqli_fetch_assoc($res)) {
                        $id = $row['id'];
                        $intitule = $row['intitule'];
                        $image = $row['image'];
                        $mise = $row['mise_en_avant'];
            ?>
                        <tr>
                            <td><?php echo $sn++; ?></td>
                            <td><?php echo $intitule; ?></td>
                            <td>
                                <img src="../img/<?php echo $image; ?>" alt="Image du plat" class="img-responsive" width="60px" height="60px">
                            </td>
                            <td><?php echo $mise; ?></td>
                            <td>
                                <a href="update-plat.php?id=<?php echo $id; ?>" class="btn-primary">Modifier le plat</a>
                                <a href="delete-plat.php?id=<?php echo $id; ?>" class="btn-danger">Effacer le plat</a>
                            </td>
                        </tr>
            <?php
                    }
                } else {
                    echo "Aucun plat trouvé.";
                }
            }
            ?>
        </table>

    </div>
</div>

<?php include('partials/footer.php'); ?>