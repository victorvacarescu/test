<?php
session_start();

function logout(){
    if (isset($_SESSION['idUser'])) {
        unset($_SESSION['idUser']);
    }
}

function verificaDacaEsteLogat(){

    if (!isset($_SESSION['idUser'])) header("location: http://www.menut.ro/admin.php");
}

function conectareLaBazaDeDate() {
    $server     =   'localhost';
    $username   =   'menutro_victor';
    $password   =   'victorie00';
    $database   =   'menutro_test';

    $db = mysqli_connect($server, $username, $password, $database);
    if(mysqli_connect_errno())
    {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    return $db;
}

function arataErori(){
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
}

function getTabel($db,$numeTabel){

    $sql_statement  = "SELECT * FROM {$numeTabel}";
    $result         = mysqli_query($db, $sql_statement);
    $ret = array();

    while ($row = mysqli_fetch_assoc($result)){
        $ret[] = $row;
    }

    return $ret;
}

function getTableWhere($db, $numeTabel, $id){
    $sql_statement = "SELECT * FROM {$numeTabel} WHERE Id ={$id}";
    $result = mysqli_query($db, $sql_statement);

    return mysqli_fetch_assoc($result);
}

function getTableWhereName($db, $numeTabel, $nume){
    $sql_statement = "SELECT * FROM {$numeTabel} WHERE Nume = {$nume}";
    $result = mysqli_query($db, $sql_statement);

    return mysqli_fetch_assoc($result);
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function showIpAdress() {
    // Get real visitor IP behind CloudFlare network
    if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
        $_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
        $_SERVER['HTTP_CLIENT_IP'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
    }
    $client  = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = $_SERVER['REMOTE_ADDR'];
    $browser = $_SERVER['HTTP_USER_AGENT'];
    $ref=$_SERVER['HTTP_REFERER'];

    if(filter_var($client, FILTER_VALIDATE_IP))
    {
        $ip = $client;
    }
    elseif(filter_var($forward, FILTER_VALIDATE_IP))
    {
        $ip = $forward;
    }
    else
    {
        $ip = $remote;
    }

   echo 'Visitor ip is: '.$ip.'<br>';
   echo 'Browser used is: '.$browser.'<br>';
   echo 'Website: '.$ref;
}

?>