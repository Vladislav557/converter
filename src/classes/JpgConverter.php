<?php

namespace App;

use Exception;

/**
 * JpgConverter
 * Конверитрует файлы из формата jpg
 */
class JpgConverter
{
    private static $supportFormats = ['png', 'tiff'];

    private string $filepath;
    private string $format;
    private string $converteredPath;

    public function __construct(string $filepath, string $format)
    {
        if (!in_array($format, self::$supportFormats)) {
            throw new Exception('Это изображение нельзя сконверитровать в формат ' . $format);
        }

        $this->filepath = $filepath;
        $this->format = $format;
        $this->converteredPath = __DIR__ . '/../../tmp/' . getName($this->filepath) . '-convertered.' . $this->format;
    }

    private function convertJpgToPng(): void
    {
        stub($this->filepath, $this->converteredPath);
    }

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