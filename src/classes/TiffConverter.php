<?php

namespace App;

use Exception;

class TiffConverter
{
    private static $supportFormats = ['jpg', 'png'];

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

    private function convertTiffToJpg(): void
    {
        stub($this->filepath, $this->converteredPath);
    }

    private function convertTiffToPng(): void
    {
        stub($this->filepath, $this->converteredPath);
    }

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