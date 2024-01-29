<!Effacer la catégorie ainsi que la photo dans le référentiel du site web>

<?php
    include('../config/constants.php');

    //Vérification que l'id et image_name sont initialisées pour éviter d'effacer le contenu sans passer par l'interface d'administration
    if(isset($_GET['id']) AND isset($_GET['image']))
    {
        $id = $_GET['id'];
        $image_name = $_GET['image'];

        //Suppression de l'image sur le serveur web si elle existe
        if($image_name !="")
        {
            //Suppression de l'image
            $path = "../images/category/".$image_name;
            $remove = unlink($path);

            if($remove==false)
            {
                $_SESSION['remove'] ="<div classe='error'>Erreur suppression image.</div>";
                header('location:'.'manage-categories.php');
                die();
            }
        }

        //Suppression de la catégorie dans la base du restaurant
        $sql = "DELETE FROM plat WHERE id=$id";
        $res = mysqli_query($conn,$sql);

        if($res==true)
        {
            $_SESSION['delete'] = "<div class='success'>Categorie supprimée.</div>";
            header('location:'.'manage-categories.php');
        }
        else
        {
            $_SESSION['delete'] = "<div class='error'>Erreur de suppression de la catégorie.</div>";
            header('location:'.'manage-categories.php');
        }

    }
    else
    {
        header('location:'.'manage-categories.php');
    }
?>
