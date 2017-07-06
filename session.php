<?php
   include('Config.php');
   session_start();
   

   $user_check = $_SESSION['login_user'];
   
   $ses_sql = mysqli_query($db,"select * from salesperson where Sales_name = '$user_check' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
  
   
   
   
   $login_session = $row['Sales_name'];
   $_SESSION['user_id'] = $row['Sales_id'];
   $_SESSION['sales_status'] = $row['sales_status'];
   $_SESSION['user_email'] = $row['Sales_email'];
   $_SESSION['branch_name'] = $row['sales_branch'];
   $_SESSION['start'] = time();
   $_SESSION['expire'] = $_SESSION['start'] + (1 * 60);
   
  
   
   if(!isset($_SESSION['login_user']) || $_SESSION['sales_status']=='inactive' ){
      header("location:login.php");
	  exit;
   }
 
   else{
      $now = time();
	  
	  if($now > $_SESSION['expire']){
	     session_destroy();
         echo "Your session has expired! <a href='http://localhost/somefolder/login.php'>Login here</a>";
	  }
	 
   }
?>