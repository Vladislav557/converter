<?php

/**
 * getName
 * Возвращает имя файла без расширения
 * @param  string $filepath - путь до файла
 * @return string
 */
function getName(string $filepath): string 
{
    $filename = basename($filepath);
    return explode('.', $filename)[0];
}

/**
 * getExtension
 * Возвращает расширение файла
 * @param  string $filepath - путь до файла
 * @return string
 */
function getExtension($filepath): string
{
    $filename = basename($filepath);
    return explode('.', $filename)[1];
}

/**
 * stub
 * Функция-заглушка. Не изменяет файл непосредсьвенно, 
 * а лишь создает его копию с нужным расширением
 * @param string $from - откуда копировать файл
 * @param string $to - куда копировать файл
 * @return void
 */
function stub(string $from, string $to): void
{
    copy($from, $to);
}