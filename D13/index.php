<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php 
    $origArrayStr = htmlspecialchars($_POST['orig_array']);
    $origArray = explode(', ', $origArrayStr);
    $editedArray = array_unique($origArray);
    ?>

    <div style="display: flex; justify-content: center; align-items: center; flex-direction: column;">
        <span>Original array</span>
        <form action="<?php echo htmlentities($_SERVER['PHP_SELF'])?>" method="post">
            <input type="text" name="orig_array" value="1, 2, 3, 2, 5">
            <input type="submit" value="submit">
        </form>
        <br>
        <span>Edited array</span>
        <span><?php echo rtrim(implode(', ', $editedArray), ', ') ?></span>
    </div>
</body>
</html>