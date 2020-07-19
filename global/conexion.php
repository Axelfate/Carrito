<?php

$server = "mysql:dbname=".DB.";host=".SERVER;
try{
    $pdo = new PDO($server,USER,PASS,
    array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8"));
}
catch(PDOException $e){
    echo $e;
}

?>