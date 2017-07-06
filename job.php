<?php
   include('session.php');
   
   //path of image file
  define('PR_UPLOADPATH','order/');
  define('PR_UPLOADPATH2','quotation/');
  define('PR_UPLOADPATH3','fcard/');
  define('PR_UPLOADPATH4','bcard/');
  define('PR_UPLOADPATH5','ssm/');
  define('PR_UPLOADPATH6','cheque/');
  define('PR_UPLOADPATH7','cash/');
  define('PR_UPLOADPATH8','slip/');
  
  
  
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>New Job</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<!-- For ie7,8,9 compatibility -->
<!--<meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7" />-->
<!-- For ie7,8,9 compatibility -->
<meta http-equiv="X-UA-Compatible" content="IE=Edge" />
<link rel="stylesheet" href="css/bootstrap.min.css" />
<link rel="stylesheet" href="css/bootstrap-responsive.min.css" />
<link rel="stylesheet" href="css/uniform.css" />
<link rel="stylesheet" href="css/select2.css" />
<link rel="stylesheet" href="css/matrix-style.css" />
<link rel="stylesheet" href="css/matrix-media.css" />
<link href="font-awesome/css/font-awesome.css" rel="stylesheet" />
<link rel="stylesheet" href="css/style.css" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>



<script type="text/javascript" src="js/jquery.js"></script>
<script>
   window.onbeforeunload = function() {
        return "Dude, are you sure you want to leave? Think of the kittens!";
    }



</script>

  
<script>
  
     function checkSubmit(){
	     if (document.getElementById('remember_me').checked == false) {
		  alert ("You didn't agree to the terms");
          return false;
         }
		 else if(document.getElementById('Total').value < document.getElementById('amount').value){
		  alert ("Payment amount is larger than total package amount!"); 
		  document.getElementById('amount').focus()
		  return false;
		 }
		 
	    else{
	     return true;
	   }  
	 
	 }
