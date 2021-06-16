<?php 
include("include/connect.php");
?>
<!DOCTYPE html>
<html>
<title>Missing person</title>
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
<?php  if (isset($_GET['msg'])) {
		echo "<div class='w3-panel w3-green w3-display-container'>
			<span onClick='this.parentElement.style.display=\"none\"' class='w3-button w3-large w3-display-topright'>&times;</span>
			<h3>Thank you!!!</h3>
			<p>
			".$_GET['msg']."
			</p>
		</div>";
	}else if (isset($_GET['err'])){
		echo "<div class='w3-panel w3-red w3-display-container'>
		<span onClick='this.parentElement.style.display=\"none\"' class='w3-button w3-large w3-display-topright'>&times;</span>	
		<h3>SORRY!!!</h3>
			<p>
			".$_GET['err']."
			</p>
		</div>";
	}
	?>
	 <div class="w3-row-padding w3-padding-16 w3-center" id="food">
	<?php
		$profile=$db->query("select * from report_missing  ORDER BY `report_missing`.`id` DESC");
		while($row=$profile->fetch_row()){
		$exist=$db->query("select * from found_missing where serial='".$row[1]."' ");
		$e=$exist->fetch_row();		
			if($row[1] !=$e[1]){
				echo"
				
				 <div class='w3-col l3 m6 w3-margin-bottom'>
				  <div class='w3-display-container'>
				<div class='w3-display-topleft w3-black w3-padding'>".$row[12]."</div>
				  <img src='images/missing/".$row[1].".jpeg' alt='".$row[2]."' style='width:100%;' onclick='onClick(this)'>
				  </div>
				  <h3>".$row[2]." </h3>
				  <p>".$row[5]."</p>
				  <p>".$row[4]."</p>
				  <p><a href='report_seen.php?id=".$row[1]."'><button class='w3-button w3-teal w3-block'>View Report</button></a></p>
				</div>";
			}
		}
	
	?>
	</div>
<!-- Modal for full size images on click-->
  <div id="modal01" class="w3-modal w3-black" style="padding-top: 0px; display: none;" onclick="this.style.display='none'">
    <span class="w3-button w3-black w3-xlarge w3-display-topright">×</span>
    <div class="w3-modal-content w3-animate-zoom w3-center w3-transparent w3-padding-64">
      <img id="img01" class="w3-image" src="W3.CSS">
      <p id="caption"></p>
    </div>
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