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

// Query Funktionen -----------------------------------------------------------

// wird aus data-collector.php aufgerufen
function fetchQuestionIdSequence($topic, $questionNum, $dbConnection) { 
    $query = "SELECT `id` FROM `questions` WHERE `topic` = :topic ORDER BY RAND() LIMIT :num";
    $sqlStatement = $dbConnection->prepare($query);
    $sqlStatement->bindParam(':topic', $topic);
    // jetzt unbedingt ein Integer übergeben, danke Ray:-)
    $sqlStatement->bindParam(':num', $questionNum, PDO::PARAM_INT);
    $sqlStatement->execute();
    $rows = $sqlStatement->fetchAll(PDO::FETCH_COLUMN, 0); // `id` ist Spalte (column) 0.
    
  return $rows;
}

// wird aus question.php aufgerufen
function fetchQuestionById($id, $dbConnection) { 
    $sqlStatement = $dbConnection->prepare("SELECT * FROM `questions` WHERE `id` = :id");
    $sqlStatement->bindParam(':id', $id);
    $sqlStatement->execute();
    $row = $sqlStatement->fetch(PDO::FETCH_ASSOC);

/*
Gibt Zeilendaten als assoz. Array zu genau einer Frage zurück.
Beispiel: $row = array('id' => 999, 'topic' => 'geography, ...')
*/
    return $row;
}
