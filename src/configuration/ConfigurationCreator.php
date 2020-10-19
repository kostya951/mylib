<?php


namespace kostya\configuration;

/**
 * Class ConfigurationCreator
 * Фабрика конфигураций
 * @package kostya\configuration
 */
interface ConfigurationCreator
{
    /**
     * @return IConfiguration
     */
    function createEmptyConfiguration();

    /**
     * @param $path string файл конфигурации
     * @return IConfiguration
     */
    function createConfigurationFromFile($path);
}