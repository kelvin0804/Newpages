<?php
include('session.php');

  $id=$_SESSION["user_id"];
  $result = mysqli_query($db,"select * from salesperson where Sales_id='$id'");
  $row = mysqli_fetch_assoc($result);

  
?>
<!doctype html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
<link rel="stylesheet" href="css/table.css" type="text/css" media="screen">
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/dataTables.js"></script>

<!-- responsive table-->
<style>
	
	/* 
	Max width before this PARTICULAR table gets nasty
	This query will take effect for any screen smaller than 760px
	and also iPads specifically.
	*/
	@media 
	only screen and (max-width: 760px),
	(min-device-width: 768px) and (max-device-width: 1024px)  {
	
		/* Force table to not be like tables anymore */
		table, thead, tbody, th, td, tr { 
			display: block; 
		}
		
		/* Hide table headers (but not display: none;, for accessibility) */
		thead tr { 
			position: absolute;
			top: -9999px;
			left: -9999px;
		}
		
		tr { border: 1px solid #ccc; }
		
		td { 
			/* Behave  like a "row" */
			border: none;
			border-bottom: 1px solid #eee; 
			position: relative;
			padding-left: 50%; 
		}
		
		td:before { 
			/* Now like a table header */
			position: absolute;
			/* Top/left values mimic padding */
			top: 6px;
			left: 6px;
			width: 45%; 
			padding-right: 10px; 
			white-space: nowrap;
		}
		
		/*
		Label the data
		*/
		td:nth-of-type(1):before { content: "Job date"; }
		td:nth-of-type(2):before { content: "Contract no."; }
		td:nth-of-type(3):before { content: "Total package amount"; }
		td:nth-of-type(4):before { content: "Payment amount"; }
		td:nth-of-type(5):before { content: "Customer name"; }
		td:nth-of-type(6):before { content: "Customer contact H/P"; }
		td:nth-of-type(7):before { content: "Payment"; }
		td:nth-of-type(8):before { content: "Payment date"; }
		td:nth-of-type(9):before { content: "Status"; }
		td:nth-of-type(10):before { content: "Payment update status"; }
		td:nth-of-type(11):before { content: "Update Job"; }
		td:nth-of-type(12):before { content: "Update payment"; }
	}
	
	/* Smartphones (portrait and landscape) ----------- */
	@media only screen
	and (min-device-width : 320px)
	and (max-device-width : 480px) {
		body { 
			padding: 0; 
			margin: 0; 
			width: 320px; }
		}
	
	/* iPads (portrait and landscape) ----------- */
	@media only screen and (min-device-width: 768px) and (max-device-width: 1024px) {
		body { 
			width: 495px; 
		}
	}
	
</style>



  
  <style>
  a{
    text-decoration:none;
	color:white;
	
  }
  
  a:hover{
     background-color:grey;
  }
     ul{
	    list-style-type: none;
		
	 }
	 
	 ul li{
	    display: inline;
	 }
	 
	 #nav{
	    border:solid 2px;
		background-color:black;
	    width:auto;
		height:100%;
		color:white;
		display:block;
	 }
	
	
	 
	 .dropdown-content {
      display: none;
      position: absolute;
      background-color: #f9f9f9;
      min-width: 100px;
      box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
       padding: 12px 16px;
      z-index: 1;
     }
	 
	 .dropdown:hover .dropdown-content {
       display: block;
      }
	  
	  
	  

  </style>
  
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
                .column(2)
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Total over this page of total payment
            pageTotal = api
                .column( 2, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Update footer of total payment
            $( api.column( 2 ).footer() ).html(
                'RM'+pageTotal.toFixed(2) 
            );
			
			 // Total over all pages of gst
            total = api
                .column(3)
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Total over this page of gst
            pageTotal = api
                .column( 3, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Update footer of gst
            $( api.column( 3 ).footer() ).html(
                'RM'+pageTotal.toFixed(2) 
            );
			
			
			
			
        }
    } );
} );
</script>
   
  

</head>
 <body>
   
  
 
  <div id="nav">
    
      <ul>
	     <li><a href="job.php">Add Job</a></li>
	     <li>Job History</li>
		 <li><a href="payment_update.php">Payment update</a></li>
		 <li style="float:right;margin-right:60px;">
		     <div class="dropdown">
			  <?php echo $login_session; ?>
			 
			     <div class="dropdown-content">
			       <a href = "logout.php" style="color:black;">Sign Out</a>
				 </div>
		     </div>
	     </li>
		
		  
	  </ul>
	
                              
  </div>
	 <div id="Joblist">

	  <table  id="example" class="table table-bordered data-table"  border="1">
	        
    <thead>
    	<tr class="h">
        	
            <th scope="col" class="rounded-company">Job date</th>
			<th scope="col" class="rounded">Contract no.</th>
			<th scope="col" class="rounded">Total package amount</th>
			<th scope="col" class="rounded">Payment amount</th>
			<th scope="col" class="rounded">Customer name</th>
			<th scope="col" class="rounded">Customer contact H/P</th>
			<th scope="col" class="rounded">Payment</th>
			<th scope="col" class="rounded">Payment date</th>
			<th scope="col" class="rounded">Status</th>
			<th scope="col" class="rounded">Payment update status</th>
			<th>Update Job</th>
			<th>Update payment</th>
            
            
        </tr>
    </thead>
   
                    
       <tbody>
    	 <?php
			$query="SELECT * FROM job LEFT JOIN salesperson ON job.sales_id = salesperson.Sales_id where salesperson.Sales_id=$id order by job.job_id desc";
			$result=mysqli_query($db,$query);
			$x=0;
                   $y=1;    
			while($row=mysqli_fetch_assoc($result))
			{						
		?>		
        <tr class="<?php if($x!==0&&$x%10===0){$y=$y+1;echo $y;}else{echo $y;} ?>" >
                
        	<!--<td><input type="checkbox" name="" /></td>-->
            <td><?php echo $row['date_submission'];?></td>
			<td><?php echo $row['contract_no'];?></td>
			<td><?php echo $row['total_package_amount'];?></td>
			<td><?php echo $row['payment_amount'];?></td>
			<td><?php echo $row['customer_name'];?></td>
			<td><?php echo $row['customer_hp'];?></td>
			<td><?php echo $row['payment'];?></td>
			<td><?php echo $row['payment_date'];?></td>
			<td><?php echo $row['status'];?></td>
			<td><?php echo $row['update_status'];?></td>
			<td><a href="update_job.php?jid=<?php echo $row['job_id']; ?>" target="_blank"><img src="image/update.jpg" height="20px" width="20px" border="0" /></a></td>
			<td><a href="update_payment.php?jid=<?php echo $row['job_id']; ?>" target="_blank"><img src="image/update.jpg" height="20px" width="20px" border="0" /></a></td>
                               
			
            
        </tr>
		<?php

			
			}
                      
                        
		?>
               
				
		   </tbody>
		  
</table>  

                     
	     
	 </div>

 </body>
</html>



