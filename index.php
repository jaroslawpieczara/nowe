<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        
class Kredyt{
    function kwotaMiesieczne($kwota, $oprocentowanie){
 
        $opm = (1/12)*$oprocentowanie;
        $rata = ($kwota*$opm)/(1-(1/((1-$opm)*(1-$opm))));
        echo 'rata wynosi:'.$rata;
    }
     function kapitalDoSplaty($kwota,$ilosc,$oprocentowanie){
          $opm = (1/12)*$oprocentowanie;
        $rata = ($kwota*$opm)/(1-(1/((1-$opm)*(1-$opm))));
       $doSplaty= $kwota-($ilosc*$rata);
       echo  'do splaty pozostalo'.$doSplaty.'<br>';
     }
     function kwotaOdsetek($kwota,$ilosc,$oprocentowanie){
           $opm = (1/12)*$oprocentowanie;
        $rata = ($kwota*$opm)/(1-(1/((1-$opm)*(1-$opm))));
       $kwotaOdsetek = $rata*$ilosc;
       echo  'kwota odsetek'.$kwotaOdsetek.'<br>';
     }
 }




if (isset($_POST['wyslij'])){
    $kwota=$_POST['kwota'];
    $ilosc=$_POST['ilosc'];
    $oprocentowanie = $_POST['oprocentowanie'];

       $kredyt = new Kredyt();
     echo 'kwota miesiecznej raty:';
         $kredyt->kwotaMiesieczne($kwota, $oprocentowanie);
      $kredyt->kapitalDoSplaty($kwota, $ilosc, $oprocentowanie);
      $kredyt->kwotaOdsetek($kwota, $ilosc, $oprocentowanie);
      }
        ?> 
       
        <form method="post">
            <input name="kwota">Wprowadz kwote kredytu<br>
            <input name="ilosc">Wprawdz ilosc rat<br>
            <input name="oprocentowanie">Wprowadz oprocentowanie roczne<br>
            <input type="submit" name="wyslij" value="wyslij">
            
            
        </form>
    </body>
</html>
