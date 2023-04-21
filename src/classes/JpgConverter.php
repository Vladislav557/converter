<?php

namespace App;

use Exception;

/**
 * JpgConverter
 * Конверитрует файлы из формата jpg
 */
class JpgConverter implements Convertable
{
    private static $supportFormats = ['png', 'tiff'];

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
     * convertJpgToPng
     * Converte image from jpg to png format (fake)
     * @return void
     */
    private function convertJpgToPng(): void
    {
        stub($this->filepath, $this->converteredPath);
    }

    /**
     * convertJpgToTiff
     * Converte image from jpg to tiff format (fake)
     * @return void
     */
    private function convertJpgToTiff(): void
    {
        stub($this->filepath, $this->converteredPath);
    }

    public function toConvert(): void
    {
        switch ($this->format) {
            case 'png':
                $this->convertJpgToPng();
                break;
            case 'tiff':
                $this->convertJpgToTiff();
                break;
            default:
                throw new Exception('Неизвестная ошибка во время конвертации');
        }
    }
}