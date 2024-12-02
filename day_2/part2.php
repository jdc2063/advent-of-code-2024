<?php
    function isInOrder ($split, $deleted = false) {
        $order = null;
        $last_level = null;
        $is_safe = true;
        $deleted_now = false;
        $nbr_part = count($split);
        foreach($split as $key => $level) {
            $level = intval($level);
            if(!$last_level) {
                $last_level = $level;
                continue;
            }
            $diff = $last_level - $level;
            if(abs($diff) > 3 || $diff == 0){
                $is_safe = false;
                $deleted_now = true;
                echo("BAD DIFF\n");
            }

            if($is_safe && $diff > 0) {
                if(!$order) {
                    $order = 'DESC';
                } else if($order != 'DESC') {
                    $is_safe = false;
                    $deleted_now = true;
                    echo("BAD ORDER DESC\n");
                }
            } else if($diff < 0){
                if(!$order) {
                    $order = 'ASC';
                } else if($order != 'ASC') {
                    $is_safe = false;
                    $deleted_now = true;
                    echo("BAD ORDER ASC\n");
                }
            } else {
                $is_safe = false;
                $deleted_now = true;
            }
            if(!$is_safe && $deleted) {
                echo("THE END\n");
                break;
            } elseif (!$is_safe && $deleted_now) {
                if($nbr_part - 1 == $key) {
                    $is_safe = true;
                    break;
                }
                $diff = $last_level - $split[$key+1];
                if(abs($diff) > 3 || $diff == 0){
                    echo("BAD DIFF 1 \n");
                    break;
                }
                if($diff > 0) {
                    if($key == 1) {
                        $order = 'DESC';
                    } else if($order != 'DESC') {
                        echo("BAD ORDER DESC 1\n");
                        break;
                    }
                } else if($diff < 0){
                    if($key == 1) {
                        $order = 'ASC';
                    } else if($order != 'ASC') {
                        echo("BAD ORDER ASC 1\n");
                        break;
                    }
                } else {
                    echo("BAD DIFF3\n");
                    break;
                }
                $is_safe = true;
                $deleted = true;
            }
            if($deleted_now) 
                $deleted_now = false;
            else 
                $last_level = $level;
        }
        return $is_safe;
    }

    $array_file = file("test.txt");
    $safe = 0;
    foreach($array_file as $line_key => $array) {
        $split = explode(' ', $array);
        $is_safe = isInOrder($split);
        if(!$is_safe) {
            unset($split[0]);
            $is_safe = isInOrder($split, true);
        }
        if($is_safe) {
            $safe++;
        } else {
            echo("ligne ".($line_key+ 1)."\n");
        }
        
    }
    echo($safe);
?>