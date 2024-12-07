<?php
    function checkOrder($line, $rules) {
        $error_rules = [];
        foreach($line as $key_1 => $number) {
            foreach($line as $key_2 => $number1) {
                if($key_1 == $key_2)
                    break;
                $rule = trim($number) . '|' . trim($number1);
                if(isset($rules[$rule])) {
                    return array($key_2, $key_1);
                }
            }
        }
        return [];
    }

    function SwitchOrder($line, $index1, $index2) {
        while($index1 < $index2){
            $value1 = $line[$index1];
            $value2 = $line[$index1 + 1];
            $line[$index1] = $value2;
            $line[$index1 + 1] = $value1;
            $index1++;
        }
        return $line;
    }

    $array_file = file("test.txt");
    $total = 0;
    $is_rules = true;
    $rules = [];
    foreach($array_file as $key => $array) {
        echo("line $key\n");
        if(trim($array) === ""){
            $is_rules = false;
            continue;
        }
        
        if($is_rules) {
            $rules[trim($array)] = true;
        }
        else {
            $line = explode(',', $array);
            $error_rules = checkOrder($line, $rules);
            if($error_rules !== []) {
                while ($error_rules !== []) {
                    $line = SwitchOrder($line, $error_rules[0], $error_rules[1]);
                    $error_rules = checkOrder($line, $rules);
                    // print_r($line);
                }
                $total = $total + $line[(count($line) - 1) / 2];
            }
        }
    }
    echo($total);
?>