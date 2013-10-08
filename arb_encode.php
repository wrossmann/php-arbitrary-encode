<?php

// original arbitrary encode function
function arb_encode($num, $basestr) {
	$base = strlen($basestr);
	$rep = '';

	while($num > 0) {
		$rem = $num % $base;
		$rep = $basestr[$rem] . $rep;
		$num = ($num - $rem) / $base;
	}
	return $rep;
}

function arb_decode($num, $basestr) {
	$base = strlen($basestr);
	$dec = 0;

	$num_arr = str_split((string)$num);
	$cnt = strlen($num);
	for($i=0; $i < $cnt; $i++) {
		$pos = strpos($basestr, $num_arr[$i]);
		if( $pos === false ) {
			Throw new Exception(sprintf('Unknown character %s at offset %d', $num_arr[$i], $i));
		}
		$dec = ($dec * $base) + $pos;
	}
	return $dec;
}

// BCmath version for huge numbers
function bc_arb_encode($num, $basestr) {
	if( ! function_exists('bcadd') ) {
		Throw new Exception('You need the BCmath extension.');
	}

	$base = strlen($basestr);
	$rep = '';

	while( true ){
		if( strlen($num) < 4 ) {
			// once the number is sufficiently small we
			// can check the integer value without worrying
			// about inconsistency.
			if( intval($num) <= 0 ) { break; }
		}
		$rem = bcmod($num, $base);
		$rep = $basestr[intval($rem)] . $rep;
		$num = bcdiv(bcsub($num, $rem), $base);
	}
	return $rep;
}

function bc_arb_decode($num, $basestr) {
	if( ! function_exists('bcadd') ) {
		Throw new Exception('You need the BCmath extension.');
	}

	$base = strlen($basestr);
	$dec = '0';

	$num_arr = str_split((string)$num);
	$cnt = strlen($num);
	for($i=0; $i < $cnt; $i++) {
		$pos = strpos($basestr, $num_arr[$i]);
		if( $pos === false ) {
			Throw new Exception(sprintf('Unknown character %s at offset %d', $num_arr[$i], $i));
		}
		$dec = bcadd(bcmul($dec, $base), $pos);
	}
	return $dec;
}
