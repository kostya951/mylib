<?php


namespace kostya\configuration;

/**
 * Class FileConfiguration
 * @package kostya\configuration
 */
class FileConfiguration
{
    private $_extension='.php';
    private $_filePath = './configuration.php';

    public function setFilePath($filePath){
        $this->_filePath=$filePath;
    }

    public function getFilePath(){
        return $this->_filePath;
    }

    public function setExtension($extension){
        $this->_extension=$extension;
    }

    public function getExtension(){
        return $this->_extension;
    }
}