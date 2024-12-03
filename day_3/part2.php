<?php
    $array_file = file("test.txt");
    $total = 0;
    $do = true;
    foreach($array_file as $array) {
        $matchs = [];
        preg_match_all("/(mul\([0-9]{1,3},[0-9]{1,3}\))|(don't\(\))|(do\(\))/m", $array, $matchs);
        foreach($matchs[0] as $match) {
            if($match == 'do()')
                $do = true;
            else if($match == "don't()")
                $do = false;
            else if($do) {
                $match = substr($match, 4, -1);
                $split = explode(",", $match);
                $total = $total + intval($split[0]) * intval($split[1]);
            }
        }
    }
    echo($total);
?>