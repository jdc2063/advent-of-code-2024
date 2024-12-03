<?php
    $array_file = file("test.txt");
    $total = 0;
    foreach($array_file as $array) {
        $matchs = [];

        preg_match_all("#mul\([0-9]{1,3},[0-9]{1,3}\)#", $array, $matchs);
        foreach($matchs[0] as $match) {
            $match = substr($match, 4, -1);
            $split = explode(",", $match);
            $total = $total + intval($split[0]) * intval($split[1]);
        }
    }
    echo($total);
?>