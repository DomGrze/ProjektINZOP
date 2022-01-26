<?php
    require_once "connect.php";

    $polaczenie = new mysqli($host,$db_user,$db_password,$db_name);
    mysqli_set_charset($polaczenie,"utf8");
    $selectquery='SELECT * FROM `konta` ORDER BY konta.id ASC LIMIT 10;';
    
    $query=mysqli_query($polaczenie,$selectquery);
    
    $nums=mysqli_num_rows($query);
    echo '<form action="edytuj_konta_crud.php" method="post">';
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
        
        $i=$res[0];
        
        echo '<td><button name="which" value="'.$i.'" type="submit">Edytuj</button></td>';
        
        echo '</tr>';
    }
    echo '</table>';
    echo '</form>';