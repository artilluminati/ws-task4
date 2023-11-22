<?php

define('DOCUMENT_ROOT', dirname(__FILE__));
define("img_dir", DOCUMENT_ROOT."\captcha\img");

// echo DOCUMENT_ROOT."";
// echo img_dir;

include('random.php');
$captcha = generate_code();

$cookie = md5($captcha);
$cookietime = time() + 120;

setcookie('captcha', $cookie, $cookietime);

function ImgCode($code){
    // header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
    // header("Last Modified: " . gmdate("D, d M Y H:i:s", 10000) . " GMT");
    // header("Cache-Control: no-store, no-cache, must-revalidate");
    // header("Cache-Control: post-check=0, pre-check=0", false);
    // header("Pragma: no-cache");
    header("Content-Type:image/png");

    $linenum = rand(3, 7);

    $imgArr = array(
        "1.png"
    );

    $fontArr = array();

    $fontArr[0]["fname"] = "\ptsans.ttf";
    $fontArr[0]["size"] = rand(19, 30);

    $n = rand(0,sizeof($fontArr)-1);

    $imgFn = $imgArr[rand(0, sizeof($imgArr)-1)];
    $imgFn = '\1.png';
    $im = imagecreatefrompng(img_dir . $imgFn);

    for($i = 0; $i < $linenum; $i++){
        $color = imagecolorallocate($im, rand(0,150), rand(0,100), rand(0,150));
        imageline($im, rand(0, 20), rand(1, 50), rand(150, 180), rand(1, 50), $color);
    }

    $color = imagecolorallocate($im, rand(0, 200), 0, rand(0, 200));

    $x = rand(0, 35);
    for($i = 0; $i < strlen($code); $i++){
        $x+=15;
        $letter = substr($code,$i,1);
        imagettftext($im, $fontArr[$n]["size"], rand(2, 4), $x, rand(20, 30), $color, img_dir.$fontArr[$n]["fname"], $letter);
    }

    for($i = 0; $i < $linenum; $i++){
        $color = imagecolorallocate($im, rand(0,255), rand(0,200), rand(0,255));
        imageline($im, rand(0,20), rand(1, 50), rand(150,180), rand(1,50), $color);
    }

    ImagePNG($im);
    ImageDestroy($im);

}

ImgCode($captcha);

var_dump($_COOKIE['captcha']);