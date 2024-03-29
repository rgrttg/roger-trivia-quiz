<?php
// "don't use relative path" (php.net)
  require dirname(__DIR__) . '/public/includes/data-collector.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Report</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="assets/css/style.css" />
</head>

<body>
<main>
<?php

  // Bestimme die Anzahl der erreichten Punkte
  // Dazu wird das value-Atribut der Eingabefelder ausgewertet
  // Wichtig: Sämtliche Session-Werte müssen fertig gesetzt sein,
  // bevor die Punktzahlen gesammelt werden dürfen

  $totalPoints = 0;

  $maxTotalPoints = 0;

  foreach ($_SESSION as $questionKey => $data) {
    if (str_contains($questionKey, "question-")) {
      if ($data['multipleChoice'] === "true") {
        // Checkboxes
        foreach ($data as $key => $value) {
          
          if (str_contains($key, "answer_")) {
            $points = intval($value); // das isch ja en fuhle
            if ($points) 
            $totalPoints += $points;
            // wenn points = 0 dann decrement totalPoints !!!
            // sonst könnte man ja einfach alle auswählen
            else $totalPoints--;
          }
        }
      }
    else if ($data['multipleChoice'] === "false") {
      // Radiobuttons
      
      // Falls keine Antwort gewählt wurde fehlt single-choice im POST
      if (isset($data['single-choice'])) {
        $points = intval($data['single-choice']);
        $totalPoints += $points;
      }
    }
    
    $maxTotalPoints += intval($data['maxPoints']);
    $quotient = $totalPoints / $maxTotalPoints;
    }
  }
?>

  <div class="container">
    <div class="row mb-3">
      <div class="col">
        <h1>Trivia-Quiz</h1>
      </div>
    </div>
    
    <!-- Wertung ausgeben ----------------------------------------------- -->
    <div class="row mb-3">
      <div class="col">
        <p>
          <?php 
            if ($quotient > .75) echo "Bravo!!!";
            else if ($quotient < .25) echo "Uuups!!!";
            else echo "Gut, ";
          ?>
        </p>
        <p>
          Du hast <?= $totalPoints ?> von möglichen <?= $maxTotalPoints ?> Punkten erreicht.
        </p>
      </div>
    </div>
    
    <!-- Neustart-Button ------------------------------------------------ -->
    <div class="row mb-3">
      <div class="col">
        <!-- <button type="button" class="btn btn-primary" formaction="start.php">Neustart</button> -->
        <a role="button" class="btn btn-primary" href="start.php" >Neustart</a>
      </div>
    </div>
    
  </div> <!-- container -->
</main>
</body>
</html>