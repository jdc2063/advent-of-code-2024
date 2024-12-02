<?php
    $array_file = file("test.txt");
    $left = [];
    $right = [];
    foreach($array_file as $array) {
        $split = explode('   ', $array);
        $key1 = trim($split[0]);
        $key2 = trim($split[1]);
        if(isset($left[$key1]))
            $left[$key1]++;
        else
            $left[$key1] = 1;
        if(isset($right[$key2]))
            $right[$key2]++;
        else
            $right[$key2] = 1;
    }
    $similarity = 0;
    foreach($left as $key => $value) {
        if(isset($right[$key])){
            $similarity = $similarity + intval($key) * intval($right[$key]);
        }
    }
    echo($similarity);
?>