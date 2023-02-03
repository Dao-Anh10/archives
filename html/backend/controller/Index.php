<?php

namespace Backend\Controller;

use Model\Book;

class Index extends Base
{
    public function index($params)
    {

        $model = new Book;

        $this->view->data = $model->getAllBySql('select * from todo_list');

        $this->view->params = $params;

        $this->view->page = 'Backend-Index-index';

        $this->view->render('index/index');
    }

    public function run($params)
    {
        $model = new Book;

        $this->view->data = $model->getData();

        $this->view->params = $params;

        $this->view->page = 'Backend-Index-run';

        $this->view->render('index/run');
    }
}
