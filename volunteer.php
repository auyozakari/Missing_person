<?php
include("include/connect.php");
$msg="";
	
	if($_SERVER['REQUEST_METHOD'] == "POST"){
		$name=$_POST['name'];
		$gender=$_POST['gender'];
		$number=$_POST['number'];
		$email=$_POST['email'];
		
		$query=$db->query("INSERT INTO volunteer_missing(name,gender,number,email) VALUE('$name','$gender','$number','$email')");
		if($query){
			$msg="<div class='w3-panel w3-green w3-display-container'>
			<span onClick='this.parentElement.style.display=\"none\"' class='w3-large w3-display-topright'>&times;</span>
			<h3>thank you for willing to help !!!</h3>
			<p>
			you have register successfully,you are now a volunteer
			</p>
		</div>";
		}else{
			echo "error ".$db->error;
		}
	}
?>
<?php include("include/connect.php");?>
<!DOCTYPE html>
<html>
<title>Volunteer Registration</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="asset/css/w3.css">
<link rel="stylesheet" href="asset/css/css?family=Karma">
<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Karma", sans-serif}
.w3-bar-block .w3-bar-item {padding:20px}
.w3-third img{margin-bottom: -6px; opacity: 0.8; cursor: pointer}
.w3-third img:hover{opacity: 1}
</style>
</head><body>
<?php
	include("include/header.php");
?>  
<!-- !PAGE CONTENT! -->
<div class="w3-main w3-content w3-padding" style="max-width:1200px;margin-top:100px">
		<?php echo $msg;?>
<div class="w3-container w3-padding-large w3-teal">
    <h4><b>Volunteer Registration Page</b></h4>
    <form method="POST" action="volunteer.php" enctype="multipart/form-data">
      <div class="w3-section">
        <label>Name</label>
        <input class="w3-input w3-border" type="text" name="name" required>
      </div>
      <div class="w3-section">
        <label>Email</label>
        <input class="w3-input w3-border" type="text" name="email" required>
      </div>
      <div class="w3-section">
        <label>Phone</label>
        <input class="w3-input w3-border" type="text" name="number" required>
      </div>
	 
	  <div class="w3-section">
        <label>Gender</label>
       <select name="gender"  class="w3-input w3-border" required>
		<option value="male">Male</option>
		<option value="female">Female</option>
	   </select>
      </div>
      <button  type="submit" class="w3-button w3-black w3-margin-bottom"><i class="fa fa-paper-plane w3-margin-right"></i>Register</button>
    </form>
	</div>


 
  <hr>
  <hr>
  
  <!-- Footer -->
  <?php
	include("include/footer.php");
  ?>
<!-- End page content -->
</div>

<script>
// Script to open and close sidebar
function w3_open() {
    document.getElementById("mySidebar").style.display = "block";
}
 
function w3_close() {
    document.getElementById("mySidebar").style.display = "none";
}
// Modal Image Gallery
function onClick(element) {
  document.getElementById("img01").src = element.src;
  document.getElementById("modal01").style.display = "block";
  var captionText = document.getElementById("caption");
  captionText.innerHTML = element.alt;
}
</script>


</body></html>
