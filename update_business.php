<?php
include 'db.php';

$id      = $_POST['id'];
$name    = $_POST['name'];
$address = $_POST['address'];
$phone   = $_POST['phone'];
$email   = $_POST['email'];

$conn->query("
UPDATE businesses SET
name='$name',
address='$address',
phone='$phone',
email='$email'
WHERE id='$id'
");

echo "success";
?>
