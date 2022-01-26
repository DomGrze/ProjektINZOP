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
    <title>Wyslij zgloszenie</title>
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
                <div id="mid-header">Wyślij zgłoszenie</div>
                <div id="mid-content">
                   <?php
                
                        require_once "connect.php";
                        $polaczenie = new mysqli($host,$db_user,$db_password,$db_name);
                        $id_wystawy=$_POST['which'];
                        $_SESSION['idwystawy']=$id_wystawy;
                        mysqli_set_charset($polaczenie,"utf8");
                        $sql="SELECT * FROM `wystawy` WHERE `id`='$id_wystawy'";
                        $query=mysqli_query($polaczenie,$sql);
                        echo '<form action="zgl.php" method="post">';
                        echo '<p>';
                        while($res=mysqli_fetch_array($query)){
                            echo $res['nazwa'].'<br>';
                            echo $res['data'].'<br>';
                            echo $res['godzina'].'<br>';;
                            echo $res['kategoria'].'<br>';;
                            echo $res['adres'].'<br>';
                            
                        }
                        echo '</p>';
                        echo '<label for="zwierzak_nazwa">Podaj nazwę zwierzaka:</label><br><input type=text name="zwierzak_nazwa" title="podaj nazwę zwierzaka"required><br><br>';
                        echo '<label for="zwierzak_rasa">Podaj rasę zwierzaka:</label><br><input type=text name="zwierzak_rasa" title="podaj rasę zwierzaka"required><br><br>';
                        echo '<label for="zwierzak_plec">Płeć:<br></label>
                            <select name="zwierzak_plec" required > 
                            <option value="samiec">samiec</option>
                            <option value="samica">samica</option>';
                        echo '</select><br><br>';
                    
                        echo '<label for="zwierzak_data">Podaj datę urodzenia zwierzaka:</label><br><input type="date" name="zwierzak_data" title="podaj datę urodzenia zwierzaka"required><br><br>';
                    
                        echo '<label for="zwierzak_wzrost">Podaj wzrost zwierzaka(cm):</label><br><input type="number" name="zwierzak_wzrost" title="podaj wzrost zwierzaka"required><br><br>';
                        
                        echo '<label for="zwierzak_waga">Podaj wagę zwierzaka(kg):</label><br><input type="number" name="zwierzak_waga" title="podaj wagę zwierzaka"required><br><br>';
                    
                        echo '<button name="wystawa" value="'.$id_wystawy.'" type="submit">Wyślij</button>';
                        echo '</form>';
                        echo '<a href="harmonogram.php">Anuluj</a>';
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

?>