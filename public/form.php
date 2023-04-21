<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\Converter;

$filepath = $_FILES['filename']['tmp_name'];
$filename = $_FILES['filename']['name'];

$format = $_POST['format'];
$window = $_POST['window'] ?? false;

$tmp = __DIR__ . '/../tmp/' . $filename;

if (move_uploaded_file($filepath, $tmp)) {

    $converter = new Converter($tmp, $format);
    $converter->manage();

    if ($window) {
        header('Content-Type: image/' . $format);
        header('Location:/' . 'tmp/' . getName($filename) . '-converted.' . $format);
    }

    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename=' . getName($filename) . '-converted.' . $format);

    readfile(__DIR__ . '/../tmp/' . getName($filename) . '-converted.' . $format);

    header('Location:/');
} else {
    echo 'Проблемы при загрузке файла';
}