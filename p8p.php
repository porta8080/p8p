<?php

$_RAW = file_get_contents('php://input');

try{
  $_JSON = json_decode($_RAW,true);
}catch($e){
  $_JSON = array();
}

try{
  parse_str($_RAW,$_QS);
}catch($e){
  $_QS = array();
}

function array_flatten($a){
    $r = array();

    foreach($a as $i){
        if(!is_null($i)) $r[] = $i;
    }

    return $r;
}

function array_max_key($a){
	if(count($a)) return max(array_keys($a));
	return 0;
}

function array_insert($a,$b,$index){
	if(!is_array($b)) $b = array($b);

	$max = array_max_key($a);
    if($index > $max) $max = $index;
    $ab = array();
    $max++;

    for($i=0;$i<$max;$i++){
        if(isset($a[$i]) && $i<$index){
            $ab[$i] = $a[$i];
        }else if($i == $index){
            $_max = count($b);
            for($j=0;$j<$_max;$j++){
                $ab[$i+$j] = $b[$j];
            }

            if(isset($a[$i])) $ab[] = $a[$i];
        }else if(isset($a[$i])){
			if(isset($ab[$i])) $ab[] = $a[$i];
            else $ab[$i] = $a[$i];
        }
    }

    return $ab;
}

function is_even($a){
  return $a % 2 == 0;
}

function is_odd($a){
  return $a % 2 != 0;
}
  
function array_select($callback, $a){
    $r = array();

    foreach($a as $i){
        if(call_user_func($callback, $i)) $r[] = $i;
    }

    return $r;
}

function array_random($a,$amount=false){
  if(!$amount) $amount = 1;
  $l = count($a);
  if($amount > $l) $amount = $l;
  
  $a_ = array();
  for($i=0;$i<$amount;$i++){
    $pos = array_rand($a);
    $a_[] = array_splice($a,$pos,1);
  }
  
  if($amount == 1) return $a_[0];
  return $a_;
}

?>
