<?php
include("include/connect.php");
if ($_SERVER['REQUEST_METHOD']=='POST'){
	$serial=$_POST['serial'];
    $cps=$_POST['cps'];
	$vcs=$_POST['vcs'];
	$pd=$_POST['pd'];
	$rptn=$_POST['rptn'];
	$rpte=$_POST['rpte'];
	$rptp=$_POST['rptp'];
	
	$report=$db->query("INSERT INTO found_missing(serial,cps,vcs,pd,rptn,rpte,rptp) VALUES('$serial','$cps','$vcs','$pd','$rptn','$rpte','$rptp')");
	if ($report){
		
		$profile=$db->query("select * from report_missing where serial='$serial'");	
		$row=$profile->fetch_row();

		// Multiple recipients
		$to = ''; // note the comma
		// Subject
		$subject = 'Report alert';
		// Message
		$message = "
		<html>
		<title>Missing person</title>
		<meta charset='UTF-8'>
		<meta name='viewport' content='width=device-width, initial-scale=1'>
		</head><body>
		<h1 align='center'>FOUND PERSON </h1>
			<img src='C:\wamp64\www\missing_person/images/missing/".$row[1].".jpeg' alt='".$row[2]."'/>
				<br/>
			<ul type='none'>
			<h2>Victims Details</h2>
			  <li>Name: ".$row[2]."</li>
			  <li>Gender: ".$row[7]."</li>
			  <li>Age: ".$row[5]."</li>
			  <li>Tribe: ".$row[6]."</li>
			  <li>Place of Origin: ".$row[3]."</li>
			  <li>Place Last Seen: ".$row[4]."</li>
			  <li>
				<span>Date and Time of Missing: ".$row[12]." - ".$row[13]."</span>
			  </li>
			</ul>
			<br/>
			<ul type='none'>
				<h2>Reporter's Details</h2>
			  <li>Name: ".$row[8]."</li>
			  <li>Email: ".$row[9]."</li>
			  <li>Phone: ".$row[10]."</li>
			  <li>
				<span>Date and Time of Report:".$row[11]."</span>
			  </li>
			</ul>
			<br/>
			<h1>FOUNDER</h1>
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
		mail("NPF@ngpoliceforce.com,".$row[9]."", $subject, $message, implode("\r\n", $headers));
		$vol=$db->query("select * from volunteer_missing");
		while($to=$vol->fetch_row()){
			mail($to[4], $subject, $message, implode("\r\n", $headers));
		}			

		header("location:index.php?msg=we will notify the authorities and family members");
	}
}
?>