<?php

namespace App;

use Exception;

class PngConverter
{
    private static $supportFormats = ['jpg', 'tiff'];

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

    private function convertPngToJpg(): void
    {
        stub($this->filepath, $this->converteredPath);
    }

    private function convertPngToTiff(): void
    {
        stub($this->filepath, $this->converteredPath);
    }

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