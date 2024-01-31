<?php
// Verbinde mit mySQL, mit Hilfe eines PHP PDO Objects
$db_host = getenv("DB_HOST");
$db_name = getenv("DB_NAME");
$db_user = getenv("DB_USER");
$db_pass = getenv("DB_PASSWORD");


try {
    $dbConnection = new PDO("mysql:host=$db_host;dbname=$db_name;charset=utf8", $db_user, $db_pass); // NEU charset
    // Setze den Fehlermodus für Web Devs
    $dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo $e->getMessage();
}

// echo "<p>hellooooo from db.php!</p>";
// exit("...weiter so!"); // results quirks-mode