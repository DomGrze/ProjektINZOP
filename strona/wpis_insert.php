<?php
   session_start();
    
    if(!isset($_SESSION['zalogowany'])){
        header('Location: index.php');
        exit();
    }
    require_once "connect.php";
    $polaczenie = new mysqli($host,$db_user,$db_password,$db_name);
    mysqli_set_charset($polaczenie,"utf8");
    $tresc=$_POST['wpis_tresc'];
    date_default_timezone_set("Europe/Warsaw"); 
    $data=date("Y/m/d");
    $godzina=date('H:i:s');

    $query="INSERT INTO ogloszenia VALUES (NULL,2,'$data','$godzina','$tresc')";

    
    if(mysqli_query($polaczenie, $query)){
            echo "<h3>Pomyślnie dodano wpis</h3>";
            header( "refresh:2;url=wstaw_wpis.php" );
  
        } else{
            echo "ERROR: Hush! Sorry $query. " 
                . mysqli_error($polaczenie);
            header( "refresh:2;url=wstaw_wpis.php" );
        }
    $polaczenie->close();
?>