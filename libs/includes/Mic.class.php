<?php

class Mic
{
    private $brand;
    public $color;
    public $usb_port;
    public $model;
    public $price;
    private $light;

    public function __call($name, $arguments)
    {
        print("\nCalling: $name\n");
        print_r($arguments);
        print("\n");
        return "Hello-return";
    }

    public static function testFunction()
    {
        printf("This is a static function, this can be run without object initialization.");
    }

    public function __construct($brand)
    {
        print("Constrcting Objects...");
        $this->brand=ucwords($brand);
        Mic::testFunction();
    }
    public function add($a, $b)
    {
        return $a+$b;
    }
    public function getBrand()
    {
        return $this->brand;
    }
    public function setLight($light)
    {
        $this->light=$light;
    } 
    private function getModel()
    {
        return $this->model;
    }
    public function setModel($model)
    {
        $this->model=ucwords($model);
    }
    public function getModelProxy()
    {
        return $this->getModel();
    }
    public function __destruct()
    {
        print("Destrcting Object:Brand:$this->brand...");
    }
}
class DupMic
{
    public static function testFunction()
        {
            return "Hello";
        }
}
function testFunction()
{
    printf("This is a static function, this can be run without object initialization");
}

?>