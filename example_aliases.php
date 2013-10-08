<?php

// base 58 alias
function bc_base58_encode($num) {
	return bc_arb_encode($num, '123456789abcdefghijkmnopqrstuvwxyzABCDEFGHJKLMNPQRSTUVWXYZ');
}
function bc_base58_decode($num) {
	return bc_arb_decode($num, '123456789abcdefghijkmnopqrstuvwxyzABCDEFGHJKLMNPQRSTUVWXYZ');
}

//hexdec with BCmath
function bc_hexdec($num) {
	return bc_arb_decode(strtolower($num), '0123456789abcdef');
}
function bc_dechex($num) {
	return bc_arb_encode($num, '0123456789abcdef');
}
