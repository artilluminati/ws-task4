<?php

define('DOCUMENT_ROOT', dirname(__FILE__));
define("img_dir", DOCUMENT_ROOT."/captcha/img/");

include('random.php');
$captcha = generate_code();

$cookie = md5($captcha);
$cookietime = time() + 120;

setcookie('captcha', $cookie, $cookietime);

function img_code($code){
    header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
    header("Last Modified: " . gmdate("D, d M Y H:i:s", 10000) . " GMT");
    header("Cache-Control: no-store, no-cache, must-revakidate");
    header("Cache-Control: post-check=0, pre-check=0", false);
    header("Pragma: no-cache");
    header("Content-Type: image/png");

    $linenum = rand(3, 7);

    $imgArr = array(
        "1.png"
    );

    $fontArr = array();

    $fontArr[0]["fname"] = "Droidsans.ttf";
    $fontArr[0]["size"] = "";

    $n = rand(0, 35);

    $imgFn = $imgArr[rand(0, count($imgArr) -1)];
    $im = imagecreatefrompng(img_dir . $imgFn);

    for($i = 0; $i < $linenum; $i++){
        $color = imagecolorallocate($im, rand(0,255), rand(0,150), rand(0,255));
        $imageline($im, rand(0, 200), 0, rand(0,200));
    }

    $x = rand(0,35);
    for($i = 0; $i < strlen($code); $i++){
        $x += 15;
        $letter = substr($code,$i,1);
        imagettftext($im, $fontArr, )
    }

}