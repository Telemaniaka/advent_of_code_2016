<?php

$data = "R3, R1, R4, L4, R3, R1, R1, L3, L5, L5, L3, R1, R4, L2, L1, R3, L3, R2, R1, R1, L5, L2, L1, R2, L4, R1, L2, L4, R2, R2, L2, L4, L3, R1, R4, R3, L1, R1, L5, R4, L2, R185, L2, R4, R49, L3, L4, R5, R1, R1, L1, L1, R2, L1, L4, R4, R5, R4, L3, L5, R1, R71, L1, R1, R186, L5, L2, R5, R4, R1, L5, L2, R3, R2, R5, R5, R4, R1, R4, R2, L1, R4, L1, L4, L5, L4, R4, R5, R1, L2, L4, L1, L5, L3, L5, R2, L5, R4, L4, R3, R3, R1, R4, L1, L2, R2, L1, R4, R2, R2, R5, R2, R5, L1, R1, L4, R5, R4, R2, R4, L5, R3, R2, R5, R3, L3, L5, L4, L3, L2, L2, R3, R2, L1, L1, L5, R1, L3, R3, R4, R5, L3, L5, R1, L3, L5, L5, L2, R1, L3, L1, L3, R4, L1, R3, L2, L2, R3, R3, R4, R4, R1, L4, R1, L5";

//$data =  "R8, R4, R4, R8";
$data = explode(", ",$data);

$direction = "N";
$step=1;

$position=$new_position=array(224*$step,224*$step);
$visited_positions = array();
$map_intersection = array();

$turns = array(
    "N"=>array("L"=>"W", "R"=>"E"),
    "S"=>array("L"=>"E", "R"=>"W"),
    "W"=>array("L"=>"S", "R"=>"N"),
    "E"=>array("L"=>"N", "R"=>"S")
);

$img = imagecreatetruecolor(500*$step, 500*$step);

$white = imagecolorallocate($img, 255, 255, 255);
$red = imagecolorallocate($img, 255, 0, 0);
$black = imagecolorallocate($img, 0, 0, 0);
$green = imagecolorallocate($img, 0, 255, 0);
$blue = imagecolorallocate($img, 0, 0, 255);

imagefill($img, 0, 0, $white);

foreach ($data as $order) {
    preg_match("/([R,L])(\d+)/", $order, $order1);
    $direction = $turns[$direction][$order1[1]];

    switch($direction) {
        case "N":
            $new_position[1] -= $order1[2]*$step;
            break;
        case "S":
            $new_position[1] += $order1[2]*$step;
            break;
        case "W":
            $new_position[0] -= $order1[2]*$step;
            break;
        case "E":
            $new_position[0] += $order1[2]*$step;
            break;
    }


    for ($i = 1; $i <= $order1[2]*$step; $i++) {
        switch($direction) {
            case "N":
                $coords = $position[0].",".($position[1]-$i);
                break;
            case "S":
                $coords = $position[0].",".($position[1]+$i);
                break;
            case "W":
                $coords = ($position[0]-$i).",".$position[1];
                break;
            case "E":
                $coords = ($position[0]+$i).",".$position[1];
                break;
        }
        if (in_array($coords, $visited_positions)) {
            $map_intersection[] = $coords;
        }
        $visited_positions[] = $coords;

    }

    imageline($img, $position[0], $position[1], $new_position[0], $new_position[1], $black);

    $position = $new_position;

}
$coord = explode(",",$map_intersection[0]);

echo "|224-".$new_position[0]."|+|224-".$new_position[1]."| <br> \n";
echo (abs(224-$new_position[0])+abs(224-$new_position[1]))/$step."| <br> \n";
echo " <br> \n";
echo "|224-".$coord[0]."|+|224-".$coord[1]."| <br> \n";
echo (abs(224-$coord[0])+abs(224-$coord[1]))/$step."| <br> \n";

//print_r($map_intersection);

/*
imageline($img, 224*$step, 224*$step, $new_position[0], $new_position[1], $red);
imageline($img, 224*$step, 224*$step, $new_position[0], 224*$step, $green);
imageline($img, $new_position[0], 224*$step, $new_position[0], $new_position[1], $green);

imageline($img, 224*$step, 224*$step, $coord[0], 224*$step, $blue);
imageline($img, $coord[0], 224*$step, $coord[0], $coord[1], $blue);


header("Content-type: image/png");
imagepng($img);
*/
imagedestroy($img);
