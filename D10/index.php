<!DOCTYPE html>
<html>
 
<head>
    <title>
        How to crop image
        using canvas?
    </title>
</head>
 
<body>
 
    <h2>Source Image</h2>
    <img id="myImage" src=
"https://media.geeksforgeeks.org/wp-content/uploads/20200615165012/double_quotes.jpg"
        alt="GeeksForGeeks">
 
    <h2>Cropped Image</h2>
 
    <canvas id="myCanvas" width="500" height="200"
        style="border:3px solid">
        HTML5 canvas tag is not 
        supported by your browser.
    </canvas>
 
    <script>
        window.onload = function () {
            var canvas = document.getElementById("myCanvas");
            var context = canvas.getContext("2d");
            var img = document.getElementById("myImage");
             
            context.drawImage(img, 10, 10, 
                300, 175, 0, 0, 100, 175);
        }
    </script>
</body>
 
</html>