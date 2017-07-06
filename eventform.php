<?php
 define('PR_UPLOADPATH','upload_files/');  
?>
<?php
$ip_now=$_SERVER['REMOTE_ADDR'];
$get_first_char = substr($_SERVER["HTTP_HOST"], 0, 1);

  if(isset($_POST['send'])){
     $Sname=$_POST['Sname'];
	 $Semail=$_POST['Semail'];
	 $Etitle=$_POST['Etitle'];
	 $org=$_POST['org'];
	 $Date=$_POST['date'];
	 $time=$_POST['time'];
	 $venue=$_POST['venue'];
	 $location=$_POST['location'];
	 $address=$_POST['address'];
	 $cemail=$_POST['cemail'];
	 $cno=$_POST['cno'];
	 $wurl=$_POST['wurl'];
	 $fee=$_POST['fee'];
	 $content=$_POST['content'];
	 
   	
	 
	  
			
			if( ($_FILES["upload_file"]["name"] != "")){
	          $allowedExts = array("jpeg","JPEG", "jpg","JPG", "png","PNG");
              $temp = explode(".", $_FILES["upload_file"]["name"]);
              $extension = end($temp);

              if(( ($_FILES["upload_file"]["type"] == "image/jpeg")|| ($_FILES["upload_file"]["type"] == "image/jpg")|| ($_FILES["upload_file"]["type"] == "image/pjpeg")|| ($_FILES["upload_file"]["type"] == "image/x-png")|| ($_FILES["upload_file"]["type"] == "image/png"))&& in_array($extension, $allowedExts)) 
	          {
                if (($_FILES["upload_file"]["error"] > 0)) {
                 $error =  "Error: " . $_FILES["upload_file"]["error"] . "<br>";
				
                } else {}
				  
				   //replace new name of the file
					$temp = explode(".", $_FILES["upload_file"]["name"]);
                    $Final = round(microtime(true)) . '.' . end($temp);
					$target=PR_UPLOADPATH . $Final;
                    move_uploaded_file($_FILES['upload_file']['tmp_name'],$target);
					
					
			  }
             else{}			 
	    }
	
	 
	
	
	  
	 if($Sname == "" || $Semail =="" || $Etitle == "" || $org == ""  || $Date ==""  || $time ==""  || $venue ==""|| $location=="" || $cemail==""|| $cno=="" ){
	     if($Sname =="" ){
		   $require="required";
		   echo '<style type="text/css">
                    .name{
					  border:1px solid red;
					}
                 
                </style>';
		 }
		 else{
		    echo '<style type="text/css">
                    .mname{
					  display:none;
					}
                 
                </style>';
		 }
	
		 
		 if($Semail =="" ){
		   $require="required";
		   echo '<style type="text/css">
                    .email{
					  border:1px solid red;
					}
                 
                </style>';
		 }
		 else{
		    echo '<style type="text/css">
                    .memail{
					  display:none;
					}
                 
                </style>';
		 }
		 
		  if($Etitle =="" ){
		   $require="required";
		   echo '<style type="text/css">
                    .etitle{
					  border:1px solid red;
					}
                 
                </style>';
		 }
		 else{
		    echo '<style type="text/css">
                    .metitle{
					  display:none;
					}
                 
                </style>';
		 }
		 
		 if($org =="" ){
		   $require="required";
		   echo '<style type="text/css">
                    .oname{
					  border:1px solid red;
					}
                 
                </style>';
		 }
		 else{
		    echo '<style type="text/css">
                    .morg{
					  display:none;
					}
                 
                </style>';
		 }
		 
		 if($Date =="" ){
		   $require="required";
		   echo '<style type="text/css">
                    .date{
					  border:1px solid red;
					}
                 
                </style>';
		 }
		 else{
		    echo '<style type="text/css">
                    .mdate{
					  display:none;
					}
                 
                </style>';
		 }
		 
		 if($time =="" ){
		   $require="required";
		   echo '<style type="text/css">
                    .time{
					  border:1px solid red;
					}
                 
                </style>';
		 }
		 else{
		    echo '<style type="text/css">
                    .mtime{
					  display:none;
					}
                 
                </style>';
		 }
		 
		 if($venue =="" ){
		   $require="required";
		   echo '<style type="text/css">
                    .venue{
					  border:1px solid red;
					}
                 
                </style>';
		 }
		 else{
		    echo '<style type="text/css">
                    .mvenue{
					  display:none;
					}
                 
                </style>';
		 }
		 
		 if($location =="" ){
		   $require="required";
		   echo '<style type="text/css">
                    .location{
					  border:1px solid red;
					}
                 
                </style>';
		 }
		 else{
		    echo '<style type="text/css">
                    .mlocation{
					  display:none;
					}
                 
                </style>';
		 }
		 
		  if($cemail =="" ){
		   $require="required";
		   echo '<style type="text/css">
                    .cemail{
					  border:1px solid red;
					}
                 
                </style>';
		 }
		 else{
		    echo '<style type="text/css">
                    .mcemail{
					  display:none;
					}
                 
                </style>';
		 }
		 
		 if($cno =="" ){
		   $require="required";
		   echo '<style type="text/css">
                    .cno{
					  border:1px solid red;
					}
                 
                </style>';
		 }
		 else{
		    echo '<style type="text/css">
                    .mcno{
					  display:none;
					}
                 
                </style>';
		 }
		 //$nameErr = "Please enter required field!";
		
	 }
	 else if($Sname != "" && $Semail !="" && $Etitle != "" && $org != "" &&   $Date !=""  && $time !="" && $venue !=""&& $location!=""&&  $cemail!=""&& $cno!="" ){
	 
	      
	    //mail function
	      $to = "info@newevent.com.my";
          //$to="applyforsomething@gmail.com";
		  $headers = "From: noreply@newpages.com.my" . "\r\n";
		  $headers .= "CC: $Semail\r\n";
          $headers .= "MIME-Version: 1.0\r\n";
          $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
		  $subject  = "NEWEVENT Free Listing - $Etitle";
		  $date= date("Y-m-d G:i:s");
		
          $message  ="Thanks for listing in NEWEVENT, kindly download NEWEVENT App for more upcoming event information.\r\n<br/><br/>";
		  
          $message .="<b>Submitter:</b> $Sname<br/>\r\n";
		  $message .="<b>Submitter Email:</b> $Semail<br/><br/>\r\n";
		  
		  $message .="<b>Event Title:</b> $Etitle<br/>\r\n";
		  $message .="<b>Organizer Name:</b> $org<br/>\r\n";
		  $message .="<b>Date:</b> $Date<br/>\r\n";
		  $message .="<b>Time:</b> $time<br/>\r\n";
		  $message .="<b>Venue:</b> $venue<br/>\r\n";
		  $message .="<b>Location:</b> $location<br/>\r\n";
		  $message .="<b>Address:</b> $address<br/>\r\n";
		  $message .="<b>Contact email:</b> $cemail<br/>\r\n";
		  $message .="<b>Contact No:</b> $cno<br/>\r\n";
		  $message .="<b>Website url:</b> $wurl<br/>\r\n";
		  $message .="<b>Administration Fee:</b> $fee<br/>\r\n";
		  $message .="<b>Event Description:</b> $content<br/><br/>\r\n";
		  
		  $message .="<b>Date:</b> $date -------- From IP Address: $ip_now<br/>\r\n\r\n";
		  
		  if(($_FILES["upload_file"]["type"] == "image/jpeg")|| ($_FILES["upload_file"]["type"] == "image/jpg")|| ($_FILES["upload_file"]["type"] == "image/pjpeg")|| ($_FILES["upload_file"]["type"] == "image/x-png")|| ($_FILES["upload_file"]["type"] == "image/png")) {
		    $message .="<b>Event Image:</b> http://www.newevent.com.my/upload_files/$Final \r\n";
		    //$message .="<b>Event Image:</b> http://www.newpages.net/wenkai/upload_files/$Final \r\n";
		   
		 }
		 else{
		   $message .="";
		 }
		
		
		
		  
		
         
           mail($to,$subject,$message,$headers);
		
		  
		   //echo sprintf("You already sent an email,will reply you as soon as possible");
		   echo '<div class="sucess">Thanks for listing in NEWEVENT, kindly download NEWEVENT App for more upcoming event information.</div>';
		 }
	      
	 
	 
	 
	 
	 
  }

