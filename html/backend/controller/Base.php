<?php

namespace Backend\Controller;

use Kernel\Controller;

class Base extends Controller
{
    public function init()
    {
        parent::init();

        $this->view->backendUrl = app()->baseUrl . '/backend';
    }
}
