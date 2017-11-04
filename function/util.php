<?php

function activeTextConvert($act){
    if($act == 1){
        $text = "Active";
    }else{
        $text = "Inactive";
    }
        
    return $text;
}

function finshTextConvert($fish){
    if($fish == 1){
        $text = "Finished";
    }else{
        $text = "Not Finished";
    }
        
    return $text;
}

function userTextConsert($user){
    if($user == 1){
        $text = 'User';
    }elseif ($user == 2) {
        $text = 'Administrator';
    }elseif ($user == 3) {
        $text = 'Owner';
    }
    return $text;
}

function makeAttrIndexDiv($name){
    $ret = '<div class="row">'.
           '<div class="col-lg-6">'.
           '<div class="form-group">' .
           '<label class="control-label">'. $name . '</label>' .
           '<input class="form-control" name='. str_replace(" ", "_", $name) . ' value="">' .
           '</div>' .
           '</div>' .
           '</div>';
    
    
    return $ret;
}
