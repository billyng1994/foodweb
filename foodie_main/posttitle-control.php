<?php
function print_title($title,$text_threshold = 25, $before=false, $after=false){
    $processed_title = $title;
    
    if(strlen($title) >= $text_threshold ){
        $processed_title = substr($title, 0 , $text_threshold ) . "...";
    }

    if($before && $after){
        $processed_title = $before.$processed_title.$after;
    }
    echo $processed_title;

};