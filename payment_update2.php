<?php
 include('session.php');
  
  

  
?>


<!doctype html>
<html>
<head>
 <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
 <link rel="stylesheet" href="css/table.css" type="text/css" media="screen">
 <script type="text/javascript" src="js/jquery.js"></script>
 <script type="text/javascript" src="js/dataTables.js"></script>


  
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
	
	.dropdown:hover{
	   cursor:pointer;
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
	     <li><a href="job_history.php">Job History</a></li>
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
	 
       
	  <table id="example" class="table table-bordered data-table" border="1" width="100%">
	        
			
			
		
    <thead>
    	<tr >
        	
            <th >Job date</th>
			<th scope="col" class="rounded">Company name</th>
			<th scope="col" class="rounded">Payment type</th>
			<th scope="col" class="rounded">Other Payment type(if)</th>
			<th scope="col" class="rounded">Payment</th>
			<th scope="col" class="rounded">Payment Date</th>
			<th scope="col" class="rounded">Payment Amount</th>
			<th scope="col" class="rounded">Remark</th>
			<th scope="col" class="rounded">Provement</th>
	      	<th>View</th>
            
            
        </tr>
    </thead>
     
                    
       <tbody>
    	 <?php
			$query="SELECT * FROM job where update_status='Yes' AND sales_name='$login_session' order by date_submission desc ";
			$result=mysqli_query($db,$query);
			$x=0;
                   $y=1;    
			while($row=mysqli_fetch_assoc($result))
			{						
		?>		
        <tr class="<?php if($x!==0&&$x%20===0){$y=$y+1;echo $y;}else{echo $y;} ?>" >
                
        	<!--<td><input type="checkbox" name="" /></td>-->
            <td><?php echo $row['date_submission'];?></td>
			<td><?php echo $row['company_name'];?></td>
			<td><?php echo $row['payment_type_update'];?></td>
			<td><?php echo $row['other_payment'];?></td>
            <td><?php echo $row['payment_update'];?></td>
			<td><?php echo $row['payment_date_update'];?></td>
			<td><?php echo $row['total_amount_update'];?></td>
			<td><?php echo $row['other_update'];?></td>
			<td><img src="provement/<?php echo $row['provement'];?>"></td>
			<td><a href="view_payment_update.php?jid=<?php echo $row['job_id']; ?>" target="_blank"><img src="image/view.png" height="20px" width="20px" border="0" /></a></td>
                               
			
            
        </tr>
		<?php

			$x++;
			}
                        $total=$x/20;
                        
		?>
                <script>
                    max=<?php echo $total;?>;                    
                </script>
		
		
		
		
        
    	  
        
    </tbody>
</table> 
  

    <div class="pagination">
            <a id="prev" href=""><< prev</a>
        <?php
            $r=1;
            while ($r<=$y)
            {
        ?>
        <a class="page" href="<?php echo $r;?>"><?php echo $r;?></a>
        <?php
            $r++;
            }
        ?>
        <a id="next" href="<?php if($y>1){echo '2';}?>">next >></a>
        </div>   
	     
	 </div>
 <body>
</html>



