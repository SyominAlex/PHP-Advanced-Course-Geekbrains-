<?php

define('DBDRIVER', 'mysql');
define('DBSERVER', 'localhost');
define('DBUSERNAME', 'Alex');
define('DBPASSWORD', '123');
define('DBNAME', 'june');
define('DBCHARSET', 'utf8');

function getCsv($file)
{
    $csvString = file_get_contents($file);
    $data = str_getcsv($csvString, "\n"); //parse the rows
    foreach ($data as &$row) { //parse the items in rows
        $row = str_getcsv($row, ";");
    }
    return $data;
}

function prepareDsnString()
{
    return sprintf('%s:host=%s;dbname=%s;charset=%s',
        DBDRIVER,
        DBSERVER,
        DBNAME,
        DBCHARSET
    );
}

function updatePrices($file)
{
    try {
        $db = new PDO(prepareDsnString(), DBUSERNAME, DBPASSWORD);

        foreach($db->query('SELECT id from june.products') as $row) {
            $ids[] = $row[0];
        }
        $data = getCsv($file);
        for ($i = 1; $i <= count($data); $i++) {
            $id = $data[$i][0]; // id
            $price = $data[$i][1]; // price
            if (in_array($id, $ids)) {
                $db->exec("UPDATE june.products SET price = $price WHERE id = $id");
                echo "для id = " . $id . " установлена цена = " . $price . "<br>";
            }
        }
        $db = null;
    } catch (PDOException $e) {
        echo "Error!: " . $e->getMessage() . "<br/>";
        die();
    }

}
