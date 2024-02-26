    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $intitule = $_POST["intitule"];
        $image = $_POST["image"];
        $mise = $_POST["mise"];

        // Maintenant, vous avez les données du formulaire et vous pouvez les insérer dans votre base de données.
        // Assurez-vous de prendre des mesures de sécurité appropriées, comme la validation et l'échappement des données, avant de les insérer dans la base de données.

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "agence";

        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $sql = "INSERT INTO plat (intitule, image, mise_en_avant) VALUES ('$intitule', '$image', '$mise')";
            $conn->exec($sql);

            echo "Demande soumise avec succès !";
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }

        $conn = null;
    }
