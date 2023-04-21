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
     * manage
     * Type converter selection method
     * @return void
     */
    public function manage():void
    {
        try {
            switch (getExtension($this->filepath)) {
                case 'png':
                    (new PngConverter($this->filepath, $this->format))->toConvert();
                    break;
                case 'jpg':
                    (new JpgConverter($this->filepath, $this->format))->toConvert();
                    break;
                case 'tiff':
                    (new TiffConverter($this->filepath, $this->format))->toConvert();
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