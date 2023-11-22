<?php 

function generate_code(){
    $chars = 'abcdefghijklmnopqrstuvwxyz0123456789';
    $length = 4;
    $numChars = strlen($chars);
    $str = '';

    for ($i = 0; $i < $length; $i++){
        $str .= substr($chars, rand(1, $numChars) - 1, 1);
    }

    return $str;
}