<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document1</title>
</head>

<body>
    
    <?php
    if (file_exists("../app/Core/Controller.php")) {
        require_once "../app/Core/Controller.php";
    }
    
    if (file_exists("../app/Core/DB.php")) {
        require_once "../app/Core/DB.php";
    }

    require_once "../app/Core/App.php";
    $app = new App();
    ?>
</body>

</html>