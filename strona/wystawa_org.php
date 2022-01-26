<?php
   session_start();
    
    if(!isset($_SESSION['zalogowany'])){
        header('Location: index.php');
        exit();
    }
    if($_SESSION['rola']!=3)
    {
        header('Location: index.php');
        exit();
    }

?>
<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="style.css">
    <title>Organizowanie wystawy</title>
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
                <div id="mid-header">Panel organizowania wystawy</div>
                <div id="mid-content">
                   <form name="organizowanie_wystawy" action="wystawy_insert.php" method="post">
                       <label for="wystawa_nazwa">Podaj nazwę wystawy:</label><br><input type=text name="wystawa_nazwa" title="podaj nazwę" required><br><br>
                       <label for="wystawa_data">Podaj datę wystawy:</label><br><input type=date name="wystawa_data" required><br><br>
                       <label for="wystawa_godzina">Podaj godzinę wystawy:</label><br><input type=time name="wystawa_godzina" required><br><br>
                       <label for="wystawa_kategoria">Podaj kategorię wystawy wystawy:<br></label>
                       <select name="wystawa kategoria" required > 
                           <option value="Klasa młodszych szczeniąt">Klasa młodszych szczeniąt</option>
                           <option value="Klasa szczeniąt">Klasa szczeniąt</option>
                           <option value="Klasa młodzieży">Klasa młodzieży</option>
                           <option value="Klasa pośrednia">Klasa pośrednia</option>
                           <option value="Klasa otwarta">Klasa otwarta</option>
                           <option value="Klasa użytkowa">Klasa użytkowa</option>
                           <option value="Klasa championów">Klasa championów</option>
                           <option value="Klasa weteranów">Klasa weteranów</option>
                       </select><br><br>
                       <label for="wystawa_liczba">Podaj liczbę uczestników wystawy:</label><br><input type=number name="wystawa_liczba"><br><br>
                       <label for="wystawa_adres">Podaj liczbę adres wystawy:</label><br><input type=text name="wystawa_adres" required><br><br>
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
                                    echo '<a href="konta_crud.php" class="panel-item">Zgłoszenia</a><br>';
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
