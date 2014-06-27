<?php ob_start();session_start(); ?>

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
				deleteuser.com
			</title>
			<link rel="stylesheet" type="text/css" href="nihal_admin_support.css"/>	
	</head>
	<body>


			
    	<?php
      		  
      		  $confirmerr= $firstnameerr = $$lastnameerr="";
			  $confirm= $username=$password=$fullname="";
			  $typeid=$email=$phone=$birthdate=$gender=$age=$address=$pay="";
				      
                       

			  if( $_SERVER["REQUEST_METHOD"]== "POST")
			   {
				          
				     if(empty($_POST["firstname"]))
				      {
				           	 $firstnameerr="Firstname is required.";
				      }
				     else{

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

				     if(empty($_POST["confirmdelete"]))
				      {

				           	 //$confirmerr="Confirmation is required.";
				      }
				     else
				      {
				              $confirm= test_input($_POST["confirmdelete"]);

				              // validation
				              if (!preg_match("/^[a-zA-Z ]*$/",$confirm))
				        	   {
 							 			$confirmerr = "Only letters and white space allowed"; 
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
		      $confirm = mysqli_real_escape_string($con,$confirm);

		      //query
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

							
			  if('YES' === $confirm)
			   {
                      mysqli_query($con,"DELETE FROM Employee WHERE Firstname='$firstname' AND Lastname='$lastname'");
			   }

			  mysqli_close($con);

   		 ?>
    	<div id="container">

			<div id="top3" class="transparent" height="150px">

				<form name="logininfo" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">

					<h1 id="welcome" >Enter the Existing Employees name..</h1><br/>
					<hr/>
					
					&nbsp;First Name<br/>&nbsp;<input type="text" name="firstname" placeholder="firstname" value="<?php echo $firstname; ?>" size="30" onblur="myfirstnamevalid(this)"/> 
	                &nbsp;<label id="firstlabel" class="errorlabels"><?php echo $firstnameerr; ?></label><br/> <br/>
	                
	                &nbsp;Last Name<br/>&nbsp;<input type="text" name="lastname" placeholder="lastname" value="<?php echo $lastname; ?>" size="30" onblur="mylastnamevalid(this)"/> 
	                &nbsp;<label id="lastlabel" class="errorlabels"><?php echo $lastnameerr; ?></label><br/> <br/>
	                &nbsp;<input id="loginbutton" type="submit" value="DISPLAY->"/>
	                
	               
	                <h1 id="details" >Details of the Employee..</h1><br/>
	                <h2 id="h2">Full Name</h2><br/>
	                <hr id="hr"/>
	                &nbsp;<label id="fulllabel" class="errorlabels">Full Name-<?php echo $fullname; ?></label><br/><br/>

	               
	                <h2 id="h2">Login Details</h2><br/>
	                <hr id="hr"/>
	                &nbsp;<label id="userlabel" class="errorlabels">Username-<?php echo $username; ?></label><br/><br/>
	                &nbsp;<label id="passwordlabel" class="errorlabels">Password-<?php echo $password; ?></label><br/><br/>
	                &nbsp;<label id="typelabel" class="errorlabels">Type-<?php echo $typeid; ?></label><br/> <br/><br/>
	               
	               

	                <h2 id="h2">Email & Phone</h2><br/>
	                <hr id="hr"/>
	                &nbsp;<label id="emaillabel" class="errorlabels">Email-<?php echo $email; ?></label><br/><br/>
	                &nbsp;<label id="phonelabel" class="errorlabels">Phone-<?php echo $phone; ?></label><br/><br/>
	                &nbsp;<label id="paylabel" class="errorlabels">Pay-<?php echo $pay; ?></label><br/><br/><br/>
	                
	                
	                <h2 id="h2">Personal Information</h2><br/>
	                <hr id="hr"/>
	                &nbsp;<label id="birthlabel" class="errorlabels">Birthdate-<?php echo $birhtdate; ?></label><br/><br/>
	                &nbsp;<label id="genderlabel" class="errorlabels">Gender-<?php echo $gender; ?></label><br/><br/>
	                &nbsp;<label id="agelabel" class="errorlabels">Age-<?php echo $age; ?></label><br/> <br/><br/>
	                
	                
	                <h2 id="h2">Address</h2><br/>
	                <hr id="hr"/>
	                &nbsp;<label id="addresslabel" class="errorlabels">Address-<?php echo $address; ?></label>
	                &nbsp;<input id="confirmdel" type="text" name="confirmdelete" placeholder="YES or NO AND PRESS CONFIRM" size="30" style="display:none;" onblur="myconfirmvalid(this)"/><br/>
	                &nbsp;<label id="confirmlabel" class="errorlabels"><?php echo $confirmerr; ?></label><br/>
	                &nbsp;<input id="loginbutton" type="button" value="DELETE->" onclick="displayedit1()"/>
	                &nbsp;<input id="loginbutton" type="submit" value="CONFIRM->"/>

			    </form>

			</div>
			
		</div>
		 

     <script type="text/javascript" src="nihal_ad_script.js"></script>
	</body>
</html>
