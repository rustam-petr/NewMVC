<?php

namespace App\Controller;

use W1020\Table as ORMTable;
use App\View\View;

class Table extends AbstractController
{
    protected ORMTable $model;

    public function __construct()
    {
        parent::__construct();
        $config = include __DIR__ . "/../../config.php";
//        print_r($config);
        $this->model = new ORMTable($config);
    }

    /**
     * Показывает таблицу
     * @throws \Exception
     */
    public function actionShow()
    {
//        print_r($this->model->get());
        $headers["id"] = "№";

        foreach ($this->model->columnComments() as $key => $value) {
            $headers[$key] = $value;
        }

        $headers["del"] = "Удалить";
        $headers["edit"] = "Редактировать";

        $this
            ->view
            ->setData(["table" => $this->model->get(), "comments" => $headers])
            ->setTemplate("Table/show")
            ->view();
    }

    /**
     * Удаляет строку из таблицы
     */
    public function actionDel()
    {
//        print_r($_GET);
        $this->model->del($_GET["id"]);
//        header("Location: ?type=Table&action=show");
        $this->redirect("?type=Table&action=show");
    }

    /**
     * Показывает страницу для добавления новой строки
     */
    public function actionShowAdd()
    {
        $this
            ->view
            ->setData($this->model->columnComments())
            ->setTemplate("Table/add")
            ->view();
    }

    /**
     * Добавляет новую строку
     */
    public function actionAdd()
    {
//        print_r($_POST);
        $this->model->ins($_POST);
        $this->redirect("?type=Table&action=show");

    }

    /**
     * Показывает страницу для редактирования строки
     */
    public function actionShowEdit()
    {
        $row = $this->model->getRow($_GET["id"]);
        unset($row["id"]);
        $this
            ->view
            ->setData([
                "comments" => $this->model->columnComments(),
                "row" => $row,
                "id" => $_GET["id"]
            ])
            ->setTemplate("Table/edit")
            ->view();
    }

    /**
     * Редактирует строку из таблицы
     */
    public function actionEdit()
    {
        $this->model->upd($_GET["id"], $_POST);
        $this->redirect("?type=Table&action=show");
    }

}