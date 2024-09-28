<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les informations envoyées par le formulaire
    $name = htmlspecialchars($_POST['name']);
    $phone = htmlspecialchars($_POST['phone']);

    // Connexion à la base de données (remplacer les valeurs par les vôtres)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "visitors_db";

    // Créer une connexion
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Vérifier la connexion
    if ($conn->connect_error) {
        die("La connexion a échoué: " . $conn->connect_error);
    }

    // Insérer les informations dans la base de données
    $sql = "INSERT INTO visitors (name, phone) VALUES ('$name', '$phone')";

    if ($conn->query($sql) === TRUE) {
        echo "Les informations ont été enregistrées avec succès.";
    } else {
        echo "Erreur: " . $sql . "<br>" . $conn->error;
    }

    // Fermer la connexion
    $conn->close();
}
?>
