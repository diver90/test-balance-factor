<?php

const PAIRS = [
	"{" => "}",
	"[" => "]",
	"(" => ")"
];

const OPEN_SYMBOLS = "{[(";

$choose = (int)readline("
	Choose function to start: 1 - Balancer, 2 - Factor: ");

switch ($choose) {
	case 1:
		$file = file("balancer.txt");
		foreach($file as $string){
			if(!empty($string)){
				echo balancer($string) 
					? "String balanced: " . $string . PHP_EOL
					: "String not balanced: " . $string . PHP_EOL;
			}
			
		}
		break;

	case 2:
		$file = file("factor.txt");
			foreach($file as $string){
				if(!empty($string)){
					$string = trim($string);
					$multiplier = strrchr($string, ", ");
					$array = json_decode(rtrim($string, $multiplier));
					$multiplier = intval(ltrim($multiplier, ", "));
					echo "Array, multiplied by " . $multiplier . ":" . PHP_EOL 
						. json_encode((factor($array, $multiplier))) . PHP_EOL;
				}
		}
		break;
	
	default:
		echo "Entered wrong number";
		break;
}

function balancer(string $string_to_balance){
	$resultArray = [];

	$charsCount["{"] = substr_count($string_to_balance, "{");
	$charsCount["["] = substr_count($string_to_balance, "[");
	$charsCount["("] = substr_count($string_to_balance, "(");
	$charsCount["}"] = substr_count($string_to_balance, "}");
	$charsCount["]"] = substr_count($string_to_balance, "]");
	$charsCount[")"] = substr_count($string_to_balance, ")");

	if(!empty($charsCount["{"])){
		do{
			$res1 = !empty($res1) ? strpos($string_to_balance, "{", ++$res1) : strpos($string_to_balance, "{");
			if($res1){
				$resultArray[$res1] = "{";
			}
		} while ($res1);

	} elseif (!empty($charsCount["}"])){
		echo "1";
		return false;
	}

	if(!empty($charsCount["("])){
			do{
				$res2 = !empty($res2) ? strpos($string_to_balance, "(", ++$res2) : strpos($string_to_balance, "(");
			if($res2){
				$resultArray[$res2] = "(";
			}
		} while ($res2);
	} elseif ($charsCount[")"]){
		echo "2";
		return false;
	}

	if(!empty($charsCount["["])){
			do{
			$res3 = !empty($res3) ? strpos($string_to_balance, "[", ++$res3) : strpos($string_to_balance, "[");
			if($res3){
				$resultArray[$res3] = "[";
			}
		} while ($res3);
	} elseif (!empty($charsCount["]"])){
		echo "3";
		return false;
	}

	if(!empty($charsCount["}"])){
		do{
			$res4 = !empty($res4) ? strpos($string_to_balance, "}", ++$res4) : strpos($string_to_balance, "}");
			if($res4){
				$resultArray[$res4] = "}";
			}
		} while ($res4);

	} elseif(!empty($charsCount["{"])) {
		echo "4";
		return false;
	}

	if(!empty($charsCount[")"])){
		do{
			$res5 = !empty($res5) ? strpos($string_to_balance, ")", ++$res5) : strpos($string_to_balance, ")");
			if($res5){
				$resultArray[$res5] = ")";
			}
		} while ($res5);

	} elseif (!empty($charsCount["("])) {
		echo "5";
		return false;
	}

	if(!empty($charsCount["]"])){
		do{
			$res6 = !empty($res6) ? strpos($string_to_balance, "]", ++$res6) : strpos($string_to_balance, "]");
			if($res6){
				$resultArray[$res6] = "]";
			}
		} while ($res6);

	} elseif(!empty($charsCount["["])) {
		echo "6";
		return false;
	}

	ksort($resultArray);
	$resultArray = array_values($resultArray);

	$active = [];

	foreach($resultArray as $activePos){
		if(empty($active)){
		$active[] = $activePos;
		} else {
			if(strpos(OPEN_SYMBOLS, $activePos)){
				$active[] = $activePos;
			} else {
				$lastOpen = array_pop($active);
				if(PAIRS[$lastOpen] !== $activePos) return false;
			}
		}
	}

	return true;
}

function factor(array $array_to_factor, int $multipler){

	$result = [];
	foreach($array_to_factor as $value){
		if(is_array($value)){
			$result[] = factor($value, $multipler);
		} else {
			$result[] = $value * $multipler;
		}
	}

	return $result;
}
