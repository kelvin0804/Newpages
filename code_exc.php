<?php
include('session_admin.php');


    $salesname=$_POST['salesname'];
    $salesemail=$_POST['email'];
    $salespassword=$_POST['salespassword'];
    $salesbranch=$_POST['salesbranch'];
	$salesphone = $_POST['salesphone']; 
	$status = "active"; 


$result = mysqli_query($db,"SELECT * FROM salesperson WHERE Sales_name='" . $_POST['salesname'] . "'  ");
//$result = mysqli_query($db,"SELECT * FROM salesperson  ");
$row  = mysqli_fetch_array($result);

if($salesname === $row['Sales_name'] ){
   header('Location: create_salesperson.php?action=joined');
   exit;
}

else{
  mysqli_query($db,"INSERT INTO salesperson(Sales_name,Sales_email,Sales_phone,Sales_password,sales_branch,sales_status)VALUES('$salesname',' $salesemail','$salesphone','$salespassword','$salesbranch','$status' )");
  
  $to = $_POST['email'];
  $subject = "Salesperson details";
  $txt = "Your new username is"
  .$txt =  $_POST['salesname']
  .$txt ="and password is" 
  .$txt = $_POST['salespassword'];
  $headers = "From: livrariahealth@gmail.com" . "\r\n";


       mail($to,$subject,$txt,$headers);
	   
  
   header('Location: create_salesperson.php?action=success');
   exit;
}





?>

