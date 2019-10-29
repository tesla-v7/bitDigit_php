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
	// var_dump($argv);
	// if(count($argv)==1){
	// 	return;
	// }
// var_dump($bigDigit);

	$start = microtime(true);
	// $strDigit = '0-1-2-3-4-5-6-7-8-9';
	$repetition = 50000;
	$strDigit = '0123';
	$countDigit = strlen($strDigit);
	$allLen = $repetition * $countDigit *4;
	var_dump($allLen);
	$result = ['','','','',''];
	$resultAll = [[],[],[],[],[]];
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
			// var_dump($bigDigit);
			if(!empty($bigDigit[$digKey])){
				foreach ($resultInt as $key => $line) {
					// $result[$key] .= $bigDigit[$digKey][$key];
					// copy(result[index][(i * countDigit *4) + (cmdIndex *4):], key[index])
					// var_dump($bigDigit);
					foreach ($bigDigit[$digKey][$key] as $iD => $valueInt) {
					// foreach ($bigDigit[$digKey][$key][0] as $iD => $valueInt) {
						// echo "$valueInt\n";
						// $i * $countDigit *4 + $index *4 + $iD +1
						$m = ($i * $countDigit * 4) + $index *4 + $iD;
						// echo "$m \n";
						$resultInt[$key][$m] = $valueInt;
						
					}
				}
				// $result[0] .= bigDigit[$digKey][0];
				// $result[1] .= bigDigit[$digKey][1];
				// $result[2] .= bigDigit[$digKey][2];
				// $result[3] .= bigDigit[$digKey][3];
				// $result[4] .= bigDigit[$digKey][4];
			}
		}
		
		// if(!($i % 10000)){

		// 	// foreach ($result as $key => $line) {
		// 	// 	$resultAll[$key][] = $result[$key];
		// 	// }
		// 	// $result = ['','','','',''];

		// 	echo $i ."\n";
		// 	echo "len result " . strlen($result[0]) ."\n";
		// 	// echo "len result " . count($result[0]) ."\n";
		// 	printf(' %.4F sec.', microtime(true) - $step);
		// 	echo "\n";
		// 	$step = microtime(true);
		// };

	}
	// var_dump($result);
	// echo implode("\n", $result) ."\n";
	echo "j $repetition \n";
	echo count($resultInt[0]) . " ?\n";
	$result[0] = pack('C*', ...$resultInt[0]);
	$result[1] = pack('C*', ...$resultInt[1]);
	$result[2] = pack('C*', ...$resultInt[2]);
	$result[3] = pack('C*', ...$resultInt[3]);
	$result[4] = pack('C*', ...$resultInt[4]);
	// echo $result[0] ."\n";
	// echo $result[1] ."\n";
	// echo $result[2] ."\n";
	// echo $result[3] ."\n";
	// echo $result[4] ."\n";

	// var_dump($resultAll);
	printf(' %.4F sec.', microtime(true) - $start);
	echo "\n";
};
$main();
