<?php
// Wenn die Session noch nicht gestartet wurde, starte sie.
if (session_status() === PHP_SESSION_NONE) {
  // Startet die Session, bzw. stellt sie wieder her.
  session_start();
}

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

// Abhängig von der aktuellen Seite, bereite die Daten vor...
$scriptName = $_SERVER['SCRIPT_NAME']; // https://www.php.net/manual/en/reserved.variables.server.php

// Startseite
if (str_contains($scriptName, "start")) { // https://www.php.net/manual/en/function.str-contains.php
  // lösche die Quiz-Daten in der Session
  session_unset();

  // setze explizit auch quiz zurück
  $quiz = null;
}

// Frageseite
else if (str_contains($scriptName, "question")) { // https://www.php.net/manual/en/function.str-contains.php
  // Quiz-Daten vorbereiten
  if ($quiz === null) { // Falls noch kein Quiz-Daten verfügbar sind...
    // hole die Anzahl Fragen aus dem POST
    $questionNum = intval($_POST['questionNum']);
    
    // Hole die Sequenz der Frage IDs aus der Datenbank  
    $questionIdSequence = fetchQuestionIdSequence($_POST['topic'], $questionNum, $dbConnection);
    
    // Berechne die wirklich mögliche Anzahl von Fragen
    $questionNum = count($questionIdSequence);
    
    
    
    
    
    
    
    
    // Sammle Quiz-Daten in quiz und speichere in Session
    $quiz = array(
      'topic' => $_POST['topic'],
      'questionNum' => $questionNum,
      'lastQuestionIndex' => $lastQuestionIndex,
      'currentQuestionIdnex' => -1,
      'questionIdSequence' => $questionIdSequence,
    );
    prettyPrint($quiz, "\$quiz is: ");
 
    $_SESSION['quiz'] = $quiz;
  }
}
  

// Index der aktuellen Frage, sowie für das Quiz setzen
echo "<p>\$lastQuestionIndex is: $lastQuestionIndex</p>";
$currentQuestionIndex = $lastQuestionIndex + 1;
echo "<p>\$currentQuestionIndex is: $currentQuestionIndex</p>";

if ($currentQuestionIndex >= $quiz['questionNum'] - 1) {
  // Aufwertungsseite aufrufen
  $action = "report.php";
}
else {
  // nächste Frage aufrufen
  $action = "question.php";
}
echo "<p>\$action is: $action</p>";

// Auswertungsseite
// else if (str_contains($scriptName, "report")) { // https://www.php.net/manual/en/function.str-contains.php
// }



// DEVS
// prettyPrint($questionIdSequence, "\$questionIdSequence is: ");
// echo "<p>\$questionNum is: $questionNum</p>";


?>