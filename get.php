<?php

$hostname = 'localhost';
$username = 'root';
$password = '';
$password = '';

try {
    $dbh = new PDO("mysql:host=$hostname;dbname=rapat", $username, $password);

    $query = "select label, value from table";

    $stmt = $dbh->prepare($query);
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $values = array();

    for ($row = 0; $row < count($result); $row++) {
        $values[] = array('label' => $result[$row]['Label'], 'value' => $result[$row]['Value']);
    }

    $to_encode = array(
        array(
            'key' => 'Cumulative Return',
            'values' => $values,
        )
    );
    echo json_encode($to_encode);
} catch (PDOException $e) {
    echo $e->getMessage();
}
