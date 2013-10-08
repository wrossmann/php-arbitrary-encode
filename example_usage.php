<?php

// example
$orig    = '00ba084d3f143f2896809d3f1d7dffed472b39d8de7a39cf51';
$bten    = bc_hexdec($orig);
$base58  = bc_base58_encode($bten);
$backten = bc_base58_decode($base58);
$back    = bc_dechex($backten);
echo "Orig: " . $orig . "\n";
echo "bten: " . $bten . "\n";
echo "58:   " . $base58 . "\n";
echo "ag10: " . $backten . "\n";
echo "Back:   " . $back  . "\n";

/* Output
Orig: 00ba084d3f143f2896809d3f1d7dffed472b39d8de7a39cf51
bten: 4561501878697784703577561586669353227270827349968709865297
58:   hXDCuKCfakkTkZQjfEdbZoYyqkQafE1CZ
ag10: 4561501878697784703577561586669353227270827349968709865297
Back:   ba084d3f143f2896809d3f1d7dffed472b39d8de7a39cf51
*/
