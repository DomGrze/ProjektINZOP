<?php
   session_start();
    
    if(!isset($_SESSION['zalogowany'])){
        header('Location: index.php');
        exit();
    }
    if($_SESSION['rola']!=4)
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
    <title>Modyfikuj konto</title>
    <style>
        a {
            text-decoration: none;
            color: black
        }

        input,
        textarea,
        select,
        button {
            width: 200px;
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

        textarea {
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
                <div id="mid-header">Zarządzaj kontem</div>
                <div id="mid-content">
                    <?php
                        require_once "connect.php";
                        $polaczenie = new mysqli($host,$db_user,$db_password,$db_name);
                        $id=$_POST['which'];
                        $_SESSION['id_konta']=$id;
                        mysqli_set_charset($polaczenie,"utf8");
                        $sql="SELECT * FROM `konta` WHERE `id`='$id'";
                        $query=mysqli_query($polaczenie,$sql);
                        echo '<form action="akcja_kont.php" method="post">';
                        while($res=mysqli_fetch_array($query)){
                            echo '<label for="login">Login:</label><br><input type=text name="login" minlength="3" maxlength="20" required pattern="[a-zA-Z0-9]+" title="podaj login" value="'.$res['login'].'"required><br>';
                            
                            echo '<label for="imie">Imie:</label><br><input type=text name="imie" maxlength="30" title="podaj imie" value="'.$res['imie'].'"required><br>';
                            
                            echo '<label for="nazwisko">Nazwisko:</label><br><input type=text maxlength="30" name="nazwisko" title="podaj nazwisko" value="'.$res['nazwisko'].'"required><br>';
                              
                            echo '<label for="rola">Rola:</label><br><input type=number name="rola" pattern="[1-4]" value="'.$res['rola'].'" required><br>';
                            
                            echo '<label for="data_ur">Data urodzenia:</label><br><input type=date id="data_ur" value="2000-01-01" max="" name="data_ur" value="'.$res['data_urodzenia'].'"required><br>';
                            
                            echo '<label for="nr_tele">Numer telefonu:</label><br><input type=number maxlength="13" pattern="[0-9]" name="nr_tele" value="'.$res['numer_telefonu'].'" required><br>';
                            
                            echo '<label for="email">Email:</label><br><input type=email name="email" value="'.$res['email'].'" required><br><br>';
                             
                                
                        }
                        echo '<button name="akcja" value=1 type="submit">Zapisz zmiany</button><br><br>';
                        echo '<button name="akcja" value=2 type="submit">Usuń użytkownika</button><br><br>';
                        echo '</form>';
                        echo '<a href="konta_crud.php">Anuluj</a>';
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
    <script>
        var dtToday = new Date();
        var day = dtToday.getDate();
        var month = dtToday.getMonth() + 1; //+1 bo styczeń ma wartość 0
        var year = dtToday.getFullYear();

        if (day < 10) {
            day = '0' + day
        }
        if (month < 10) {
            month = '0' + month
        }

        dtToday = year + '-' + month + '-' + day;
        document.getElementById("data_ur").setAttribute("max", dtToday);

    </script>
</body>

</html>