</script>
  
  <script>
      function copyValue(){
          var cb1 = document.getElementById('e_master');
          var email_master=document.getElementById('email_master');
		  var email_billing=document.getElementById('email_billing'); 
	
		  
		   if (cb1.checked){
		     email_billing.value=email_master.value;

		   }
           else{
		     email_billing.value = '';

		   }		   
   
	  
        }
     
  </script>
  <script>
     function duplicateValue(){
	    var cb = document.getElementById('billing');
	    var c_name = document.getElementById('Company_Name');
		var c_name2 = document.getElementById('CompanyName');
		var c_reg = document.getElementById('Company_Reg');
		var c_reg2 = document.getElementById('CompanyReg');
		var gst = document.getElementById('GSTNo');
		var gst2 = document.getElementById('GST_No');
		var c_address = document.getElementById('Company_Address');
		var c_address2 = document.getElementById('CompanyAddress');
		var office_phone = document.getElementById('Office_Phone');
		var office_phone2 = document.getElementById('OfficePhone');
		var office_fax = document.getElementById('OfficeFax');
		var office_fax2 = document.getElementById('Office_Fax');
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

<style>
  
	  input[type=tel],
	  input[type=text],
      input[type=email],
	  input[type=number],
      select {
       width: 100%;
       height: 30px;
        
       	   
     }
	 
	
	 
	 input[type=checkbox] {
       zoom: 1.5;
     }
	 
	 
	 textarea{
	    border-radius: 10px;	
	 }
	 
	 
	 #CustomerDescription,#Remark,#CompanyAddress,#Company_Address,#Reason{
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
</style>

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
   
    
     <li class="active"><a href="job.php"><i class="icon icon-th-list"></i> <span>Add Job</span></a></li>
	<li ><a href="job_history.php"><i class="icon icon-th"></i> <span>Job history</span></a></li>
    <li ><a href="payment_update.php"><i class="icon icon-th"></i> <span>Payment history</span></a></li>
    
    

  </ul>
</div>
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Add Job</a> </div>
    <h1>Add Job</h1>
  </div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
        
       
       
   
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th-list"></i></span>
            <h5>Add Job</h5>
          </div>
          <div class="widget-content nopaddings">
		    
               <form action="thanks_you.php" id="submit_jobs" method="post" enctype="multipart/form-data" onsubmit="return checkSubmit()" autocomplete="off">
               
                <fieldset>
				   
				     <h1>For Billing</h1>
					<!--<dl>
                        <dt><label for="DisplayDate">Submit date</label></dt>
                        <dt><input id="display_date" type="text"  name="display_date" disabled  ></dt>
                    </dl>-->
				  
                    <dl>
					    
                        <dt><input type="date"  style="display:none;"id="submit_date" name="submit_date" onchange="date();" value="<?php echo date('Y-m-d');?>" ></dt>
                    </dl>
					
					<dl>
                        <dt><label for="ContractNo">Contract No.</label></dt>
                        <dt><input type="text"  name="contract_no" id="ContractNo" placeholder="Contract No." value="" onkeyup="saveValue(this);" autocorrect="off"></dt>
                    </dl>
					
					 <dl>
                        <dt><label for="CompanyName">Company Name:<font color="red">*</font></label></dt>
                        <dt><input autocorrect="off" type="text" id="Company_Name" name="Company_Name"  size="54"  onkeyup="saveValue(this);"placeholder="Company Name" required/></dt>
                    

					</dl>
					
					<dl>
                        <dt><label for="CompanyReg">Company Registration No.:</label></dt>
                        <dt><input type="text" id="Company_Reg"name="CompanyReg"  size="54"  placeholder="Company Registration Number" autocorrect="off"></dt>
                    </dl>
					
					<dl>
                        <dt><label for="GSTNo">GST No.:</label></dt>
                        <dt><input type="text" id="GSTNo"name="GSTNo"  size="54"  placeholder="GST Number" autocorrect="off"></dt>
                    </dl>
					
					 <dl>
                        <dt><label for="CompanyAddress">Address:<font color="red">*</font></label></dt>
                        <dt><textarea id="Company_Address" name="Company_Address" rows="5" cols="36" placeholder="Company Address" autocorrect="off" required/></textarea></dt>
					</dl>
					
					 <dl>
                        <dt><label for="OfficePhone">Office Telephone:</label></dt>
                        <dt><input type="tel" id="Office_Phone"  name="Office_Phone"   placeholder="03-12345678" ></dt>
                    </dl>
					
					
					<dl>
                        <dt><label for="OfficeFax">Office Fax:</label></dt>
                        <dt><input type="tel" id="OfficeFax" name="Office_Fax"   placeholder="03-12345678" ></dt>
                    </dl>
					
					
					
					
					
					<dl>
                        <dt><label for="Package">ONESYCN Package:<font color="red">*</font></label></dt>
                        <dt>
						   <select name="package" required>
						     <option disabled selected value> -- select an option -- </option>
						     <option value="OneSync Standard 1 years">OneSync Standard 1 years</option>
							 <option value="OneSync Standard 2 years">OneSync Standard 2 years</option>
							 <option value="OneSync Advanced 2 years">OneSync Advanced 2 years</option>
							 <option value="OneSync Pro 2 years">OneSync Pro 2 years</option>
							 <option value="OneSync  X Edition 1 years">OneSync  X Edition 1 years</option>
							 <option value=" OneSync X Edition Lite 1 Year">OneSync X Edition Lite 1 Year</option>
						   </select>
						</dt>
                    </dl>
					
					<dl>
                        <dt><label for="Advfee">Annual Advertising Fee[ Include 6% GST ]:<font color="red">*</font></label></dt>
                        <dt>RM<input type="number" step="any"name="Advfee" required></dt>
                    </dl>
					
					<dl>
                        <dt><label for="NoEmailAccount">How many Email Account:<font color="red">*</font></label></dt>
                        <dt><input type="number"  id="NoEmailAccount" name="NoEmailAccount" required ></dt>
                    </dl>
					
					
					
					<dl>
                        <dt><label for="Item">Additional Item:</label></dt>
                        <dt><input type="checkbox"  name="items[]" value="Basic Add to cart">Basic Add to cart</dt>
						<dt><input type="checkbox"  name="items[]" value="Chinese Version">Chinese Version</dt>
						<dt><input type="checkbox"  name="items[]" value="Malay Version">Malay Version</dt>
						<dt><input type="checkbox"  name="items[]" value="Multiple Quotation">Multiple Quotation</dt>
						<dt><input type="checkbox"  name="items[]" value="Extra Email Account">Extra Email Account</dt>
						<dt><input type="checkbox"  name="items[]" value="Extra Domain Name">Extra Domain Name</dt>
						<dt><input type="checkbox"  name="items[]" value="Customize Form">Customize Form</dt>
						<dt><input type="checkbox"  name="items[]" value="IOS App">IOS App</dt>
						<dt><input type="checkbox"  name="items[]" value="Android App">Android App</dt>
                         
                    </dl>
				   
					
				  	
					<dl>
                        <dt><label for="Total">Total Package Amount [ Include 6% GST ]:<font color="red">*</font></label></dt>
                        <dt>RM<input type="number" id="Total" step="any"name="Total" required></dt>
                    </dl>
					
					<dl>
                        <dt><label for="Payment">Payment:</label></dt>
                        <dt>
						  <select name="Payment" >
						     <option disabled selected value> -- select an option -- </option>
						     <option value="Cheque">Cheque</option>
							 <option value="Cash">Cash</option>
							 <option value="Bank transfer/Online Banking">Bank transfer/Online Banking</option>
							 
						   </select>
						
						</dt>
                    </dl>
					
			        
					
					<dl>
                        <dt><label for="amount">Payment Amount [ Include 6% GST ]:</label></dt>
                        <dt>RM<input type="number" id="amount" step="any"name="amount" ></dt>
                    </dl>

					<dl>
                        <dt><label for="payment_date">Payment / Cheque / Bank Transfer Date:</label></dt>
                        <dt><input type="date" name="payment_date" id="payment_date"/></dt>
						
                    </dl>
					
					<dl>
                        <dt><label for="customer">Customer Name :<font color="red">*</font></label></dt>
                        <dt><input type="text" size="54" placeholder="customer name" name="customer" autocorrect="off" required></dt>
                    </dl>
					
					<dl>
                        <dt><label for="customerDesignation">Customer Designation :</label></dt>
                        <dt><input type="text" size="54" placeholder="Customer Designation" name="customer_design" autocorrect="off"></dt>
                    </dl>
					
					 <dl>
                        <dt><label for="customerPhone">Customer Contact H/P:<font color="red">*</font></label></dt>
                        <dt><input type="tel" id="customerPhone" name="customerPhone"   placeholder="012-3456789" required></dt>
                    </dl>
					
					 <dl>
                        <dt><label for="email_master">Email (MASTER):<font color="red">*</font></label></dt>
                        <dt><input type="email" name="email_master" id="email_master"  placeholder="example@gmail.com" required></dt>
                    </dl>
					
					<dl>
                        <dt><label for="email_billing">Email (BILLING):<font color="red">*</font><input type="checkbox" name="e_master" id="e_master" onchange="copyValue();">use master email</label></dt>
                        <dt><input type="email" name="email_billing"  id="email_billing" placeholder="example@gmail.com" required></dt>
                    </dl>
					
					
				 
					<dl>
					  
                        <dt><label for="Attachment">Attachment :</label></dt>
						<dt>
					      <p style="font-size:15px;color:#ff0000"><b>Maximum upload file size:</b> 2 MB.</p>
					      <p style="font-size:15px;color:#ff0000"><b>File type :</b> Pdf,jpg, png  or jpeg.</p>
					    </dt>
						
                        <dt><b>Order Form:</b></dt>
						<dt><input type="file" id="fileChooser"name="Order"  accept="image/*" ></dt>
						<dt><b>Quotation:</b></dt>
						<dt><input type="file" id="fileChooser"name="quotation" ></dt>
						<dt><b>Name Card(Front):</b></dt>
						<dt><input type="file" id="fileChooser"name="fcard" accept="image/*"></dt>
						<dt><b>Name Card(Back):</b></dt>
						<dt><input type="file" id="fileChooser"name="bcard" accept="image/*"></dt>
						<dt><b>Company SSM:</b></dt>
						<dt><input type="file" id="fileChooser"name="SSM" accept="image/*"></dt>
						<dt><b>Cheque:</b></dt>
						<dt><input type="file" id="fileChooser"name="cheque" accept="image/*"></dt>
						<dt><b>Cash:</b></dt>
						<dt><input type="file" id="fileChooser"name="cash" accept="image/*"></dt>
						<dt><b>Payment Slip:</b></dt>
						<dt><input type="file" id="fileChooser"name="slip" accept="image/*"></dt>
						
                         
                    </dl>
				   
					
					
					
					
				   
					<details >
					
                       <summary id="summary_style" style="font-weight:bold">For website(click for more website details)</summary>
                          
                          
						  <input type="checkbox" name="billing" id="billing" onchange="duplicateValue();">use billing
		           
					<dl>
                        <dt><label for="CompanyName">Company name:</label></dt>
                        <dt><input type="text" id="CompanyName"name="CompanyName"  size="54"  placeholder="Company Name" autocorrect="off" ></dt>
                    </dl>
					
					<dl>
                        <dt><label for="CompanyReg">Company Registration No.:</label></dt>
                        <dt><input type="text" id="CompanyReg" name="Company_Reg"  size="54"  placeholder="Company Registration Number" autocorrect="off"></dt>
                    </dl>
					
					<dl>
                        <dt><label for="GSTNo">GST No.:</label></dt>
                        <dt><input type="text" id="GST_No"name="GST_No"  size="54"  placeholder="GST Number" autocorrect="off"></dt>
                    </dl>
					
					 <dl>
                        <dt><label for="CompanyAddress">Company Address:</label></dt>
                        <dt><textarea spellcheck="false" name="CompanyAddress" id="CompanyAddress" rows="5" cols="36" placeholder="Company Address" autocorrect="off" ></textarea></dt>
					</dl>
					
					
					
					 <dl>
                        <dt><label for="OfficePhone">Office Telephone:</label></dt>
                        <dt><input type="tel" id="OfficePhone"  name="OfficePhone"   placeholder="03-12345678" ></dt>
                    </dl>
					
					
					<dl>
                        <dt><label for="OfficeFax">Office Fax:</label></dt>
                        <dt><input type="tel" id="Office_Fax" name="OfficeFax"   placeholder="03-12345678" ></dt>
                    </dl>
					
					<dl>
                        <dt><label for="email_website">Email (WEBSITE):</label></dt>
                        <dt><input type="email" name="email_website"  id="email_website" placeholder="example@gmail.com" /></dt>
                    </dl>
					
						
					<dl>
                        <dt><label for="DomainType">Domain Type:</label></dt>
                        <dt>
						 <select name="DomainType" >
						     <option disabled selected value> -- select an option -- </option>
						     <option value="Register now">Register now</option>
							 <option value="Register when online">Register when online</option>
							 <option value="Transfer">Transfer</option>
							 <option value="Need Confirm">Need Confirm</option>
							 
						   </select>
						
						</dt>
                    </dl>
                      					
					<dl>
                        <dt><label for="DomainName">Domain Name:</label></dt>
                        <dt><input type="text" name="DomainName"  size="54"  placeholder="Domain Name" ></dt>
					</dl>
					
				
					
					<dl>
                        <dt><label for="CompanyBusiness">Company Business.:</label></dt>
                        <dt><input type="text" name="CompanyBusiness"  size="54"  placeholder="Company Business" autocorrect="off"></dt>
                    </dl>
					
					 <dl>
                        <dt><label for="CustomerDescription">Customer description:</label></dt>
                        <dt><textarea name="CustomerDescription" id="CustomerDescription" rows="5" cols="36" placeholder="Customer Description" autocorrect="off"></textarea></dt>
					</dl>
					
					 <dl>
                        <dt><label for="Reason">Reason to Redo Website:</label></dt>
                        <dt><textarea name="Reason" id="Reason" rows="5" cols="36" placeholder="Reason" autocorrect="off"></textarea></dt>
					</dl>
				  
					
				
					
					
                         
                   </details>
				   
				   	
					
				    <dl>
                        <dt><label for="Remark">Remark:</label></dt>
                        <dt><textarea name="Remark" id="Remark" rows="5" cols="36" placeholder="Remark" autocorrect="off"></textarea></dd></dt>
                    </dl>
				 
					
					   
					 <dl class="terms">
                     <dt>
					  <label>
                       <input type="checkbox" name="remember_me" id="remember_me">
					    I agree and take full responsibility for my actions.
                        New Sales Collection also counts for any upgrade from the same clients within the Month.
						Sales/collection will be cancel if any PD cheque is cancelled or hold by clients. 
						Cannot use own money to pay for clients. 
						Cannot play trick. Example: sales cannot transfer.
						Commissions for salary not affect.
						Only item in Brochure is counted, example: special app/ipay88 apply no count in.
						Any TOPUP/Upgrade sales figure, must collect payment just can count.
                       </label>
					</dt>
                   </dl>
					
					
					
                    
                   
                    
                    
                    
                     <dl class="submit">
                      <dt><input id="sub-btn-style" type="submit" name="submit" id="submit" value="Submit"  /></dt>
					   
                     </dl>
				      <button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>
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
<script src="js/matrix.js"></script> 
<script src="js/scroll.js"></script> 



</body>
</html>

