<?php
    require_once "connect.php";

    $polaczenie = @new mysqli($host,$db_user,$db_password,$db_name);
    
    if(isset($_POST['id_zmiany']))
    {
        $id=$_POST['id_zmiany'];
        $selectquery='SELECT * FROM `konta` WHERE konta.id = $id;';
        $query=mysqli_query($polaczenie,$selectquery);
        do 
        {
            $res=mysqli_fetch_array($query);
        }while($res['id']!=$id);
            if(!empty($_POST))
        {
                if(isset($_POST['login']))
                {
                    $login = $_POST['login'];
                }
                else
                {
                    $login = $res['login'];
                }
                if(isset($_POST['imie']))
                {
                    $imie = $_POST['imie'];
                }
                else
                {
                    $imie = $res['imie'];
                }
                if(isset($_POST['nazwisko']))
                {
                    $nazwisko = $_POST['nazwisko'];
                }
                else
                {
                    $nazwisko = $res['nazwisko'];
                }
                if(isset($_POST['rola']))
                {
                    $rola = $_POST['rola'];
                }
                else
                {
                    $rola = $res['rola'];
                }
                if(isset($_POST['data_ur']))
                {
                    $data_ur = $_POST['data_ur'];
                }
                else
                {
                    $data_ur = $res['data_ur'];
                }
                if(isset($_POST['nr_tele']))
                {
                    $nr_tele = $_POST['nr_tele'];
                }
                else
                {
                    $nr_tele = $res['nr_tele'];
                }
                if(isset($_POST['email']))
                {
                    $email = $_POST['email'];
                }
                else
                {
                    $email = $res['email'];
                }
                $polaczenie->query("UPDATE `konta` SET `login`='$login',`rola`='$rola',`imie`='$imie',`nazwisko`='$nazwisko',`data_urodzenia`='$data_ur',`numer_telefonu`='$nr_tele',`email`='$email' WHERE `id` ='$id'");
        header('Location: konta_crud.php');
    }
    }
    else
    {
        echo "chuj";
    }
   
?>
