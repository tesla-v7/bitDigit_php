<?php

$space = ord(' ');
$zero = ord('0');
$one = ord('1');
$two = ord('2');
$three = ord('3');
$four = ord('4');
$five = ord('5');
$six = ord('6');
$seven = ord('7');
$eight = ord('8');
$nine = ord('9');

$bigDigit = [
	'0'=>[[$space, $zero,  $zero,  $space,],
		  [$zero,  $space, $space, $zero,],
		  [$zero,  $space, $space, $zero,],
		  [$zero,  $space, $space, $zero,],
		  [$space, $zero,  $zero,  $space,],],
	'1'=>[[$space,$space, $one, $space,],
		  [$space,$one,   $one, $space,],
		  [$space,$space, $one, $space,],
		  [$space,$space, $one, $space,],
		  [$space,$one,   $one, $one,],],
	'2'=>[[$space,$two,   $two,   $space,],
		  [$two,  $space, $space, $two,],
		  [$space,$space, $two,   $space],
		  [$two,  $space, $space, $space,],
		  [$two,  $two,   $two,   $two,],],
	'3'=>[[$space,$three, $three, $space,],
		  [$three,$space, $space, $three,],
		  [$space,$space, $three, $space,],
		  [$three,$space, $space, $three,],
		  [$space,$three, $three, $space,],],
	'4'=>[[$space,$space, $space, $space,],
		  [$space,$space, $space, $space,],
		  [$space,$space, $space, $space,],
		  [$space,$space, $space, $space,],
		  [$space,$space, $space, $space,],],
	'5'=>[[$five, $five,  $five,  $five,],
		  [$five, $space, $space, $space,],
		  [$five, $five,  $five,  $space,],
		  [$space,$space, $space, $five,],
		  [$five, $five,  $five,  $space,],],
	'6'=>[[$space,$six,   $six,   $space,],
		  [$six,  $space, $space, $space,],
		  [$six,  $six,   $six,   $space,],
		  [$six,  $space, $space, $six,],
		  [$space,$six,   $six,   $space,],],
	'7'=>[[$seven,$seven, $seven, $seven,],
		  [$space,$space, $space, $seven,],
		  [$space,$space, $seven, $space,],
		  [$space,$seven, $space, $space,],
		  [$seven,$space, $space, $space,],],
	'8'=>[[$space,$eight, $eight, $space,],
		  [$eight,$space, $space, $eight,],
		  [$space,$eight, $eight, $space,],
		  [$eight,$space, $space, $eight,],
		  [$space,$eight, $eight, $space,],],
	'9'=>[[$space,$nine,  $nine,  $space,],
		  [$nine, $space, $space, $nine,],
		  [$space,$nine,  $nine,  $nine,],
		  [$space,$space, $space, $nine,],
		  [$space,$nine,  $nine,  $space,],],
];


$main = function()use($bigDigit){

	$start = microtime(true);
	$repetition = 1000000;
	$strDigit = '0123';
	$countDigit = strlen($strDigit);
	$allLen = $repetition * $countDigit *4;
	$result = ['','','','',''];
;
	$resultInt = [
	new SplFixedArray($allLen),
	new SplFixedArray($allLen),
	new SplFixedArray($allLen),
	new SplFixedArray($allLen),
	new SplFixedArray($allLen),
	];

	$step = microtime(true);
	for($i =0; $i < $repetition; $i++){
		for ($index = 0; $index < strlen($strDigit); $index++) {
			$digKey = $strDigit[$index];

			if(!empty($bigDigit[$digKey])){
				foreach ($resultInt as $key => $line) {
					foreach ($bigDigit[$digKey][$key] as $iD => $valueInt) {
						// $m = ($i * $countDigit * 4) + $index *4 + $iD;
						// $resultInt[$key][$m] = $valueInt;
						$resultInt[$key][($i * $countDigit * 4) + $index *4 + $iD] = $valueInt;
					}
				}
				// $result[0] .= bigDigit[$digKey][0];
				// $result[1] .= bigDigit[$digKey][1];
				// $result[2] .= bigDigit[$digKey][2];
				// $result[3] .= bigDigit[$digKey][3];
				// $result[4] .= bigDigit[$digKey][4];
			}
		}
	}

	echo "repetition $repetition \n";
	printf(" %.4F sec.\n", microtime(true) - $start);
	$result[0] = pack('C*', ...$resultInt[0]);
	$result[1] = pack('C*', ...$resultInt[1]);
	$result[2] = pack('C*', ...$resultInt[2]);
	$result[3] = pack('C*', ...$resultInt[3]);
	$result[4] = pack('C*', ...$resultInt[4]);


	printf(' %.4F sec.', microtime(true) - $start);
	echo "\n";
};
$main();
