<?php


namespace App\Http\Controllers;


class StuController
{
    public $value;
    public function __construct()
    {
        echo $this->value;
    }

    public static function say()
    {
        return "\$this->app()->bind()";
    }

}
