<?php
   session_start();
    
    if(!isset($_SESSION['zalogowany'])){
        header('Location: index.php');
        exit();
    }
    require_once "connect.php";
    $polaczenie = new mysqli($host,$db_user,$db_password,$db_name);
    $wystawa_nazwa=$_POST['wystawa_nazwa'];
    $wystawa_data=$_POST['wystawa_data'];
    $wystawa_godzina=$_POST['wystawa_godzina'];
    $wystawa_kategoria=$_POST['wystawa_kategoria'];
    $wystawa_adres=$_POST['wystawa_adres'];
    $wystawa_liczba=$_POST['wystawa_liczba'];
    $wystawa_organizator=$_SESSION['id'];
   
    $query="INSERT INTO wystawy VALUES (NULL,'$wystawa_nazwa','$wystawa_data','$wystawa_godzina','$wystawa_kategoria','$wystawa_liczba','$wystawa_adres','$wystawa_organizator')";
    mysqli_set_charset($polaczenie,"utf8");
    if(mysqli_query($polaczenie, $query)){
            echo "<h3>Pomyślnie dodano wystawę</h3>";
            header( "refresh:2;url=wystawa_org.php" );
  
        } else{
            echo "ERROR: Hush! Sorry $query. " 
                . mysqli_error($polaczenie);
            header( "refresh:2;url=wystawa_org.php" );
        }
    
    $polaczenie->close();
?>