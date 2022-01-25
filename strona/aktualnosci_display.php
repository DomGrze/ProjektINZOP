<?php
    require_once "connect.php";

    $polaczenie = @new mysqli($host,$db_user,$db_password,$db_name);
    
    $selectquery='SELECT `informacje`, `data`, `organizator_id`,`godzina`, konta.imie, konta.nazwisko FROM `ogloszenia` JOIN organizatorzy ON ogloszenia.organizator_id=organizatorzy.id JOIN konta ON konta.id=organizatorzy.konto_id WHERE 1 ORDER BY ogloszenia.data, ogloszenia.godzina DESC LIMIT 10;';
    
    $query=mysqli_query($polaczenie,$selectquery);
    
    $nums=mysqli_num_rows($query);
    echo '<table>';
    echo '<tr>';
        echo '<td>Data</td>';
        echo '<td>Godzina</td>';
        echo '<td>Treść</td>';
        echo '<td>Autor</td>';
        
    echo '</tr>';
    while($res=mysqli_fetch_array($query)){
        echo '<tr>';
        echo '<td>'.$res['data'].'</td>';    
        echo '<td>'.$res['godzina'].'</td>';    
        echo '<td>'.$res['informacje'].'</td>';    
        echo '<td>'.$res['imie'].' '.$res['nazwisko'].'</td>';    
        echo '</tr>';
    }
    echo '</table>';
   
?>