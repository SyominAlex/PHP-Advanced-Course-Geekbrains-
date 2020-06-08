<?php

namespace app\interfaces;

interface ModelInterface
{
    public function getOne($id);

    public function getAll();

    public function getTableName();
}
