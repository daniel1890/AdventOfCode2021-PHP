<?php

$lijst = explode("\n", file_get_contents('dag1.txt'));

$ans1 = 0;
$ans2 = 0;

// functie voor antwoord vraag 1
function verkrijgHoevaakHuidigeRegelGroterIsDanVorige($lijst, $ans) {
    foreach($lijst as $indexAns1 => $regel) {
        $vorigeLijnBestaat = array_key_exists($indexAns1 -1, $lijst);
        $vorigeLijnBestaat ? $regel > $lijst[$indexAns1 - 1] ? $ans++ : '' : '';
        $indexAns1 ++;
    }

    return $ans;
}

// functie voor antwoord vraag 2
function verkrijgHoevaakHuidigeVerzamelingGroterIsDanVorige($lijst, $ans) {
    //$indexAns2 = 0;
    $sumArray = array();

    foreach($lijst as $indexAns2 => $regel) {
        $sum = 0;

        $volgende2LijnenBestaan = array_key_exists($indexAns2 +2, $lijst);
        $volgende2LijnenBestaan ? $sum += ($lijst[$indexAns2] + $lijst[$indexAns2 + 1] + $lijst[$indexAns2 +2]) : '';
        $volgende2LijnenBestaan ? $sumArray[] = $sum : '';

        $indexAns2 ++;
    }

    $ans = verkrijgHoevaakHuidigeRegelGroterIsDanVorige($sumArray, $ans);

    return $ans;
}

$ans1 = verkrijgHoevaakHuidigeRegelGroterIsDanVorige($lijst, $ans1);
$ans2 = verkrijgHoevaakHuidigeVerzamelingGroterIsDanVorige($lijst, $ans2);

echo "Antwoord op vraag 1: $ans1";
echo "</br>";
echo "Antwoord op vraag 2: $ans2";

?>