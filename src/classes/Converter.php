<?php 

namespace App;

use App\JpgConverter;
use App\PngConverter;
use App\TiffConverter;
use Exception;

class Converter
{
    private static $supportedFormats = ['jpg', 'png', 'tiff'];
    private string $filepath;
    private string $format;
    
    /**
     * __construct
     *
     * @param  string $filepath
     * @param  string $format
     * @return void
     */
    public function __construct(string $filepath, string $format)
    {
        if (!in_array(getExtension($filepath), self::$supportedFormats)) {
            echo 'Данный формат изображений не поддерживается';
            exit();
        }
        $this->filepath = $filepath;
        $this->format = $format;
    }
    
    /**
     * toConvert
     * Конвертирует изображение в нужный формат.
     * Поддерживает форматы jpg, png, tiff
     * @return void
     */
    public function toConvert(): void
    {
        try {
            
            // Определяем расширение загруженного файла и вызываем соотвествующий конвертер

            switch (getExtension($this->filepath)) {
                case 'png':
                    $pngCoverter = new PngConverter($this->filepath, $this->format);
                    $pngCoverter->toConvert();
                    break;
                case 'jpg':
                    $pngCoverter = new JpgConverter($this->filepath, $this->format);
                    $pngCoverter->toConvert();
                    break;
                case 'jpg':
                    $pngCoverter = new TiffConverter($this->filepath, $this->format);
                    $pngCoverter->toConvert();
                    break;
                default:
                    exit();
            }
        } catch (Exception $ex) {
            echo $ex->getMessage();
            exit();
        }
    }
}