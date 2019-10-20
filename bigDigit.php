<?php

const bigDigit = [
	'0'=>[" 00 ",
		  "0  0",
		  "0  0",
		  "0  0",
		  " 00 "],
	'1'=>["  1 ",
		  " 11 ",
		  "  1 ",
		  "  1 ",
		  " 111"],
	'2'=>[" 22 ",
		  "2  2",
		  "  2 ",
		  "2   ",
		  "2222"],
	'3'=>[" 33 ",
		  "3  3",
		  "  3 ",
		  "3  3",
		  " 33 "],
	'4'=>["4  4",
		  "4  4",
		  "4444",
		  "   4",
		  "   4"],
	'5'=>["5555",
		  "5   ",
		  "555 ",
		  "   5",
		  "555 "],
	'6'=>[" 66 ",
		  "6   ",
		  "666 ",
		  "6  6",
		  " 66 "],
	'7'=>["7777",
		  "   7",
		  "  7 ",
		  " 7  ",
		  "7   "],
	'8'=>[" 88 ",
		  "8  8",
		  " 88 ",
		  "8  8",
		  " 88 "],
	'9'=>[" 99 ",
		  "9  9",
		  " 999",
		  "   9",
		  " 99 "],
	'-'=>["    ",
		  "    ",
		  "----",
		  "    ",
		  "    "],
];

function main(){
	// var_dump($argv);
	// if(count($argv)==1){
	// 	return;
	// }
	$start = microtime(true);
	// $strDigit = '0-1-2-3-4-5-6-7-8-9';
	$repetition = 10000;
	$strDigit = '0123';
	$result = ['','','','',''];
	$resultAll = [[],[],[],[],[]];


	$step = microtime(true);
	for($i =0; $i < $repetition; $i++){
		for ($index = 0; $index < strlen($strDigit); $index++) {
			$digKey = $strDigit[$index];
			//var_dump(bigDigit[$digKey]);
			if(!empty(bigDigit[$digKey])){
				foreach ($result as $key => $line) {
					$result[$key] .= bigDigit[$digKey][$key];
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
	echo strlen($result[0]) . " ?\n";

	// var_dump($resultAll);
	printf(' %.4F sec.', microtime(true) - $start);
	echo "\n";
}
main();
