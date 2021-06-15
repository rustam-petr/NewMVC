<?php

namespace App\Controller;

use App\View\View;
use W1020\Table as ORMTable;

class Table
{
    protected ORMTable $model;
    protected View $view;

    public function __construct()
    {
        $config = include __DIR__."/../../config.php";
//        print_r($config);
        $this->model = new ORMTable($config);
        $this->view = new View();
    }

    public function show()
    {
//        print_r($this->model->get());
        $this->view
            ->setData($this->model->get())
            ->setTemplace("Table/show")
            ->view();
    }
}