<?php
    require_once "connect.php";

    $polaczenie = @new mysqli($host,$db_user,$db_password,$db_name);
    
    $selectquery='SELECT `data`,`wlasciciel_id`,`wystawa_id`,zgloszenia.id,`plec`,`nazwa_zwierzaka`,`rasa_psa`,`wzrost`,`waga`,`zatwierdzono`, konta.imie, konta.nazwisko FROM `zgloszenia` JOIN uzytkownicy ON zgloszenia.wlasciciel_id=uzytkownicy.id JOIN konta ON uzytkownicy.id=konta.id WHERE `zatwierdzono` = 0 ORDER BY zgloszenia.data ASC;';
    //czemu nie pokazuje wszystkich zgloszen
    $query=mysqli_query($polaczenie,$selectquery);
    
    $nums=mysqli_num_rows($query);
    $res=mysqli_fetch_array($query);
    if(!(empty($res['id']))){
        $id=$res['id'];
    }
    if(!(empty($res['wystawa_id']))){
        $wystawa_id=$res['wystawa_id'];
    }
    if(!(empty($res['id']))){
        $zgloszenie_id=$res['id'];
    }
    if(isset($_POST['zatwierdz']))
    {
        $polaczenie->query("UPDATE zgloszenia SET zatwierdzono ='1' WHERE zgloszenia.id ='$id' ");
        $polaczenie->query("INSERT INTO `uczestnicy`('id','wystawa_id','zgloszenie_id','punkty') VALUES (NULL,`$wystawa_id`,`$zgloszenie_id`,0)");
        header('Location: zgloszenia_crud.php');
        unset($_POST['zatwierdz']);
    }
    if(isset($_POST['usun']))
    {
        $polaczenie->query("DELETE FROM zgloszenia WHERE zgloszenia.id ='$id' ");
        header('Location: zgloszenia_crud.php');
        unset($_POST['usun']);
    }
    if(empty($res['id'])){
        echo "Brak nowych zgłoszeń";
        $_SESSION['brak']="brak nowych zgłoszeń";
    }
    else
    {
        unset($_SESSION['brak']);
         echo '<table>';
    echo '<tr>';
        echo '<td>Data</td>';
        echo '<td>Numer wystawy</td>';
        echo '<td>Właściciel</td>';
        echo '<td>Płeć</td>';
        echo '<td>Nazwa zwierzaka</td>';
        echo '<td>Rasa</td>';
        echo '<td>Wzrost</td>';
        echo '<td>Waga</td>';
    
    echo '</tr>';
        echo '<tr>';
        echo '<td>'.$res['data'].'</td>';
        echo '<td>'.$res['wystawa_id'].'</td>';
        echo '<td>'.$res['imie'].' '.$res['nazwisko'].'</td>';
        echo '<td>'.$res['plec'].'</td>';
        echo '<td>'.$res['nazwa_zwierzaka'].'</td>';
        echo '<td>'.$res['rasa_psa'].'</td>';
        echo '<td>'.$res['wzrost'].'</td>';
        echo '<td>'.$res['waga'].'</td>';
        echo '</tr>';
        echo '</table>';
    };
   
?>
