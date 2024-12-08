<?php
    $array_file = file("test.txt");
    $total = 0;
    $grid = [];
    $gard_pos = [];
    $direction = 'UP';
    $length_x = strlen(trim($array_file[0]));
    //echo("$length_x\n");
    $length_y = count($array_file);
    foreach($array_file as $key => $array) {
        $grid[] = str_split(trim($array));
        $x = strpos($array, '^');
        if($x !== false) {
            //x, y
            $gard_pos = [$x, $key];
        }
    }
    $out = false;
    //UP -1 y
    //DOWN +1 y
    //LEFT -1 x
    //RIGHT +1 x
    while(!$out) {
        if($direction == 'UP') {
            if(0 > ($gard_pos[1] - 1)) {
                //echo("x " . $gard_pos[0] . " y ". $gard_pos[1] . " mouvement $direction STOP\n");
                $grid[$gard_pos[1]][$gard_pos[0]] = 'X';
                $out = true;
            } else if($grid[$gard_pos[1] - 1][$gard_pos[0]] != '#') {
                //echo("x " . $gard_pos[0] . " y ". $gard_pos[1] . " mouvement $direction MOVE\n");
                $grid[$gard_pos[1]][$gard_pos[0]] = 'X';
                $gard_pos[1] = $gard_pos[1] - 1;
            } else {
                //echo("x " . $gard_pos[0] . " y ". $gard_pos[1] . " mouvement $direction SWITCH\n");
                $direction = 'RIGHT';
            }
        } else if($direction == 'DOWN') {
            if($length_y <= ($gard_pos[1] + 1)) {
                //echo("x " . $gard_pos[0] . " y ". $gard_pos[1] . " mouvement $direction STOP\n");
                $grid[$gard_pos[1]][$gard_pos[0]] = 'X';
                $out = true;
            } else if($grid[$gard_pos[1] + 1][$gard_pos[0]] != '#') {
                //echo("x " . $gard_pos[0] . " y ". $gard_pos[1] . " mouvement $direction MOVE\n");
                $grid[$gard_pos[1]][$gard_pos[0]] = 'X';
                $gard_pos[1] = $gard_pos[1] +  1;
            } else {
                //echo("x " . $gard_pos[0] . " y ". $gard_pos[1] . " mouvement $direction SWITCH\n");
                $direction = 'LEFT';
            }
        } else if($direction == 'LEFT') {
            if(0 > ($gard_pos[0] - 1)) {
                //echo("x " . $gard_pos[0] . " y ". $gard_pos[1] . " mouvement $direction STOP\n");
                $grid[$gard_pos[1]][$gard_pos[0]] = 'X';
                $out = true;
            } else if($grid[$gard_pos[1]][$gard_pos[0] - 1] != '#') {
                //echo("x " . $gard_pos[0] . " y ". $gard_pos[1] . " mouvement $direction MOVE\n");
                $grid[$gard_pos[1]][$gard_pos[0]] = 'X';
                $gard_pos[0] = $gard_pos[0] - 1;
            } else {
                //echo("x " . $gard_pos[0] . " y ". $gard_pos[1] . " mouvement $direction SWITCH\n");
                $direction = 'UP';
            }
        } else if($direction == 'RIGHT') {
            if($length_x <= ($gard_pos[0] + 1)) {
                //echo("x " . $gard_pos[0] . " y ". $gard_pos[1] . " mouvement $direction STOP\n");
                $grid[$gard_pos[1]][$gard_pos[0]] = 'X';
                $out = true;
            } else if($grid[$gard_pos[1]][$gard_pos[0] + 1] != '#') {
                //echo("x " . $gard_pos[0] . " y ". $gard_pos[1] . " mouvement $direction MOVE\n");
                $grid[$gard_pos[1]][$gard_pos[0]] = 'X';
                $gard_pos[0] = $gard_pos[0] + 1;
            } else {
                //echo("x " . $gard_pos[0] . " y ". $gard_pos[1] . " mouvement $direction SWITCH\n");
                $direction = 'DOWN';
            }
        }
        
    }
    foreach($grid as $line){
        file_put_contents('test1.txt', $line, FILE_APPEND);
        file_put_contents('test1.txt', "\n", FILE_APPEND);

    }
?>