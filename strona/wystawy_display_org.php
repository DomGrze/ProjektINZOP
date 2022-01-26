<?php
    require_once "connect.php";

    $polaczenie = new mysqli($host,$db_user,$db_password,$db_name);
    mysqli_set_charset($polaczenie,"utf8");
    $selectquery="SELECT `id`, `nazwa`, `data`, `godzina`, `kategoria`, `liczba_uczestnikow`, `adres` FROM wystawy WHERE 1 ORDER BY data DESC LIMIT 10";
    
    $query=mysqli_query($polaczenie,$selectquery);
    
    $nums=mysqli_num_rows($query);
    echo '<form action="wystawa_edit.php" method="post">';
    echo '<table>';
    echo '<tr>';
        echo '<td>Nazwa</td>';
        echo '<td>Data</td>';
        echo '<td>Godzina</td>';
        echo '<td>Kategoria</td>';
        echo '<td>Liczba uczestników</td>';
        echo '<td>Adres</td>';
        echo '<td>Akcja</td>';
        
    echo '</tr>';
    while($res=mysqli_fetch_array($query)){
        echo '<tr>';
        echo '<td>'.$res['nazwa'].'</td>';    
        echo '<td>'.$res['data'].'</td>';    
        echo '<td>'.$res['godzina'].'</td>';    
        echo '<td>'.$res['kategoria'].'</td>';    
        echo '<td>'.$res['liczba_uczestnikow'].'</td>';    
        echo '<td>'.$res['adres'].'</td>';    
        
        $i=$res[0];
        
        echo '<td><button name="which" value="'.$i.'" type="submit">Edytuj</button></td>';
        
        echo '</tr>';
    }
    echo '</table>';
    echo '</form>';
   
?>