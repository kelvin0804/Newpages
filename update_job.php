<?php
   include('session.php');
   $id=$_SESSION['user_id'];
  
  //path of image file
  /*define('PR_UPLOADPATH','order/');
  define('PR_UPLOADPATH2','quotation/');
  define('PR_UPLOADPATH3','fcard/');
  define('PR_UPLOADPATH4','bcard/');
  define('PR_UPLOADPATH5','ssm/');
  define('PR_UPLOADPATH6','cheque/');
  define('PR_UPLOADPATH7','cash/');
  define('PR_UPLOADPATH8','slip/');*/
  define('PR_UPLOADPATH','attachment/');

  
  $jid = intval($_REQUEST["jid"]);
  $query="SELECT * FROM job LEFT JOIN salesperson ON job.sales_id = salesperson.Sales_id where job.job_id = '$jid' and salesperson.Sales_id='$id'";
  $result = mysqli_query($db,$query);
  $row = mysqli_fetch_assoc($result);
  
  //if enter other salesperson's job will redirect go job_history.php
  if($row == false){
    header('location:job_history.php');
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Update job</title>
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
<link rel="stylesheet" href="css/style.css" />
<link rel="stylesheet" type="text/css" href="css/enlarge.css">
  <script>
  
     function checkSubmit(){
	    
		 if(document.getElementById('total').value < document.getElementById('amount').value){
		  alert ("Payment amount is larger than total package amount!"); 
		  document.getElementById('amount').focus()
		  return false;
		 }
		 
	    else{
	     return true;
	   }  
	 
	 }
	 
	
  </script>
<style>
    .enlarge:hover {
     	transform:scale(2,2);
	    transform-origin:0 0;
      }
	  
	  input[type=text],
      input[type=email],
	  input[type=number],
	  input[type=tel],
      textarea,
      select {
       width: 100%;
       height: 30px;	   
     }
	 
	 
	 
	
	  textarea{
	    border-radius: 10px;	
	 }
	 
	  #CustomerDescription,#Remark,#CompanyAddress,#companyaddress,#Company_Address,#Reason,#Item{
	    width:100%;
		height:150px;
	 }
	 
	  summary{
	   font-size:30px;
	 }
	 
	 #sub-btn-style{
	   width: 100px;
	   height: 30px;
	   background-color:#00ffff;
	   font-weight:bold;
       border-radius: 20px;
	 }
	 
	 #sub-btn-style:hover{
	   cursor:pointer;
	 }
	 
	  #summary_style:hover{
	    cursor:pointer;
	 }
	 
	 .img-download{
	    background-image: url(image/zip.png);
        background-repeat: no-repeat;
        padding: 0px 24px;
        border: none;
	 }
	 .pdf-color{
	   color:#FF0000;
	 }
	
	 
	
	 
</style>
 <script type="text/javascript" src="js/jquery.js"></script>
 <script>
     function duplicateValue(){
	    var cb = document.getElementById('billing');
	    var c_name = document.getElementById('Company_Name');
		var c_name2 = document.getElementById('CompanyName');
		var c_reg = document.getElementById('CompanyReg');
		var c_reg2 = document.getElementById('Company_Reg');
		var gst = document.getElementById('GSTNo');
		var gst2 = document.getElementById('GST_No');
		var c_address = document.getElementById('CompanyAddress');
		var c_address2 = document.getElementById('companyaddress');
		var office_phone = document.getElementById('Office_Phone');
		var office_phone2 = document.getElementById('OfficePhone');
		var office_fax = document.getElementById('Office_Fax');
		var office_fax2 = document.getElementById('OfficeFax');
		var email_master = document.getElementById('email_master');
		var email_website = document.getElementById('email_website');
		
		if(cb.checked){
		   c_name2.value=c_name.value;
		   c_reg2.value=c_reg.value;
		   gst2.value=gst.value;
		   c_address2.value=c_address.value;
		   office_phone2.value=office_phone.value;
		   office_fax2.value=office_fax.value;
		   email_website.value=email_master.value;
		   
		}
		else{
		   c_name2.value= '';
		   c_reg2.value= '';
		   gst2.value= '';
		   c_address2.value= '';
		   office_phone2.value= '';
		   office_fax2.value= '';
		   email_website.value= '';
		}
	 }
  
   
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
    <li  class="dropdown" id="profile-messages" ><a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle"><i class="icon icon-user"></i>  <span class="text">Welcome  <?php echo $login_session; ?></span><b class="caret"></b></a>
      <ul class="dropdown-menu">
        <li><a href="#"><i class="icon-user"></i> My Profile</a></li>
      
        
      </ul>
    </li>
	<li><a href="logout.php"><i class="icon-key"></i> Log Out</a></li>
 
   
    
  </ul>
</div>

 

<!--sidebar-menu-->

<div id="sidebar"> <a href="#" class="visible-phone"><i class="icon icon-th"></i>Tables</a>
  <ul>
  
    
    <li ><a href="job.php"><i class="icon-th-list"></i> <span>Add Job</span></a></li>
	<li class="active"><a href="job_history.php"><i class="icon icon-th"></i> <span>Job history</span></a></li>
    <li ><a href="payment_update.php"><i class="icon icon-th"></i> <span>Payment history</span></a></li>
    
    

  </ul>
