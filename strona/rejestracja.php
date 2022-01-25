<?php

session_start();

if(isset($_POST['login']))
{
    $wszystko_OK=true;
    $login = $_POST['login'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $data_ur = $_POST['data_ur'];
    $imie = $_POST['imie'];
    $nazwisko = $_POST['nazwisko'];
    $nr_tel = $_POST['nr_tel'];
}

require_once "connect.php";

mysqli_report(MYSQLI_REPORT_STRICT);

try
{
    $polaczenie = new mysqli($host,$db_user,$db_password,$db_name);
    if ($polaczenie->connect_errno!=0)
    {
        throw new Exception(mysqli_connect_errno());
        exit();
    }
    else
    {
        //sprawdzanie maila
        $rezultat = $polaczenie->query("SELECT id FROM konta WHERE email='$email'");
        if(!$rezultat) throw new Exception($polaczenie->error);
        $ile_takich_maili = $rezultat->num_rows;
        if($ile_takich_maili > 0)
        {
            $wszystko_OK=false;
            $_SESSION['e_email']="Konto o podanym emailu już istnieje!";
            header('Location: index.php');
            exit();
        }
        //sprawdzanie loginu
        $rezultat = $polaczenie->query("SELECT id FROM konta WHERE login='$login'");
        if(!$rezultat) throw new Exception($polaczenie->error);
        $ile_takich_loginow = $rezultat->num_rows;
        if($ile_takich_loginow > 0)
        {
            $wszystko_OK=false;
            $_SESSION['e_login']="Konto o podanym loginie już istnieje!";
            header('Location: index.php');
            exit();
        }
        
        if($wszystko_OK==true)
        {
            if($polaczenie->query("INSERT INTO konta VALUES (NULL,'$login','$password',1,'$imie','$nazwisko','$data_ur','$nr_tel','$email')"))
            {
                $_SESSION['zalogowany']=true;
                $_SESSION['user']=$login;
                header('Location: glowna.php');
            }
            else
            {
                throw new Exception($polaczenie->error);
            }
        }
        $polaczenie->close();
    }
}
catch(Exception $e)
{
    echo '<span style="color:red;">Błąd serwera!</span>';
}

?>
