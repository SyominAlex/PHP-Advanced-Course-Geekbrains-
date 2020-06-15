<?php
require "../config/main.php";
require "../services/Autoloader.php";

spl_autoload_register([new \app\services\Autoloader(), 'loadClass']);

$db = \app\services\Db::getInstance();

var_dump('$db->queryOne("SELECT * FROM product WHERE id = :id", [\'id\' => 2]):', $db->queryOne("SELECT * FROM product WHERE id = :id", ['id' => 2]));

$category = new \app\models\Category();
var_dump('$category = new \app\models\Category():', $category);

$feedback = new \app\models\Feedback();
var_dump('$feedback = new \app\models\Feedback():', $feedback);

$product = new \app\models\Product();
var_dump('$product = new \app\models\Product():', $product);

$user_groups = new \app\models\User_groups();
var_dump('$user_groups = new \app\models\User_groups():', $user_groups);

$user1 = new \app\models\User(null, 1, 'superadmin', '123456789', 'Алексей', 'Сёмин', 'info@mail.ru', '123-456', 'Мой адрес - не дом и не улица! WWW!');
var_dump('$user1 = new \app\models\User:', $user1);

$temp = $user1->getOne(1);
var_dump('$temp = $user1->getOne(14):', $temp);

/*Вывести все значения таблицы*/
//$temp = $user1->getAll();
//var_dump($temp);

/*Вставка значений в таблицу*/
$temp = $user1->insert([
    'id' => null,
    'groups_id' => 1,
    'login' => 'superadmin',
    'password' => '123456789',
    'name' => 'Алексей',
    'surname' => 'Сёмин',
    'email' => 'info@mail.ru',
    'phone' => '123-456',
    'description' => 'Мой адрес - не дом и не улица! WWW!'
]);

/*Изменение значений в таблице*/
$temp = $user1->update([
    'login' => 'hyperadmin',
    'password' => '987654321',
    'name' => 'Игорь',
    'surname' => 'Полуянов'
], 2);

/*Удалить строку с id=2*/
//$temp = $user1->delete(2);
//var_dump($temp);


/*Удалить все строки*/
//$temp = $user1->clear();
//var_dump($temp);