</div>
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Update Job</a> </div>
    <h1>Update Job</h1>
  </div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
        
       
       
   
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th-list"></i></span>
            <h5>Update Job</h5>
          </div>
          <div class="widget-content nopaddings">
		   
               <form action="" method="POST" enctype="multipart/form-data" onsubmit="return checkSubmit()">
         
                <fieldset>
			
				
				    

					
                    <dl>
                        
                        <dt><input type="date" style="display:none;" id="submit_date" name="submit_date" value="<?php echo $row['date_submission'];?>" ></dt>
                    </dl>
					
					<dl>
                        <dt><label for="ContractNo">Contract No.:</label></dt>
                        <dt><input type="text"  id="contract_no"name="contract_no" value="<?php echo $row['contract_no']; ?>" ></dt>
                    </dl>
					
					 <dl>
                        <dt><label for="CompanyName">Company name:</label></dt>
                        <dt><input type="text" id="Company_Name"name="Company_Name"  size="54" value="<?php echo $row['company_name']; ?>"  readonly></dt>
                    </dl>
					
					<dl>
                        <dt><label for="CompanyReg">Company Registration No.:</label></dt>
                        <dt><input type="text" id="CompanyReg"name="CompanyReg"  size="54"  value="<?php echo $row['company_reg_no']; ?>"  ></dt>
                    </dl>
					
					<dl>
                        <dt><label for="GSTNo">GST No.:</label></dt>
                        <dt><input type="text" id="GSTNo"name="GSTNo"  value="<?php echo $row['gst_no']; ?>" size="54"  placeholder="GST Number" ></dt>
                    </dl>
					
					 <dl>
                        <dt><label for="CompanyAddress">Company Address:</label></dt>
                        <dt><textarea readonly id="CompanyAddress"name="Company_Address" cols="30" rows="10" id="CompanyAddress" ><?php echo $row['company_address']; ?> </textarea></dt>
					</dl>
					
					 <dl>
                        <dt><label for="OfficePhone">Office Telephone:</label></dt>
                        <dt><input type="tel" id="Office_Phone"name="Office_Phone"    value="<?php echo $row['office_telephone']; ?>"  ></dt>
                    </dl>
					
					<dl>
                        <dt><label for="OfficeFax">Office Fax:</label></dt>
                        <dt><input type="tel" id="Office_Fax"name="OfficeFax"  value="<?php echo $row['office_fax']; ?>"  ></dt>
                    </dl>
					
					
					
					
					
					<dl>
                        <dt><label for="Package">ONESYCN Package:</label></dt>
                        <dt>
						    <select name="package" id="package" readonly>
						      <option value="<?php echo $row['package'];?>"> Current:<?php echo $row['package'];?></option>
			                  <option value="OneSync Standard 1 years">OneSync Standard 1 years</option>
							  <option value="OneSync Standard 2 years">OneSync Standard 2 years</option>
							  <option value="OneSync Advanced 2 years">OneSync Advanced 2 years</option>
							  <option value="OneSync Pro 2 years">OneSync Pro 2 years</option>
							  <option value="OneSync  X Edition 1 years">OneSync  X Edition 1 years</option>
							  <option value="OneSync X Edition Lite 1 Year">OneSync X Edition Lite 1 Year</option>
				            </select>
						</dt>
                    </dl>
					
					<dl>
                        <dt><label for="Advfee">Annual Advertising Fee[ Include 6% GST ]:</label></dt>
                        <dt>RM<input type="text" id="Advfee"name="Advfee" value="<?php echo $row['annual_adv_fee']; ?>" readonly></dt>
                    </dl>
					
					<dl>
                        <dt><label for="NoEmailAccount">How many Email Account:</label></dt>
                        <dt><input type="number" min="3" max="10" id="NoEmailAccount" name="NoEmailAccount"  value="<?php echo $row['no_of_email_account']?>" readonly></dt>
                    </dl>
					
					
					
					<dl>
                        <dt><label for="Item">Additional Item:</label></dt>
                        <dt><textarea name="Item" cols="30" rows="10" id="Item" ><?php echo $row['item']; ?></textarea></dt>
						
                         
                    </dl>
					
					<dl>
                        <dt><label for="Total">Total Package Amount [ Include 6% GST ]:</label></dt>
                        <dt>RM<input type="text" id="total"name="Total" value="<?php echo $row['total_package_amount']; ?>" readonly></dt>
						
                    </dl>
					
					<dl>
                        <dt><label for="Payment">Payment:</label></dt>
                        <dt>
						  <select name="payment" >
						     <option value="<?php echo $row['payment']?>">Current:<?php echo $row['payment']?></option>
						     <option value="Cheque">Cheque</option>
							 <option value="Cash">Cash</option>
							 <option value="Bank transfer/Online Banking">Bank transfer/Online Banking</option>
							 
						   </select>
  
						</dt>
                    </dl>
					
			        
					
					<dl>
                        <dt><label for="amount">Payment Amount [ Include 6% GST ]:</label></dt>
                        <dt>RM<input type="text" id="amount"name="amount"  value="<?php echo $row['payment_amount']; ?>" ></dt>
                    </dl>
					
					<dl>
                        <dt><label for="payment_date">Payment / Cheque / Bank Transfer Date:</label></dt>
                        <dt><input type="date" name="payment_date" value="<?php echo $row['payment_date']; ?>" ></dt>
                    </dl>
					
					<dl>
                        <dt><label for="customer">Customer Name :</label></dt>
                        <dt><input type="text" size="54"  id="customer"name="customer" value="<?php echo $row['customer_name']; ?>" ></dt>
                    </dl>
					
					<dl>
                        <dt><label for="customerDesignation">Customer Designation :</label></dt>
                        <dt><input type="text" size="54"  id="customer_design"name="customer_design" value="<?php echo $row['CustomerDesignation']; ?>" ></dt>
                    </dl>
					
					 <dl>
                        <dt><label for="customerPhone">Customer Contact H/P:</label></dt>
                        <dt><input type="tel" id="customerPhone"name="customerPhone"   value="<?php echo $row['customer_hp']; ?>"  ></dt>
                    </dl>
					
					 <dl>
                        <dt><label for="email_master">Email (MASTER):</label></dt>
                        <dt><input type="text"  id="email_master"name="email_master"   value="<?php echo $row['email_master']; ?>"  readonly></dt>
                    </dl>
					
					<dl>
                        <dt><label for="email_billing">Email (BILLING):</label></dt>
                        <dt><input type="text" id="email_billing"name="email_billing"   value="<?php echo $row['email_billing']; ?>"  readonly></dt>
                    </dl>
					
					<dl>
                       
					  
						<dt><label for="Attachment">Attachment :</label></dt>
						<dt>
					      <p style="font-size:15px;color:#ff0000"><b>Maximum upload file size:</b> 2 MB.</p>
					      <p style="font-size:15px;color:#ff0000"><b>File type :</b>pdf, jpg, png  or jpeg.</p>
					    </dt>
					
					<dt>
				    
				     <input type="checkbox" name="items[]" style="display:none;"value="attachment/<?php echo $row['order_form']?>"  <?php echo (!empty($row['order_form'])) ? 'checked="checked"' : ''; ?>/>
                     <input type="checkbox" name="items[]" style="display:none;"value="attachment/<?php echo $row['quotation']?>" <?php echo (!empty($row['quotation'])) ? 'checked="checked"' : ''; ?> />
                     <input type="checkbox" name="items[]" style="display:none;"value="attachment/<?php echo $row['fcard']?>" <?php echo (!empty($row['fcard'])) ? 'checked="checked"' : ''; ?> /> 
                     <input type="checkbox" name="items[]" style="display:none;"value="attachment/<?php echo $row['bcard']?>" <?php echo (!empty($row['bcard'])) ? 'checked="checked"' : ''; ?>/> 
                     <input type="checkbox" name="items[]" style="display:none;"value="attachment/<?php echo $row['company_ssm']?>" <?php echo (!empty($row['company_ssm'])) ? 'checked="checked"' : ''; ?>/>
                     <input type="checkbox" name="items[]" style="display:none;"value="attachment/<?php echo $row['cheque']?>" <?php echo (!empty($row['cheque'])) ? 'checked="checked"' : ''; ?>/> 
                     <input type="checkbox" name="items[]" style="display:none;"value="attachment/<?php echo $row['cash']?>" <?php echo (!empty($row['cash'])) ? 'checked="checked"' : ''; ?>/>
                     <input type="checkbox" name="items[]" style="display:none;"value="attachment/<?php echo $row['payment_slip']?>" <?php echo (!empty($row['payment_slip'])) ? 'checked="checked"' : ''; ?>/>
			         
					   <?php
					     if(empty($row['order_form']) &&
						    empty($row['quotation']) &&
							empty($row['fcard']) &&
							empty($row['bcard']) &&
							empty($row['company_ssm']) &&
							empty($row['cheque']) &&
							empty($row['cash']) &&
							empty($row['payment_slip']) 
						   ){
						     echo" <input type='submit' style='display:none;' name='downloadall' value='Download all attachment'>";
						    }
						 else{
						     echo" <input type='submit'  class='img-download' formaction='download.php' name='downloadall' value='Download all'>";
						   }
					   ?>  
					     
				   </dt>
						
				
						
						
					
						
						
						
						<dt>Order Form:</dt>
						<dt>
						   <input type="file" id="fileChooser"name="Order" onchange="return ValidateFileUpload()"> 
						</dt>
						
						<dt>
						 <img class="order"id="myImg"src="attachment/<?php echo $row['order_form']?>" onError="this.style.display = 'none';"style="width:150px;">
						</dt>
						
						<dt>
						<?php
						  if($row['order_form'] !=''){
						     echo"<a   download='order_form.jpg' href='order/".$row['order_form']."' >download</a>";
							 
						  }
						?>
						</dt>
						
					    

						
						<!-- The Modal -->
                          <div id="myModal" class="modal">

                        <!-- The Close Button -->
                          <span class="close" onclick="document.getElementById('myModal').style.display='none'">&times;</span>

                        <!-- Modal Content (The Image) -->
                          <img class="modal-content" id="img01">

                        <!-- Modal Caption (Image Text) -->
                          <div id="caption"></div>
                          </div>
						  
						   <script>
                            // Get the modal
                            var modal = document.getElementById('myModal');

                           // Get the image and insert it inside the modal - use its "alt" text as a caption
                           var img = document.getElementById('myImg');
                           var modalImg = document.getElementById("img01");
                           var captionText = document.getElementById("caption");
                             img.onclick = function(){
                             modal.style.display = "block";
                             modalImg.src = this.src;
                             captionText.innerHTML = this.alt;
                            }

                          // Get the <span> element that closes the modal
                          var span = document.getElementsByClassName("close")[0];

                         // When the user clicks on <span> (x), close the modal
                          span.onclick = function() { 
                          modal.style.display = "none";
                         }
                        </script>
						
						<dt>Quotation:<?php echo $error; ?></dt>
						<dt>
						   <input type="file" id="fileChooser"name="quotation" onchange="return ValidateFileUpload()"> 
						</dt>
						<dt><img class="quotation"id="myImg1"src="attachment/<?php echo $row['quotation']?>" onError="this.style.display = 'none';"style="width:150px;"></dt>
						<dt>
                          <?php
						    $ext = pathinfo($row['quotation'], PATHINFO_EXTENSION);
						    if($ext == 'jpg'){
						     echo"<a   download='quotation.jpg' href='attachment/".$row['quotation']."' >download</a>";
						    }
							else if($ext == 'pdf'){
							  echo"<a class='pdf-color' href='attachment/".$row['quotation']."'>".$row['quotation']."</a>";
							 
							}
						 ?>                             
					    </dt>
						
						<!-- The Modal -->
                          <div id="myModal" class="modal">

                        <!-- The Close Button -->
                          <span class="close" onclick="document.getElementById('myModal').style.display='none'">&times;</span>

                        <!-- Modal Content (The Image) -->
                          <img class="modal-content" id="img01">

                        <!-- Modal Caption (Image Text) -->
                          <div id="caption"></div>
                          </div>
						  
						   <script>
                            // Get the modal
                            var modal = document.getElementById('myModal');

                           // Get the image and insert it inside the modal - use its "alt" text as a caption
                           var img = document.getElementById('myImg1');
                           var modalImg = document.getElementById("img01");
                           var captionText = document.getElementById("caption");
                             img.onclick = function(){
                             modal.style.display = "block";
                             modalImg.src = this.src;
                             captionText.innerHTML = this.alt;
                            }

                          // Get the <span> element that closes the modal
                          var span = document.getElementsByClassName("close")[0];

                         // When the user clicks on <span> (x), close the modal
                          span.onclick = function() { 
                          modal.style.display = "none";
                         }
                        </script>
						<dt>Front Name Card:</dt>
						<dt>
						   <input type="file" id="fileChooser"name="fcard" onchange="return ValidateFileUpload()"> 
						</dt>
						<dt><img class="fcard"id="myImg2"src="attachment/<?php echo $row['fcard']?>" onError="this.style.display = 'none';"style="width:150px;"></dt>
						<dt>
						  <?php
						     if($row['fcard'] !=''){
						       echo"<a   download='front_card.jpg' href='fcard/".$row['fcard']."' >download</a>";
						    }
						 ?>
 						</dt>
						
						<!-- The Modal -->
                          <div id="myModal" class="modal">

                        <!-- The Close Button -->
                          <span class="close" onclick="document.getElementById('myModal').style.display='none'">&times;</span>

                        <!-- Modal Content (The Image) -->
                          <img class="modal-content" id="img01">

                        <!-- Modal Caption (Image Text) -->
                          <div id="caption"></div>
                          </div>
						  
						   <script>
                            // Get the modal
                            var modal = document.getElementById('myModal');

                           // Get the image and insert it inside the modal - use its "alt" text as a caption
                           var img = document.getElementById('myImg2');
                           var modalImg = document.getElementById("img01");
                           var captionText = document.getElementById("caption");
                             img.onclick = function(){
                             modal.style.display = "block";
                             modalImg.src = this.src;
                             captionText.innerHTML = this.alt;
                            }

                          // Get the <span> element that closes the modal
                          var span = document.getElementsByClassName("close")[0];

                         // When the user clicks on <span> (x), close the modal
                          span.onclick = function() { 
                          modal.style.display = "none";
                         }
                        </script>
						
						<dt>Back Name Card:</dt>
						<dt>
						   <input type="file" id="fileChooser"name="bcard" onchange="return ValidateFileUpload()"> 
						</dt>
						<dt><img class="bcard"id="myImg3"src="attachment/<?php echo $row['bcard']?>" onError="this.style.display = 'none';"style="width:150px;"></dt>
						<dt>
						     <?php
						     if($row['bcard'] !=''){
						       echo"<a   download='back_card.jpg' href='bcard/".$row['bcard']."' >download</a>";
						    }
						 ?>
						</dt>
						
						<!-- The Modal -->
                          <div id="myModal" class="modal">

                        <!-- The Close Button -->
                          <span class="close" onclick="document.getElementById('myModal').style.display='none'">&times;</span>

                        <!-- Modal Content (The Image) -->
                          <img class="modal-content" id="img01">

                        <!-- Modal Caption (Image Text) -->
                          <div id="caption"></div>
                          </div>
						  
						   <script>
                            // Get the modal
                            var modal = document.getElementById('myModal');

                           // Get the image and insert it inside the modal - use its "alt" text as a caption
                           var img = document.getElementById('myImg3');
                           var modalImg = document.getElementById("img01");
                           var captionText = document.getElementById("caption");
                             img.onclick = function(){
                             modal.style.display = "block";
                             modalImg.src = this.src;
                             captionText.innerHTML = this.alt;
                            }

                          // Get the <span> element that closes the modal
                          var span = document.getElementsByClassName("close")[0];

                         // When the user clicks on <span> (x), close the modal
                          span.onclick = function() { 
                          modal.style.display = "none";
                         }
                        </script>
						
						<dt>Company SSM:</dt>
						<dt>
						   <input type="file" id="fileChooser"name="SSM" onchange="return ValidateFileUpload()"> 
						</dt>
						<dt><img class="ssm"id="myImg4"src="attachment/<?php echo $row['company_ssm']?>" onError="this.style.display = 'none';"style="width:150px;"></dt>
						<dt>
						        <?php
						     if($row['company_ssm'] !=''){
						       echo"<a   download='ssm.jpg' href='ssm/".$row['company_ssm']."' >download</a>";
						    }
						 ?>
 						</dt>
						
						<!-- The Modal -->
                          <div id="myModal" class="modal">

                        <!-- The Close Button -->
                          <span class="close" onclick="document.getElementById('myModal').style.display='none'">&times;</span>

                        <!-- Modal Content (The Image) -->
                          <img class="modal-content" id="img01">

                        <!-- Modal Caption (Image Text) -->
                          <div id="caption"></div>
                          </div>
						  
						   <script>
                            // Get the modal
                            var modal = document.getElementById('myModal');

                           // Get the image and insert it inside the modal - use its "alt" text as a caption
                           var img = document.getElementById('myImg4');
                           var modalImg = document.getElementById("img01");
                           var captionText = document.getElementById("caption");
                             img.onclick = function(){
                             modal.style.display = "block";
                             modalImg.src = this.src;
                             captionText.innerHTML = this.alt;
                            }

                          // Get the <span> element that closes the modal
                          var span = document.getElementsByClassName("close")[0];

                         // When the user clicks on <span> (x), close the modal
                          span.onclick = function() { 
                          modal.style.display = "none";
                         }
                        </script>
						<dt>Cheque:</dt>
						<dt>
						   <input type="file" id="fileChooser"name="cheque" onchange="return ValidateFileUpload()"> 
						</dt>
						<dt><img class="cheque"id="myImg5"src="attachment/<?php echo $row['cheque']?>" onError="this.style.display = 'none';"style="width:150px;"></dt>
						<dt>
						  <?php
						     if($row['cheque'] !=''){
						       echo"<a   download='cheque.jpg' href='cheque/".$row['cheque']."' >download</a>";
						    }
						 ?>
						</dt>
						
						<!-- The Modal -->
                          <div id="myModal" class="modal">

                        <!-- The Close Button -->
                          <span class="close" onclick="document.getElementById('myModal').style.display='none'">&times;</span>

                        <!-- Modal Content (The Image) -->
                          <img class="modal-content" id="img01">

                        <!-- Modal Caption (Image Text) -->
                          <div id="caption"></div>
                          </div>
						  
						   <script>
                            // Get the modal
                            var modal = document.getElementById('myModal');

                           // Get the image and insert it inside the modal - use its "alt" text as a caption
                           var img = document.getElementById('myImg5');
                           var modalImg = document.getElementById("img01");
                           var captionText = document.getElementById("caption");
                             img.onclick = function(){
                             modal.style.display = "block";
                             modalImg.src = this.src;
                             captionText.innerHTML = this.alt;
                            }

                          // Get the <span> element that closes the modal
                          var span = document.getElementsByClassName("close")[0];

                         // When the user clicks on <span> (x), close the modal
                          span.onclick = function() { 
                          modal.style.display = "none";
                         }
                        </script>
						<dt>Cash:</dt>
						<dt>
						   <input type="file" id="fileChooser"name="cash" onchange="return ValidateFileUpload()"> 
						</dt>
						<dt><img class="cash"id="myImg6"src="attachment/<?php echo $row['cash']?>" onError="this.style.display = 'none';"style="width:150px;"></dt>
						<dt>
						    <?php
						     if($row['cash'] !=''){
						       echo"<a   download='cash.jpg' href='cash/".$row['cash']."' >download</a>";
						    }
						 ?>
 						</dt>
						
						<!-- The Modal -->
                          <div id="myModal" class="modal">

                        <!-- The Close Button -->
                          <span class="close" onclick="document.getElementById('myModal').style.display='none'">&times;</span>

                        <!-- Modal Content (The Image) -->
                          <img class="modal-content" id="img01">

                        <!-- Modal Caption (Image Text) -->
                          <div id="caption"></div>
                          </div>
						  
						   <script>
                            // Get the modal
                            var modal = document.getElementById('myModal');

                           // Get the image and insert it inside the modal - use its "alt" text as a caption
                           var img = document.getElementById('myImg6');
                           var modalImg = document.getElementById("img01");
                           var captionText = document.getElementById("caption");
                             img.onclick = function(){
                             modal.style.display = "block";
                             modalImg.src = this.src;
                             captionText.innerHTML = this.alt;
                            }

                          // Get the <span> element that closes the modal
                          var span = document.getElementsByClassName("close")[0];

                         // When the user clicks on <span> (x), close the modal
                          span.onclick = function() { 
                          modal.style.display = "none";
                         }
                        </script>
						<dt>Payment Slip:</dt>
						<dt>
						   <input type="file" id="fileChooser"name="slip" onchange="return ValidateFileUpload()"> 
						</dt>
						<dt><img class="slip"id="myImg7" src="attachment/<?php echo $row['payment_slip']?>" onError="this.style.display = 'none';"style="width:150px;"></dt>
						<dt>
						      <?php
						     if($row['payment_slip'] !=''){
						       echo"<a   download='payment_slip.jpg' href='slip/".$row['payment_slip']."' >download</a>";
						    }
						 ?>
						</dt>
                         
						 <!-- The Modal -->
                          <div id="myModal" class="modal">

                        <!-- The Close Button -->
                          <span class="close" onclick="document.getElementById('myModal').style.display='none'">&times;</span>

                        <!-- Modal Content (The Image) -->
                          <img class="modal-content" id="img01">

                        <!-- Modal Caption (Image Text) -->
                          <div id="caption"></div>
                          </div>
						  
						   <script>
                            // Get the modal
                            var modal = document.getElementById('myModal');

                           // Get the image and insert it inside the modal - use its "alt" text as a caption
                           var img = document.getElementById('myImg7');
                           var modalImg = document.getElementById("img01");
                           var captionText = document.getElementById("caption");
                             img.onclick = function(){
                             modal.style.display = "block";
                             modalImg.src = this.src;
                             captionText.innerHTML = this.alt;
                            }

                          // Get the <span> element that closes the modal
                          var span = document.getElementsByClassName("close")[0];

                         // When the user clicks on <span> (x), close the modal
                          span.onclick = function() { 
                          modal.style.display = "none";
                         }
                        </script>
                         
						 
                    </dl>
					
					<details>
                       <summary id="summary_style" style="font-weight:bold">For website(click for more website details)</summary>
                          <input type="checkbox" name="billing" id="billing" onchange="duplicateValue();">use billing
                            
		             <dl>
                        <dt><label for="CompanyName">Company name:</label></dt>
                        <dt><input type="text" id="CompanyName"name="company_name"  size="54"  value="<?php echo $row['company_name_web']?>" ></dt>
                    </dl>
					
					<dl>
                        <dt><label for="CompanyReg">Company Registration No.:</label></dt>
                        <dt><input type="text" id="Company_Reg" name="companyreg"  size="54"  value="<?php echo $row['company_reg_no_web']?>" ></dt>
                    </dl>
					
					<dl>
                        <dt><label for="GSTNo">GST No.:</label></dt>
                        <dt><input type="text" id="GST_No"name="GSTno"  size="54"  value="<?php echo $row['gst_no_web']?>" ></dt>
                    </dl>
					
					 <dl>
                        <dt><label for="CompanyAddress">Company Address:</label></dt>
                        <dt><textarea name="CompanyAddress" id="companyaddress" rows="5" cols="36"  ><?php echo $row['company_address_web']?></textarea></dt>
					</dl>
					
					<dl>
                        <dt><label for="CompanyBusiness">Company Business.:</label></dt>
                        <dt><input type="text" name="CompanyBusiness"  size="54"  value="<?php echo $row['company_business_web']?>" ></dt>
                    </dl>
					
					 <dl>
                        <dt><label for="OfficePhone">Office Telephone:</label></dt>
                        <dt><input type="tel" id="OfficePhone"  name="OfficePhone"   value="<?php echo $row['office_phone_web']?>" ></dt>
                    </dl>
					
					
					<dl>
                        <dt><label for="OfficeFax">Office Fax:</label></dt>
                        <dt><input type="tel" id="OfficeFax" name="Office_Fax"   value="<?php echo $row['office_fax_web']?>" ></dt>
                    </dl>
					
					<dl>
                        <dt><label for="email_website">Email (WEBSITE):</label></dt>
                        <dt><input type="email" name="email_website"  id="email_website" value="<?php echo $row['email_website']?>" ></dt>
                    </dl>
					
						
					<dl>
                        <dt><label for="DomainType">Domain Type:</label></dt>
                        <dt>
						 <select name="DomainType">
						     <option value="<?php echo $row['Domain_Type']?>">Existing type:<?php echo $row['Domain_Type']?></option>
						     <option value="Register now">Register now</option>
							 <option value="Register when online">Register when online</option>
							 <option value="Transfer">Transfer</option>
							 <option value="Need Confirm">Need Confirm</option>
							 
						   </select>
						
						</dt>
						
                    </dl>
					
					<dl>
                        <dt><label for="DomainName">Domain Name:</label></dt>
                        <dt><input type="text" name="DomainName"  size="54"  value="<?php echo $row['Domain_name']?>" ></dt>
					</dl>
					
					
					
					 <dl>
                        <dt><label for="CustomerDescription">Customer description:</label></dt>
                        <dt><textarea name="CustomerDescription" id="CustomerDescription" rows="5" cols="36"  ><?php echo $row['customer_desc']?></textarea></dt>
					</dl>
					
					 <dl>
                        <dt><label for="Reason">Reason to Redo Website:</label></dt>
                        <dt><textarea name="Reason" id="Reason" rows="5" cols="36" placeholder="Reason" ><?php echo $row['reason']?></textarea></dt>
					</dl>
					
				
					
					
                         
                   </details>
				   
				   
					
					<dl>
                        <dt><label for="Remark">Remark:</label></dt>
                        <dt><textarea name="remark" cols="30" rows="10" id="Remark" ><?php echo $row['remark']; ?></textarea></dt>
						
                    </dl>
					
					
					
					<dl>
                       <dt><input type="submit" id="sub-btn-style" name="update" value="Update" ></dt>
				    </dl>
                     
                </fieldset>
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

