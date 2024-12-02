<?php
    $array_file = file("test.txt");
    $safe = 0;
    foreach($array_file as $array) {
        echo("start 1 ligne\n");
        $order = null;
        $last_level = null;
        $is_safe = true;
        $split = explode(' ', $array);
        foreach($split as $level) {
            if(!$last_level) {
                $last_level = $level;
                continue;
            }
            $diff = $last_level - $level;
            $last_level = $level;
            if(abs($diff) > 3){
                $is_safe = false;
                break;
            }

            if($diff > 0) {
                if(!$order) {
                    $order = 'DESC';
                } else if($order != 'DESC') {
                    $is_safe = false;
                    break;
                }
            } else if($diff < 0){
                if(!$order) {
                    $order = 'ASC';
                } else if($order != 'ASC') {
                    $is_safe = false;
                    break;
                }
            } else {
                $is_safe = false;
            }
        }
        if($is_safe) {
            $safe++;
        }
    }
    echo($safe);
?>