<?php
$conn = new mysqli("localhost","root","","business_rating");

if($conn->connect_error){
    die("Connection Failed: " . $conn->connect_error);
}
?>
