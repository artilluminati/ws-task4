<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Captcha</title>
</head>
<body>
    <?php require('../header.php')?>

    <?php include("random.php");

    $cap = $_COOKIE["captcha"];

    function check_code($codec, $cookiec) 
    {

    // АЛГОРИТМ ПРОВЕРКИ	
        $codec = trim($codec); // На всякий случай убираем пробелы
        $codec = md5($codec);
    // НЕ ЗАБУДЬТЕ ЕГО ИЗМЕНИТЬ!

    // Работа с сессией, если нужно - раскомментируйте тут и в captcha.php, удалите строчки, где используются куки
    //session_start();
    //$cap = $_SESSION['captcha'];
    //$cap = md5($cap);
    //session_destroy();
        if ($codec == $cookiec){return TRUE;}else{return FALSE;} // если все хорошо - возвращаем TRUE (если нет - false)
        
    }

    

    // Обрабатываем полученный код
    if (isset($_POST['go'])) // Немного бессмысленная, но все же защита: проверяем, как обращаются к обработчику.
    {
        // Если код не введен (в POST-запросе поле 'code' пустое)...
            if ($_POST['code'] == '')
            {
                echo ("Ошибка: введите капчу!"); //...то возвращаем ошибку
            }
        // Если код введен правильно (функция вернула TRUE), то...
            if (check_code($_POST['code'], $cap))
            {
                echo "Ты правильно ввел капчу. Возьми с полки тортик, он твой."; // Поздравляем с этим пользователя
            }
        // Если код введен неверно...
            else 
            {
                echo ("Ошибка: капча введена неверно!"); //...то возвращаем ошибку
            }
    }
    // Если к нам обращаются напрямую, то дело дрянь...
    else 
    {
        echo ("Access denied"); //..., возвращаем ошибку
    }
    ?>

    <div class="container">
        <form action="<?php echo htmlentities($_SERVER['PHP_SELF'])?>" method="post" enctype="multipart/form-data" style="display: flex; flex-direction: column; align-items: center; justify-content: center; width: 300px;">
            <img src="captcha.php" alt="Captcha" id='capcha-image'>
            <a href="javascript:void(0);" onclick="document.getElementById('capcha-image').src='captcha.php?rid=' + Math.random();">Обновить капчу</a>
            <span>Введите капчу:</span>
            <input type="text" name="code" id="">
            <input type="submit" name="go" value="Проверить">
        </form>

        <?php
        
        
        ?>
    </div>

    <style>
        .container{
            display: flex;
            justify-content: center;

        }
        #capcha-image{
            max-width: 120px;
        }
    </style>
</body>
</html>