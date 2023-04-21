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
    $converter->toConvert();

    if ($window) {
        header('Content-Type: image/' . $format);
        header('Location:/' . 'tmp/' . getName($filename) . '-convertered.' . $format);
    }

    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename=' . getName($filename) . '-convertered.' . $format);

    readfile(__DIR__ . '/../tmp/' . getName($filename) . '-convertered.' . $format);

    header('Location:/');
} else {
    echo 'Проблемы при загрузке файла';
}