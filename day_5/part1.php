<?php
    $array_file = file("test.txt");
    $total = 0;
    $is_rules = true;
    $rules = [];
    foreach($array_file as $key => $array) {
        if(trim($array) === ""){
            $is_rules = false;
            continue;
        }
        
        if($is_rules) {
            $rules[trim($array)] = true;
        }
        else {
            $ok = true;
            $line = explode(',', $array);
            foreach($line as $key_1 => $number) {
                foreach($line as $key_2 => $number1) {
                    if($key_1 == $key_2)
                        break;
                    $rule = trim($number) . '|' . trim($number1);
                    if(isset($rules[$rule])) {
                        $ok = false;
                        break 2;
                    }
                }
            }
            if($ok) {
                $total = $total + $line[(count($line) - 1) / 2];
            }
        }
    }
    echo($total);
?>