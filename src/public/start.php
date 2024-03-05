<?php
// "don't use relative path" (php.net)
  require dirname(__DIR__) . '/public/includes/data-collector.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Trivia Quiz</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="assets/css/style.css" />
</head>

<body>
<main>
<div class="container">
    <div class="row mb-3">
      <div class="col">
        <h1>Willkommen zu unserem Trivia-Quiz</h1>
      </div>
    </div>
    
    <!-- Formular Vorlage -->
    <form method="POST" action="question.php" >
      <!-- <form method="POST" action="<?php echo $action; ?>"> -->
      <div class="row mb-3">
        <div class="col">
          <label for="id1" class="form-label">Bitte wähle ein Thema aus</label>
          <select id="id1" class="form-select" aria-label="Default select example" name="topic">
            <option value="tiere" selected>Tiere (d/mc)</option>
            <option value="tierwelt" >Tierwelt (d/sc)</option>
            <option value="history">Geschichte (d/sc)</option>
            <option value="werkzeuge">Werkzeuge (d/mc)</option>
            <option value="animals">Animals (e/sc)</option>
            <option value="cinema">Cinema (e/mc)</option>
            <option value="astronomy">Astronomy (e/sc)</option>
            <option value="geography">Geography (e/sc)</option>
            <option value="tech">Technolgy (e/mc)</option>
            <option value="ch-norris">Chuck Norris (e/mc)</option>
          </select>  
        </div>
      </div>
      
      <!-- Anzahl Fragen  	 -->
      <div class="row mb-3">
        <div class="col">
          <label for="questionNum" class="form-label">Anzahl Fragen</label>
          <input id="questionNum" class="form-control" type="number" name="questionNum" min="1" max="15" value="3">
        </div>
      </div>
      
      <!-- Hidden Fields -->
      <p>
        <input type="hidden" name="lastQuestionIndex" value="-1" >
        <input type="hidden" name="indexStep" value="1" >
      </p>  
      
      <!-- Submit Button -->
      <div class="row mb-3">
        <div class="col">
          <input type="submit" class="btn btn-primary" value="Achtung, fertig, los!" >
        </div>
      </div> 
    </form>
    
  </div> <!-- container -->
</main>
</body>
</html>