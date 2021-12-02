<?php

$lijst = explode("\n", file_get_contents('dag1.txt'));

$ans1 = 0;
$ans2 = 0;

function verkrijgHoevaakHuidigeRegelGroterIsDanVorige($lijst, $ans) {
    $indexAns1 = 0;
    foreach($lijst as $regel) {
        $vorigeLijnBestaat = array_key_exists($indexAns1 -1, $lijst);
        $vorigeLijnBestaat ? $regel > $lijst[$indexAns1 - 1] ? $ans++ : '' : '';
        $indexAns1 ++;
    }

    return $ans;
}

$ans1 = verkrijgHoevaakHuidigeRegelGroterIsDanVorige($lijst, $ans1);

echo "Antwoord op vraag 1: $ans1";
echo "</br>";
echo "Antwoord op vraag 2: $ans2";

?>