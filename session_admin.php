<?php
   include('Config.php');
   session_start();
   
   
   
   
   $admin_check = $_SESSION['login_admin'];
   
   $ses_sql = mysqli_query($db,"select * from admin where admin_name = '$admin_check'  ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   
 
   
 
   $login_session_admin = $row['admin_name'];
   $_SESSION['admin_email'] = $row['admin_email'];
   $_SESSION['position'] = $row['position'];
   $_SESSION['start'] = time();
   $_SESSION['expire'] = $_SESSION['start'] + (1 * 60);
   
   if(!isset($_SESSION['login_admin'])){
      header("location:admin_login.php");
   }
 
   else{
      $now = time();
	  
	  if($now > $_SESSION['expire']){
	     session_destroy();
         echo "Your session has expired! <a href='http://localhost/somefolder/login.php'>Login here</a>";
	  }
	 
	 
   }
?>