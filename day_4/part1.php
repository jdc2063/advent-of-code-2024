<?php
    $array_file = file("test.txt");
    $total = 0;
    $count_line = count($array_file);
    foreach($array_file as $key_y => $array) {
        $count_char = strlen($array);
        for($i = 0; $i < $count_char; $i++) {
            if($array[$i] != 'X')
                continue;

            if(CheckWestEst($array_file, $count_line, $count_char, $key_y, $i)){
                $total++;
            }

            if(CheckEstWest($array_file, $count_line, $count_char, $key_y, $i)){
                $total++;
            }

            if(CheckNorthSouth($array_file, $count_line, $count_char, $key_y, $i)){
                $total++;
            }

            if(CheckSouthNorth($array_file, $count_line, $count_char, $key_y, $i)){
                $total++;
            }

            if(CheckNorthWestSouthEst($array_file, $count_line, $count_char, $key_y, $i)){
                $total++;
            }
        
            if(CheckNorthEstSouthWest($array_file, $count_line, $count_char, $key_y, $i)){
                $total++;
            }
                
            if(CheckSouthWestNorthEst($array_file, $count_line, $count_char, $key_y, $i)){
                $total++;
            }

            if(CheckSouthEstNorthWest($array_file, $count_line, $count_char, $key_y, $i)){
                $total++;
            }
                
        }
    }
    echo($total);

    // ->
    function CheckWestEst($all, $nbr_line, $nbr_char, $pos_line, $pos_char) {
        if($pos_char + 3 <= $nbr_char - 1) {
            if($all[$pos_line][$pos_char + 1] == 'M' && $all[$pos_line][$pos_char + 2] == 'A' && $all[$pos_line][$pos_char + 3] == 'S')
                return true;
        }
        return false;
    }
    
    // <-
    function CheckEstWest($all, $nbr_line, $nbr_char, $pos_line, $pos_char) {
        if($pos_char - 3 >= 0) {
            if($all[$pos_line][$pos_char - 1] == 'M' && $all[$pos_line][$pos_char - 2] == 'A' && $all[$pos_line][$pos_char - 3] == 'S')
                return true;
        }
        return false;
    }
    
    function CheckNorthSouth($all, $nbr_line, $nbr_char, $pos_line, $pos_char) {
        if($pos_line + 3 <= $nbr_line - 1) {
            if($all[$pos_line + 1][$pos_char] == 'M' && $all[$pos_line + 2][$pos_char] == 'A' && $all[$pos_line + 3][$pos_char] == 'S')
                return true;
        }
        return false;
    }
    
    function CheckSouthNorth($all, $nbr_line, $nbr_char, $pos_line, $pos_char) {
        if($pos_line - 3 >= 0) {
            if($all[$pos_line - 1][$pos_char] == 'M' && $all[$pos_line - 2][$pos_char] == 'A' && $all[$pos_line - 3][$pos_char] == 'S')
                return true;
        }
        return false;
    }

    //  \|
    //  -
    function CheckNorthWestSouthEst($all, $nbr_line, $nbr_char, $pos_line, $pos_char) {
        if($pos_char + 3 <= $nbr_char - 1 && $pos_line + 3 <= $nbr_line - 1) {
            if($all[$pos_line + 1][$pos_char + 1] == 'M' && $all[$pos_line + 2][$pos_char + 2] == 'A' && $all[$pos_line + 3][$pos_char + 3] == 'S')
                return true;
        }
        return false;
    }
    
    //  |/
    //  -
    function CheckNorthEstSouthWest($all, $nbr_line, $nbr_char, $pos_line, $pos_char) {
        if($pos_char - 3 >= 0 && $pos_line + 3 <= $nbr_line - 1) {
            if($all[$pos_line + 1][$pos_char - 1] == 'M' && $all[$pos_line + 2][$pos_char - 2] == 'A' && $all[$pos_line + 3][$pos_char - 3] == 'S')
                return true;
        }
        return false;
    }

    
    //  \|
    //  -
    function CheckSouthWestNorthEst($all, $nbr_line, $nbr_char, $pos_line, $pos_char) {
        if($pos_char + 3 <= $nbr_char - 1 && $pos_line - 3 >= 0) {
            if($all[$pos_line - 1][$pos_char + 1] == 'M' && $all[$pos_line - 2][$pos_char + 2] == 'A' && $all[$pos_line - 3][$pos_char + 3] == 'S')
                return true;
        }
        return false;
    }
    
    //  |/
    //  -
    function CheckSouthEstNorthWest($all, $nbr_line, $nbr_char, $pos_line, $pos_char) {
        if($pos_char - 3 >= 0 && $pos_line - 3 >= 0) {
            if($all[$pos_line - 1][$pos_char - 1] == 'M' && $all[$pos_line - 2][$pos_char - 2] == 'A' && $all[$pos_line - 3][$pos_char - 3] == 'S')
                return true;
        }
        return false;
    }
?>