<?php

namespace App\View;

class View
{
    protected array $data;
    protected string $template;

    /**
     * @param $data
     * @return $this
     */
    public function setData($data)
    {
        $this->data = $data;
        return $this;
    }


    /**
     * @param $template
     */
    public function setTemplace($template)
    {
        $this->template = $template;
        return $this;
    }

    public function view()
    {
        include __DIR__ . "/../../templaces/main.php";
    }

    public function body()
    {
        include __DIR__ . "/../../templaces/$this->template.php";
    }


}