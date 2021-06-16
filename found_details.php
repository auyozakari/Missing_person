<?php
include("include/connect.php");
$id='';
if (isset($_GET['id'])){
    $id=$_GET['id'];
$profile=$db->query("select * from report_missing where serial='".$_GET['id']."'");	
$row=$profile->fetch_row();

?>
<!DOCTYPE html>
<html>
<title>found Details</title>
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
	 <div class="w3-row-padding w3-padding-16 w3-center" id="food">
  <!-- Header/Home -->
  <header class="w3-container w3-padding-32 w3-center " id="home">
    <h1 class="w3-jumbo"><span class="w3-hide-small"><?php echo "</span> Missing Person Profile.</h1>
    <p>".$row[2]."</p>";
 echo "<img src='images/missing/".$row[1].".jpeg' alt='".$row[2]."' class='w3-image' width='992' height='1108'/> 
 </div>
	 ";
echo " 
  </header>
  <!-- Pricing Tables -->
    <div class='w3-row-padding w3-center' style='margin-left:150px'>
      <div class='w3-third w3-margin-bottom'>
        <ul class='w3-ul w3-border w3-white w3-center w3-opacity w3-hover-opacity-off'>
          <li class='w3-black w3-xlarge w3-padding-32'>Victims Details</li>
          <li class='w3-padding-16'>Name: ".$row[2]."</li>
          <li class='w3-padding-16'>Gender: ".$row[7]."</li>
		  <li class='w3-padding-16'>Age: ".$row[5]."</li>
          <li class='w3-padding-16'>Tribe: ".$row[6]."</li>
		  <li class='w3-padding-16'>Place of Origin: ".$row[3]."</li>
          <li class='w3-padding-16'>Place Last Seen: ".$row[4]."</li>
          <li class='w3-padding-16'>
           
            <span class='w3-opacity'>Date and Time of Missing:</span>
			 <h2>".$row[12]." - ".$row[13]."</h2>
          </li>
          <li class='w3-light-grey w3-padding-24'>
           
          </li>
        </ul>
      </div>
      
      <div class='w3-third w3-margin-bottom'>
        <ul class='w3-ul w3-border w3-white w3-center w3-opacity w3-hover-opacity-off'>
          <li class='w3-teal w3-xlarge w3-padding-32'>Reporter's Details</li>
          <li class='w3-padding-16'>Name: ".$row[8]."</li>
          <li class='w3-padding-16'>Email: ".$row[9]."</li>
          <li class='w3-padding-16'>Phone: ".$row[10]."</li>
          <li class='w3-padding-16'>
            
            <span class='w3-opacity'>Date and Time of Report:</span>
			<h2>".$row[11]."</h2>
          </li>
          <li class='w3-light-grey w3-padding-24'>
           
          </li>
        </ul>
      </div>";
	  
$profile2=$db->query("select * from found_missing where serial='".$_GET['id']."'");	
$row2=$profile2->fetch_row();	  
	  
	  echo "<div class='w3-third'>
        <ul class='w3-ul w3-border w3-white w3-center w3-opacity w3-hover-opacity-off'>
          <li class='w3-black w3-xlarge w3-padding-32'>Found Details</li>
          <li class='w3-padding-16'>Current Place Spotted: ".$row2[2]."</li>
          <li class='w3-padding-16'>Victims Current Status: ".$row2[3]."</li>
          <li class='w3-padding-16'>Physical Description: ".$row2[4]."</li>
          <li class='w3-padding-16'>Founder Name: ".$row2[5]."</li>
          <li class='w3-padding-16'>Founder Email: ".$row2[6]."</li>
          <li class='w3-padding-16'>Founder Phone: ".$row2[7]."</li>
          
          <li class='w3-padding-16'>
           <span class='w3-opacity'>Date and Time of Report Seen:</span>
			<h2>".$row2[8]."</h2>
          </li>
          <li class='w3-light-grey w3-padding-24'>
            
          </li>
        </ul>
      </div>
    
      
    </div>";
  }?>
   <hr class="w3-opacity">
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