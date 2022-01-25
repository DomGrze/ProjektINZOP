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
            $wpis_tresc=$_POST['wpis_tresc'];
            $sql="UPDATE ogloszenia SET informacje='$wpis_tresc'WHERE id='$_SESSION[idpost]'";
            
                if(mysqli_query($polaczenie, $sql)){
                    echo "<h3>Pomyślnie edytowano post</h3>";
                    header( "refresh:2;url=modyfikuj_wpis.php" );
  
                } else{
                    echo "ERROR: Hush! Sorry $query. " 
                        . mysqli_error($polaczenie);
                    header( "refresh:2;url=modyfikuj_wpis.php" );
        }
            unset($_SESSION['idpost']);
        break;
        case 2;
            $sql="DELETE FROM ogloszenia WHERE id='$_SESSION[idpost]'";
                if(mysqli_query($polaczenie, $sql)){
                    echo "<h3>Pomyślnie usunięto</h3>";
                    header( "refresh:2;url=modyfikuj_wpis.php" );
  
                } else{
                    echo "ERROR: Hush! Sorry $sql. " 
                        . mysqli_error($polaczenie);
                    header( "refresh:2;url=modyfikuj_wpis.php" );
            unset($_SESSION['idpost']);
        break;
    }
    }
    
?>