<?php
     if(isset($_POST["update"])){
	     $submit_date=$_POST['submit_date'];
	     $contract_no=$_POST['contract_no'];
		 $Company_Name=$_POST['Company_Name'];
		 $CompanyReg=$_POST['CompanyReg'];
		 $GSTNo=$_POST['GSTNo'];
		 $Company_Address=$_POST['Company_Address'];
		 $Office_Phone=$_POST['Office_Phone'];
		 $Office_Fax=$_POST['OfficeFax'];
		 $package=$_POST['package'];
		 $Advfee=$_POST['Advfee'];
		 $Total=$_POST['Total'];
		 $Payment=$_POST['payment'];
		 $amount=$_POST['amount'];
		 $payment_date=$_POST['payment_date'];
		 $customer=$_POST['customer'];
		 $customer_design=$_POST['customer_design'];
		 $customerPhone=$_POST['customerPhone'];
		 $email_master=$_POST['email_master'];
		 $email_billing=$_POST['email_billing'];
		 $Remark=$_POST['remark'];
		
		 //for website
		 $company_name=$_POST['company_name'];
		 $companyreg=$_POST['companyreg'];
		 $GSTno=$_POST['GSTno'];
		 $companyaddress=$_POST['CompanyAddress'];
		 $CompanyBusiness=$_POST['CompanyBusiness'];
		 $OfficePhone=$_POST['OfficePhone'];
		 $OfficeFax=$_POST['Office_Fax'];
		 $email_website=$_POST['email_website'];
		 $DomainType=$_POST['DomainType'];
		 $DomainName=$_POST['DomainName'];
		 $CustomerDescription=$_POST['CustomerDescription'];
		 $Reason=$_POST['Reason'];
		 $NoEmailAccount=$_POST['NoEmailAccount'];
         //gst		
		 $BeforeGST=$Total/1.06;
		 $Gst=$Total-$BeforeGST;
		 $PaymentBeforeGST=$amount/1.06;
		 $PaymentGst=$amount-$PaymentBeforeGST;
		 
		 //salesperson details
		 $name=$login_session;
		 $sales_email=$_SESSION['user_email'];
		 $branch_name =$_SESSION['branch_name'];
		 //
		
		 
		 
	
          $result=mysqli_query($db,"update job set date_submission='$submit_date',contract_no='$contract_no',company_name='$Company_Name',company_reg_no='$CompanyReg',gst_no='$GSTNo',
				       company_address='$Company_Address',office_telephone='$Office_Phone',office_fax='$Office_Fax',package='$package',annual_adv_fee='$Advfee',
				       total_package_amount='$Total',payment='$Payment',payment_amount='$amount',P_amount_GST='$PaymentGst',P_amount_b_GST='$PaymentBeforeGST',payment_date='$payment_date',customer_name='$customer',CustomerDesignation='$customer_design',customer_hp='$customerPhone',email_master='$email_master',email_billing='$email_billing',
					   remark='$Remark',company_name_web='$company_name',company_reg_no_web='$companyreg',gst_no_web='$GSTno',company_address_web='$companyaddress',company_business_web='$CompanyBusiness',office_phone_web='$OfficePhone',
		               office_fax_web='$OfficeFax',email_website='$email_website',Domain_Type='$DomainType',Domain_name='$DomainName',customer_desc='$CustomerDescription',reason='$Reason',no_of_email_account='$NoEmailAccount',gst='$Gst',beforeGST='$BeforeGST',
				       sales_name='$name',branch_name='$branch_name',sales_email='$sales_email' where job_id=$jid ");
	  
            
			
			//echo "<meta http-equiv='refresh' content='0'>";

			if($result == true){
		      echo"<script type='text/javascript'>location.href = 'update_details.php?Total=$Total&cno=$contract_no&cname=$Company_Name&crn=$CompanyReg&gst=$GSTNo&ca=$Company_Address&ot=$Office_Phone&of=$Office_Fax&package=$package&aaf=$Advfee&tpa=$Total&payment=$Payment&pa=$amount&pd=$payment_date&custname=$customer&custdesign=$customer_design&custphone=$customerPhone&em=$email_master&eb=$email_billing&remark=$Remark&cnw=$company_name&crnw=$companyreg&gstw=$GSTno&caw=$CompanyAddress&cb=$CompanyBusiness&opw=$OfficePhone&ofw=$OfficeFax&ew=$email_website&dt=$DomainType&dn=$DomainName&cd=$CustomerDescription&reason=$Reason&noe=$NoEmailAccount';</script>";
			
			}
             
			 //update quotation image
			 if($_FILES["quotation"]["name"] != ""){
	          $allowedExts = array("pdf","jpeg","JPEG", "jpg","JPG", "png","PNG");
              $temp = explode(".", $_FILES["quotation"]["name"]);
              $extension = end($temp);

              if (( ( $_FILES["quotation"]["type"] == "application/pdf") || ( $_FILES["quotation"]["type"] == "image/jpeg")|| ($_FILES["quotation"]["type"] == "image/jpg")|| ($_FILES["quotation"]["type"] == "image/pjpeg")|| ($_FILES["quotation"]["type"] == "image/x-png")|| ($_FILES["quotation"]["type"] == "image/png"))&& ($_FILES["quotation"]["size"] < 2000000)&& in_array($extension, $allowedExts)) 
	          {
                if ($_FILES["quotation"]["error"] > 0) {
                 echo "Error: " . $_FILES["quotation"]["error"] . "<br>";
                } else {}
	             
				 
				 
					//replace new name of the file
					$temp = explode(".", $_FILES["quotation"]["name"]);
                    $Finalquotation = round(microtime(true)) . '.' . end($temp);
					$target2=PR_UPLOADPATH . $Finalquotation;
                    move_uploaded_file($_FILES['quotation']['tmp_name'],$target2);

                  mysqli_query($db,"update job set quotation='$Finalquotation' where job_id=$jid"); 
                  				  
	         } else {
                 echo '<script language="javascript">';   
                 echo 'alert("invalid format of image")';
                 echo '</script>';
			   
              }
	        }
			//update quotation image
			
			 //update Order image
			 if($_FILES["Order"]["name"] != ""){
	          $allowedExts = array("jpeg","JPEG", "jpg","JPG", "png","PNG");
              $temp = explode(".", $_FILES["Order"]["name"]);
              $extension = end($temp);

              if (( ($_FILES["Order"]["type"] == "image/jpeg")|| ($_FILES["Order"]["type"] == "image/jpg")|| ($_FILES["Order"]["type"] == "image/pjpeg")|| ($_FILES["Order"]["type"] == "image/x-png")|| ($_FILES["Order"]["type"] == "image/png"))&& ($_FILES["Order"]["size"] < 2000000)&& in_array($extension, $allowedExts)) 
	          {
                if ($_FILES["Order"]["error"] > 0) {
                 echo "Error: " . $_FILES["Order"]["error"] . "<br>";
                } else {}
	              //replace filename with filename_1 if the same name exists
				  $OriginalOrder  = $FinalOrder = preg_replace('`[^a-z0-9-_.]`i','',$_FILES['Order']['name']);
                  $FileCounter = 1;
				  while (file_exists( 'attachment/'.$FinalOrder )) 
                    $FinalOrder = $FileCounter++.'_'.$OriginalOrder; 
					$target=PR_UPLOADPATH . $FinalOrder;
                    move_uploaded_file($_FILES['Order']['tmp_name'],$target);

                  mysqli_query($db,"update job set order_form='$FinalOrder' where job_id=$jid");  
	         } else {
               echo '<script language="javascript">';   
               echo 'alert("invalid format of image")';
               echo '</script>';
              }
	        }
			//update Order image
			
			//update front card image
			 if($_FILES["fcard"]["name"] != ""){
	          $allowedExts = array("jpeg","JPEG", "jpg","JPG", "png","PNG");
              $temp = explode(".", $_FILES["fcard"]["name"]);
              $extension = end($temp);
			  
			

              if (( ($_FILES["fcard"]["type"] == "image/jpeg")|| ($_FILES["fcard"]["type"] == "image/jpg")|| ($_FILES["fcard"]["type"] == "image/pjpeg")|| ($_FILES["fcard"]["type"] == "image/x-png")|| ($_FILES["fcard"]["type"] == "image/png"))&& ($_FILES["fcard"]["size"] < 4000000)&& in_array($extension, $allowedExts)) 
	          {
                if ($_FILES["fcard"]["error"] > 0) {
                 echo "Error: " . $_FILES["fcard"]["error"] . "<br>";
                } else {}
	              
				  
				  //replace filename with filename_1 if the same name exists
				  $Originalfcard  = $Finalfcard = preg_replace('`[^a-z0-9-_.]`i','',$_FILES['fcard']['name']);
                  $FileCounter = 1;
				  while (file_exists( 'attachment/'.$Finalfcard )) 
                    $Finalfcard = $FileCounter++.'_'.$Originalfcard; 
					$target3=PR_UPLOADPATH . $Finalfcard;
                    move_uploaded_file($_FILES['fcard']['tmp_name'],$target3);

                  mysqli_query($db,"update job set fcard='$Finalfcard' where job_id=$jid");  
	         } else {
               echo '<script language="javascript">';   
               echo 'alert("invalid format of image")';
               echo '</script>';
			  
              }
	        }
			//update front card image
			
			//update back card image
			 if($_FILES["bcard"]["name"] != ""){
	          $allowedExts = array("jpeg","JPEG", "jpg","JPG", "png","PNG");
              $temp = explode(".", $_FILES["bcard"]["name"]);
              $extension = end($temp);

              if (( ($_FILES["bcard"]["type"] == "image/jpeg")|| ($_FILES["bcard"]["type"] == "image/jpg")|| ($_FILES["bcard"]["type"] == "image/pjpeg")|| ($_FILES["bcard"]["type"] == "image/x-png")|| ($_FILES["bcard"]["type"] == "image/png"))&& ($_FILES["bcard"]["size"] < 2000000)&& in_array($extension, $allowedExts)) 
	          {
                if ($_FILES["bcard"]["error"] > 0) {
                 echo "Error: " . $_FILES["bcard"]["error"] . "<br>";
                } else {}
	              
				  
				  //replace filename with filename_1 if the same name exists
				  $Originalbcard  = $Finalbcard = preg_replace('`[^a-z0-9-_.]`i','',$_FILES['bcard']['name']);
                  $FileCounter = 1;
				  while (file_exists( 'attachment/'.$Finalbcard )) 
                    $Finalbcard = $FileCounter++.'_'.$Originalbcard; 
					$target4=PR_UPLOADPATH . $Finalbcard;
                    move_uploaded_file($_FILES['bcard']['tmp_name'],$target4);

                  mysqli_query($db,"update job set bcard='$Finalbcard' where job_id=$jid");  
	         } else {
             echo '<script language="javascript">';   
             echo 'alert("invalid format of image")';
             echo '</script>';
              }
	        }
			//update back card image
			
			//update ssm image
			 if($_FILES["SSM"]["name"] != ""){
	          $allowedExts = array("jpeg","JPEG", "jpg","JPG", "png","PNG");
              $temp = explode(".", $_FILES["SSM"]["name"]);
              $extension = end($temp);

              if (( ($_FILES["SSM"]["type"] == "image/jpeg")|| ($_FILES["SSM"]["type"] == "image/jpg")|| ($_FILES["SSM"]["type"] == "image/pjpeg")|| ($_FILES["SSM"]["type"] == "image/x-png")|| ($_FILES["SSM"]["type"] == "image/png"))&& ($_FILES["SSM"]["size"] < 2000000)&& in_array($extension, $allowedExts)) 
	          {
                if ($_FILES["SSM"]["error"] > 0) {
                 echo "Error: " . $_FILES["SSM"]["error"] . "<br>";
                } else {}
	              
				  
				  //replace filename with filename_1 if the same name exists
				  $OriginalSSM  = $FinalSSM = preg_replace('`[^a-z0-9-_.]`i','',$_FILES['SSM']['name']);
                  $FileCounter = 1;
				  while (file_exists( 'attachment/'.$FinalSSM )) 
                    $FinalSSM = $FileCounter++.'_'.$OriginalSSM; 
					$target5=PR_UPLOADPATH . $FinalSSM;
                    move_uploaded_file($_FILES['SSM']['tmp_name'],$target5);

                  mysqli_query($db,"update job set company_ssm='$FinalSSM' where job_id=$jid");  
	         } else {
             echo '<script language="javascript">';   
             echo 'alert("invalid format of image")';
             echo '</script>';
              }
	        }
			//update ssm image
			
			//update cheque image
			 if($_FILES["cheque"]["name"] != ""){
	          $allowedExts = array("jpeg","JPEG", "jpg","JPG", "png","PNG");
              $temp = explode(".", $_FILES["cheque"]["name"]);
              $extension = end($temp);

              if (( ($_FILES["cheque"]["type"] == "image/jpeg")|| ($_FILES["cheque"]["type"] == "image/jpg")|| ($_FILES["cheque"]["type"] == "image/pjpeg")|| ($_FILES["cheque"]["type"] == "image/x-png")|| ($_FILES["cheque"]["type"] == "image/png"))&& ($_FILES["cheque"]["size"] < 2000000)&& in_array($extension, $allowedExts)) 
	          {
                if ($_FILES["cheque"]["error"] > 0) {
                 echo "Error: " . $_FILES["cheque"]["error"] . "<br>";
                } else {}
	              
				  
				  //replace filename with filename_1 if the same name exists
				  $Originalcheque  = $Finalcheque = preg_replace('`[^a-z0-9-_.]`i','',$_FILES['cheque']['name']);
                  $FileCounter = 1;
				  while (file_exists( 'attachment/'.$Finalcheque )) 
                    $Finalcheque = $FileCounter++.'_'.$Originalcheque; 
					$target6=PR_UPLOADPATH . $Finalcheque;
                    move_uploaded_file($_FILES['cheque']['tmp_name'],$target6);

                  mysqli_query($db,"update job set cheque='$Finalcheque' where job_id=$jid");  
	         } else {
             echo '<script language="javascript">';   
             echo 'alert("invalid format of image")';
             echo '</script>';
              }
	        }
			//update cheque image
			
			//update cash image
			 if($_FILES["cash"]["name"] != ""){
	          $allowedExts = array("jpeg","JPEG", "jpg","JPG", "png","PNG");
              $temp = explode(".", $_FILES["cash"]["name"]);
              $extension = end($temp);

              if (( ($_FILES["cash"]["type"] == "image/jpeg")|| ($_FILES["cash"]["type"] == "image/jpg")|| ($_FILES["cash"]["type"] == "image/pjpeg")|| ($_FILES["cash"]["type"] == "image/x-png")|| ($_FILES["cash"]["type"] == "image/png"))&& ($_FILES["cash"]["size"] < 2000000)&& in_array($extension, $allowedExts)) 
	          {
                if ($_FILES["cash"]["error"] > 0) {
                 echo "Error: " . $_FILES["cash"]["error"] . "<br>";
                } else {}
	              
				  
				  //replace filename with filename_1 if the same name exists
				  $Originalcash  = $Finalcash = preg_replace('`[^a-z0-9-_.]`i','',$_FILES['cash']['name']);
                  $FileCounter = 1;
				  while (file_exists( 'attachment/'.$Finalcash )) 
                    $Finalcash = $FileCounter++.'_'.$Originalcash; 
					$target7=PR_UPLOADPATH . $Finalcash;
                    move_uploaded_file($_FILES['cash']['tmp_name'],$target7);

                  mysqli_query($db,"update job set cash='$Finalcash' where job_id=$jid");  
	         } else {
             echo '<script language="javascript">';   
             echo 'alert("invalid format of image")';
             echo '</script>';
              }
	        }
			//update cash image
			
			//update slip image
			 if($_FILES["slip"]["name"] != ""){
	          $allowedExts = array("jpeg","JPEG", "jpg","JPG", "png","PNG");
              $temp = explode(".", $_FILES["slip"]["name"]);
              $extension = end($temp);

              if (( ($_FILES["slip"]["type"] == "image/jpeg")|| ($_FILES["slip"]["type"] == "image/jpg")|| ($_FILES["slip"]["type"] == "image/pjpeg")|| ($_FILES["slip"]["type"] == "image/x-png")|| ($_FILES["slip"]["type"] == "image/png"))&& ($_FILES["slip"]["size"] < 2000000)&& in_array($extension, $allowedExts)) 
	          {
                if ($_FILES["slip"]["error"] > 0) {
                 echo "Error: " . $_FILES["slip"]["error"] . "<br>";
                } else {}
	              
				   
				   //replace filename with filename_1 if the same name exists
				  $Originalslip  = $Finalslip = preg_replace('`[^a-z0-9-_.]`i','',$_FILES['slip']['name']);
                  $FileCounter = 1;
				  while (file_exists( 'attachment/'.$Finalslip )) 
                    $Finalslip = $FileCounter++.'_'.$Originalslip; 
					$target8=PR_UPLOADPATH . $Finalslip;
                    move_uploaded_file($_FILES['slip']['tmp_name'],$target8);

                  mysqli_query($db,"update job set payment_slip='$Finalslip' where job_id=$jid");  
	         } else {
             echo '<script language="javascript">';   
             echo 'alert("invalid format of image")';
             echo '</script>';
              }
	        }
			//update slip image
			
		 $to = "jun@n.my";
		 $headers = "From: livrariahealth@gmail.com" . "\r\n";
		 $headers .= "CC: $sales_email\r\n";
         $headers .= "MIME-Version: 1.0\r\n";
         $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
		 if($amount == ''){
		    $subject = "[$branch_name]New Sales - ". $_POST['Company_Name']. "[edited] ";  
		  }
		  else{
		    $subject = "[$branch_name]New Sales and Payment - ". $_POST['Company_Name']. "[edited] ";    
		  }
		 
		 $message = '<html><body>';
		 $message .="<h1>For Billing</h1>";
		 $message .="<b>Contract no.:</b> ".$_POST['contract_no']."<br> ";
		 $message .="<b>Company Name.:</b> ".$_POST['Company_Name']."<br> ";
		 $message .="<b>Reg no.  :</b> ".$_POST['CompanyReg']." <br>";
		 $message .="<b>GST no. :</b> ".$_POST['GSTNo']." <br>";
		 $message .="<b>Address (Billing) :</b> ".$_POST['Company_Address']."<br> ";
		 $message .="<b>Tel :</b> ".$_POST['Office_Phone']."<br> ";
		 $message .="<b>Fax:</b> ".$_POST['Office_Fax']."<br> ";
		 $message .="<b>Email(Billing) :</b> ".$_POST['email_billing']."<br> ";
		 $message .="<b>Master Email for Password Verification :</b> ".$_POST['email_master']."<br> ";
		 
		 $message .="<h1>For Website</h1>";
		 $message .="<b>Company Name.:</b> ".$_POST['company_name']."<br> ";
		 $message .="<b>Reg no.  :</b> ".$_POST['companyreg']."<br> ";
		 $message .="<b>GST no. :</b> ".$_POST['GSTno']."<br> ";
		 $message .="<b>Address (Website) :</b> ".$_POST['CompanyAddress']."<br> ";
		 $message .="<b>Tel :</b> ".$_POST['OfficePhone']."<br> ";
		 $message .="<b>Fax:</b> ".$_POST['Office_Fax']."<br> ";
		 $message .="<b>Email(Website):</b> ".$_POST['email_website']."<br> ";
		 $message .="<b>Domain Type :</b> ".$_POST['DomainType']."<br> ";
		 $message .="<b>Domain Name :</b> ".$_POST['DomainName']."<br> ";
		 $message .="<b>How Many Email Account :</b> ".$_POST['NoEmailAccount']."<br> ";
		 $message .="<b>Company Business :</b> ".$_POST['CompanyBusiness']."<br> ";
		 $message .="<b>Package :</b> ".$_POST['package']."<br> ";
		 $message .="<b>Total Package amount :</b> ".$_POST['Total']."<br> ";
		 $message .="<b>Payment :</b> ".$_POST['amount']."<br> ";
		 $message .="<b>Reason to redo website :</b> ".$_POST['Reason']."<br> ";
		 
		 $message .="<h1>Customer Details</h1>";
		 $message .="<b>Contact person.:</b> ".$_POST['customer']."<br> ";
		 $message .="<b>Customer Description(Age, Attitude, PC Knowledge, Intro by?)  :</b> ".$_POST['CustomerDescription']."<br> ";
		 $message .="<b>Customer Phone :</b> ".$_POST['customerPhone']."<br> ";
		 $message .="<b>Designation :</b> ".$_POST['customer_design']."<br> ";
		 
		 $message .="<h1>Attachment</h1>";
		  if($row['order_form'] != ''){
		    $order=$row['order_form'];
		    $message .= "<b>Order form:</b> http://www.newpages.net/wenkai/attachment/$order <br>";
		  }
          else if(is_uploaded_file($FinalFilename)){
		     $message .= "<b>Order form:</b> http://www.newpages.net/wenkai/attachment/$FinalFilename <br>";
		  }
		  else{
		     $message .= "<b>Order form:</b> not uploading file <br>";
		  }
		  if($row['quotation'] != ''){
		    $quotation=$row['quotation'];
		    $message .= "<b>Quotation:</b> http://www.newpages.net/wenkai/attachment/$quotation <br>"; 
		  }
		  else if(is_uploaded_file($Finalquotation)){
		    $message .= "<b>Quotation:</b> http://www.newpages.net/wenkai/attachment/$Finalquotation <br>";
		  }
		  else{
		    $message .= "<b>Quotation:</b> not uploading file <br>";
		  }
		  if($row['fcard'] != ''){
		    $fcard=$row['fcard'];
		    $message .= "<b>Name Card(Front):</b> http://www.newpages.net/wenkai/attachment/$fcard <br>"; 
		  }
		  else if(is_uploaded_file($Finalfcard)){
		    $message .= "<b>Name Card(Front):</b> http://www.newpages.net/wenkai/attachment/$Finalfcard <br>";
		  }
		  else{
		     $message .= "<b>Name Card(Front):</b> not uploading file <br>";
		  }
		  if($row['bcard'] != ''){
		     $bcard=$row['bcard'];
		    $message .= "<b>Name Card(Back):</b> http://www.newpages.net/wenkai/attachment/$bcard <br>";
		  }
		  else if(is_uploaded_file($Finalbcard)){
		    $message .= "<b>Name Card(Back):</b> http://www.newpages.net/wenkai/attachment/$Finalbcard <br>";
		  }
		  else{
		    $message .= "<b>Name Card(Back):</b> not uploading file <br>";
		  }
		  if($row['company_ssm'] != ''){
		     $company_ssm=$row['company_ssm'];
		    $message .= "<b>Company SSM:</b> http://www.newpages.net/wenkai/attachment/$company_ssm <br>";
		  }
		  else if(is_uploaded_file($FinalSSM)){
		    $message .= "<b>Company SSM:</b> http://www.newpages.net/wenkai/attachment/$FinalSSM <br>";
		  }
		  else{
		    $message .= "<b>Company SSM:</b> not uploading file <br>";
		  }
		  if($row['cheque'] != ''){
		     $cheque=$row['cheque'];
		    $message .= "<b>Company SSM:</b> http://www.newpages.net/wenkai/attachment/$cheque <br>";
		  }
		  else if(is_uploaded_file($Finalcheque)){
		   $message .= "<b>Cheque:</b> http://www.newpages.net/wenkai/attachment/$Finalcheque <br>";
		  }
		  else{
		    $message .= "<b>Cheque:</b> not uploading file <br>";
		  }
		  if($row['cash'] != ''){
		     $cash=$row['cash'];
		    $message .= "<b>Company SSM:</b> http://www.newpages.net/wenkai/attachment/$cash <br>";
		  }
		  else if(is_uploaded_file($Finalcash)){
		   $message .= "<b>Cash:</b> http://www.newpages.net/wenkai/attachment/$Finalcash <br>";
		  }
		  else{
		     $message .= "<b>Cash:</b> not uploading file <br>";
		  }
		  if($row['payment_slip'] != ''){
		     $payment_slip=$row['payment_slip'];
		    $message .= "<b>Company SSM:</b> http://www.newpages.net/wenkai/attachment/$payment_slip <br>";
		  }
		  if(is_uploaded_file($Finalslip)){
		    $message .= "<b>Payment Slip:</b> http://www.newpages.net/wenkai/attachment/$Finalslip <br>";
		  }
		  else{
		     $message .= "<b>Payment Slip:</b> not uploading file <br>";
		  }
		 $message .="</html></body>";
		  
      


         mail($to,$subject,$message,$headers);
			
			
	  }
?>





