<?php
   session_start();
    
    if(!isset($_SESSION['zalogowany'])){
        header('Location: index.php');
        exit();
    }
    require_once "connect.php";
    $polaczenie = new mysqli($host,$db_user,$db_password,$db_name);
    $nazwa=$_POST['szkolenie_nazwa'];
    $data=$_POST['szkolenie_data'];
    $godzina=$_POST['szkolenie_godzina'];
    $adres=$_POST['szkolenie_adres'];
    $opis=$_POST['szkolenie_opis'];
    $query="INSERT INTO `szkolenia` (`id`, `nazwa`, `data`, `godzina`, `adres`, `opis`, `trener_id`) VALUES (NULL,'$nazwa','$data','$godzina','$adres','$opis',9)";
    mysqli_set_charset($polaczenie,"utf8");
    if(mysqli_query($polaczenie, $query)){
            echo "<h3>Pomyślnie dodano szkolenie</h3>";
            header( "refresh:2;url=szkolenie_org.php" );
  
        } else{
            echo "ERROR: Hush! Sorry $query. " 
                . mysqli_error($polaczenie);
            header( "refresh:2;url=szkolenie_org.php" );
    }
    $polaczenie->close();




/*
INSERT INTO `szkolenia` (`id`, `nazwa`, `data`, `godzina`, `adres`, `opis`, `trener_id`) VALUES (NULL,'test',2022-02-02,00-00-00,'wweasd','aaadad',
(SELECT trenerzy.id FROM trenerzy WHERE trenerzy.konto_id=5))*/
#,SELECT id FROM trenerzy WHERE konto_id='$id_konta'
?>
