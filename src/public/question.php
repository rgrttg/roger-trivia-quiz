<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Quiz Frage</title>
  <link rel="stylesheet" href="assets/css/style.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
  <main>
    <div class="container">
      <div class="col">
        <div class="row"><h1>Trivia-Quiz</h1></div>

          <!-- Fragen durch nummerieren --------------------------------------- -->
          <div class="row" id="frageNummer">
            <div class="mb-3">
              Frage Nr. 1  
            </div>
          </div>
          
          <!-- Frage-Test einfügen -------------------------------------------- -->
          <div class="row" id="frageText">
            <div class="mb-3">
              Welcher Vogel ist für sein imposantes Federkleid und 
              seine Fähigkeit zum Fliegen in großen Höhen bekannt?
            </div>
          </div>
          
          <form method="POST" action="report.php">
            <!-- Antworten einfügen --------------------------------------------- -->
            <div class="row" id="antwortAuswahl">
                <div class="mb-3">
                  
                  <div class="form-check">
                    <input id="antwort1" class="form-check-input" type="radio" name="answer" checked>
                    <label for="antwort1" class="form-check-label">Pinguin</label>
                  </div>
                  <div class="form-check">
                    <input id="antwort2" class="form-check-input" type="radio" name="answer">
                    <label for="antwort2" class="form-check-label">Papagei</label>
                  </div>
                  <div class="form-check">
                    <input id="antwort3" class="form-check-input" type="radio" name="answer">
                    <label for="antwort3" class="form-check-label">Adler</label>
                  </div>
                  <div class="form-check">
                    <input id="antwort4" class="form-check-input" type="radio" name="answer">
                    <label for="antwort4" class="form-check-label">Kolibri</label>
                  </div>
                  <div class="form-check">
                    <input id="antwort5" class="form-check-input" type="radio" name="answer" disabled>
                    <label for="antwort5" class="form-check-label"> </label>
                  </div>
                </div>
              </div>
              
              <!-- Weiter-Button -------------------------------------------------- -->
              <div class="row">
                <div class="col-5 mb-3">
                  <button type="submit" class="btn btn-primary">Next</button>
                </div>
              </div>
            </form>

        </div>
      </div>
</main>
</html>
</body>