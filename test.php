<?php

 include("vendor/autoload.php");

use Libs\Database\MySQL ;
use Libs\Database\UsersTable ;

$table = new UsersTable(new MySQL);
$result = $table->getAll();

// $data = [
//    "name" => "Tom",
//    "email" => "tom@gmail.com",
//    "phone" => "111134",
//    "address"=> "tom house",
//    "password"=> "220049",
//    "role_id" => "3"
// ];

// $result = $table->insert($data);

print_r($result);

// $mysql = new MySQL ;
// $db = $mysql->connect();

// $statement = $db->query("SELECT * FROM roles");
// $result= $statement->fetchAll();

// print_r($result);