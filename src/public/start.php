<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Trivia Quiz</title>
  <link rel="stylesheet" href="assets/css/style.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
  <main>
    <div class="container">
      <!-- <div class="col"> -->
        <div class="row mb-3">
          <div class="col">
            <h1>Willkommen zu unserem Trivia-Quiz</h1>
          </div>
        </div>
          
        <form method="POST" action="question.php">
          <div class="row mb-3">
            <div class="col">
              <label for="id1" class="form-label">Bitte wähle ein Thema aus</label>
              <select id="id1" class="form-select" aria-label="Default select example">
                <option selected>- - -</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
              </select>  
            </div>
          </div>  

          <div class="row mb-3">
            <div class="col">
              <label for="anzahlFragen" class="form-label">Anzahl Fragen</label>
              <input id="anzahlFragen" class="form-control" type="number" placeholder="" min="12" max="15" value="12">
            </div>
          </div>

          <div class="row mb-3">
            <div class="col"></div>
            <div class="col-6">
              <button type="submit" class="btn btn-primary">Achtung, fertig, los!</button>
            </div>
          </div> 
        </form>
        
      <!-- </div> col -->
    </div> <!-- container -->
  </main>
  
  </html>
</body>