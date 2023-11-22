<?php
// Обработка загрузки изображения
if ($_FILES['image']) {
    $uploadDir = 'uploads/';
    $uploadFile = $uploadDir . basename($_FILES['image']['name']);
    if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile)) {
        echo "Файл корректен и был успешно загружен.\n";
        echo "Путь к загруженному файлу: " . $uploadFile;
        echo "<script>displayImage('$uploadFile');</script>";
    } else {
        echo "Возможная атака с помощью файловой загрузки!\n";
    }
}
?>
