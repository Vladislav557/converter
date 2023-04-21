<?php

namespace App;

use Exception;

class TiffConverter implements Convertable
{
    private static $supportFormats = ['jpg', 'png'];

    private string $filepath;
    private string $format;
    private string $converteredPath;
    
    /**
     * __construct
     *
     * @param  string $filepath
     * @param  string $format
     * @return void
     */
    public function __construct(string $filepath, string $format)
    {
        if (!in_array($format, self::$supportFormats)) {
            throw new Exception('Это изображение нельзя сконверитровать в формат ' . $format);
        }

        $this->filepath = $filepath;
        $this->format = $format;
        $this->converteredPath = __DIR__ . '/../../tmp/' . getName($this->filepath) . '-converted.' . $this->format;
    }

    /**
     * convertTiffToJpg
     * Converte image from tiff to jpg format (fake)
     * @return void
     */
    private function convertTiffToJpg(): void
    {
        stub($this->filepath, $this->converteredPath);
    }

    /**
     * convertTiffToPng
     * Converte image from tiff to png format (fake)
     * @return void
     */
    private function convertTiffToPng(): void
    {
        stub($this->filepath, $this->converteredPath);
    }
    
    /**
     * toConvert
     * 
     * @return void
     */
    public function toConvert(): void
    {
        switch ($this->format) {
            case 'jpg':
                $this->convertTiffToJpg();
                break;
            case 'png':
                $this->convertTiffToPng();
                break;
            default:
                throw new Exception('Неизвестная ошибка во время конвертации');
        }
    }
}