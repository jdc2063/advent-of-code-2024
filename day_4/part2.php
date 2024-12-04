<?php
    $array_file = file("test.txt");
    $total = 0;
    $count_line = count($array_file);
    foreach($array_file as $key_y => $array) {
        $count_char = strlen($array);
        for($i = 0; $i < $count_char; $i++) {
            if($array[$i] != 'A')
                continue;

            if($i + 1 <= $count_char - 1 && $key_y + 1 <= $count_line - 1 && $i - 1 >= 0 && $key_y - 1 >= 0) {
                $total += CheckMMSS($array_file, $count_line, $count_char, $key_y, $i);
                $total += CheckMSMS($array_file, $count_line, $count_char, $key_y, $i);
                $total += CheckSSMM($array_file, $count_line, $count_char, $key_y, $i);
                $total += CheckSMSM($array_file, $count_line, $count_char, $key_y, $i);
            }
        }
    }
    echo($total);

    //  \|
    //  -
    function CheckMMSS($all, $nbr_line, $nbr_char, $pos_line, $pos_char) {
        if($all[$pos_line - 1][$pos_char - 1] == 'M' && $all[$pos_line - 1][$pos_char + 1] == 'M' && $all[$pos_line + 1][$pos_char - 1] == 'S' && $all[$pos_line + 1][$pos_char + 1] == 'S')
            return 1;
        return 0;
    }
    
    //  |/
    //  -
    function CheckMSMS($all, $nbr_line, $nbr_char, $pos_line, $pos_char) {
        if($all[$pos_line - 1][$pos_char - 1] == 'M' && $all[$pos_line - 1][$pos_char + 1] == 'S' && $all[$pos_line + 1][$pos_char - 1] == 'M' && $all[$pos_line + 1][$pos_char + 1] == 'S')
            return 1;
        return 0;
    }

    
    //  \|
    //  -
    function CheckSSMM($all, $nbr_line, $nbr_char, $pos_line, $pos_char) {
        if($all[$pos_line - 1][$pos_char - 1] == 'S' && $all[$pos_line - 1][$pos_char + 1] == 'S' && $all[$pos_line + 1][$pos_char - 1] == 'M' && $all[$pos_line + 1][$pos_char + 1] == 'M')
            return 1;
        return 0;
    }
    
    //  |/
    //  -
    function CheckSMSM($all, $nbr_line, $nbr_char, $pos_line, $pos_char) {
        if($all[$pos_line - 1][$pos_char - 1] == 'S' && $all[$pos_line - 1][$pos_char + 1] == 'M' && $all[$pos_line + 1][$pos_char - 1] == 'S' && $all[$pos_line + 1][$pos_char + 1] == 'M')
            return 1;
        return 0;
    }
?>