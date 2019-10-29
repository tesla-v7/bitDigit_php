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
	'0'=>[[' ','0','0',' ',],
		  ['0',' ',' ','0',],
		  ['0',' ',' ','0',],
		  ['0',' ',' ','0',],
		  [' ','0','0',' '],],
	'1'=>[[' ',' ','1',' ',],
		  [' ','1','1',' ',],
		  [' ',' ','1',' ',],
		  [' ',' ','1',' ',],
		  [' ','1','1','1'],],
	'2'=>[[' ','2','2',' ',],
		  ['2',' ',' ','2',],
		  [' ',' ','2',' ',],
		  ['2',' ',' ',' ',],
		  ['2','2','2','2'],],
	'3'=>[[' ','3','3',' ',],
		  ['3',' ',' ','3',],
		  [' ',' ','3',' ',],
		  ['3',' ',' ','3',],
		  [' ','3','3',' '],],
	'4'=>[['4',' ',' ','4',],
		  ['4',' ',' ','4',],
		  ['4','4','4','4',],
		  [' ',' ',' ','4',],
		  [' ',' ',' ','4'],],
	'5'=>[['5','5','5','5',],
		  ['5',' ',' ',' ',],
		  ['5','5','5',' ',],
		  [' ',' ',' ','5',],
		  ['5','5','5',' '],],
	'6'=>[[' ','6','6',' ',],
		  ['6',' ',' ',' ',],
		  ['6','6','6',' ',],
		  ['6',' ',' ','6',],
		  [' ','6','6',' '],],
	'7'=>[['7','7','7','7',],
		  [' ',' ',' ','7',],
		  [' ',' ','7',' ',],
		  [' ','7',' ',' ',],
		  ['7',' ',' ',' '],],
	'8'=>[[' ','8','8',' ',],
		  ['8',' ',' ','8',],
		  [' ','8','8',' ',],
		  ['8',' ',' ','8',],
		  [' ','8','8',' '],],
	'9'=>[[' ','9','9',' ',],
		  ['9',' ',' ','9',],
		  [' ','9','9','9',],
		  [' ',' ',' ','9',],
		  [' ','9','9',' '],],
	'-'=>[[' ',' ',' ',' ',],
		  [' ',' ',' ',' ',],
		  ['-','-','-','-',],
		  [' ',' ',' ',' ',],
		  [' ',' ',' ',' '],],
];


$main = function()use($bigDigit){
	// var_dump($argv);
	// if(count($argv)==1){
	// 	return;
	// }
// var_dump($bigDigit);

	$start = microtime(true);
	// $strDigit = '0-1-2-3-4-5-6-7-8-9';
	$repetition = 1000000;
	$strDigit = '0123';
	$countDigit = strlen($strDigit);
	$allLen = $repetition * $countDigit *4;
	//var_dump($allLen);
	$result = ['','','','',''];
	//$resultAll = [[],[],[],[],[]];
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
					foreach ($bigDigit[$digKey][$key] as $iD => $value) {
					// foreach ($bigDigit[$digKey][$key][0] as $iD => $valueInt) {
						// echo "$valueInt\n";
						// $i * $countDigit *4 + $index *4 + $iD +1
						$m = ($i * $countDigit * 4) + $index *4 + $iD;
						// echo "$m \n";
						$resultInt[$key][$m] = $value;
						
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
	printf(" %.4F sec.\n", microtime(true) - $start);
	/*$result[0] = pack('C*', ...$resultInt[0]);
	$result[1] = pack('C*', ...$resultInt[1]);
	$result[2] = pack('C*', ...$resultInt[2]);
	$result[3] = pack('C*', ...$resultInt[3]);
	$result[4] = pack('C*', ...$resultInt[4]);*/
	implode('', $resultInt[0]->toArray()) ."\n";
	implode('', $resultInt[1]->toArray()) ."\n";
	implode('', $resultInt[2]->toArray()) ."\n";
	implode('', $resultInt[3]->toArray()) ."\n";
	implode('', $resultInt[4]->toArray()) ."\n";

	// echo implode('', $resultInt[0]->toArray()) ."\n";
	// echo implode('', $resultInt[1]->toArray()) ."\n";
	// echo implode('', $resultInt[2]->toArray()) ."\n";
	// echo implode('', $resultInt[3]->toArray()) ."\n";
	// echo implode('', $resultInt[4]->toArray()) ."\n";

	// var_dump($resultAll);
	printf(' %.4F sec.', microtime(true) - $start);
	echo "\n";
};
$main();
