<?php

namespace App;

use Imagick;
use Exception;

class Converter
{
    private string $pathFrom;
    private string $neededFormat;
    private string $pathTo;

    /**
     * __construct
     *
     * @param  string $pathFrom - откуда брать изображение
     * @param  string $neededFormat - требуемый формат
     * @param  string $pathTo - куда сохранить
     * @return void
     */
    public function __construct(string $pathFrom, string $neededFormat, string $pathTo)
    {
        $this->pathFrom = $pathFrom;
        $this->neededFormat = $neededFormat;
        $this->pathTo = $pathTo;
    }

    /**
     * toConvert
     * Конвертирует полученное изображение в нужный формат
     * @return void
     */
    public function toConvert(): void
    {
        try {
            $image = new Imagick($this->pathFrom);
            $image->setImageFormat($this->neededFormat);
            $image->writeImage($this->pathTo);
        } catch (Exception $exception) {
            throw new Exception('Ошибка конвертации: ' . $exception->getMessage());
        }
    }
}