<?php

include_once 'index.php';

// get first argument from command line
$argName = $argv[1] ?? "stranger";

// create a new sqlite database connection with pdo
$db = new PDO('sqlite:sample.db');

// create a new table
$db->exec("CREATE TABLE IF NOT EXISTS hello (id INTEGER PRIMARY KEY, name TEXT)");

// insert a new row
$db->exec("INSERT INTO hello (name) VALUES ('${argName}')");

// select all rows
$result = $db->query('SELECT * FROM hello');

// print the results
foreach($result as $row) {
    print_r($row);
}

// close the database connection
$db = NULL;

?>
