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
if ($quiz === null) {
  $questionNum = intval($_POST["questionNum"]);
}


prettyPrint($quiz, "\$quiz is ");
echo "<p>\$lastQuestionIndex is $lastQuestionIndex</p>";
echo "<p>\$questionNum is $questionNum</p>";

?>