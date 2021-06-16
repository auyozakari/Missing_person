<?php
include("include/connect.php");
$path = "images/missing/";
if (isset($_SESSION['msg'])) {
		echo $_SESSION['msg'];
	}
function getExtension($str) 
{

         $i = strrpos($str,".");
         if (!$i) { return ""; } 

         $l = strlen($str) - $i;
         $ext = substr($str,$i+1,$l);
         return $ext;
 }
 $valid_formats = array("jpg", "png", "gif", "bmp","jpeg","PNG","JPG","JPEG","GIF","BMP");
 
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
  $statement = $db->prepare("SELECT serial FROM report_missing WHERE serial = :serial");
  $statement->bindParam(':serial',  $serial, PDO::PARAM_STR); 
  $statement->execute();
  $statement->setFetchMode(PDO::FETCH_ASSOC);
  $result = $statement->fetchAll();

  return (count($result) > 0);   
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
	$img_name = $_FILES['msp']['name'];
	$img_size = $_FILES['msp']['size'];
		
	// while (checkifSerialexist($db, $serial)){
		// $serial = GenerateSerial() ;
	// }
	
	$qry=$db->query("INSERT INTO report_missing(serial,name,poo,pls,age,tribe,gender,rptn,rpte,rptp,dom,tom) 
	VALUES('$serial','$name','$poo','$pls','$age','$tribe','$gender','$rptn','$rpte','$rptp','$dom','$tom')");
	
	if ($qry){
		
		if(strlen($img_name))
				{
					$ext = getExtension($img_name);
					if(in_array($ext,$valid_formats))
					{
						if($img_size<(1024*1024))
						{
							$actual_image_name = $serial.substr(str_replace(" ", "_", $ext), 5).".".$ext;
							$tmp = $_FILES['msp']['tmp_name'];
							if(move_uploaded_file($tmp, $path.$actual_image_name))
								{
									$db->query("UPDATE report_missing SET ext='$ext' WHERE serial='$serial'");
									echo 'operation success';
									header("location:index.php");
								}
							else
								echo "Fail upload folder with read access.";
						}
						else
							echo "Image file size max 1 MB";					
					}
					else
						echo "Error in Invalid file format or Extension ..";	
				}
				else
					echo "Please select image to upload..!";
				
	}else{
		echo''.$db->error;
	}
}
?>
<?php include("include/connect.php");?>
