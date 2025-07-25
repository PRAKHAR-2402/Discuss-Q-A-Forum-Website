<?php
$host="localhost";
$username="root";
$password=null;
$database="Discuss";

$dbconnect=new mysqli($host,$username,$password,$database);
if($dbconnect->connect_error){
    die("Not Connected with DB". $dbconnect->connect_error);
}
// echo "db file ";
?>