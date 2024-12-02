<?php
    $array_file = file("test.txt");
    $left = [];
    $right = [];
    foreach($array_file as $array) {
        $split = explode('   ', $array);
        $left[] = $split[0];
        $right[] = $split[1];
    }
    sort($left);
    sort($right);
    $diff = 0;
    for($i = 0; $i < count($array_file); $i++) {
        $diff = $diff + abs((intval($left[$i]) - intval($right[$i])));
    }
    echo($diff);
?>