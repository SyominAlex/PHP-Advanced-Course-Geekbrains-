<?php

namespace app\services;

use app\traits\TSingleton;

class Db
{
    use TSingleton;

    private $conn = null;

    private $config = [
        'driver' => 'mysql',
        'host' => 'localhost',
        'login' => 'root',
        'password' => '',
        'database' => 'gbphp_shop',
        'charset' => 'UTF8'
    ];

    private function getConnection()
    {
        if (is_null($this->conn)) {
            $this->conn = new \PDO(
                $this->prepareDsnString(),
                $this->config['login'],
                $this->config['password']
            );

            $this->conn->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);
            $this->conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        }
        return $this->conn;
    }

    private function query($sql, $params = [])
    {
        $PDOStatement = $this->getConnection()->prepare($sql);
//        $PDOStatement->execute($params);
        return $PDOStatement;
    }


    public function execute($sql, $params = [])
    {
        $this->query($sql, $params);
        return true;
    }

    public function queryOne($sql, $params = [])
    {
        return $this->queryAll($sql, $params)[0];
    }

    public function queryAll($sql, $params = [])
    {
        return $this->query($sql, $params)->fetchAll();
    }

    public function queryObject($sql, $params = [])
    {
        /*
class User {
  public $first_name;
  public $last_name;

  public function full_name()
  {
    return $this->first_name . ' ' . $this->last_name;
  }
}

try {
  $pdo = new PDO('mysql:host=localhost;dbname=someDatabase', $username, $password);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $result = $pdo->query('SELECT * FROM someTable');

  # Выводим результат как объект
  $result->setFetchMode(PDO::FETCH_CLASS, 'User');

  while($user = $result->fetch()) {
    # Вызываем наш метод full_name
    echo $user->full_name();
  }
} catch(PDOException $e) {
  echo 'Error: ' . $e->getMessage();
}
        */
    }


    private function prepareDsnString()
    {
        return sprintf('%s:host=%s;dbname=%s;charset=%s',
            $this->config['driver'],
            $this->config['host'],
            $this->config['database'],
            $this->config['charset']
        );
    }
}
