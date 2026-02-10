<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
<title>Business Listing</title>

<!-- Bootstrap CSS -->
<link rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>

<body class="p-4">

<div class="container">

<h3>Business Listing</h3>

<!-- ADD BUTTON -->
<button class="btn btn-primary mb-3"
data-bs-toggle="modal"
data-bs-target="#addModal">
Add Business
</button>

<!-- TABLE -->
<table class="table table-bordered">
<thead>
<tr>
<th>ID</th>
<th>Name</th>
<th>Address</th>
<th>Phone</th>
<th>Email</th>
<th>Rating</th>
<th>Actions</th>
</tr>
</thead>

<tbody id="businessTable"></tbody>
</table>

</div>


<!-- ================= ADD MODAL ================= -->
<div class="modal fade" id="addModal">
<div class="modal-dialog">
<div class="modal-content p-3">

<h5>Add Business</h5>

<input id="name" class="form-control mb-2" placeholder="Name">
<input id="address" class="form-control mb-2" placeholder="Address">
<input id="phone" class="form-control mb-2" placeholder="Phone">
<input id="email" class="form-control mb-2" placeholder="Email">

<button id="saveBusiness" class="btn btn-success">Save</button>

</div>
</div>
</div>


<!-- ================= RATING MODAL ================= -->
<div class="modal fade" id="ratingModal">
<div class="modal-dialog">
<div class="modal-content p-3">

<h5>Rate This Business</h5>

<input id="r_name" class="form-control mb-2" placeholder="Name">
<input id="r_email" class="form-control mb-2" placeholder="Email">
<input id="r_phone" class="form-control mb-2" placeholder="Phone">

<label>Give Rating</label>

<div id="starRating" style="font-size:30px; cursor:pointer;">
<span class="star" data-value="1">★</span>
<span class="star" data-value="2">★</span>
<span class="star" data-value="3">★</span>
<span class="star" data-value="4">★</span>
<span class="star" data-value="5">★</span>
</div>

<button id="submitRating" class="btn btn-primary mt-3">
Submit Rating
</button>

</div>
</div>
</div>


<!-- ================= UPDATE MODAL ================= -->
<div class="modal fade" id="updateModal">
<div class="modal-dialog">
<div class="modal-content p-3">

<h5>Update Business</h5>

<input type="hidden" id="u_id">

<input id="u_name" class="form-control mb-2">
<input id="u_address" class="form-control mb-2">
<input id="u_phone" class="form-control mb-2">
<input id="u_email" class="form-control mb-2">

<button id="updateBusiness" class="btn btn-success">
Update
</button>

</div>
</div>
</div>


<!-- ================= SCRIPT ================= -->
<script>

let business_id = 0;
let selectedRating = 0;


/* FETCH BUSINESSES */
fetchBusinesses();

function fetchBusinesses(){
$.get("fetch_business.php", function(data){
$("#businessTable").html(data);
});
}


/* ADD BUSINESS */
$("#saveBusiness").click(function(){

$.post("add_business.php",{
name: $("#name").val(),
address: $("#address").val(),
phone: $("#phone").val(),
email: $("#email").val()
}, function(){

fetchBusinesses();
bootstrap.Modal.getInstance(
document.getElementById('addModal')
).hide();

});

});


/* DELETE */
$(document).on("click",".delete",function(){

if(confirm("Delete this business?")){

let id = $(this).data("id");

$.post("delete_business.php",{id:id},function(){
fetchBusinesses();
});

}

});


/* OPEN RATING MODAL */
$(document).on("click",".rateBtn",function(){

business_id = $(this).data("id");

selectedRating = 0;
$(".star").css("color","gray");

new bootstrap.Modal(
document.getElementById('ratingModal')
).show();

});


/* STAR CLICK */
$(document).on("click",".star",function(){

selectedRating = $(this).data("value");

$(".star").each(function(){

if($(this).data("value") <= selectedRating){
$(this).css("color","gold");
}else{
$(this).css("color","gray");
}

});

});


/* SUBMIT RATING */
$("#submitRating").click(function(){

if(selectedRating == 0){
alert("Please select rating");
return;
}

$.post("submit_rating.php",{

business_id: business_id,
name: $("#r_name").val(),
email: $("#r_email").val(),
phone: $("#r_phone").val(),
rating: selectedRating

}, function(){

fetchBusinesses();

bootstrap.Modal.getInstance(
document.getElementById('ratingModal')
).hide();

});

});


/* OPEN UPDATE MODAL */
$(document).on("click",".updateBtn",function(){

$("#u_id").val($(this).data("id"));
$("#u_name").val($(this).data("name"));
$("#u_address").val($(this).data("address"));
$("#u_phone").val($(this).data("phone"));
$("#u_email").val($(this).data("email"));

new bootstrap.Modal(
document.getElementById('updateModal')
).show();

});


/* UPDATE BUSINESS */
$("#updateBusiness").click(function(){

$.post("update_business.php",{

id: $("#u_id").val(),
name: $("#u_name").val(),
address: $("#u_address").val(),
phone: $("#u_phone").val(),
email: $("#u_email").val()

}, function(){

fetchBusinesses();

bootstrap.Modal.getInstance(
document.getElementById('updateModal')
).hide();

});

});

</script>


<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
