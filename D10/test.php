<!-- <!DOCTYPE html> -->
<html>
<head>
    <title>Загрузка и обрезка изображения</title>
</head>
<body>

    <script
    src="https://code.jquery.com/jquery-3.7.1.slim.min.js"
    integrity="sha256-kmHvs0B+OpCW5GVHUNjv9rOmY0IvSIRcf7zGUDTDQM8="
    crossorigin="anonymous"></script>

    <!-- <?php
    // Обработка загрузки изображения
    // if ($_FILES['image']) {
    //     $uploadDir = 'uploads/';
    //     $uploadFile = $uploadDir . basename($_FILES['image']['name']);
    //     if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile)) {
    //         echo "Файл корректен и был успешно загружен.\n";
    //         echo "Путь к загруженному файлу: " . $uploadFile;
    //         // echo "<script>displayImage('$uploadFile');</script>";
    //     } else {
    //         echo "Возможная атака с помощью файловой загрузки!\n";
    //     }

    //     list($width, $height) = getimagesize($uploadFile);

    // }

    

    ?>



    <h1>Загрузка и обрезка изображения</h1>
    <form action="<?php //echo htmlentities($_SERVER['PHP_SELF'])?>" method="post" enctype="multipart/form-data">
        <input type="file" name="image" accept="image/*">
        <input type="submit" value="Загрузить">
    </form>
    <div id="image-container"></div>
    <button id="crop-button" style="display: none;">Обрезать</button>
    <button id="upload-button" style="display: none;">Загрузить</button>

    <style>
        #image-container{
            background: url('<?php //echo $uploadFile?>');
            width: <?php //echo $width ?>px;
            height: <?php //echo $height ?>px;
        }
    </style>

    <script>
        // JavaScript для отображения загруженного изображения и управления кнопками
        function displayImage(src) {
            const imageContainer = document.getElementById('image-container');
            imageContainer.innerHTML = '<img src="${src}" id="uploaded-image">';
            document.getElementById('crop-button').style.display = 'block';
        }

        document.getElementById('crop-button').addEventListener('click', function() {
            // JavaScript для обрезки изображения и отображения кнопки загрузки
            // (используйте canvas для обрезки изображения)
        });

        document.getElementById('upload-button').addEventListener('click', function() {
            // JavaScript для загрузки обрезанного изображения на сервер
            // (используйте AJAX запрос для отправки изображения на сервер)
        });
    </script> -->

    <?php
    if (! empty($_POST["upload"])) {
        if (is_uploaded_file($_FILES['userImage']['tmp_name'])) {
            $targetPath = "uploads/" . $_FILES['userImage']['name'];
            if (move_uploaded_file($_FILES['userImage']['tmp_name'], $targetPath)) {
                $uploadedImagePath = $targetPath;
            }
        }
    }
    ?>



    <div class="bgColor">
        <form id="uploadForm" action="<?php echo htmlentities($_SERVER['PHP_SELF'])?> ?>" method="post" enctype="multipart/form-data">

            <div id="uploadFormLayer">
                <input name="userImage" id="userImage" type="file"
                    class="inputFile"><br> <input type="submit"
                    name="upload" value="Submit" class="btnSubmit">

            </div>
        </form>
    </div>
    <div>
        <img src="<?php echo $uploadedImagePath; ?>" id="cropbox" class="img" /><br />
    </div>
    <div id="btn">
        <input type='button' id="crop" value='CROP'>
    </div>
    <div>
        <img src="#" id="cropped_img" style="display: none;" class="img">
    </div>

    <script type="text/javascript">
    $(document).ready(function(){
        var size;
        $('#cropbox').Jcrop({
        aspectRatio: 1,
        onSelect: function(c){
        size = {x:c.x,y:c.y,w:c.w,h:c.h};
        $("#crop").css("visibility", "visible");     
        }
        });
    
        $("#crop").click(function(){
            var img = $("#cropbox").attr('src');
            $("#cropped_img").show();
            $("#cropped_img").attr('src','image-crop.php?x='+size.x+'&y='+size.y+'&w='+size.w+'&h='+size.h+'&img='+img);
        });
    });
    </script>


    <style>
        .img{
            max-width: 80%;
        }
    </style>
</body>
</html>
