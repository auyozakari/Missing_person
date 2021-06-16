<?php
include("include/connect.php");
include('/src/class.upload.php');
// set variables
$dir_dest = (isset($_GET['dir']) ? $_GET['dir'] : 'images\missing');
$dir_pics = (isset($_GET['pics']) ? $_GET['pics'] : $dir_dest);

//generating ID	
function GenerateSerial() {
	$chars = array(0,1,2,3,4,5,6,7,8,9,'A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');
	$sn = '';
	$max = count($chars)-1;
	for($i=0;$i<20;$i++){
		$sn .= (!($i % 5) && $i ? '-' : '').$chars[rand(0, $max)];
	}
	return $sn;
}
$serial = GenerateSerial() ;

function checkifSerialexist ($db, $serial)
{
   $statement = $db->query("SELECT serial FROM report_missing WHERE serial = '$serial'");
	  if($statement->fetch_row() ==  $serial){
			return true;	 
		}else{
			return false;
		}	 
}

if (isset($_POST) and $_SERVER["REQUEST_METHOD"]== "POST" ){
	$name=$_POST['name'];
	
	$poo=$_POST['poo'];
	$pls=$_POST['pls'];
	$age=$_POST['age'];
	$tribe=$_POST['tribe'];
	$gender=$_POST['gender'];
	$rptn=$_POST['rptn'];
	$rpte=$_POST['rpte'];
	$rptp=$_POST['rptp'];
	$dom=$_POST['dom']; 
	$tom=$_POST['tom'];
		
		//checking if id exist
	while (checkifSerialexist($db, $serial)){
		 $serial = GenerateSerial() ;
	}
	
	$qry=$db->query("INSERT INTO report_missing(serial,name,poo,pls,age,tribe,gender,rptn,rpte,rptp,dom,tom) 
	VALUES('$serial','$name','$poo','$pls','$age','$tribe','$gender','$rptn','$rpte','$rptp','$dom','$tom')");
	
	if ($qry){
		// ---------- IMAGE UPLOAD ----------

		// we create an instance of the class, giving as argument the PHP object
		// corresponding to the file field from the form
		// All the uploads are accessible from the PHP object $_FILES
		$handle = new Upload($_FILES['msp']);

		// then we check if the file has been uploaded properly
		// in its *temporary* location in the server (often, it is /tmp)
		if ($handle->uploaded) {

			// yes, the file is on the server
			// below are some example settings which can be used if the uploaded file is an image.
			$handle->image_resize            = true;
			//$handle->image_ratio_crop        = true;
			$handle->image_y                 = 500;
			$handle->image_x                 = 500;
			$handle->file_new_name_body			 =$serial;
			 $handle->image_convert         = 'jpeg';
			// now, we start the upload 'process'. That is, to copy the uploaded file
			// from its temporary location to the wanted location
			// It could be something like $handle->Process('/home/www/my_uploads/');
			$handle->Process($dir_dest);

			// we check if everything went OK
			if ($handle->processed) {
				// everything was fine !
				
				// recipients
$to = ''; 
// Subject
$subject = 'Report alert';
// Message
$message = "
<html>
<title>Missing person</title>
<meta charset='UTF-8'>
<meta name='viewport' content='width=device-width, initial-scale=1'>
</head><body>
<h1 align='center'>MISSING PERSON </h1>
<img src='C:\wamp64\www\missing_person/".$dir_pics."/" . $handle->file_dst_name . "' />
		<br/>
        <ul type='none'>
          <h2>Victims Details</h2>
          <li>Name: ".$name."</li>
          <li>Gender: ".$gender."</li>
		  <li>Age: ".$age."</li>
          <li>Tribe: ".$tribe."</li>
		  <li>Place of Origin: ".$poo."</li>
          <li>Place Last Seen: ".$pls."</li>
          <li><span>Date and Time of Missing:".$dom." - ".$tom."</span>
          </li>
        </ul>
      <br/>
	  <ul type='none'>
          <h2>Reporter's Details</h2>
          <li>Name: ".$rptn."</li>
          <li>Email: ".$rpte."</li>
          <li>Phone: ".$rptp."</li>
          <li><span>Date and Time of Report: NOW </span>
          </li>
        </ul>
   
</body>
</html>
";
// To send HTML mail, the Content-type header must be set
$headers[] = 'MIME-Version: 1.0';
$headers[] = 'Content-type: text/html; charset=iso-8859-1';
// Additional headers
$headers[] = 'From: Missing Person <missingperson@missingperson.com>';
// Mail it
mail("NPF@ngpoliceforce.com", $subject, $message, implode("\r\n", $headers));
$vol=$db->query("select * from volunteer_missing");
	while($to=$vol->fetch_row()){
		mail("'".$to[4]."'", $subject, $message, implode("\r\n", $headers));
	}			
				
				
				
				
				
				
				echo '<p class="result">';
				echo '  <b>File uploaded with success</b><br />';
				echo '</p>';
				header("location:index.php?err=we will notify the authorities and our volunteers immediately");
			} else {
				// one error occured
				echo '<p class="result">';
				echo '  <b>File not uploaded to the wanted location</b><br />';
				echo '  Error: ' . $handle->error . '';
				echo '</p>';
			}
			// we delete the temporary files
			$handle-> Clean();

		} else {
			// if we're here, the upload file failed for some reasons
			// i.e. the server didn't receive the file
			echo '<p class="result">';
			echo '  <b>File not uploaded on the server</b><br />';
			echo '  Error: ' . $handle->error . '';
			echo '</p>';
		}
				
	}else{
		echo''.$db->error;
	}
}
?>
<?php include("include/connect.php");?>
