<?php


namespace kostya\configuration;


class PhpArrayConfiguration extends FileConfiguration implements IConfiguration
{

    /**
     * @var array массив настроек
     */
    private $_configuration;


    /**
     * @inheritDoc
     */
    public function get($path)
    {
        return isset($this->_configuration[$path]) ?$this->_configuration[$path]:null;
    }

    /**
     * @inheritDoc
     */
    public function set($path, $value)
    {
        $this->_configuration[$path] = $value;
    }

    /**
     * @param $array array установить конфигурационный массив напрямую
     */
    public function setArray($array){
        $this->_configuration=$array;
    }

    /**
     * @inheritDoc
     */
    public function write()
    {
        $output = "<?php\r\n\treturn[\r\n";
        $output.=$this->printArrayRecursivse($this->_configuration);
        $output.="];";
        file_put_contents($this->getFilePath(),$output);
    }

    /**
     * @inheritDoc
     * @throws ConfigurationException
     */
    public function read()
    {
        try {
            $array = require($this->getFilePath());
            $this->_configuration = $array;
            if(defined('TEST_MODE') && TEST_MODE==true){
                print_r($this->_configuration);
            }
        }catch (\Throwable $exception){
            throw new ConfigurationException("Ошибка require файла ".$this->getFilePath());
        }
    }

    private function printArrayRecursivse($array,$deepness=1){
        $string = '';
        foreach ($array as $key=>$value){
            $i=$deepness;
            while ($i>0){
                $string.="\t";
                $i--;
            }
            $string.="'".$key."'=>";
            if(is_array($value)){
                $string.="[\r\n";
                $new_deepness = $deepness+1;
                $string.=$this->printArrayRecursivse($value,$new_deepness);
                $i=$deepness;
                while ($i>0){
                    $string.="\t";
                    $i--;
                }
                $string.="],\r\n";
            }else{
                $string.="'".$value."',\r\n";
            }
        };
        return $string;
    }
}