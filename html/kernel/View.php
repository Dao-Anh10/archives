<?php

namespace Kernel;

class View
{
    public $layout = 'main';

    public function __construct()
    {
    }

    public function render($path)
    {

        $this->placeholder = 'view/' . $path . '.php';

        include_once Core::$app->module . '/view/layout/' . $this->layout . '.php';
    }

    public function placeholder()
    {
        include_once Core::$app->module . '/' . $this->placeholder;
    }
}
