<?php

// Pas dag.txt aan naar bijbehorende dag.
$lijst = explode("\n", file_get_contents('dag3.txt'));

$ans1 = 0;
$ans2 = 0;

function bepaalEpsilonEnGammaEnVermenigVuldigDeze($lijst, $ans) {
    $aantalChars = strlen($lijst[0]);
    $epsilonArray = array();
    $gammaArray = array();

    $epsilonString = '';
    $gammaString = '';

    for($i = 0; $i < $aantalChars - 1 ; $i++) {
        $nul = 0;
        $een = 0;

        foreach($lijst as $index => $regel) {
            $splitWoord = str_split($regel);

            $splitWoord[$i] == 0 ? ($nul += 1) : ($een += 1);
        }
        $nul > $een ? ($epsilonArray[] = 0) & ($gammaArray[] = 1) : ($epsilonArray[] = 1) & ($gammaArray[] = 0);

        $epsilonString .= $epsilonArray[$i];
        $gammaString .= $gammaArray[$i];

        echo $epsilonString;
        $nul = 0;
        $een = 0;
    }

    $gamma = $gammaString;
    $epsilon = $epsilonString;

    $gammaDecimaal = bindec($gamma);
    $epsilonDecimaal = bindec($epsilon);

    $ans = $gammaDecimaal * $epsilonDecimaal;

    return $ans;
}

$ans1 = bepaalEpsilonEnGammaEnVermenigVuldigDeze($lijst, $ans1);

echo "Antwoord op vraag 1: $ans1";
echo "</br>";
echo "Antwoord op vraag 2: $ans2";

?>