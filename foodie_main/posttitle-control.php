<?php
function print_title($title,$text_threshold = 25, $before=false, $after=false){
    $processed_title = $title;
    
    if(strlen($title) >= $text_threshold ){
        $chinese_output = preg_match_all("/\p{Han}+/u", $title, $matches);
        if($chinese_output) {
            $processed_title = mb_substr($title,0, $text_threshold + 10, "utf-8") . "...";
        } else $processed_title = substr($title, 0 , $text_threshold ) . "...";
    }

    $processed_title = strip_tags($processed_title);

    if($before && $after){
        $processed_title = $before.$processed_title.$after;
    }
    echo $processed_title;

};

function remove_html($word){
    $processed_word = strip_tags($word);
    echo $processed_word;
};