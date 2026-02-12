
<?php
include 'db.php';

$sql = "SELECT b.*,
IFNULL(AVG(r.rating),0) as avg_rating
FROM businesses b
 JOIN ratings r
ON b.id = r.business_id
GROUP BY b.id";

$result = $conn->query($sql);

while($row = $result->fetch_assoc()){
?>
<tr>
<td><?= $row['id'] ?></td>
<td><?= $row['name'] ?></td>
<td><?= $row['address'] ?></td>
<td><?= $row['phone'] ?></td>
<td><?= $row['email'] ?></td>

<td>

<?php
$avg = floor($row['avg_rating']);
$remain = ($row['avg_rating'])-$avg;

$flag=0;

if($remain >= 0.1 && $remain <= 0.9){
    $flag =1;
}



$l=1;

for($i=1; $i<=5; $i++){

if($i <= $avg){
echo "<img src='star-on.png'>";
$l++;
}


}
if($flag ==1){
echo "<img src='star-half.png'>";
$l++;
}

for($i=$l;$i<=5;$i++){
echo "<img src='star-off.png'>";
}

?>

<br>

<button class="btn btn-sm btn-primary rateBtn"
data-id="<?= $row['id'] ?>">
Rate Business
</button>

</td>


<td>

<button class="btn btn-warning btn-sm updateBtn"
data-id="<?= $row['id'] ?>"
data-name="<?= $row['name'] ?>"
data-address="<?= $row['address'] ?>"
data-phone="<?= $row['phone'] ?>"
data-email="<?= $row['email'] ?>">
Update
</button>


<button class="btn btn-danger btn-sm delete"
data-id="<?= $row['id'] ?>">
Delete
</button>

</td>


<?php } ?>
