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
        $config = include __DIR__ . "/../../config.php";
//        print_r($config);
        $this->model = new ORMTable($config);
        $this->view = new View();
    }

    public function actionShow()
    {
//        print_r($this->model->get());
        $this->view
            ->setData($this->model->get())
            ->setTemplace("Table/show")
            ->view();
    }

    public function actionDel()
    {
        $this->model->del($_GET["id"]);
        header("Location:?type=Table&action=show");
    }
    public function actionShowAdd(){
        $this->view
            ->setData($this->model->columnComments())
            ->setTemplace("Table/add")
            ->view();
    }
    public function actionAdd(){
        $this->model->ins($_POST);
        header("Location:?type=Table&action=show");
    }
}