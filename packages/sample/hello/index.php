<?php

function main(array $args): array
{

    $argName = $args["name"] ?? "stranger";
    $db = new PDO('sqlite:sample.db');
    $db->exec("CREATE TABLE IF NOT EXISTS hello (id INTEGER PRIMARY KEY, name TEXT)");
    $db->exec("INSERT INTO hello (name) VALUES ('${argName}')");
    $result = $db->query('SELECT * FROM hello');

    // foreach($result as $row) {
    //     print_r($row);
    // }

    $db = NULL;

    return [
        'body' => $result,
    ];
}
