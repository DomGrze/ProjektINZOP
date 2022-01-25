<?php
   session_start();
    
    if(!isset($_SESSION['zalogowany'])){
        header('Location: index.php');
        exit();
    }
    if($_SESSION['rola']==1)
    {
        header('Location: glowna.php');
        exit();
    }
    elseif($_SESSION['rola']==3)
    {
        header('Location: glowna_organizator.php');
        exit();
    }
    elseif($_SESSION['rola']==4)
    {
        header('Location: glowna_admin.php');
        exit();
    }

?>
<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css">
    <title>Strona główna-trener</title>
    <style>
        a {
            text-decoration: none;
            color: black
        }

    </style>
</head>

<body>
    <div id="container">
        <div id="header">
            <div id="logo"><a href="index.php">logo <br>placeholder</div>
            <div id="nav">
                <button id="button"><a href="faq.php">FAQ</a></button>
                <button id="button"><a href="galeria.php">Galeria</a></button>
                <button id="button"><a href="transmisja.php">Transmisja na żywo</a></button>
                <button id="button"><a href="zaglosuj.php">Zagłosuj</a></button>
                <button id="button"><a href="harmonogram.php">Harmonogram wystaw</a></button>
                <button id="button"><a href="aktualnosci.php">Aktualności</a></button>
            </div>
        </div>
        <div id="content">
            <div id="mid"><b></b>
                <div id="mid-header">Aktualności</div>
                <div id="mid-content">placeholder</div>
            </div>
            <div id="right-bar">
                <div id="right-bar-header">
                    <?php
                        echo "Witaj &nbsp;".$_SESSION['user']."!";
                    ?></div>
                <div id="right-bar-content1"><button id="button1"><a href="wyloguj.php">Wyloguj się</a></button></div>
                <div id="right-bar-content2">
                </div>
                <div id="right-bar-content3"></div>
                <div id="right-bar-content4"></div>
            </div>
        </div>
        <div id="footer"></div>
    </div>
</body>

</html>
