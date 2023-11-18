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
    <div class="container">
        <form action="go.php" style="display: flex; flex-direction: column; justify-content: center; width: 300px;">
            <img src="" alt="Captcha">
            <span>Введите капчу:</span>
            <input type="text" name="code" id="">
            <input type="submit" value="Проверить">
        </form>
    </div>

    <style>
        .container{
            display: flex;
            justify-content: center;

        }
    </style>
</body>
</html>