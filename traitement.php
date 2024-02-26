<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST["nom"];
    $email = $_POST["email"];
    $adresse = $_POST["adresse"];
    $tel = $_POST["tel"];
    $message = $_POST["message"];

    // Maintenant, vous avez les données du formulaire et vous pouvez les insérer dans votre base de données.
    // Assurez-vous de prendre des mesures de sécurité appropriées, comme la validation et l'échappement des données, avant de les insérer dans la base de données.

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "agence";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO contact (nom, email, adresse, tel, message) VALUES ('$nom', '$email', '$adresse', '$tel', '$message')";

            $conn->exec($sql);
        
        echo "Demande soumise avec succès !";
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }

    $conn = null;
}
