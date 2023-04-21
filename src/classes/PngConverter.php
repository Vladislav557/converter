<?php

namespace App;

use Exception;

class PngConverter implements Convertable
{
    private static $supportFormats = ['jpg', 'tiff'];

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
     * convertPngToJpg
     * Converte image from png to jpg format (fake)
     * @return void
     */
    private function convertPngToJpg(): void
    {
        stub($this->filepath, $this->converteredPath);
    }

    /**
     * convertPngToTiff
     * Converte image from png to tiff format (fake)
     * @return void
     */
    private function convertPngToTiff(): void
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
                $this->convertPngToJpg();
                break;
            case 'tiff':
                $this->convertPngToTiff();
                break;
            default:
                throw new Exception('Неизвестная ошибка во время конвертации');
        }
    }
}