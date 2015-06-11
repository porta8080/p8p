<?php

function array_flatten($a){
    $r = array();

    foreach($a as $i){
        if($i !== null) $r[] = $i;
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

?>
