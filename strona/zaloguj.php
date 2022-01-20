<?php
   // session_start();
    
    if((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true)){
        header('Location: glowna.php');
        exit();
    }

?>
<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style1.css">
    <title>Logowanie</title>
</head>

<body>
    <div id="container">
        <div id="panel"> Zaloguj się</div>
    </div>
</body>

</html>
