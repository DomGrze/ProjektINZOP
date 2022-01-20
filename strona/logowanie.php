<?php

session_start();

if((!isset($_POST['login'])) || (!isset($_POST['password']))){
    header('Location: index.php');
    exit();
}
require_once "connect.php";

$polaczenie = @new mysqli($host,$db_user,$db_password,$db_name);

if ($polaczenie->connect_errno!=0)
{
    echo "Error: ".$polaczenie->connect_errno;
}
else
{
    $login = $_POST['login'];
    $password = $_POST['password'];
    
    $login = htmlentities($login, ENT_QUOTES, "UTF-8");
    $password = htmlentities($password, ENT_QUOTES, "UTF-8");
    
    $sql = "SELECT * FROM konta WHERE login='$login' AND haslo='$password'";
    
    if ($rezultat = @$polaczenie->query($sql))
    {
        $ilu_userow = $rezultat->num_rows;
        if($ilu_userow>0)
        {
            $_SESSION['zalogowany'] = true;
            $_SESSION['id'] = $wiersz['id'];
            $wiersz = $rezultat->fetch_assoc();
            $_SESSION['user'] = $wiersz['login'];
            
            unset($_SESSION['blad']);
            $rezultat->close();
            header('Location: glowna.php');
        }else{
            $_SESSION['blad'] = '<span style="color:red"> Nieprawidłowe dane logowania!</span>';
            header('Location: index.php');
        }
    }
    $polaczenie->close();
}

?>
