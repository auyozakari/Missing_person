
<!-- Sidebar (hidden by default) -->
<nav class="w3-sidebar w3-bar-block w3-card w3-top w3-xlarge w3-animate-left" style="display: none; z-index: 2; width: 40%; min-width: 300px;" id="mySidebar">
  <a href="javascript:void(0)" onclick="w3_close()" class="w3-bar-item w3-button">Close Menu</a>
  <a href="volunteer.php" onclick="w3_close()" class="w3-bar-item w3-button">Volunteers</a>
  <a href="found_missing.php" onclick="w3_close()" class="w3-bar-item w3-button">Found Missing</a>
</nav>

<!-- Top menu -->
<div class="w3-top">
  <div class="w3-white w3-xlarge" style="max-width:1200px;margin:auto">
    <div class="w3-button w3-padding-16 w3-left" onclick="w3_open()">☰</div>
    <div class="w3-right w3-padding-16"> <button onclick="document.getElementById('id01').style.display='block'" class="w3-button w3-green w3-large">Report Missing</button></div>
	
<!-- report_missing form -->
	<div id="id01" class="w3-modal">
    <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">

      <div class="w3-center"><br>
        <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>
        <img src="images/img_avatar4.png" alt="Avatar" style="width:30%" class="w3-circle w3-margin-top">
      </div>

      <form class="w3-container" action="report_page.php" method="POST" enctype="multipart/form-data">
        <div class="w3-section">
          
  
<label><b>Name</b></label>
<input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Enter Name" name="name"required>
<label><b>Place of Origin</b></label>
<input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Enter Place of Origin as State,LGA,Address" name="poo" required>
<label><b>Place Last Seen</b></label>
<input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Enter place Last seen as State,LGA,Address" name="pls" required>
<label><b>Image Upload</b></label>
<input class="w3-input w3-border w3-margin-bottom" type="file"  name="msp" required>
<label><b>Age</b></label>
<input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Enter Age" name="age"required>
<label><b>Tribe</b></label>
<input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Enter Tribe" name="tribe"required>
<label><b>Gender</b></label>
<select name="gender" class="w3-input w3-border w3-margin-bottom" required>
<option value="male">Male</option>
<option value="female">Female</option>
</select>
<label><b>Reporter's Name</b></label>
<input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Enter Reporter's Name" name="rptn"required>
<label><b>Reporter's Email</b></label>
<input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Enter Reporter's Email Address" name="rpte"required>
<label><b>Reporter's Phone</b></label>
<input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Enter Reporter's Phone Number" name="rptp"required>
<label><b>Date of Missing</b></label>
<input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Enter Date of Missing (yyyy/mm/dd)" name="dom"required>
<label><b>Time of Missing</b></label>
<input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Enter Time of Missing (hh:mm am/pm)" name="tom"required>
          <input class="w3-check w3-margin-top" type="checkbox" checked="checked"> Remember me
        </div>
     

      <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
        <button onclick="document.getElementById('id01').style.display='none'" type="button" class="w3-button w3-red">Cancel</button>
        <button class="w3-button w3-right w3-green " type="submit">Report</button>
      </div>
 </form>
    </div>
  </div>
  <!--end of report_missing form -->
    <a href="index.php"><div class="w3-center w3-padding-16">MISSING PERSONS</div></a>
  </div>
</div>
  
  