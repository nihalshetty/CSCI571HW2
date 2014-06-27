<?php ob_start();session_start(); ?>

<!DOCTYPE html>

<?php

	if( !(isset($_SESSION['Type_id']) && $_SESSION['Type_id'] == 3) )
	{
	     header('Location: login.php');
	}
?>
<html>
	<head>
		<title>
			newfoodtype.com
		</title>
		<link rel="stylesheet" type="text/css" href="nihal_emp_support.css"/>	
	</head>
	<body>
    
    
    <?php
      
		      $itemtypename=$typedescription="";
		      $itemtypenameerr=$typedescerr="";
		      $count=1;
		      $flag=0;

		      if( $_SERVER["REQUEST_METHOD"]== "POST")
		       {
		          
		           if(empty($_POST["itemtypename"]))
		           {
		           	 	$itemtypenameerr="Item Type name is required.";
		           }
		           else
		           {

		            	 $itemtypename= test_input($_POST["itemtypename"]);
		            	 $count++;
		            	
		            	 // validation
				        if (!preg_match("/^[a-zA-Z ]*$/",$itemtypename))
				         {      
				        	  $count--;
 							  $itemtypenameerr = "Only letters and white space allowed"; 
						 }
		            } 


		           if(empty($_POST["typedescription"]))
		            {
		           	 	$typedescerr="Type Description is required.";
		            }
		           else
		            {

		            	 $typedescription= test_input($_POST["typedescription"]);
		            	 $count++;
		            	
		            	 // validation
				        if (!preg_match("/^[a-zA-Z ]*$/",$typedescription))
				         {		   
				         	      $count--;
 							 	  $typedescerr = "Only letters and white space allowed"; 
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


				if($count == 3)
				{
					$flag=1;
				}

				

	             $con=mysqli_connect("localhost","root","lionelm10","restaurant");
				
				 // Check connection
				 if (mysqli_connect_errno()) 
				 {
					  echo "Failed to connect to MySQL: " . mysqli_connect_error();
				 }
                    
				 //escape variables for security
				 $itemtypename = mysqli_real_escape_string($con,$itemtypename);
				 $typedescription = mysqli_real_escape_string($con,$typedescription);
					

			      if($flag == 1)
			       {               
					      $sql="INSERT INTO Food_type (Food_type_name, Food_description)
					            VALUES ('$itemtypename', '$typedescription')";

					      if (!mysqli_query($con,$sql))
					       {
					              die('Error: ' . mysqli_error($con));
					       }
			        }

					   mysqli_close($con);

    ?>


		<div id="container">
			<div id="top2" class="transparent" height="150px">
				<form name="logininfo" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
					
					<h1 id="enter"> Enter New Food Type Details...</h1>
					<hr/>
					
					&nbsp;Item Type Name<br/>&nbsp;<input type="text" name="itemtypename" placeholder="Item Type name" size="30" onblur="myitemtypenamevalid(this)"/>
					&nbsp;<label id="itemtypelabel" class="errorlabels"><?php echo $itemtypenameerr; ?></label> <br/> <br/>
					
					&nbsp;Item Type Description<br/>&nbsp;<input type="text" name="typedescription" placeholder="Type Desc" size="30" onblur="myitemtypedescvalid(this)"/> 
	                &nbsp;<label id="typdesclabel" class="errorlabels"><?php echo $typedescerr; ?></label><br/> <br/>
	               	            	         
	                &nbsp;<input id="loginbutton" type="submit" value="ADD->"/>
  

				</form>
			</div>
		</div>
	    


	 <script type="text/javascript" src="nihal_emp_script.js"></script>
	</body>
</html>