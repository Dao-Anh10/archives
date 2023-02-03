<?php

namespace Backend\Controller;

use Model\Book;

class SitePreference extends Base
{
    public function index($params)
    {
        $model = new Book;

        $this->view->data = $model->getData();

        $this->view->params = $params;

        $this->view->page = 'Backend-SitePreference-index';

        $this->view->render('site-preference/index');
    }

    public function getPreference($params)
    {

        $this->view->data = "Hello World";

        $this->view->params = $params;

        $this->view->page = 'Backend-SitePreference-getPreference';

        $this->view->render('site-preference/index');
    }
}
