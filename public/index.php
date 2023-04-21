<?php
array_map('unlink', glob('../tmp/*'));
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/style.css">
    <title>Конвертер изображений</title>
</head>

<body>
    <div class="converter">
        <h3>Конвертер изображений</h3>
        <form action="./form.php" method="post" enctype="multipart/form-data">
            <div>
                <label for="filename">Выберете и загрузите файл</label>
                <input type="file" name="filename" id="filename">
            </div>
            <div>
                <label for="select_convert">Выберете формат, в который будет происходить конвертация</label>
                <select name="format" id="select_convert">
                    <option value="jpg">jpg</option>
                    <option value="png">png</option>
                    <option value="tiff">tiff</option>
                </select>
            </div>
            <div>
                <label for="window">Открыть в отдельном окне?</label>
                <input type="checkbox" name="window" id="window">
            </div>
            <button class="btn" type="submit">Конвертировать</button>
        </form>
    </div>
</body>

</html>