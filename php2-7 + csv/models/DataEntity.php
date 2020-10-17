<?php
// DataEntity отображает данные таблиц, для хранения данных по конкретному кортежу и именно этот тип данных должен передаваться в репозиторий (контроль типов), в модели можно как минимум определить методы для валидации данных

namespace app\models;

use app\interfaces\IDataModel;
// use app\services\Db;

abstract class DataEntity extends Model implements IDataModel
{
    public function __construct()
    {
    }
}
