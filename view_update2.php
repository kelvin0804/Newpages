<?php
   include('session_admin.php');
?>
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

<style>
    
   table.dataTable,table.dataTable th,table.dataTable td{-webkit-box-sizing:content-box;box-sizing:content-box}.dataTables_wrapper{position:relative;clear:both;*zoom:1;zoom:1}.dataTables_wrapper .dataTables_length{float:left}.dataTables_wrapper .dataTables_filter{float:right;text-align:right}.dataTables_filter{top:-5px;}.dataTables_wrapper .dataTables_filter input{margin-left:0.5em}.dataTables_wrapper .dataTables_info{clear:both;float:left;padding-top:0.755em}.dataTables_wrapper .dataTables_paginate{float:right;text-align:right;padding-top:0.25em}.dataTables_wrapper .dataTables_paginate .paginate_button{box-sizing:border-box;display:inline-block;min-width:1.5em;padding:0.5em 1em;margin-left:2px;text-align:center;text-decoration:none !important;cursor:pointer;*cursor:hand;color:#333 !important;border:1px solid transparent;border-radius:2px}.dataTables_wrapper .dataTables_paginate .paginate_button.current,.dataTables_wrapper .dataTables_paginate .paginate_button.current:hover{color:#333 !important;border:1px solid #979797;background-color:white;background:-webkit-gradient(linear, left top, left bottom, color-stop(0%, #fff), color-stop(100%, #dcdcdc));background:-webkit-linear-gradient(top, #fff 0%, #dcdcdc 100%);background:-moz-linear-gradient(top, #fff 0%, #dcdcdc 100%);background:-ms-linear-gradient(top, #fff 0%, #dcdcdc 100%);background:-o-linear-gradient(top, #fff 0%, #dcdcdc 100%);background:linear-gradient(to bottom, #fff 0%, #dcdcdc 100%)}.dataTables_wrapper .dataTables_paginate .paginate_button.disabled,.dataTables_wrapper .dataTables_paginate .paginate_button.disabled:hover,.dataTables_wrapper .dataTables_paginate .paginate_button.disabled:active{cursor:default;color:#666 !important;border:1px solid transparent;background:transparent;box-shadow:none}.dataTables_wrapper .dataTables_paginate .paginate_button:hover{color:white !important;border:1px solid #111;background-color:#585858;background:-webkit-gradient(linear, left top, left bottom, color-stop(0%, #585858), color-stop(100%, #111));background:-webkit-linear-gradient(top, #585858 0%, #111 100%);background:-moz-linear-gradient(top, #585858 0%, #111 100%);background:-ms-linear-gradient(top, #585858 0%, #111 100%);background:-o-linear-gradient(top, #585858 0%, #111 100%);background:linear-gradient(to bottom, #585858 0%, #111 100%)}.dataTables_wrapper .dataTables_paginate .paginate_button:active{outline:none;background-color:#2b2b2b;background:-webkit-gradient(linear, left top, left bottom, color-stop(0%, #2b2b2b), color-stop(100%, #0c0c0c));background:-webkit-linear-gradient(top, #2b2b2b 0%, #0c0c0c 100%);background:-moz-linear-gradient(top, #2b2b2b 0%, #0c0c0c 100%);background:-ms-linear-gradient(top, #2b2b2b 0%, #0c0c0c 100%);background:-o-linear-gradient(top, #2b2b2b 0%, #0c0c0c 100%);background:linear-gradient(to bottom, #2b2b2b 0%, #0c0c0c 100%);box-shadow:inset 0 0 3px #111}.dataTables_wrapper .dataTables_paginate .ellipsis{padding:0 1em}.dataTables_wrapper .dataTables_processing{position:absolute;top:50%;left:50%;width:100%;height:40px;margin-left:-50%;margin-top:-25px;padding-top:20px;text-align:center;font-size:1.2em;background-color:white;background:-webkit-gradient(linear, left top, right top, color-stop(0%, rgba(255,255,255,0)), color-stop(25%, rgba(255,255,255,0.9)), color-stop(75%, rgba(255,255,255,0.9)), color-stop(100%, rgba(255,255,255,0)));background:-webkit-linear-gradient(left, rgba(255,255,255,0) 0%, rgba(255,255,255,0.9) 25%, rgba(255,255,255,0.9) 75%, rgba(255,255,255,0) 100%);background:-moz-linear-gradient(left, rgba(255,255,255,0) 0%, rgba(255,255,255,0.9) 25%, rgba(255,255,255,0.9) 75%, rgba(255,255,255,0) 100%);background:-ms-linear-gradient(left, rgba(255,255,255,0) 0%, rgba(255,255,255,0.9) 25%, rgba(255,255,255,0.9) 75%, rgba(255,255,255,0) 100%);background:-o-linear-gradient(left, rgba(255,255,255,0) 0%, rgba(255,255,255,0.9) 25%, rgba(255,255,255,0.9) 75%, rgba(255,255,255,0) 100%);background:linear-gradient(to right, rgba(255,255,255,0) 0%, rgba(255,255,255,0.9) 25%, rgba(255,255,255,0.9) 75%, rgba(255,255,255,0) 100%)}.dataTables_wrapper .dataTables_length,.dataTables_wrapper .dataTables_filter,.dataTables_wrapper .dataTables_info,.dataTables_wrapper .dataTables_processing,.dataTables_wrapper .dataTables_paginate{color:#333}.dataTables_wrapper .dataTables_scroll{clear:both}.dataTables_wrapper .dataTables_scroll div.dataTables_scrollBody{*margin-top:-1px;-webkit-overflow-scrolling:touch}.dataTables_wrapper .dataTables_scroll div.dataTables_scrollBody th,.dataTables_wrapper .dataTables_scroll div.dataTables_scrollBody td{vertical-align:middle}.dataTables_wrapper .dataTables_scroll div.dataTables_scrollBody th>div.dataTables_sizing,.dataTables_wrapper .dataTables_scroll div.dataTables_scrollBody td>div.dataTables_sizing{height:0;overflow:hidden;margin:0 !important;padding:0 !important}.dataTables_wrapper.no-footer .dataTables_scrollBody{border-bottom:1px solid #111}.dataTables_wrapper.no-footer div.dataTables_scrollHead table,.dataTables_wrapper.no-footer div.dataTables_scrollBody table{border-bottom:none}.dataTables_wrapper:after{visibility:hidden;display:block;content:"";clear:both;height:0}@media screen and (max-width: 767px){.dataTables_wrapper .dataTables_info,.dataTables_wrapper .dataTables_paginate{float:none;text-align:center}.dataTables_wrapper .dataTables_paginate{margin-top:0.5em}}@media screen and (max-width: 640px){.dataTables_wrapper .dataTables_length,.dataTables_wrapper .dataTables_filter{float:none;text-align:center}.dataTables_wrapper .dataTables_filter{margin-top:0.5em}}
   details summary::-webkit-details-marker { display:none; } 
   #summary-style{
      cursor:pointer;
   }
