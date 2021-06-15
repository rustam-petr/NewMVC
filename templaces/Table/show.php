<?php

use W1020\HTML\Table;

echo (new Table())->setData($this->data)->setClass("table table-dark table-striped")->html();
//print_r($this->data);