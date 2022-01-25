<?php
    session_start();
    
    if((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true)){
        header('Location: glowna.php');
        exit();
    }
?>


<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css">
    <title>Strona główna</title>
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
                <button id="button"><a href="aktualnosci.php">Aktualności</a></button>
            </div>
        </div>
        <div id="content">
            <div id="mid"><b></b>
                <div id="mid-header">Aktualności</div>
                <div id="mid-content">
                    <?php
                        require_once("aktualnosci_display.php");
                    ?>
                </div>
                <!--Panel logowania-->
                <div id="panel">
                    <div id="panel-header">Logowanie</div>
                    <div id="panel-content">
                        <form action="logowanie.php" method="post">
                            Login: <input type="text" name="login" required /><br /><br />
                            Hasło: <input type="password" name="password" required /> <br /><br />
                            <input type="submit" id="rejestr" value="Zaloguj się" /><br /><br />

                        </form>
                        <button id="anuluj" onclick="anuluj()">anuluj</button><br />
                        Nie posiadasz konta?<br /> <a onclick="zarejestruj()"><u>Rejestracja</u></a>
                    </div>
                </div>
                <!--Panel rejestracji-->
                <div id="panel2">
                    <div id="panel2-header">
                        <!-- Informacja o istniejącym adresie email -->
                        <?php
                            if(isset($_SESSION['e_email'])) 
                            {
                                echo '<span style="color:red;"</span>'.$_SESSION['e_email'];
                            }
                            elseif(isset($_SESSION['e_login']))
                            {
                                echo '<span style="color:red;"</span>'.$_SESSION['e_login'];
                            }
                            else
                            {
                                //Komunikaty błędu zastępują napis Rejestracja
                                echo "Rejestracja";
                            }
                        ?>
                    </div>
                    <div id="panel2-content">
                        <form action="rejestracja.php" method="post">
                            Login: <input type="text" title="Od 3 do 20 znaków(Tylko litery i cyfry bez spacji!)" name="login" minlength="3" maxlength="20" required pattern="[a-zA-Z0-9]+" /><br />
                            <br />
                            Hasło: <input type="password" title="Od 6 do 20 znaków" id="password1" minlength="6" maxlength="20" required /> <br />
                            <br />
                            Powtórz hasło: <input type="password" title="Od 6 do 20 znaków" id="password2" name="password" minlength="6" maxlength="20" required /> <br />
                            <br />
                            Imię: <input type="text" name="imie" maxlength="30" required /><br /><br />
                            Nazwisko: <input type="text" name="nazwisko" maxlength="30" required /><br /><br />
                            Numer telefonu: <input type="number" name="nr_tel" maxlength="13" pattern="[0-9]" required /><br /><br />
                            Adres e-mail <input type="email" name="email" required /> <br />
                            Data urodzenia <input type="date" id="data_ur" name="data_ur" value="2000-01-01" max="" required /> <br />
                            <label>
                                <input type="checkbox" required />Akceptuje <a href="regulamin.php"><u>regulamin</u></a><br />
                            </label>
                            <input type="submit" id="rejestr" value="Zarejestruj się" /><br /><br />
                        </form>
                        <button id="anuluj" onclick="anuluj()">anuluj</button>
                    </div>
                </div>
            </div>
            <div id="right-bar">
                <div id="right-bar-header">Nie jesteś zalogowany</div>
                <div id="right-bar-content1">Chcesz wziąć udział w wystawie?<br>Dołącz do nas!</div>
                <div id="right-bar-content2">
                    <button id="button1" onclick="zaloguj()">Zaloguj</button>
                    <button id="button1" onclick="zarejestruj()">Zarejestruj</button>
                    <a href="regulamin.php"><br><u>Regulamin</u></a>
                </div>
                <!--Błąd danych logowania-->
                <div id="right-bar-content3"><?php
        if(isset($_SESSION['blad'])) {
            echo $_SESSION['blad'];
        }
        ?></div>
                <div id="right-bar-content4"></div>
            </div>
        </div>
        <div id="footer"></div>
    </div>
    <!--Funkcje dla przycisków strony głównej-->
    <script>
        function zaloguj() {
            document.getElementById("panel").style.display = "block";
            document.getElementById("panel2").style.display = "none";
            document.getElementById("mid-header").style.display = "none";
            document.getElementById("mid-content").style.display = "none";
            document.getElementById("right-bar").style.display = "none";
        }

        function zarejestruj() {
            document.getElementById("panel").style.display = "none";
            document.getElementById("panel2").style.display = "block";
            document.getElementById("mid-header").style.display = "none";
            document.getElementById("mid-content").style.display = "none";
            document.getElementById("right-bar").style.display = "none";
        }

        function anuluj() {
            document.getElementById("panel").style.display = "none";
            document.getElementById("panel2").style.display = "none";
            document.getElementById("mid-header").style.display = "block";
            document.getElementById("mid-content").style.display = "block";
            document.getElementById("right-bar").style.display = "block";
        }

    </script>
    <!--Sprawdzanie, czy hasło i powtórzone hasło przy rejestracji różnią się-->
    <script>
        var password1 = document.getElementById("password1"),
            password2 = document.getElementById("password2");

        function validatePassword() {
            if (password1.value != password2.value) {
                password2.setCustomValidity("Podane hasła różnią się!");
            } else {
                password2.setCustomValidity("");
            }
        }

        password1.onchange = validatePassword;
        password2.onkeyup = validatePassword;

    </script>
    <!--Max data do wprowadzenia przy rejestracji zależna od dzisiejszej daty-->
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
    <!-- Błąd maila -->
    <?php
        if (isset($_SESSION['e_email'])) 
        {
            echo '<script type="text/javascript">zarejestruj();</script>';
            unset($_SESSION['e_email']);
        }
        elseif(isset($_SESSION['e_login']))
        {
            echo '<script type="text/javascript">zarejestruj();</script>';
            unset($_SESSION['e_login']);
        }
        ?>
</body>

</html>
