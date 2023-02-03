<?php

namespace Kernel;

class Controller
{
    public $view;

    public function init()
    {
        $this->view = new View;
    }
}
