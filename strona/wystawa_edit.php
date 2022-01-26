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
    <title>Modyfikuj wystawe</title>
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
        textarea{
            width: 70%;
            min-height: 200px;
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
                <div id="mid-header">Zarządzaj wpisami</div>
                <div id="mid-content">
                   <?php
                
                        require_once "connect.php";
                        $polaczenie = new mysqli($host,$db_user,$db_password,$db_name);
                        $id_wystawy=$_POST['which'];
                        $_SESSION['idwystawy']=$id_wystawy;
                        mysqli_set_charset($polaczenie,"utf8");
                        $sql="SELECT * FROM `wystawy` WHERE `id`='$id_wystawy'";
                        $query=mysqli_query($polaczenie,$sql);
                        echo '<form action="akcja_wystawy.php" method="post">';
                        while($res=mysqli_fetch_array($query)){
                            echo '<label for="wystawa_nazwa">Podaj nazwę wystawy:</label><br><input type=text name="wystawa_nazwa" title="podaj nazwę" value="'.$res['nazwa'].'"required><br><br>';
                              
                            echo '<label for="wystawa_data">Podaj datę wystawy:</label><br><input type=date name="wystawa_data" value="'.$res['data'].'" required><br><br>';
                            
                            echo '<label for="wystawa_godzina">Podaj godzinę wystawy:</label><br><input type=time name="wystawa_godzina" value="'.$res['godzina'].'"required><br><br>';
                            
                            echo '<label for="wystawa_kategoria">Podaj kategorię wystawy wystawy:<br></label>
                            <select name="wystawa kategoria" required > 
                            <option value="Klasa młodszych szczeniąt">Klasa młodszych szczeniąt</option>
                            <option value="Klasa szczeniąt">Klasa szczeniąt</option>
                            <option value="Klasa młodzieży">Klasa młodzieży</option>
                            <option value="Klasa pośrednia">Klasa pośrednia</option>
                            <option value="Klasa otwarta">Klasa otwarta</option>
                            <option value="Klasa użytkowa">Klasa użytkowa</option>
                            <option value="Klasa championów">Klasa championów</option>
                            <option value="Klasa weteranów">Klasa weteranów</option>
                            </select><br><br>';
                             
                                
                            echo '<label for="wystawa_liczba">Podaj liczbę uczestników wystawy:</label><br><input type=number name="wystawa_liczba" value="'.$res['liczba_uczestnikow'].'"><br><br>';
                           
                           
                            echo '<label for="wystawa_adres">Podaj adres wystawy:</label><br><input type=text name="wystawa_adres" value="'.$res['adres'].'" required><br><br>';
                    
                        }
                        echo '<button name="akcja" value=1 type="submit">Zapisz</button><br>';
                        echo '<button name="akcja" value=2 type="submit">USUŃ Wystawe</button><br>';
                        echo '</form>';
                        echo '<a href="wystawa_zarzadzaj.php">Anuluj</a>';
                        $polaczenie->close();
                    ?>
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