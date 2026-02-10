<?php
include 'db.php';

$bid = $_POST['business_id'];
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$rating = $_POST['rating'];

/* CHECK EXISTING */
$check = $conn->query("
SELECT id FROM ratings
WHERE business_id='$bid'
AND (email='$email' OR phone='$phone')
");

if($check->num_rows > 0){

$conn->query("
UPDATE ratings
SET rating='$rating'
WHERE business_id='$bid'
AND (email='$email' OR phone='$phone')
");

}else{

$conn->query("
INSERT INTO ratings
(business_id,name,email,phone,rating)
VALUES('$bid','$name','$email','$phone','$rating')
");

}
?>
