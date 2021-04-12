<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "faq_sys";

global $conn;
$conn = mysqli_connect($servername, $username, $password, $db);

function getDbConn(){
    global $conn;
    return $conn;
}

function dbInsert($table, $values){
    $sql = "INSERT INTO ".$table." (".implode(", ", array_keys($values)).")
              VALUES ('".implode("', '", array_values($values))."');";
    
    $result = mysqli_query(getDbConn(), $sql);
    return mysqli_insert_id(getDbConn());
}

function dbUpdate(){
}

function dbDelete(){
}

function dbSelect($tbName){
    $sql = "SELECT * FROM ".$tbName;

    $result = mysqli_query(getDbConn(), $sql);
    return mysqli_insert_id(getDbConn());
}


function dbSelectM($tbName, $name ,$condition){
    $sql = "SELECT * FROM ".$tbName." WHERE ".$name." = ".$condition;

    $result = mysqli_query(getDbConn(), $sql);
    return mysqli_insert_id(getDbConn());
}

?>