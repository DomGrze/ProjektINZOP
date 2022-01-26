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
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css">
    <title>Zarządzaj kontami</title>
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
                <button id="button"><a href="#">Zagłosuj</a></button>
                <button id="button"><a href="harmonogram.php">Harmonogram wystaw</a></button>
                <button id="button"><a href="aktualnosci.php">Aktualności</a></button>
            </div>
        </div>
        <div id="content">
            <div id="mid"><b></b>
                <div id="mid-header">Konta użytkowników:</div>
                <div id="mid-content">
                    <?php
                        require_once("konta_display.php");
                    ?>
                    <form id="pole" action="konta_crud.php" method="post">
                        Podaj Id osoby do edycji konta:<input type="text" name="id_konta" required /><br />
                       <button name="zatwierdz" id="zatwierdz" name="zatwierdz">Zatwierdź</button>
                        </form><br />
                        <!-- Dodać pod spodem puste tabele(może nie tabele tylko jak w rejestracji) do edycji w formsie, w pliku z action dodać ifa jeśli pole puste= dać wartość które były domyślnie-->
                        <form id="zmien" action="edytuj_konta_crud.php" method="post">
                           Login:<input type="text" name="login" minlength="3" maxlength="20" pattern="[a-zA-Z0-9]+" /><br /><br />
                           Imię:<input type="text" name="imie" maxlength="30" /><br /><br />
                           Nazwisko:<input type="text" name="nazwisko" maxlength="30" /><br /><br />
                           Rola:<input type="text" name="rola" pattern="[1-4]" title="Role symbolizują cyfry od 1 do 4" /><br /><br />
                           Data Urodzenia:<input type="date" name="data_ur" id="data_ur" value="2000-01-01" max="" /><br /><br />
                           Numer telefonu:<input type="number" name="nr_tele" maxlength="13" pattern="[0-9]" /><br /><br />
                           Email:<input type="email" name="email" />
                           <br /><br />
                        <input type="submit" name="zatwierdz" value="Zmień" onclick="" id="zatwierdz"/>
                           <button id="anuluj1" name="anuluj1" onclick="pokaz()">Anuluj</button>
                    </form>
                        <button id="anuluj1" name="anuluj1" onclick="pokaz()">Anuluj</button>
                        <form id="zmien" action="edytuj_konta_crud.php" method="post">
                        <input type="number" name="id" />
                        <input type="text" name="login" />
                        <input type="text" name="imie" />
                        <input type="text" name="nazwisko" />
                        <input type="text" name="rola" />
                        <input type="text" name="data_ur" />
                        <input type="text" name="nr_tele" />
                        <input type="text" name="email" />
                        <br />
                       <button name="zatwierdz" id="zatwierdz" name="zatwierdz">Zmień</button>
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
    <script>
        function ukryj() {
            document.getElementById("pole").style.display = "none";
            document.getElementById("zmien").style.display = "block";
            document.getElementById("zmiana").style.display = "table";
        }
    </script>
    <?php
        if (isset($_SESSION['id_konta'])) 
        {
            echo '<script type="text/javascript">ukryj();</script>';
            unset($_SESSION['id_konta']);
        }
        ?>
</body>

</html>
