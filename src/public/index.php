<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="assets/css/style.css" />
    <script src="assets/js/main.js"></script>

</head>

<body>
    <a href="start.php">Start</a>&nbsp;
    <a href="question.php">Fragen</a>&nbsp;
    <a href="report.php">Auswertung</a>
    
    <?php

    echo "<h1>Hello, we are starting to work with Databases and PHP PDO!</h1>";

    // phpinfo();

    // echo get_include_path();
    include dirname(__DIR__) . '/utils/db.php';



    ?>
</body>

</html>