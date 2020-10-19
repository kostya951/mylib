<?php


namespace kostya\configuration;


class PhpArrayConfigurationCreator implements ConfigurationCreator
{

    /**
     * @inheritDoc
     */
    function createEmptyConfiguration()
    {
        $configuration = new PhpArrayConfiguration();
        $configuration->setExtension('.php');
        return $configuration;
    }

    /**
     * @inheritDoc
     */
    function createConfigurationFromFile($path)
    {
        $configuration = new PhpArrayConfiguration();
        $configuration->setFilePath($path);
        $configuration->read();
        return $configuration;
    }
}