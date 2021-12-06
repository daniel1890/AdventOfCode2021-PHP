<?php

// Pas dag.txt aan naar bijbehorende dag.
$lijst = explode("\n", file_get_contents('dag3.txt'));

$ans1 = 0;
$ans2 = 0;

function bepaalEpsilonEnGammaEnVermenigVuldigDeze($lijst, $ans) {
    $aantalChars = strlen($lijst[0]);

    $epsilonString = '';
    $gammaString = '';

    for($i = 0; $i < $aantalChars - 1 ; $i++) {
        $nul = 0;
        $een = 0;

        foreach($lijst as $index => $regel) {
            $splitWoord = str_split($regel);

            $splitWoord[$i] == 0 ? ($nul += 1) : ($een += 1);
        }
        $nul > $een ? ($epsilonString .= 0) & ($gammaString .= 1) : ($epsilonString .= 1) & ($gammaString .= 0);

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

function bepaalOxyEnCO2EnVermenigVuldigDeze($lijst, $ans) {
    $aantalChars = strlen($lijst[0]);
    $oxyLijst = $lijst;
    $o2Lijst = $lijst;
    $oxy;
    $o2;

    // bepaal oxy
    for($i = 0; $i < $aantalChars - 1 ; $i++) {
        $nul = 0;
        $een = 0;

        foreach($oxyLijst as $index => $regel) {
            $splitWoord = str_split($regel);

            $splitWoord[$i] == 0 ? ($nul += 1) : ($een += 1);
        }
        
        if ($een >= $nul) {
            foreach($oxyLijst as $index => $regel) {
                $splitWoord = str_split($regel);
    
                if ($splitWoord[$i] == 0 && count($oxyLijst) > 1) {
                    unset($oxyLijst[$index]);
                }
            }
        }
        else {
            foreach($oxyLijst as $index => $regel) {
                $splitWoord = str_split($regel);
    
                if ($splitWoord[$i] == 1 && count($oxyLijst) > 1) {
                    unset($oxyLijst[$index]);
                }
            }
        }

        $nul = 0;
        $een = 0;
    }

    // bepaal co2
    for($i = 0; $i < $aantalChars - 1 ; $i++) {
        $nul = 0;
        $een = 0;

        foreach($o2Lijst as $index => $regel) {
            $splitWoord = str_split($regel);

            $splitWoord[$i] == 0 ? ($nul += 1) : ($een += 1);
        }
        
        if ($nul > $een) {
            foreach($o2Lijst as $index => $regel) {
                $splitWoord = str_split($regel);
    
                if ($splitWoord[$i] == 0 && count($o2Lijst) > 1) {
                    unset($o2Lijst[$index]);
                }
            }
        }
        else {
            foreach($o2Lijst as $index => $regel) {
                $splitWoord = str_split($regel);
    
                if ($splitWoord[$i] == 1 && count($o2Lijst) > 1){
                    unset($o2Lijst[$index]);
                }
            }
        }

        $nul = 0;
        $een = 0;
    }

    $oxy = array_pop($oxyLijst);
    $o2 = array_pop($o2Lijst);

    $oxyDecimaal = bindec($oxy);
    $o2Decimaal = bindec($o2);

    $ans = $oxyDecimaal * $o2Decimaal;

    return $ans;
}

$ans1 = bepaalEpsilonEnGammaEnVermenigVuldigDeze($lijst, $ans1);
$ans2 = bepaalOxyEnCO2EnVermenigVuldigDeze($lijst, $ans2);

echo "Antwoord op vraag 1: $ans1";
echo "</br>";
echo "Antwoord op vraag 2: $ans2";

?>