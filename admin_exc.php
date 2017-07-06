<?php
include('session_admin.php');


    $adminname=$_POST['adminname'];
    $email=$_POST['email'];
    $Adminpassword=$_POST['Adminpassword'];
    $adminposition=$_POST['adminposition'];
	
	


$result = mysqli_query($db,"SELECT * FROM  admin WHERE admin_name='" . $_POST['adminname'] . "'  ");
$row  = mysqli_fetch_array($result);

if($adminname === $row['admin_name'] ){
   header('Location: create_admin.php?action=joined');
   exit;
}

else{
  mysqli_query($db,"INSERT INTO admin(admin_name,admin_email,admin_password,position)VALUES('$adminname','$email','$Adminpassword','$adminposition')");
  
  
	   
  
   header('Location: create_admin.php?action=success');
   exit;
}





?>