?>

<!doctype html>
<html>
<head>




  <style>
  
      div{
	    display: block;
		line-height: 1.6!important;
	  }
     
      
	  #name,
	  #email,
	  #etitle,
	  #oname,
	  #date,
	  #time,
	  #venue,
	  #wurl,
	  #cno,
	  #fee,
      input[type=email],
	  input[type=number],
	  input[type=url],
	  select {
       width: 50%;
	   padding: 5px;

      }
	  
	  textarea{
	     width: 65%;
         height: 100px;   
	  }
	  
	
	  
	 .button{
	   width: 80px;
	 }
	 
	 .error,
	 .mandatory{
	   color: #FF0000;
	
	 }
	 
	 h2.page-title{
	  text-transform: uppercase;
      font-size: 14px;
      color: #333;
      padding: 5px 10px 5px 0!important;
      border-bottom: 2px solid #d71d28;
	 }
	 
	 h2.sub-title{
	  text-transform: uppercase;
      font-size: 14px;
      color: #333;
      padding: 5px 10px 5px 0!important;
      border-bottom: 2px solid #d71d28;
	 }
	 
	 p{
	  line-height:50%;
	 }
	 
	 .mobile_label{
	  width:100% !important;
	  margin-left:0px !important;
    }
	
	.mobile-input{
	   -webkit-appearance: none; -moz-appearance: none;
        display: block;
        margin: 0;
        width: 100%; height: 40px;
        line-height: 40px; font-size: 17px;
        border: 1px solid #bbb;
	}
	
	 
  </style>
  

