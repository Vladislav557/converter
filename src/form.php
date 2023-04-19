<?php

require_once __DIR__ . '/../vendor/autoload.php';

$filepath = $_FILES['filename']['tmp_name'];
$filename = $_FILES['filename']['name'];

$selectedFormat = $_POST['select_convert'];
$window = $_POST['window'];

$tempDir = __DIR__ . '/../tmp/' . $filename;
$pathTo = __DIR__ . '/../tmp/' . explode('.', $filename)[0] . "." . $selectedFormat;

use App\Converter;

if (move_uploaded_file($filepath, $tempDir)) {
    $converter = new Converter($tempDir, $selectedFormat, $pathTo);
    $converter->toConvert();

    if ($window) {
        header('Content-Type: image/' . $selectedFormat);
        header('Location:/' . 'tmp/' . basename($pathTo));
    }

    while (ob_get_level()) {
        ob_end_clean();
    }

    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename=' . basename($pathTo));
    header('Content-Transfer-Encoding: binary');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($pathTo));

    readfile($pathTo);

    header('Location:/');
} else {
    echo 'Проблемы при загрузке файла';
}