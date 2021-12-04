<?php

$lijst = explode("\n", file_get_contents('dag2.txt'));

$ans1 = 0;
$ans2 = 0;

$hor = 0;
$depth = 0;

$horEnDepth = array();

// Bereken horizontale positie
function berekenHor($lijst, $hor) {
    
    foreach($lijst as $index => $regel) {
        $splitRegel = explode(' ', $regel);
        $getal = $splitRegel[1];

        str_contains($regel, 'forward') ? $hor += $getal : '';
    }

    return $hor;
}

// Bereken diepte positie
function berekenDepth($lijst, $depth) {

    foreach($lijst as $index => $regel) {
        $splitRegel = explode(' ', $regel);
        $getal = $splitRegel[1];

        str_contains($regel, 'up') ? $depth -= $getal : '';
        str_contains($regel, 'down') ? $depth += $getal : '';
    }

    return $depth;
}

// bereken hor en depth binnen de functie en geef ze terug als array.
function berekenHorEnDepth($lijst, $horEnDepth) {
    $aim = 0;
    $hor = 0;
    $depth = 0;

    foreach($lijst as $index => $regel) {
        $splitRegel = explode(' ', $regel);
        $woord = $splitRegel[0];
        $getal = $splitRegel[1];

        str_contains($regel, 'up') ? $aim -= $getal : '';
        str_contains($regel, 'down') ? $aim += $getal : '';
        $aim < 0 ? $aim = 0: '';
        str_contains($regel, 'forward') ? ($hor += $getal) & ($depth += ($aim * $getal)) : '';
    }

    $horEnDepth[] = $hor;
    $horEnDepth[] = $depth;
    return $horEnDepth;
}

$hor = berekenHor($lijst, $hor);
$depth = berekenDepth($lijst, $depth);

$horEnDepth = berekenHorEnDepth($lijst, $horEnDepth);

$ans1 = $hor * $depth;
$ans2 = $horEnDepth[0] * $horEnDepth[1];

echo "Antwoord op vraag 1: $ans1";
echo "</br>";
echo "Antwoord op vraag 2: $ans2";

?>