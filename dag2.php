<?php

$lijst = explode("\n", file_get_contents('dag2.txt'));

$ans1 = 0;
$ans2 = 0;

$hor = 0;
$depth = 0;

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

$hor = berekenHor($lijst, $hor);
$depth = berekenDepth($lijst, $depth);

$ans1 = $hor * $depth;

echo "Antwoord op vraag 1: $ans1";
echo "</br>";
echo "Antwoord op vraag 2: $ans2";

?>