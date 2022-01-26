<?php
    session_start();
    
    if(!isset($_SESSION['zalogowany'])){
        header('Location: index.php');
        exit();
    }
    require_once "connect.php";

    $polaczenie = new mysqli($host,$db_user,$db_password,$db_name);
    mysqli_set_charset($polaczenie,"utf8");
    $nazwa=$_POST['zwierzak_nazwa'];
    $rasa=$_POST['zwierzak_rasa'];
    $data=$_POST['zwierzak_data'];
    $plec=$_POST['zwierzak_plec'];
    $wzrost=$_POST['zwierzak_wzrost'];
    $waga=$_POST['zwierzak_waga'];
    $wystawa=$_POST['wystawa'];
    $wlasc=$_SESSION['user'];


    $sql="INSERT INTO `zgloszenia`(`id`,`wystawa_id`, `data`, `zatwierdzono`, `nazwa_zwierzaka`, `rasa_psa`, `plec`, `data_urodzenia`, `waga`, `wzrost`, `rodowod`, `wlasciciel_id`) VALUES (NULL,'$wystawa','$data',0,'$nazwa','$rasa','$plec','$data','$waga','$wzrost',NULL,(SELECT uzytkownicy.id FROM uzytkownicy JOIN konta ON uzytkownicy.konto_id=konta.id WHERE konta.login='$wlasc'))";
                if(mysqli_query($polaczenie, $sql)){
                    echo "<h3>Pomyślnie dodano zgloszenie</h3>";
                    header( "refresh:2;url=harmonogram.php" );
                    unset($_SESSION['idwystawy']);
  
                } else{
                    echo "ERROR: Hush! Sorry $query. " 
                        . mysqli_error($polaczenie);
                    header( "refresh:2;url=harmonogram.php" );
                    unset($_SESSION['idwystawy']);
        }
            

    $polaczenie->close();

?>