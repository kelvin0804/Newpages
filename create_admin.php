<?php   include('session_admin.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Newpages Admin</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="css/bootstrap.min.css" />
<link rel="stylesheet" href="css/bootstrap-responsive.min.css" />
<link rel="stylesheet" href="css/uniform.css" />
<link rel="stylesheet" href="css/select2.css" />
<link rel="stylesheet" href="css/matrix-style.css" />
<link rel="stylesheet" href="css/matrix-media.css" />
<link href="font-awesome/css/font-awesome.css" rel="stylesheet" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
</head>
<body>

<!--Header-part-->
<div id="header">
  <img src="logo/logo.png" width="220px" />
</div>
<!--close-Header-part--> 

<!--top-Header-menu-->
<div id="user-nav" class="navbar navbar-inverse">
  <ul class="nav">
    <li  class="dropdown" id="profile-messages" ><a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle"><i class="icon icon-user"></i>  <span class="text">Welcome <?php echo $login_session_admin; ?></span><b class="caret"></b></a>
      <ul class="dropdown-menu">
        <li><a href="#"><i class="icon-user"></i> My Profile</a></li>
         <li class="divider"></li>
        <li><a href="logout.php"><i class="icon-key"></i> Log Out</a></li>
      </ul>
    </li>
    
    
    
  </ul>
</div>



<!--sidebar-menu-->

<div id="sidebar"> <a href="#" class="visible-phone"><i class="icon icon-th"></i>Tables</a>
  <ul>
    <li><a href="home.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li ><a href="joblist2.php"><i class="icon icon-th"></i> <span>All job</span></a></li>
	<li ><a href="add_job.php"><i class="icon icon-th"></i> <span>Add Job</span></a></li>
	<li ><a href="view_update2.php"><i class="icon icon-th"></i> <span>Payment History</span></a></li>
	<li class="active"><a href="create_admin.php"><i class="icon icon-th"></i> <span>Create Admin</span></a></li>
	<li ><a href="create_salesperson.php"><i class="icon icon-th"></i> <span>Create Salesperson</span></a></li>
	<li ><a href="deactive.php"><i class="icon icon-th"></i> <span>De-active Job</span></a></li>
	
    
    
  
    
    
  
  </ul>
</div>
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">create admin</a> </div>
    <h1>Create Admin</h1>
  </div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
        
       
        
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Create Admin</h5>
          </div>
          <div class="widget-content nopadding">
                 <form id="Form-style"action="admin_exc.php" method="post" enctype="multipart/form-data" autocomplete="off">
         
           
			<?php
				     
				//if action is joined show email exists
				if(isset($_GET['action']) && $_GET['action'] == 'joined'){
					echo "<h2 class='bg-success'>admin name already exists!.</h2>";
				}
				
				if(isset($_GET['action']) && $_GET['action'] == 'emailexist'){
					echo "<h2 class='bg-success'>Email already exists!.</h2>";
				}
				
				//if action is sucess show success
				if(isset($_GET['action']) && $_GET['action'] == 'success'){
					echo "<h2 class='bg-success'>Admin created!</h2>";
				}
				
				
		    ?>
				  
				  
					
                    <dl>
                        
                        <dd>
						   <label for="salesname">Admin name:</label>
						   <input type="text"  id="adminname" name="adminname" placeholder="Admin name" required>
						</dd>
                    </dl>
					
					<dl>
                        
                       <dd>
						<label for="salesemail">Admin email</label>
						<input type="email"  name="email" placeholder="Admin email" required >
					   </dd>
                    </dl>
					
					
					
					 <dl>
                   
                        <dd>
						 <label for="salespassword">Admin password:</label>
						 <input type="password" name="Adminpassword"  id="pass1" size="54"  placeholder="Admin password"  required onkeyup="checkLen(); return false;">
						 <span id="confirmMessage1" style="color:#ed0927"></span>
						</dd>
                     </dl>
					 
					 <dl>
					  <dd>
					   <label for="confirmpassword">Confirm password:</label>
					   <input type="password"  value="" id="pass2" placeholder="Confirm Password"  required onkeyup="checkPass(); return false;">
                       <span id="confirmMessage" style="color:#ed0927"></span>
					  </dd>
					 </dl>
					 
					 
					 <dl>
                        
                        <dd>
						<label for="adminposition">Admin's position:</label>
					
					      <select name="adminposition" required>
						     <option disabled selected value> -- select an option -- </option>
						     <option value="KL">KL</option>
							 <option value="Johor">Johor</option>
							 <option value="Penang">Penang</option>
							 <option value="Melaka">Melaka</option>
						  </select>
                        </dd>
                    </dl>
					
			
					
	                <dl class="submit">
					<dd>
                     <input type="submit" name="submit" id="submit" value="Submit" />
					</dd>  
                     </dl>
                     
                     
                    
               
         </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--Footer-part-->
<div class="row-fluid">
   <div id="footer" class="span12"> 2017 &copy; Newpages Network Sdn Bhd Brought to you by <a href="http://themedesigner.in">Themedesigner.in</a> </div>

</div>
<!--end-Footer-part-->
<script src="js/jquery.min.js"></script> 
<script src="js/jquery.ui.custom.js"></script> 
<script src="js/bootstrap.min.js"></script> 
<script src="js/jquery.uniform.js"></script> 
<script src="js/select2.min.js"></script> 
<script src="js/jquery.dataTables.min.js"></script> 
<script src="js/matrix.js"></script> 
<script src="js/matrix.tables.js"></script>

<!-- password validation -->
<script>
   function checkPass()
{
    //Store the password field objects into variables ...
    var pass1 = document.getElementById('pass1');
    var pass2 = document.getElementById('pass2');
    //Store the Confimation Message Object ...
    var message = document.getElementById('confirmMessage');
    
    //Compare the values in the password field 
    //and the confirmation field
    if(pass1.value == pass2.value){
        //The passwords match. 
        //Set the color to the good color and inform
        //the user that they have entered the correct password 
        
        message.innerHTML = ""
    }else {
        //The passwords do not match.
        //Set the color to the bad color and
        //notify the user.
        
        message.innerHTML = "Passwords Do Not Match!"
    }
}

function checkLen()
	{
	var pass1 = document.getElementById('pass1');
	var message1 = document.getElementById('confirmMessage1');

	
	if(pass1.value.length >14 || pass1.value.length <6)
	{
		
        message1.innerHTML = "Please Enter 6-16Characters!"
	}
	else if(pass1.value.length >5 && pass1.value.length <=9)
	{
	 
        message1.innerHTML = "Password Level=Weak"
	}
	else if(pass1.value.length >9 && pass1.value.length <=12)
	{
	 
        message1.innerHTML = "Password Level=Normal"
	}
	else if(pass1.value.length >12 && pass1.value.length <=16)
	{
	 
        message1.innerHTML = "Password Level=Strong"
	}
	else {
       
        message1.innerHTML = ""
		
	}
        
	}
</script>
<!-- password validation -->

<!-- admin's name validation-->
<script>
   $(document).on('keypress', '#adminname', function (event) {
    var regex = new RegExp("^[a-zA-Z ]+$");
    var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
    if (!regex.test(key)) {
        event.preventDefault();
        return false;
    }
});
</script>
<!-- admin's name validation-->

</body>
</html>
