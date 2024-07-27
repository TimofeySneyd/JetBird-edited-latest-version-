<?php
$hostnameJB = "localhost";
$dbUserJB = "root";
$dbPasswordJB = "";
$dbNameJB = "book_db";
$connectJB = mysqli_connect($hostnameJB, $dbUserJB, $dbPasswordJB, $dbNameJB);

if(!$connectJB){
    die("Failed to connect!");
}
?>