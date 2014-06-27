<?php ob_start();session_start();?>

<!DOCTYPE html>

<?php 

	if( !(isset($_SESSION['Type_id']) && $_SESSION['Type_id'] == 1) )
	{
		header('Location: login.php');
	}
?>
<html>
	<head>
			<title>
				edituser.com
			</title>
			<link rel="stylesheet" type="text/css" href="nihal_admin_support.css"/>	
	</head>
	<body  onload="updateemptypenew()">
			
    	<?php
      				  
      		  $firstnameerr = $lastnameerr="";
			  $username=$password=$fullname=$typeid=$email=$phone=$birthdate=$gender=$age=$address=$pay="";
				      
                     
			  $usernamen=$passwordn=$firstnamen=$lastnamen=$typeidn=$emailn=$phonen=$birthdaten=$gendern=$agen=$addressn=$payn="";
              $f1=$f2=$f3=$f4=$f5=$f6=$f7=$f8=$f9=$f10=$f11=$f12=0;

			  if( $_SERVER["REQUEST_METHOD"]== "POST")
			   {
				           

				  if(empty($_POST["firstname"]))
				   {
				         $firstnameerr="Firstname is required.";
				   }
				  else
				   {

				         $firstname= test_input($_POST["firstname"]);

				         // validation
				         if (!preg_match("/^[a-zA-Z ]*$/",$firstname))
				         {
 							 	  $firstnameerr = "Only letters and white space allowed"; 
					     }
				                  
				    } 


				 if(empty($_POST["lastname"]))
				  {
				         $lastnameerr="Lastname is required.";
				  }
				 else
				  {
				         $lastname= test_input($_POST["lastname"]);

				         // validation
				         if (!preg_match("/^[a-zA-Z ]*$/",$lastname))
				          {
 							 	  $lastnameerr = "Only letters and white space allowed"; 
						  }
				              
				  } 


				  // taking new values

				 if(empty($_POST["firstnamenew"]))
				  {
				         $firstnamen="";
				         $f1=0;
				  }
				 else
				  {

				         $firstnamen= test_input($_POST["firstnamenew"]);
				         $f1=1;

				         // validation
				         if (!preg_match("/^[a-zA-Z ]*$/",$firstnamen))
				          {      
				          	     $f1=0;
 							 	 $firstnamen = "Only letters and white space allowed"; 
						  }
				  } 

			     if(empty($_POST["lastnamenew"]))
			      {
				         $lastnamen="";
				         $f2=0;
				  }
				 else
				  {

				         $lastnamen= test_input($_POST["lastnamenew"]);
				         $f2=1;

				         // validation
				         if (!preg_match("/^[a-zA-Z ]*$/",$lastnamen))
				          {      
				          	     $f2=0;
 							 	 $lastnamen = "Only letters and white space allowed"; 
						  }
				   }

				 if(empty($_POST["passwordnew"]))
				  {
				         $passwordn="";
				         $f3=0;
				  }
				 else
				  {

				         $passwordn= test_input($_POST["passwordnew"]);
				         $f3=1;
				  } 
							
				 if(empty($_POST["usernamenew"]))
				  {
				         $usernamen="";
				         $f4=0;
				  }
				 else
				  {

				         $usernamen= test_input($_POST["usernamenew"]);
				         $f4=1;
				  } 
 
                 if(empty($_POST["typidnew"]))
                  {
				         $typidn="";
				         $f5=0;
				  }
				 else
				  {

				         $typidn= test_input($_POST["typidnew"]);
				         $f5=1;
				            	  

				         if (!preg_match("/^[0-9]*$/",$typidn))
					      {
 								 $typidn="";
				           	 	 $f5=0;
						  }
						 else
						  {
								 $f5=1;
						  }										            	
				  } 

				 if(empty($_POST["emailnew"]))
				  {
				         $emailn="";
				         $f6=0;
				  }
				 else
				  {

				         $emailn= test_input($_POST["emailnew"]);
				         $f6=1;

						   		  
					     if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$emailn))
					      {			  
								 $emailn="";
						         $f6=0; 
						  }
				  }

				               
				 if(empty($_POST["phonenew"]))
				  {
				         $phonen="";
				         $f7=0;
				  }
				 else
				  {

				         $phonen= test_input($_POST["phonenew"]);
				         $f7=1;
				            	 									
					     if (!preg_match("/^[0-9]*$/",$phonen))
					      {
 								  $phonen="";
				           	 	  $f7=0;
						  }
					     else
						  {
								 $f7=1;
						  }
				  } 
 								
 				  if(empty($_POST["birthnew"]))
 				   {
				         $birthdaten="";
				         $f8=0;
				   }
				  else
				   {

				         $birhtdaten= test_input($_POST["birthnew"]);
				         $f8=1;
				   } 

				 if(empty($_POST["gerndernew"]))
				  {
				         $gendern="";
				         $f9=0;
				  }
				 else
				  {

				         $gendern= test_input($_POST["gendernew"]);
				         $f9=1;

				         // validation
				         if (!preg_match("/^[a-zA-Z ]*$/",$gendern))
				          {           
				          	     $f9=0;
 							     $gendern = "Only letters and white space allowed"; 
					      }
				  } 

				 if(empty($_POST["agenew"]))
				  {
				         $agen="";
				         $f10=0;
			      }
				 else
				  {

				         $agen= test_input($_POST["agenew"]);
				         $f10=1;
				            	
					     if (!preg_match("/^[0-9]*$/",$agen))
						  {
 								 $agen="";
				           	 	 $f10=0;
						  }
					     else
						  {
							  $f10=1;
						  }

				  } 

				 if(empty($_POST["addressnew"]))
				  {
				         $addressn="";
				         $f11=0;
			      }
				 else
				  {

				         $addressn= test_input($_POST["addressnew"]);
				         $f11=0;
				  } 

				               
				 if(empty($_POST["paynew"]))
				  {
				         $payn="";
				         $f12=0;
				  }
				 else
				  {

				          $payn= test_input($_POST["paynew"]);
				          $f12=1;
				  
					      if (!preg_match("/^[0-9]*$/",$payn))
						   {
 								 $payn="";
				           	 	 $f12=0;
						   }
						  else
						   {
								 $f12=1;
						   }
				   } 

				         
	           }

				      
			  function test_input($data) 
			   {
					  $data = trim($data);
					  $data = stripslashes($data);
					  $data = htmlspecialchars($data);
					  return $data;
			   }


			             $con=mysqli_connect("localhost","root","lionelm10","restaurant");
						
						 // Check connection
						 if (mysqli_connect_errno()) 
						 {
							  echo "Failed to connect to MySQL: " . mysqli_connect_error();
						 }
		                    
							
						 //escape variables for security          
		                 $firstname = mysqli_real_escape_string($con,$firstname);
		                 $lastname = mysqli_real_escape_string($con,$lastname);


					     $result = mysqli_query($con,"SELECT * FROM Employee WHERE Firstname='$firstname' AND Lastname='$lastname'");
		                      
		                        

						 while($row = mysqli_fetch_array($result)) 
						  {
		           
							      $fullname= $row['Firstname'] . " " . $row['Lastname'];
							      $username = $row['Username'];
							      $password= $row['PASSWORD'];
							      $typeid1= $row['Type_id'];
							      
							      $result1=mysqli_query($con,"SELECT Type_name FROM Employee_type WHERE Type_id='$typeid1'");
							     
							      if ($row1=mysqli_fetch_array($result1))
							       {
							       	  
							       	  $typeid= $row1['Type_name'];
							       }
							      
							      $email= $row['Email'];
							      $phone = $row['Phone'];
							      $birthdate= $row['Birthdate'];
							      $gender = $row['Gender'];
							      $age= $row['Age'];
							      $pay = $row['Pay'];
							      $address = $row['Address'];
						 }


                            // querries for updating the database
                            if($f1 == 1)
                             {   
                             	$firstnamen = mysqli_real_escape_string($con,$firstnamen);
                             	mysqli_query($con,"UPDATE Employee SET Firstname='$firstnamen' WHERE Firstname='$firstname' AND Lastname='$lastname'");
                             }	

                             if($f2 == 1)
                             {   
                             	$lastnamen = mysqli_real_escape_string($con,$lastnamen);
                             	mysqli_query($con,"UPDATE Employee SET Lastname='$lastnamen' WHERE Firstname='$firstname' AND Lastname='$lastname'");
                             }

                             if($f3 == 1)
                             {  
                             	$passwordn = mysqli_real_escape_string($con,$passwordn);
                             	mysqli_query($con,"UPDATE Employee SET Password='$passwordn' WHERE Firstname='$firstname' AND Lastname='$lastname'");
                             }	
							
							 if($f4 == 1)
                             {  
                             	$usernamen = mysqli_real_escape_string($con,$usernamen);
                             	mysqli_query($con,"UPDATE Employee SET Username='$usernamen' WHERE Firstname='$firstname' AND Lastname='$lastname'");
                             }

                             if($f5 == 1)
                             { 
                             	 $typeidn = mysqli_real_escape_string($con,$typeidn);
                             	mysqli_query($con,"UPDATE Employee SET Type_id='$typidn' WHERE Firstname='$firstname' AND Lastname='$lastname'");
                             }

                             if($f6 == 1)
                             { 
                               $emailn = mysqli_real_escape_string($con,$emailn);
                             	mysqli_query($con,"UPDATE Employee SET Email='$emailn' WHERE Firstname='$firstname' AND Lastname='$lastname'");
                             }

                             if($f7 == 1)
                             { 
                               $phonen = mysqli_real_escape_string($con,$phonen);
                             	mysqli_query($con,"UPDATE Employee SET Phone='$phonen' WHERE Firstname='$firstname' AND Lastname='$lastname'");
                             }

                             if($f8 == 1)
                             {  
                             	$birthdaten = mysqli_real_escape_string($con,$birthdaten);
                             	mysqli_query($con,"UPDATE Employee SET Birthdate='$birthdaten' WHERE Firstname='$firstname' AND Lastname='$lastname'");
                             }	
	
							if($f9 == 1)
                             {  
                             	$gendern = mysqli_real_escape_string($con,$gendern);
                             	mysqli_query($con,"UPDATE Employee SET Gender='$gendern' WHERE Firstname='$firstname' AND Lastname='$lastname'");
                             }	

							if($f10 == 1)
                             {  
                             	$agen = mysqli_real_escape_string($con,$agen);
                             	mysqli_query($con,"UPDATE Employee SET Age='$agen' WHERE Firstname='$firstname' AND Lastname='$lastname'");
                             }

                             if($f11 == 1)
                             { 
                              $addressn = mysqli_real_escape_string($con,$addressn);
                             	mysqli_query($con,"UPDATE Employee SET Address='$addressn' WHERE Firstname='$firstname' AND Lastname='$lastname'");
                             }	
	
                              if($f12 == 1)
                             {  
                             	$payn = mysqli_real_escape_string($con,$payn);
                             	mysqli_query($con,"UPDATE Employee SET Pay='$payn' WHERE Firstname='$firstname' AND Lastname='$lastname'");
                             }	
	
	




							mysqli_close($con);

   		 ?>



          	<div id="container">
			<div id="top3" class="transparent" height="150px">
				<form name="logininfo" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
					<h1 id="welcome" >Enter the Existing Employees name..</h1><br/>
					<hr/>
					&nbsp;First Name<br/>&nbsp;<input type="text" name="firstname" placeholder="firstname" value="<?php echo $firstname;?>" size="30" onblur="myfirstnamevalid(this)" onkeyup="showHint2(this.value)"/> 
	                &nbsp;<label id="firstlabel" class="errorlabels"><?php echo $firstnameerr; ?></label><br/> <br/>
	                &nbsp;Last Name<br/>&nbsp;<input type="text" name="lastname" placeholder="lastname" value="<?php echo $lastname;?>" size="30" onblur="mylastnamevalid(this)" onkeyup="showHint3(this.value)"/> 
	                &nbsp;<label id="lastlabel" class="errorlabels"><?php echo $lastnameerr; ?></label><br/> <br/>
	                &nbsp;<input id="loginbutton" type="submit" value="DISPLAY->"/>
	                
	                <h1 id="details" >Details of the Employee..</h1><br/>
	                <h2 id="h2">Full Name</h2><br/>
	                <hr id="hr"/>
	                &nbsp;<label id="fulllabel" class="errorlabels">Full Name-<?php echo $fullname; ?></label><br/>
	                &nbsp;<input id="firstnew" type="text" name="firstnamenew" placeholder="firstname" size="30"  style="display:none;" onblur="fullnamevalid(this)"/> 
	                &nbsp;<input id="lastnew" type="text" name="lastnamenew" placeholder="lastname" size="30" style="display:none;" onblur="fullnamevalid(this)"/><br/><br/>
	                 
	                
	                <h2 id="h2">Login Details</h2><br/>
	                <hr id="hr"/>
	                &nbsp;<label id="userlabel" class="errorlabels">Username-<?php echo $username; ?></label><br/>
	                &nbsp;<input id="usernew" type="text" name="usernamenew" placeholder="username" size="30"style="display:none;" onblur="myaccnamevalid(this)"/><br/> 
	                

	                &nbsp;<label id="passlabel" class="errorlabels">Password-<?php echo $password; ?></label><br/>
	                &nbsp;<input id="passnew" type="text" name="passwordnew" placeholder="password" size="30"style="display:none;" onblur="mypasswordvalid(this)"/><br/>
	                

	                &nbsp;<label id="typelabel" class="errorlabels">Type-<?php echo $typeid; ?></label><br/>
	                <!-- &nbsp;<input id="typenew" type="text" name="typidnew" placeholder="id" size="30" style="display:none;" onblur="myphonevalid1(this)"/><br/><br/> 
	                 -->
	                 &nbsp; <select id="typenew" name="typidnew" style="display:none;" >
						                	<option value="0">Select</option>
	
								    </select><br/><br/>
	                
	                <h2 id="h2">Email &amp; Phone</h2><br/>
	                <hr id="hr"/>
	                &nbsp;<label id="emaillabel" class="errorlabels">Email-<?php echo $email; ?></label><br/>
	                &nbsp;<input id="emnew" type="text" name="emailnew" placeholder="Email" size="30"style="display:none;" onblur="myemailvalid(this)"/><br/> 
	                


	                &nbsp;<label id="phonelabel" class="errorlabels">Phone-<?php echo $phone; ?></label><br/>
	                &nbsp;<input id="phnew" type="text" name="phonenew" placeholder="Phone" size="30"style="display:none;" onblur="myphonevalid(this)"/><br/>
	                
	                &nbsp;<label id="paylabel" class="errorlabels">Pay-<?php echo $pay; ?></label><br/>
	                &nbsp;<input id="paynew" type="text" name="paynew" placeholder="pay" size="30"style="display:none;" onblur="myphonevalid3(this)"/><br/><br/>
	                
	                
	                <h2 id="h2">Personal Information</h2><br/>
	                <hr id="hr"/>
	                &nbsp;<label id="birthlabel" class="errorlabels">Birthdate-<?php echo $birthdate; ?></label><br/>
	                &nbsp;<input id="birnew" type="text" name="birthnew" placeholder="Birthdate" size="30"style="display:none;"/><br/> 
	                


	                &nbsp;<label id="genderlabel" class="errorlabels">Gender-<?php echo $gender; ?></label><br/>
	                &nbsp;<input id="gennew" type="text" name="gendernew" placeholder="Gender" size="30"style="display:none;"/><br/> 
	                

	                &nbsp;<label id="agelabel" class="errorlabels">Age-<?php echo $age; ?></label><br/>
	                &nbsp;<input id="agnew" type="text" name="agenew" placeholder="Age" size="30"style="display:none;" onblur="myphonevalid2(this)"/><br/>

	                <!-- &nbsp;<label id="paylabel" class="errorlabels">Pay-<?php echo $pay; ?></label><br/>
	                &nbsp;<input id="paynew" type="text" name="paynew" placeholder="pay" size="30"style="display:none;" onblur="myphonevalid3(this)"/><br/><br/>
	                 -->
	                
	                <h2 id="h2">Address</h2><br/>
	                <hr id="hr"/>
	                &nbsp;<label id="addresslabel" class="errorlabels">Address-<?php echo $address; ?></label><br/>
	                &nbsp;<input id="addnew" type="text" name="addressnew" placeholder="address" size="30" style="display:none;" onblur="myaddressvalid(this)"/><br/>
	                &nbsp;<input id="loginbutton" type="button" value="EDIT->" onclick="displayedit()"/>
	                &nbsp;<input id="loginbutton" type="submit" value="SAVE->"/>
			    </form>
			</div>
			
		</div>
		 

     <script type="text/javascript" src="nihal_ad_script.js"></script>
	</body>
</html>