</head>
<body>
<section id="container">
<div class="event-form" id="envelope">
 <?php
   if($get_first_char == "w"){
 ?>
 
  <h2 class="page-title">Join Free Listing</h2>
  <form name="Event-form" id="Event-form"method="post" enctype="multipart/form-data">
  
     <span class="error"><?php echo $nameErr;?></span> 
    
	 <div class="form-col">
      <p>Submitter Name<span class="mandatory">*</span></p> 
	  <input id="name" class="name txtinput"type="text" name="Sname" value="<?php echo isset($_POST['Sname']) ? $_POST['Sname'] : '' ?>" /><span class="mandatory mname"><?php echo $require ?></span>
	  
	 </div>
	  <div class="form-col">
	  <p>Submitter Email<span class="mandatory">*</span></p>
	  <input id="email" class="email txtinput"type="text" name="Semail" value="<?php echo isset($_POST['Semail']) ? $_POST['Semail'] : '' ?>"/><span class="mandatory memail"><?php echo $require ?></span>
	  </div>
	 
	  
	  
	  <h2 class="sub-title">Event Details</h2>
	  <div class="form-col">
	   <p>Event Title<span class="mandatory">*</span></p>
	   <input id="etitle" class="etitle txtinput"type="text" name="Etitle" value="<?php echo isset($_POST['Etitle']) ? $_POST['Etitle'] : '' ?>"/><span class="mandatory metitle"><?php echo $require ?></span>
	  </div>
	  <div class="form-col">
	  <p>Organizer Name<span class="mandatory">*</span></p>
	  <input id="oname" class="oname txtinput"type="text" name="org" value="<?php echo isset($_POST['org']) ? $_POST['org'] : '' ?>"/><span class="mandatory morg"><?php echo $require ?></span>
	  </div>
	 
	 <div class="form-col">
	  <p>Date<span class="mandatory">*</span></p>
	  <input id="date" class="date txtinput"type="text" id="date"name="date" placeholder="  1 June 2017 - 1 July 2017" value="<?php echo isset($_POST['date']) ? $_POST['date'] : '' ?>"/><span class="mandatory mdate"><?php echo $require ?></span>
	 </div>
      <div class="form-col">	 
	   <p>Time<span class="mandatory">*</span></p>
	   <input id="time" class="time txtinput"type="text" id="time" name="time" value="<?php echo isset($_POST['time']) ? $_POST['time'] : '' ?>"/><span class="mandatory mtime"><?php echo $require ?></span>
	  </div>
	  <div class="form-col">
	   <p>Venue<span class="mandatory">*</span></p>
	   <input id="venue" class="venue txtinput"type="text" name="venue" placeholder="   Putra World Trade Centre(PWTC)" value="<?php echo isset($_POST['venue']) ? $_POST['venue'] : '' ?>"/><span class="mandatory mvenue"><?php echo $require ?></span>
	  </div>
	   <div class="form-col">
	    <p>Location <span class="mandatory">*</span></p>
	     <select id="location" class="location selmenu"name="location"><span class="mandatory"><?php echo $require ?></span>
	     <option disabled selected value> -- select an option -- </option>
		 <option>Johor</option>
		 <option>Malacca</option>
		 <option>Negeri Sembilan</option>
		 <option>Kuala Lumpur</option>
		 <option>Selangor</option>
		 <option>Pahang</option>
		 <option>Perak</option>
		 <option>Terengganu</option>
		 <option>Kelantan</option>
		 <option>Penang</option>
		 <option>Kedah</option>
		 <option>Perlis</option>
		 <option>Sarawak</option>
		 <option>Sabah</option>
	   </select>
	  </div>
     <div>
	  <p>Address</p>
	  <textarea name="address"></textarea>
     </div>	 
	 <div class="form-col">
	  <p>Contact Email<span class="mandatory">*</span></p>
	  <input id="cemail" class="cemail txtinput"type="email" name="cemail" value="<?php echo isset($_POST['cemail']) ? $_POST['cemail'] : '' ?>"><span class="mandatory mcemail"><?php echo $require ?></span>
	 </div>
     <div class="form-col">	 
	  <p>Contact No<span class="mandatory">*</span></p>
	  <input type="text" id="cno" class="cno txtinput"name="cno" value="<?php echo isset($_POST['cno']) ? $_POST['cno'] : '' ?>"/><span class="mandatory mcno"><?php echo $require ?></span>
	 </div>
      <div>	 
	  <p>Website url</p>
	  <input type="text" id="wurl" class="txtinput" name="wurl"/>
	  </div>
      <div>	 
	   <p>Administration Fee</p>
	   <input type="text" id="fee" class="txtinput"name="fee"/>
	  </div>
	 <div>
	  <p>Event Description</p>
	  <textarea name="content"></textarea>
     </div>	 
	  <div>
	   <p>Event Image<i style="color:#FF0000"> *We recommend using 730x320px</i></p>
	   <input type="file" name="upload_file"/>
	  </div>
	   
	  <p><input type="submit" name="send"class="button"value="Send"/></p>
	  
	  
  </form>
    <?
	 }
	 else if($get_first_char == "m"){
	?>
	 
	<table width="100%" max-width="1040px" border="0" style="margin:0 auto;">
	<form name="Event-form" id="Event-form"method="post" enctype="multipart/form-data">
      <span class="error"><?php echo $nameErr;?></span>	 
	
     <tr>	
	  <td><h2 class="page-title">Join Free Listing</h2></td>
	 </tr>
	 
	 <tr class="form-col" style="float:none;">
	  <td><label class="mobile_label">Submitter Name<span class="mandatory">*</span></label></td>
     </tr>
	 
	 <tr>
	  <td><input  class="name txtinput mobile-input"type="text" name="Sname" value="<?php echo isset($_POST['Sname']) ? $_POST['Sname'] : '' ?>" required/><span class="mandatory mname"><?php echo $require ?></span></td>
	 </tr>
	 
	  <tr class="form-col" style="float:none;">
	   <td><label class="mobile_label">Submitter Email<span class="mandatory">*</span></label></td>
	  </tr>
	  
	  <tr>
	  <td><input  class="email txtinput mobile-input"type="text" name="Semail" value="<?php echo isset($_POST['Semail']) ? $_POST['Semail'] : '' ?>" required/><span class="mandatory memail"><?php echo $require ?></span></td>
	  </tr>
	 
	  
	  <tr>
	   <td><h2 class="sub-title">Event Details</h2></td>
	  </tr>
	  
	  <tr class="form-col" style="float:none;">
	   <td><label class="mobile_label">Event Title<span class="mandatory">*</span></label></td>
	  </tr>
	  
	  <tr>
	   <td><input  class="etitle txtinput mobile-input"type="text" name="Etitle" value="<?php echo isset($_POST['Etitle']) ? $_POST['Etitle'] : '' ?>" required/><span class="mandatory metitle"><?php echo $require ?></span></td>
	  </tr>
	  
	  <tr class="form-col" style="float:none;">
	  <td><label class="mobile_label">Organizer Name<span class="mandatory">*</span></label></td>
	  </tr>
	  <tr>
	  <td><input  class="oname txtinput mobile-input"type="text" name="org" value="<?php echo isset($_POST['org']) ? $_POST['org'] : '' ?>" required/><span class="mandatory morg"><?php echo $require ?></span></td>
	  </tr>
	 
	 <tr class="form-col" style="float:none;">
	  <td><label class="mobile_label">Date<span class="mandatory">*</span></label></td>
	 </tr>
	 
	 <tr>
	  <td><input  class="date txtinput mobile-input"type="text" name="date" placeholder="   1 June 2017 - 1 July 2017" value="<?php echo isset($_POST['date']) ? $_POST['date'] : '' ?>" required/><span class="mandatory mdate"><?php echo $require ?></span></td>
	 </tr> 
	 
      <tr class="form-col" style="float:none;">	 
	   <td><label class="mobile_label">Time<span class="mandatory">*</span></label></td>
	  </tr>
	  
	  <tr>
	   <td><input  class="time txtinput mobile-input"type="text"  name="time" value="<?php echo isset($_POST['time']) ? $_POST['time'] : '' ?>" required/><span class="mandatory mtime"><?php echo $require ?></span></td>
	  </tr>
	  
	  <tr class="form-col" style="float:none;">
	   <td><label class="mobile_label">Venue<span class="mandatory">*</span></label></td>
	  </tr>
	  
	  <tr>
	   <td><input  class="venue txtinput mobile-input"type="text" name="venue" placeholder="   Putra World Trade Centre(PWTC)" value="<?php echo isset($_POST['venue']) ? $_POST['venue'] : '' ?>" required/><span class="mandatory mvenue"><?php echo $require ?></span></td>
	  </tr>
	  
	   <tr class="form-col" style="float:none;">
	    <td><label class="mobile_label">Location <span class="mandatory">*</span></label></td>
	   </tr>
	   
	   <tr>
	    <td>
	     <select id="location" class="location selmenu mobile-input"name="location" required><span class="mandatory"><?php echo $require ?></span>
	     <option disabled selected value> -- select an option -- </option>
		 <option>Johor</option>
		 <option>Malacca</option>
		 <option>Negeri Sembilan</option>
		 <option>Kuala Lumpur</option>
		 <option>Selangor</option>
		 <option>Pahang</option>
		 <option>Perak</option>
		 <option>Terengganu</option>
		 <option>Kelantan</option>
		 <option>Penang</option>
		 <option>Kedah</option>
		 <option>Perlis</option>
		 <option>Sarawak</option>
		 <option>Sabah</option>
	   </select>
	   </td>
	  </tr>
     <tr>
	  <td><label class="mobile_label">Address</label></td>
	 </tr>
	 
	 <tr>
	  <td><textarea name="address" class="mobile-input"></textarea></td>
     </tr>
	 
	 <tr class="form-col" style="float:none;">
	  <td><label class="mobile_label">Contact Email<span class="mandatory">*</span></label></td>
	 </tr>
	 
	 <tr>
	  <td><input  class="cemail txtinput mobile-input"type="text" name="cemail" value="<?php echo isset($_POST['cemail']) ? $_POST['cemail'] : '' ?>" required><span class="mandatory mcemail"><?php echo $require ?></span></td>
	 </tr>
	 
     <tr class="form-col" style="float:none;">	 
	  <td><label  class="mobile_label">Contact No<span class="mandatory">*</span></label></td>
	 </tr>
	 
	 <tr>
	  <td><input type="text"  class="cno txtinput mobile-input"name="cno" value="<?php echo isset($_POST['cno']) ? $_POST['cno'] : '' ?>" required/><span class="mandatory mcno"><?php echo $require ?></span></td>
	 </tr>
	 
      <tr class="form-col" style="float:none;">	 
	   <td><label class="mobile_label">Website url</label></td>
	  </tr>
	  
	  <tr>
	   <td><input type="text"  class="txtinput mobile-input" name="wurl"/></td>
	  </tr>
	  
      <tr class="form-col" style="float:none;">	 
	   <td><label class="mobile_label">Administration Fee</label></td>
	  </tr>
	  
	  <tr>
	   <td><input type="text"  class="txtinput mobile-input"name="fee"/></td>
	  </tr>
	  
	 <tr class="form-col" style="float:none;">
	  <td><label class="mobile_label">Event Description</label></td>
	 </tr>
	 
	 <tr>
	  <td><textarea name="content" class="mobile-input"></textarea></td>
     </tr>	 
	  <tr class="form-col" style="float:none;">
	  
	   <td><label class="mobile_label">Event Image<i style="color:#FF0000"> *We recommend using 730x320px</i></label></td>
	  </tr>
	  <tr>
	   <td><input type="file" name="upload_file"/></td>
	  </tr>
	   
	 <tr style="float:none;">
	  <td><input type="submit" name="send"class="button"value="Send"/></td>
	 </tr>
	  
  </form>
  </table>
	 
    
	   
    <?
	 }
    ?>
 </div>
</section>
</body>
</html>


