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
            $login=$_POST['login'];
            $imie=$_POST['imie'];
            $nazwisko=$_POST['nazwisko'];
            $rola=$_POST['rola'];
            $data_ur=$_POST['data_ur'];
            $nr_tele=$_POST['nr_tele'];
            $email=$_POST['email'];
            
            $sql="UPDATE konta SET login='$login', imie='$imie', nazwisko='$nazwisko', rola='$rola', 
            data_urodzenia='$data_ur', numer_telefonu='$nr_tele', email='$email' WHERE id='$_SESSION[id_konta]'";
            
                if(mysqli_query($polaczenie, $sql)){
                    echo "<h3>Pomyślnie edytowano dane konta</h3>";
                    header( "refresh:2;url=konta_crud.php" );
  
                } else{
                    echo "ERROR: Hush! Sorry $query. " 
                        . mysqli_error($polaczenie);
                    header( "refresh:2;url=konta_crud.php" );
        }
            unset($_SESSION['id_konta']);
        break;
        case 2;
            $sql="DELETE FROM konta WHERE id='$_SESSION[id_konta]'";
                if(mysqli_query($polaczenie, $sql)){
                    echo "<h3>Pomyślnie usunięto</h3>";
                    header( "refresh:2;url=konta_crud.php" );
  
                } else{
                    echo "ERROR: Hush! Sorry $sql. " 
                        . mysqli_error($polaczenie);
                    header( "refresh:2;url=konta_crud.php" );
            unset($_SESSION['id_konta']);
        break;
    }
    }
    
?>
