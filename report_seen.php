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
<title>Reported Seen</title>
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
  <!-- report_missing -->
    <div class='w3-row-padding w3-center' style='margin-left:0 -16px'>
      <div class='w3-half w3-margin-bottom'>
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
      
      <div class='w3-half w3-margin-bottom'>
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
      </div>
      
    </div>";
  }?>
   <hr class="w3-opacity">
   <div class="w3-container w3-padding-large w3-grey">
    <h4><b>Report Seen</b></h4>
    <form action="seen_page.php" method="POST" enctype="multipart/form-data">
     <input  type="text" name="serial" value="<?php if (isset($_GET['id'])){
    echo $_GET['id']; }?>" hidden="hidden" required>
	 <div class="w3-section">
        <label>Name</label>
        <input class="w3-input w3-border" type="text" name="rptn" required>
      </div>
      <div class="w3-section">
        <label>Email</label>
        <input class="w3-input w3-border" type="text" name="rpte" required>
      </div>
      <div class="w3-section">
        <label>Phone</label>
        <input class="w3-input w3-border" type="text" name="rptp" required>
      </div>
	  <div class="w3-section">
        <label>Current Place Spotted</label>
        <input class="w3-input w3-border" type="text" name="cps" required>
      </div>
	  <div class="w3-section">
        <label>Victim's Current Status</label>
       <select name="vcs"  class="w3-input w3-border" required>
		<option value="Alive">Alive</option>
		<option value="death">Death</option>
	   </select>
      </div>
	  <div class="w3-section">
        <label>Physical Description</label>
        <input class="w3-input w3-border" type="text" name="pd" required>
      </div>
      <button  type="submit" class="w3-button w3-black w3-margin-bottom"><i class="fa fa-paper-plane w3-margin-right"></i>Send Message</button>
    </form>
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