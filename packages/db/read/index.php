<?php

function main(array $args): array
{

    $argName = $args["name"] ?? "stranger";
    $db = new PDO('../../../data/sqlite:sample.db');
    $db->exec("CREATE TABLE IF NOT EXISTS hello (id INTEGER PRIMARY KEY, name TEXT)");
    $db->exec("INSERT INTO hello (name) VALUES ('${argName}')");
    $result = $db->query('SELECT * FROM hello');
    $json = json_encode($result->fetchAll(PDO::FETCH_ASSOC));
    // foreach($result as $row) {
    //     print_r($row);
    // }

    $db = NULL;

    // json stringigy the result
    

    return [
        'body' => $json,
    ];
}
