<?php
    require_once "connect.php";

    $polaczenie = @new mysqli($host,$db_user,$db_password,$db_name);
    
    $selectquery='SELECT * FROM `konta` ORDER BY konta.id ASC;';
    
    $query=mysqli_query($polaczenie,$selectquery);
    
    $nums=mysqli_num_rows($query);
    echo '<table>';
        echo '<tr>';
            echo '<td>Id</td>';
            echo '<td>Login</td>';
            echo '<td>Imię</td>';
            echo '<td>Nazwisko</td>';
            echo '<td>Rola</td>';
            echo '<td>Data urodzenia</td>';
            echo '<td>Numer telefonu</td>';
            echo '<td>Email</td>';
        
        echo '</tr>';
    if(isset($_POST['id_konta']))
    {
        $id=$_POST['id_konta'];
        $selectquery='SELECT * FROM `konta` WHERE konta.id = $id;';
        do {
            $res=mysqli_fetch_array($query);
        }while($res['id']!=$id);
        echo '<tr>';
            echo '<td>'.$res['id'].'</td>';    
            echo '<td>'.$res['login'].'</td>';
            echo '<td>'.$res['imie'].'</td>'; 
            echo '<td>'.$res['nazwisko'].'</td>'; 
            echo '<td>'.$res['rola'].'</td>'; 
            echo '<td>'.$res['data_urodzenia'].'</td>'; 
            echo '<td>'.$res['numer_telefonu'].'</td>'; 
            echo '<td>'.$res['email'].'</td>'; 
            echo '</tr>';
        echo '</table>';
        $_SESSION['id_konta']="xd";
        unset($_POST['id_konta']);
        
    }else
    {
        while($res=mysqli_fetch_array($query)){
            echo '<tr>';
            echo '<td>'.$res['id'].'</td>';    
            echo '<td>'.$res['login'].'</td>';
            echo '<td>'.$res['imie'].'</td>'; 
            echo '<td>'.$res['nazwisko'].'</td>'; 
            echo '<td>'.$res['rola'].'</td>'; 
            echo '<td>'.$res['data_urodzenia'].'</td>'; 
            echo '<td>'.$res['numer_telefonu'].'</td>'; 
            echo '<td>'.$res['email'].'</td>'; 
            echo '</tr>';
        }
        echo '</table>';
    }
   
?>
