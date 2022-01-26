<?php
   session_start();
    
    if(!isset($_SESSION['zalogowany'])){
        header('Location: index.php');
        exit();
    }

?>
<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="style.css">
    <title>Organizowanie szkolenia</title>
    <style>
        a {
            text-decoration: none;
            color: black
        }
        input, textarea, select, button {
              width : 200px;
              padding: 0;
              margin: 0;
              box-sizing: border-box;
        }
        input:invalid {
              border: 2px dashed red;
        }

        input:valid {
              border: 2px solid black;
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
                <button id="button"><a href="#">Zagłosuj</a></button>
                <button id="button"><a href="harmonogram.php">Harmonogram wystaw</a></button>
                <button id="button"><a href="glowna.php">Aktualności</a></button>
            </div>
        </div>
        <div id="content">
            <div id="mid"><b></b>
                <div id="mid-header">Panel organizowania szkolenia</div>
                <div id="mid-content">
                   <form name="organizowanie_szkolenia" action="szkolenie_insert.php" method="post">
                       <label for="szkolenie_nazwa">Podaj nazwę szkolenia:</label><br><input type=text name="szkolenie_nazwa" title="podaj nazwę" required><br><br>
                       <label for="szkolenie_data">Podaj datę szkolenia:</label><br><input type=date name="szkolenie_data" required><br><br>
                       <label for="szkolenie_godzina">Podaj godzinę szkolenia:</label><br><input type=time name="szkolenie_godzina" required><br><br>
                       <label for="szkolenie_adres">Podaj adres szkolenia:</label><br><input type=text name="szkolenie_adres" required><br><br>
                       <label for="szkolenie_opis">Podaj opis szkolenia:</label><br>
                       <textarea name="szkolenie_opis"></textarea><br><br>
                       <input type="submit" value="Dodaj"><input type="reset" value="resetuj">
                    
                   </form>
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
                                    echo '<a href="#" class="panel-item">Zarzadzaj szkoleniem</a><br>';
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
                                    echo '<a href="konta_crud.php" class="panel-item">Zarządzaj kontem</a><br>';
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
