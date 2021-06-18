<?php

use W1020\HTML\Table;

echo (new Table())
    ->setData($this->data)
    ->addColumn(fn($row)=>"<a href='?type=Table&action=del&id=$row[id]'>❌</a>")
    ->addColumn(fn($row)=>"<a href='?type=Table&action=showEdit&id=$row[id]'>✏️</a>")
    ->setClass("table table-dark table-striped")
    ->html();
?>

<a href="?type=Table&action=showadd" class="btn btn-success">Добавить</a>
