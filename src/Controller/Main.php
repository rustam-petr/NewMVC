<?php


namespace App\Controller;

use App\View\View;



class Main
{
    protected View $view;

    public function __construct()
    {
        $this->view = new View();
    }

    public function actionIndex()
    {
        $this->view
            ->setTemplace("Main/index")
            ->view();
    }
}