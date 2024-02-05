<?php
// "don't use relative path" (php.net)
  require dirname(__DIR__) . '/public/includes/data-collector.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Quiz Frage</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="assets/css/style.css" />
</head>

<body>
  <?php
  // hole die ID der aktuellen Frage aus Quiz
  if (isset($quiz['questionIdSequence'])) {
    $id = $quiz['questionIdSequence'][$currentQuestionIndex];
  }

  // Hole alle Datenfelder zur Frage mit ID von Datenbank
  $question = fetchQuestionById($id, $dbConnection);

  ?>
  <!-- <main> -->
  <div class="container">

    <div class="row mb-3">
      <div class="col">
        <h1>Trivia-Quiz</h1>
      </div>
    </div>
    
    <!-- Fragen durch nummerieren --------------------------------------- -->
    <div class="row mb-3" id="frageNummer">
      <div class="col">
        <h7>Frage <?php echo ($currentQuestionIndex + 1); ?> von <?php echo $quiz['questionNum']; ?></h7>
      </div>
    </div>
    
    <!-- Frage-Test einfügen -------------------------------------------- -->
    <div class="row mb-3" id="frageText">
      <div class="col">
        <h3><?php echo $question['question_text']; ?></h3>
      </div>
    </div>
    
    <form method="POST" action="<?php echo $action; ?>" >
      <!-- Antworten einfügen --------------------------------------------- -->
      <div class="row mb-3" id="antwortAuswahl">
        <div class="col">
          <?php
            // Single-Choice: hole den Namen der richtigen Column in Correct aus questions
            // $correct = "answer_" . $question['correct'];
            
            // Zerlege den String mit den richtigen Antworten in ein Array mit Strings
            // vermeide Leerschläge in den id-strings
            $correct = $question['correct']; // Z.B. "1 , 3*
            
            $pattern = "/\s*,\s*/"; // RegEx-Suchmuster für die Trennzeichen
            // $correctItems = explode(",", $correct); // ergibt zB. ["1 ", " 3"]
            $correctItems = preg_split($pattern, $correct);
            
            // Verwandle die id-Strings in id-Ziffern
            foreach ($correctItems as $i => $item) {
              $correctItems[$i] = intval($item);
            }
            
            // entscheide, ob wir single-/multiple-choice Antworten haben
            if (count($correctItems) > 1) $multipleChoice = true;
            else $multipleChoice = false;
            
            for ($f = 1; $f <= 5; $f++) {
              // setze für answerColumnName den Namen der Tabellenspalte "answer_N" zusammen
              $answerColumnName = "answer_" . $f;
              
              // falls es überhaupt Antwort-Text gibt...
              // und der A-text nicht gleich '', dann...
              if (isset($question[$answerColumnName]) && !empty($question[$answerColumnName])) {
                // ...hole den A-text 
                $answerText = $question[$answerColumnName];
                
                // entscheide für Value wieviele Punkte die Antwort gibt
                // richtig = 1, falsch = 0
                if (in_array($f, $correctItems, true)) $value = 1;
                else $value = 0;
                
                echo "\n<div class='form-check'>";
                
                if ($multipleChoice) {
                  // multiple-choice
                  echo "\n<input id='answerColumnName$f' class='form-check-input' value='$value' type='checkbox' name=$answerColumnName >";
                }
                else {
                  echo "\n<input id='answerColumnName$f' class='form-check-input' value='$value' type='radio' name='single-choice' >";
                }
                
                echo "\n<label for='answerColumnName$f' class='form-check-label'>$answerText</label>";
                
                echo "\n</div>\n";
              }
            }
            
          ?>
        </div> <!-- row -->
      </div> <!-- col -->

      <!-- Hidden Fields -->
      <input type="hidden" name="questionNum" value="<?= $quiz['questionNum']; ?>">
      <input type="hidden" name="lastQuestionIndex" value="<?= $currentQuestionIndex; ?>">
      <input type="hidden" name="multipleChoice" value="<?= $multipleChoice ? 'true': 'false'; ?>">
      <input type="hidden" name="indexStep" value="1">

      <!-- Weiter-Button -------------------------------------------------- -->
      <div class="row mb-3">
        <div class="col-4"></div>
        <div class="col-4">
          <button type="submit" class="btn btn-primary">Next</button>
        </div>
        <div class="col-4"></div>
      </div>
    </form> 
      
  </div>
  <!-- </main> -->
</body>
</html>