</style>
 <script type="text/javascript" src="js/jquery.js"></script>
 <script type="text/javascript" src="js/dataTables.js"></script>
 <script>
   $(document).ready(function() {
    $('table.display').DataTable();
   } );
 </script>

 <script>
 
    $(document).ready(function() {
    $('#example').DataTable( {
        
      
	    "footerCallback": function ( row, data, start, end, display ) {
            var api = this.api(), data;
             
            // Remove the formatting to get integer data for summation
            var intVal = function ( i ) {
                return typeof i === 'string' ?
                    i.replace(/[\$,]/g, '')*1 :
                    typeof i === 'number' ?
                        i : 0;
            };
 
             
            // Total over all pages of total payment
            total = api
                .column(4)
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Total over this page of total payment
            pageTotal = api
                .column( 4, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Update footer of total payment
            $( api.column( 3 ).footer() ).html(
                'RM'+pageTotal.toFixed(2) 
            );
			
			 // Total over all pages of gst
            total = api
                .column(5)
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Total over this page of gst
            pageTotal = api
                .column( 5, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Update footer of gst
            $( api.column( 4 ).footer() ).html(
                'RM'+pageTotal.toFixed(2) 
            );
			
			
			 // Total over all pages of b4gst
            total = api
                .column(6)
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Total over this page of b4gst
            pageTotal = api
                .column( 6, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Update footer of b4gst
            $( api.column( 5 ).footer() ).html(
                'RM'+pageTotal.toFixed(2) 
            );
			
			
			 // Total over all pages of payment
            total = api
                .column(7)
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Total over this page of payment
            pageTotal = api
                .column( 7, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Update footer of payment
            $( api.column( 6 ).footer() ).html(
                'RM'+pageTotal.toFixed(2) 
            );
			
			
			 // Total over all pages of paymentgst
            total = api
                .column(8)
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Total over this page of paymentgst
            pageTotal = api
                .column( 8, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Update footer of paymentgst
            $( api.column( 7 ).footer() ).html(
                'RM'+pageTotal.toFixed(2) 
            );
			
			
			 // Total over all pages of paymentb4gst
            total = api
                .column(9)
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Total over this page of paymentb4gst
            pageTotal = api
                .column( 9, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Update footer of paymentb4gst
            $( api.column( 8 ).footer() ).html(
                'RM'+pageTotal.toFixed(2) 
            );
			
			
        }
	} );
   } );
 </script>
 

</head>
<body>

<!--Header-part-->
<div id="header">
   <img src="logo/logo.png" width="220px" />
  <!--<h1>Admin</h1>-->
</div>
<!--close-Header-part--> 

<!--top-Header-menu-->
<div id="user-nav" class="navbar navbar-inverse">
  <ul class="nav">
    <li  class="dropdown" id="profile-messages" ><a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle"><i class="icon icon-user"></i>  <span class="text">Welcome  <?php echo $login_session_admin; ?></span><b class="caret"></b></a>
      <ul class="dropdown-menu">
        <li><a href="#"><i class="icon-user"></i> My Profile</a></li>
        <li class="divider"></li>
        <li><a href="logout.php"><i class="icon-key"></i> Log Out</a></li>
      </ul>
    </li>
 
   
    <!--<li class=""><a title="" href="logout.php"><i class="icon icon-share-alt"></i> <span class="text">Logout</span></a></li>-->
  </ul>
</div>

 

<!--sidebar-menu-->

<div id="sidebar"> <a href="#" class="visible-phone"><i class="icon icon-th"></i>Tables</a>
  <ul>
    <?php
	  if($_SESSION['position']  == 'super')
	  {
	    echo'<li><a href="home.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>';
        echo'<li ><a href="joblist2.php"><i class="icon icon-th"></i> <span>All Job</span></a></li>';
	    echo'<li ><a href="add_job.php"><i class="icon icon-th"></i> <span>Add Job</span></a></li>';
	    echo'<li class="active"><a href="view_update2.php"><i class="icon icon-th"></i> <span>Payment History </span></a></li>';
	    echo'<li ><a href="create_admin.php"><i class="icon icon-th"></i> <span>Create Admin</span></a></li>';
        echo'<li ><a href="create_salesperson.php"><i class="icon icon-th"></i> <span>Create Salesperson</span></a></li>';
        echo'<li ><a href="deactive.php"><i class="icon icon-th"></i> <span>De-active Job</span></a></li>';		
	  }
	  else{
	    echo'<li ><a href="joblist2.php"><i class="icon icon-th"></i> <span>All Job</span></a></li>';
	    echo'<li ><a href="add_job.php"><i class="icon icon-th"></i> <span>Add Job</span></a></li>';
	    echo'<li class="active"><a href="view_update2.php"><i class="icon icon-th"></i> <span>Payment History </span></a></li>';
	    echo'<li ><a href="create_salesperson.php"><i class="icon icon-th"></i> <span>Create Salesperson</span></a></li>'; 
	  }
	?>
	
    
    

  </ul>
</div>
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Payment History</a> </div>
    <h1>Payment History</h1>
  </div>
  
  <div class="container-fluid">
    
	
  
    <div class="row-fluid">
      <div class="span12">
        
       <div class="widget-box">
	   <details>
	   <summary id="summary-style">
          <div class="widget-title"> <span class="icon"><i class="icon-chevron-down"></i></span>
            <h5>New Job Payment</h5>
          </div>
		 </summary>
          <div class="widget-content nopaddings">
		   <div style="overflow-x:auto;">
              <table  data-order='[[ 0, "desc" ]]' id="" class="table table-bordered data-table footer display" style="width:100%">
              <thead>
                <tr>
				  <th style="display:none;"scope="col" class="rounded">id</th>
                  <th scope="col" class="rounded">Submit date</th>
			      <th scope="col" class="rounded">Company Name</th>
			      <th scope="col" class="rounded">Payment</th>
			      <th scope="col" class="rounded">Payment Date</th>
			      <th scope="col" class="rounded">Payment Amount</th>
				  <th scope="col" class="rounded">Bank In date</th>
				  <th scope="col" class="rounded">Salesperson</th>
				  <th>View</th>
				  
               </tr>
              </thead>
              <tbody>
			 
           <?php
			
			if($_SESSION['position']  == 'super')
			 {
			   $query="SELECT * FROM job j JOIN salesperson s ON j.sales_id = s.sales_id where j.payment<>'' and j.job_status!='deactive'";
			 }
			else if($_SESSION['position']  == 'KL')
			{
			   $query="SELECT * FROM job j JOIN salesperson s ON j.sales_id = s.sales_id where j.payment<>'' and j.branch_name = 'KL' and j.job_status!='deactive'";
			}
			else if($_SESSION['position']  == 'Johor')
			{
			   $query="SELECT * FROM job j JOIN salesperson s ON j.sales_id = s.sales_id where j.payment<>'' and j.branch_name = 'Johor' and j.job_status!='deactive'";
			}
			else if($_SESSION['position']  == 'Penang')
			{
			   $query="SELECT * FROM job j JOIN salesperson s ON j.sales_id = s.sales_id where j.payment<>'' and j.branch_name = 'Penang' and j.job_status!='deactive'";
			}
			else if($_SESSION['position']  == 'Melaka')
			{
			   $query="SELECT * FROM job j JOIN salesperson s ON j.sales_id = s.sales_id where j.payment<>'' and j.branch_name = 'Melaka' and j.job_status!='deactive'";
			}
			else if($_SESSION['position']  == 'Klang')
			{
			   $query="SELECT * FROM job j JOIN salesperson s ON j.sales_id = s.sales_id where j.payment<>'' and j.branch_name = 'Klang' and j.job_status!='deactive'";
			}

			$result=mysqli_query($db,$query);
			   
			while($row=mysqli_fetch_assoc($result))
			{						
		   ?>	
       		
        <tr>
            <td style="display:none;"><?php echo $row['job_id'];?></td>
			<td><?php echo $row['date_submission'];?></td>
			<td><?php echo $row['company_name'];?></td>
			<td><?php echo $row['payment'];?></td>
			<td><?php echo $row['payment_date'];?></td>
            <td><?php echo $row['payment_amount'];?></td>
			<td><?php echo $row['bankInDate'];?></td>
			<td><?php echo $row['sales_name'];?></td>
			<td><a href="view_deposit_payment.php?dpid=<?php echo $row['job_id']; ?>" target="_blank"><img src="image/view.png" height="20px" width="20px" border="0" /></a></td>

            
                               
		
            
        </tr>
		  
   
		<?php

			
			}
                        
                        
		?>
            
              </tbody>
			  
			   
             </table>  
		   </div>
          </div>
		 </details>
        </div>
      </div>
    </div>
  </div>
  
  <div class="container-fluid">
    
	
  
    <div class="row-fluid">
      <div class="span12">
        
       <div class="widget-box">
	     <details>
		 <summary id="summary-style">
          <div class="widget-title"> <span class="icon"><i class="icon-chevron-down"></i></span>
            <h5>Payment for Balance,Renewal,Upgrade</h5>
          </div>
		 </summary>
          <div class="widget-content nopaddings">
		   <div style="overflow-x:auto;">
              <table  data-order='[[ 0, "desc" ]]' id="" class="table table-bordered data-table footer display" style="width:100%">
              <thead>
                <tr>
				  <th style="display:none;"scope="col" class="rounded">id</th>
                   <th scope="col" class="rounded">Submit date</th>
				  <th scope="col" class="rounded">Company Name</th>
				  <th scope="col" class="rounded">Payment type</th>
			      <th scope="col" class="rounded">Payment</th>
			      <th scope="col" class="rounded">Payment Date</th>
			      <th scope="col" class="rounded">Payment Amount</th>
			      <th scope="col" class="rounded">Remark</th>
				  <th scope="col" class="rounded">Bank In date</th>
				  <th scope="col" class="rounded">Salesperson</th>
				  <th>View</th>
				  
               </tr>
              </thead>
              <tbody>
			 
           <?php
			//$query="SELECT * FROM payment_update  order by payment_id desc ";
			if($_SESSION['position']  == 'super')
			 {
			   $query="SELECT * FROM payment_update pu JOIN job j ON pu.job_id = j.job_id JOIN salesperson s ON pu.sales_id=s.Sales_id where  j.job_status!='deactive'";
			 }
			else if($_SESSION['position']  == 'KL')
			{
			   $query="SELECT * FROM payment_update pu JOIN job j ON pu.job_id = j.job_id JOIN salesperson s ON pu.sales_id=s.Sales_id where j.branch_name = 'KL' and j.job_status!='deactive'";
			}
			else if($_SESSION['position']  == 'Johor')
			{
			   $query="SELECT * FROM payment_update pu JOIN job j ON pu.job_id = j.job_id JOIN salesperson s ON pu.sales_id=s.Sales_id where j.branch_name = 'Johor' and j.job_status!='deactive'";
			}
			else if($_SESSION['position']  == 'Penang')
			{
			   $query="SELECT * FROM payment_update pu JOIN job j ON pu.job_id = j.job_id JOIN salesperson s ON pu.sales_id=s.Sales_id where j.branch_name = 'Penang' and j.job_status!='deactive'";
			}
			else if($_SESSION['position']  == 'Melaka')
			{
			   $query="SELECT * FROM payment_update pu JOIN job j ON pu.job_id = j.job_id JOIN salesperson s ON pu.sales_id=s.Sales_id where j.branch_name = 'Melaka' and j.job_status!='deactive'";
			}
			else if($_SESSION['position']  == 'Klang')
			{
			   $query="SELECT * FROM payment_update pu JOIN job j ON pu.job_id = j.job_id JOIN salesperson s ON pu.sales_id=s.Sales_id where j.branch_name = 'Klang' and j.job_status!='deactive'";
			}

			$result=mysqli_query($db,$query);
			   
			while($row=mysqli_fetch_assoc($result))
			{						
		   ?>	
       		
        <tr>
            <td style="display:none;"><?php echo $row['payment_id'];?></td>
			<td><?php echo $row['p_submit_date'];?></td>
			<td><?php echo $row['company_name'];?></td>
			<td><?php echo $row['payment_type'];?></td>
			<td><?php echo $row['payment_u'];?></td>
			<td><?php echo $row['payment_date_u'];?></td>
            <td><?php echo $row['payment_amount_u'];?></td>
			<td><?php echo $row['remark_u'];?></td>
			<td><?php echo $row['bankIn_date'];?></td>
			<td><?php echo $row['Sales_name'];?></td>
			<td><a href="view_payment_update.php?puid=<?php echo $row['payment_id']; ?>" target="_blank"><img src="image/view.png" height="20px" width="20px" border="0" /></a></td>

            
                               
		
            
        </tr>
		  
   
		<?php

			
			}
                        
                        
		?>
            
              </tbody>
			  
			   
             </table>  
		   </div>
          </div>
		  </details>
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
<!--<script src="js/jquery.min.js"></script>-->
<script src="js/jquery.ui.custom.js"></script> 
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.uniform.js"></script> 
<script src="js/select2.min.js"></script> 
<!--<script src="js/jquery.dataTables.min.js"></script>-->
<script src="js/matrix.js"></script> 
<!--<script src="js/matrix.tables.js"></script>-->



</body>
</html>
