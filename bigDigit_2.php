<?php

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

	$start = microtime(true);
	$repetition = 1000000;
	$strDigit = '0123';
	$countDigit = strlen($strDigit);
	$allLen = $repetition * $countDigit *4;

	$result = ['','','','',''];
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
					foreach ($bigDigit[$digKey][$key] as $iD => $value) {
						// $m = ($i * $countDigit * 4) + $index *4 + $iD;
						// $resultInt[$key][$m] = $value;
						$resultInt[$key][($i * $countDigit * 4) + $index *4 + $iD] = $value;
					}
				}
			}
		}
	}

	echo "repetition $repetition \n";

	printf(" %.4F sec.\n", microtime(true) - $start);

	implode('', $resultInt[0]->toArray()) ."\n";
	implode('', $resultInt[1]->toArray()) ."\n";
	implode('', $resultInt[2]->toArray()) ."\n";
	implode('', $resultInt[3]->toArray()) ."\n";
	implode('', $resultInt[4]->toArray()) ."\n";

	printf(' %.4F sec.', microtime(true) - $start);
	echo "\n";
};

$main();
