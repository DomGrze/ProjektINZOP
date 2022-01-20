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
                <div id="panel">
                    <div id="panel-header">Logowanie</div>
                    <div id="panel-content">
                        <form action="logowanie.php" method="post">
                            Login: <input type="text" name="login" required /><br /><br />
                            Hasło: <input type="password" name="password" required /> <br /><br />
                            <input type="submit" value="Zaloguj się" /><br /><br />

                        </form>
                        <button id="anuluj" onclick="anuluj()">anuluj</button><br />
                        Nie posiadasz konta?<br /> <a onclick="zarejestruj()"><u>Rejestracja</u></a>
                    </div>
                </div>
                <div id="panel2">
                    <div id="panel2-header">Rejestracja</div>
                    <div id="panel2-content">
                        <form action="rejestracja.php" method="post">
                            Login: <input type="text" name="login" required /><br /><br />
                            Hasło: <input type="password" name="password" required /> <br /><br />
                            Powtórz hasło: <input type="password" name="password" required /> <br /><br />
                            Adres e-mail <input type="text" name="email" required /> <br /><br />
                            Data urodzenia <input type="date" name="data_ur" required /> <br /><br />
                            <input type="checkbox" required />Akceptuje <a href="regulamin.php"><u>regulamin</u></a><br /><br />
                            <input type="submit" value="Zarejestruj się" /><br /><br />
                            Masz już konto?<br /> <a onclick="zaloguj()"><u>Zaloguj się!</u></a>
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
</body>

</html>
