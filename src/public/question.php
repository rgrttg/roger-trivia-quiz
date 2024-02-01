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
  echo "<p>\$currentQuestionIndex is: $currentQuestionIndex</p>";
  if (isset($quiz['questionIdSequence'])) {
    $id = $quiz['questionIdSequence'][$currentQuestionIndex];
    echo "<p>\$id is: $id</p>";

  }

  // Hole alle Datenfelder zur Frage mit ID von Datenbank
  $question = fetchQuestionById($id, $dbConnection);

  // DEVS
  prettyPrint($question, "Question is: ");
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

      <form method="POST" action="<?= $action; ?>" >
      <!-- Antworten einfügen --------------------------------------------- -->
      <div class="row mb-3" id="antwortAuswahl">
        <div class="col">
          <?php
            // Single-Choice: hole den Namen der richtigen Column in Correct aus questions
            $correct = "answer_" . $question['correct'];

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
                if ($correct === $answerColumnName) $value = 1;
                else $value = 0;

                echo "<div class='form-check'>
                        <input id='answerColumnName' class='form-check-input' type='radio' name=single-choice value='$value' >
                        <label for='answerColumnName' class='form-check-label'>$answerText</label>
                </div>";
              }
            }

            ?>
            <!-- <div class="form-check">
              <input id="answer_1" class="form-check-input" type="radio" name=single-choice checked>
              <label for="answer_1" class="form-check-label">Pinguin</label>
            </div>
            <div class="form-check">
              <input id="answer_2" class="form-check-input" type="radio" name=single-choice>
              <label for="answer_2" class="form-check-label">Papagei</label>
            </div>
            <div class="form-check">
              <input id="answer_3" class="form-check-input" type="radio" name=single-choice>
              <label for="answer_3" class="form-check-label">Adler</label>
            </div>
            <div class="form-check">
              <input id="answer_4" class="form-check-input" type="radio" name=single-choice>
              <label for="answer_4" class="form-check-label">Kolibri</label>
            </div>
            <div class="form-check">
              <input id="answer_5" class="form-check-input" type="radio" name=single-choice disabled>
              <label for="answer_5" class="form-check-label">leer</label>
            </div> -->
            </div>
        </div>
        
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
