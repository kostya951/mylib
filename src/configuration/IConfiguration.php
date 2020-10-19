<?php

namespace kostya\configuration;

/**
 * Interface IConfiguration
 * Базовый интерфейс любой конфигурации
 * содержит методы по установке и получению конфигурационных параметров,
 * а также чтение и запись в источник параметров
 * @package kostya\configuration
 */
interface IConfiguration
{
    /**
     * @param $path string имя настройки
     * @return mixed
     */
    function get($path);

    /**
     * @param $path string имя настройки
     * @param $value mixed значение настройки
     */
    function set($path,$value);

    /**
     *Запись в файл, БД или куда либо ещё
     */
    function write();

    /**
     * Чтение из файла, БД или откуда либо ещё
     */
    function read();
}