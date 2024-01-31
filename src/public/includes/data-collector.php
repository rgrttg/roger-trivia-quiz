<?php

session_start(); // Muss vor Gebrauch von $_SESSION ausgeführt werden

// Hilfswerkzeuge laden
include 'tools.php'; // prettyPrint() laden
include 'db.php'; // Datenbank-Verbindung aufbauen

// Falls verfügbar, hole die Quiz-Daten aus der Session
if (isset($_SESSION["quiz"])) $quiz = $_SESSION["quiz"];
else $quiz = null;

// Hole Index-Nummer aus POST
if (isset($_POST["lastQuestionIndex"])) {
  // https://www.php.net/manual/en/function.intval.php
  $lastQuestionIndex = intval($_POST["lastQuestionIndex"]);
}
else {
  // -1 soll bedeuten, dass das Quiz noch nicht gestartet wurde
  $lastQuestionIndex = -1;
}

// Quiz-Daten vorbereiten
if ($quiz === null) { // Falls noch kein Quiz-Daten verfügbar sind...
  // hole die Anzahl Fragen aus dem POST
  $questionNum = intval($_POST["questionNum"]);

  // Hole die Sequenz der Frage IDs aus der Datenbank
  $questionIdSequence = fetchQuestionIdSequence($_POST['topic'], $questionNum, $dbConnection);

  // Berechne die wirklich mögliche Anzahl von Fragen

}


prettyPrint($quiz, "\$quiz is ");
prettyPrint($questionIdSequence, "\$questionIdSequence");
echo "<p>\$lastQuestionIndex is $lastQuestionIndex</p>";
echo "<p>\$questionNum is $questionNum</p>";

?>