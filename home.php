<?php   include('session_admin.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Newpages Admin</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="css/bootstrap.min.css" />
<link rel="stylesheet" href="css/bootstrap-responsive.min.css" />
<link rel="stylesheet" href="css/fullcalendar.css" />
<link rel="stylesheet" href="css/matrix-style.css" />
<link rel="stylesheet" href="css/matrix-media.css" />
<link href="font-awesome/css/font-awesome.css" rel="stylesheet" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
</head>
<body>

<!--Header-part-->
<div id="header">
  <img src="logo/logo.png" width="220px" />
  <!--<h1><a href="home.php"><img src="logo/logo.png"  /></a></h1>-->
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

<div id="sidebar"><a href="#" class="visible-phone"><i class="icon icon-home"></i> Dashboard2</a>
  <ul>
    <li class="active"><a href="home.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
	<li ><a href="joblist2.php"><i class="icon icon-th"></i> <span>All job</span></a></li>
	<li ><a href="add_job.php"><i class="icon icon-th"></i> <span>Add Job</span></a></li>
	<li ><a href="view_update2.php"><i class="icon icon-th"></i> <span>Payment History</span></a></li>
	<li ><a href="create_admin.php"><i class="icon icon-th"></i> <span>Create Admin</span></a></li>
	<li ><a href="create_salesperson.php"><i class="icon icon-th"></i> <span>Create Salesperson</span></a></li>
	<li ><a href="deactive.php"><i class="icon icon-th"></i> <span>De-active Job</span></a></li>
   
</div>
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a></div>
  </div>
  <div  class="quick-actions_homepage">
    <ul class="quick-actions">
      <li class="bg_lb"> <a href="#"> <i class="icon-dashboard"></i> My Dashboard </a> </li>
      <li class="bg_lo"> <a href="manage_user.php"> <i class="icon-group"></i> Manage Salesperson </a> </li>
	  <li class="bg_lo"> <a href="manage_admin.php"> <i class="icon-group"></i> Manage Admin </a> </li>
      
    </ul>
  </div>
  <div class="container-fluid">
    <div class="row-fluid">
      <div class="span6">
	    <div class="widget-box">
          <div class="widget-title bg_ly" data-toggle="collapse" href="#collapseG2"><span class="icon"><i class="icon-chevron-down"></i></span>
            <h5>Latest Job</h5>
          </div>
          <div class="widget-content nopadding collapse in" id="collapseG2">
                 <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Job date</th>
                  <th>Contract no.</th>
                  <th>Company name</th>
                  <th>View</th>
                  
                </tr>
              </thead>
              <tbody>
                    <?php
			$query="SELECT * FROM job order by  job_id desc LIMIT 3";
			$result=mysqli_query($db,$query);
			   
			while($row=mysqli_fetch_assoc($result))
			{						
		?>	
       		
        <tr  >
           

            <td><?php echo $row['date_submission'];?></td>
			<td><?php echo $row['contract_no'];?></td>
			<td><?php echo $row['company_name'];?></td>	
			<td><a href="view_job.php?jid=<?php echo $row['job_id']; ?>" target="_blank"><img src="image/view.png" height="20px" width="20px" border="0" /></a></td>
                               
		
            
        </tr>
		  
   
		<?php

			
			}
                        
                        
		?>
              </tbody>
            </table>
          </div>
        </div>
            
     
      </div>
      <div class="span6">
      
       
      </div>
    </div>
    <hr>
    <div class="row-fluid">
      <div class="span12">
       
      </div>
    </div>
  </div>
</div>
<!--Footer-part-->
<div class="row-fluid">
  <div id="footer" class="span12"> 2017 &copy; Newpages Network Sdn Bhd. Brought to you by <a href="http://themedesigner.in">Themedesigner.in</a> </div>
</div>
<!--end-Footer-part-->
<script src="js/excanvas.min.js"></script> 
<script src="js/jquery.min.js"></script> 
<script src="js/jquery.ui.custom.js"></script> 
<script src="js/bootstrap.min.js"></script> 
<script src="js/jquery.flot.min.js"></script> 
<script src="js/jquery.flot.resize.min.js"></script> 
<script src="js/jquery.peity.min.js"></script> 
<script src="js/matrix.js"></script> 
<script src="js/fullcalendar.min.js"></script> 
<script src="js/matrix.calendar.js"></script> 
<script src="js/matrix.chat.js"></script> 
<script src="js/jquery.validate.js"></script> 
<script src="js/matrix.form_validation.js"></script> 
<script src="js/jquery.wizard.js"></script> 
<script src="js/jquery.uniform.js"></script> 
<script src="js/select2.min.js"></script> 
<script src="js/matrix.popover.js"></script> 
<script src="js/jquery.dataTables.min.js"></script> 

<script src="js/matrix.interface.js"></script> 
<script type="text/javascript">
  // This function is called from the pop-up menus to transfer to
  // a different page. Ignore if the value returned is a null string:
  function goPage (newURL) {

      // if url is empty, skip the menu dividers and reset the menu selection to default
      if (newURL != "") {
      
          // if url is "-", it is this page -- reset the menu:
          if (newURL == "-" ) {
              resetMenu();            
          } 
          // else, send page to designated URL            
          else {  
            document.location.href = newURL;
          }
      }
  }

// resets the menu selection upon entry to this page:
function resetMenu() {
   document.gomenu.selector.selectedIndex = 2;
}
</script>
</body>
</html>
