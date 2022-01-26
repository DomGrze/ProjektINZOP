<?php
    session_start();
    
    if(!isset($_SESSION['zalogowany'])){
        header('Location: index.php');
        exit();
    }
    require_once "connect.php";

    $polaczenie = new mysqli($host,$db_user,$db_password,$db_name);
    mysqli_set_charset($polaczenie,"utf8");
    $opcja=$_POST['akcja'];
    switch($opcja){
        case 1:
            $nazwa=$_POST['wystawa_nazwa'];
            $data=$_POST['wystawa_data'];
            $godzina=$_POST['wystawa_godzina'];
            $kategoria=$_POST['wystawa_kategoria'];
            $liczba=$_POST['wystawa_liczba'];
            $adres=$_POST['wystawa_adres'];
            
            $sql="UPDATE wystawy SET nazwa='$nazwa', data='$data', godzina='$godzina', kategoria='$kategoria', liczba_uczestnikow='$liczba', adres='$adres' WHERE id='$_SESSION[idwystawy]'";
            
                if(mysqli_query($polaczenie, $sql)){
                    echo "<h3>Pomyślnie edytowano wystawe</h3>";
                    header( "refresh:2;url=wystawa_zarzadzaj.php" );
  
                } else{
                    echo "ERROR: Hush! Sorry $query. " 
                        . mysqli_error($polaczenie);
                    header( "refresh:2;url=wystawa_zarzadzaj.php" );
        }
            unset($_SESSION['idwystawy']);
        break;
        case 2;
            $sql="DELETE FROM wystawy WHERE id='$_SESSION[idwystawy]'";
                if(mysqli_query($polaczenie, $sql)){
                    echo "<h3>Pomyślnie usunięto</h3>";
                    header( "refresh:2;url=wystawa_zarzadzaj.php" );
  
                } else{
                    echo "ERROR: Hush! Sorry $sql. " 
                        . mysqli_error($polaczenie);
                    header( "refresh:2;url=wystawa_zarzadzaj.php" );
            unset($_SESSION['idwystawy']);
        break;
    }
    }
    
?>
