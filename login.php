<?php
include('Config.php');
session_start();

 if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($db,$_POST['Sales_name']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
      
      $sql = "SELECT Sales_id FROM salesperson WHERE Sales_name = '$myusername' and Sales_password = '$mypassword'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      //$active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
         //session_register("myusername");
         $_SESSION['login_user'] = $myusername;
		
        
         header("location: job.php");
      } 

	  else {
	     
		 //echo '<script language="javascript">';   
         //echo 'alert("Your Login Name or Password is invalid")';
        // echo '</script>';
         $error = "Your Login Name or Password is incorrect";
         
	  }
   }
?>
<!doctype html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
   <style>
       .form-style{
	      text-align:center;
	   }
	   
	   #textbox-style
      {
        background: url(search-dark.png) no-repeat 10px 6px #333;
        color: #ccc;
		height: 30px;
        width: 200px;
		font-size:20px;
        padding: 6px 15px 6px 35px;
        border-radius: 20px;
        box-shadow: 0 1px 0 #ccc inset;
        transition:500ms all ease;
       }
       #textbox-style:hover
       {
         width:180px; 
       }
	   
	   #lgn-btn-style{
	      width: 200px;
		  height: 30px;
		  border-radius: 20px;
		  
	   }
	   #lgn-btn-style:hover{
	      cursor:pointer;
	   }
	   
	    .logo{
	    width: 280px;
        height: 70px;
	 }
   
   </style>

</head>
<body>	
<div class="container">

	<div class="row">

	    <div class="form-style">
		    <form action="" method="post">
            
            
                <a href="index.php"><p><img class="logo" title="newpages logo"src="logo/logo.png" /></p></a>
				<div style = "font-size:20px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
                <p><input id="textbox-style" type="text" name="Sales_name" value="Username" onBlur="if(this.value == '') this.value = 'Username'" onFocus="if(this.value == 'Username') this.value = ''" required></p> 
                <p><input id="textbox-style" type="password"  name="password" value="Password" onBlur="if(this.value == '') this.value = 'Password'" onFocus="if(this.value == 'Password') this.value = ''" required></p> 
                <p><input id="lgn-btn-style" type="submit" name="submit" value="Sign In"></p>
				
              
            

           </form>	
		
		
	   </div>



   </div>
</body>
</html>



