<?php
   session_start();

?>
<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css">
    <title>Strona główna</title>
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
            <div id="logo"><a href="glowna.php"><img src=pies.png alt="pies logo"></a></div>
            <div id="nav">
                <button id="button"><a href="faq.php">FAQ</a></button>
                <button id="button"><a href="galeria.php">Galeria</a></button>
                <button id="button"><a href="transmisja.php">Transmisja na żywo</a></button>
                <button id="button"><a href="zaglosuj.php">Zagłosuj</a></button>
                <button id="button"><a href="harmonogram.php">Harmonogram wystaw</a></button>
                <button id="button"><a href="glowna.php">Aktualności</a></button>
            </div>
        </div>
        <div id="content">
            <div id="mid"><b></b>
                <div id="mid-header">Transmisja na żywo</div>
                <div id="mid-content">
                <iframe width="900" height="400" src="https://www.youtube.com/embed/LjbN3eLK8Hw?start=69" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>
            <div id="right-bar">
                <div id="right-bar-header">
                    <?php
                        echo "Witaj &nbsp;".$_SESSION['user']."!";
                    ?></div>
                <div id="right-bar-content1"><button id="button1"><a href="wyloguj.php">Wyloguj się</a></button></div>
                <div id="right-bar-content2">
                  <?php
                        switch($_SESSION['rola']){
                            case 1:
                                    echo "Rola: Użytkownik";
                            break;
                                
                            case 2:
                                    echo "Rola: Trener";
                            break;
                                
                            case 3:
                                    echo "Rola: Organizator";
                            break;
                            
                            case 4:
                                    echo '<font color="red">Rola: Operator</font>';
                            break;
                        }
                    ?>
                </div>
                <div id="right-bar-content3">
                     <?php
                        switch($_SESSION['rola']){
                            case 1:
                                
                            break;
                                
                            case 2:
                                    echo "Panel trenera: <br>";
                                    echo '<a href="szkolenie_org.php" class="panel-item">Organizowanie szkolenia</a><br>';
                            break;
                                
                            case 3:
                                    echo "Panel organizatora: <br>";
                                    echo '<a href="wystawa_org.php" class="panel-item">Organizowanie wystawy</a><br>';
                                    echo '<a href="wystawa_zarzadzaj.php" class="panel-item">Zarzadzaj wystawami</a><br>';
                                    echo '<a href="wstaw_wpis.php" class="panel-item">Wstawianie-Aktualności</a><br>';
                                    echo '<a href="modyfikuj_wpis.php" class="panel-item">Zarzadzaj-Aktualności</a><br>';
                                
                            break;
                            
                            case 4:
                                    echo 'Panel operatora: <br>';
                                    echo '<a href="zgloszenia_crud.php" class="panel-item">Zgłoszenia</a><br>';
                                    echo '<a href="konta_crud.php" class="panel-item">Zarządzaj kontami</a><br>';
                            break;
                        }
                    ?>
                  
                </div>
            </div>
        </div>
        <div id="footer"></div>
    </div>
</body>

</html>
