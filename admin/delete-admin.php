
<?php
    include('../config/constants.php');
    //Récupération de l'id de l'utilisateur à supprimer
    $id = $_GET['id'];
    //Créer la requète de suppression de l'utilisateur
    $sql = "DELETE from tbl_admin where id=$id";
    $res = mysqli_query($conn,$sql);

    if($res==true)
    {
        $_SESSION['delete']= "<div class='success'>Utilisateur supprimé.</div>";
        header('location:'.'manage-admin.php');
    }
    else
    {
        $_SESSION['delete']="<div class='error'>Echec suppresion utilisateur.</div>";
        header('location:'.'manage-admin.php');
    }
    //Redirection vers la paage d'administration utilisateur

?>
