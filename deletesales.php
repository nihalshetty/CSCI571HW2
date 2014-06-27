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
				deletesales.com
			</title>
			<link rel="stylesheet" type="text/css" href="nihal_emp_support.css"/>	
	</head>
	<body >
			 
    	<?php
      				 
      		  $confirmerr= $itemnameerr ="";
		      $confirm= $itemname=$startdate=$enddate="";
				      
                     
			  if( $_SERVER["REQUEST_METHOD"]== "POST")
			   {
				           

				  if(empty($_POST["itemname"]))
				   {
				          $itemnameerr="Item Name is required.";
				   }
				  else
				   {
				          $itemname= test_input($_POST["itemname"]);

				          // validation
				       	  if (!preg_match("/^[a-zA-Z ]*$/",$itemname))
				           {
 							 	  $itemnameerr = "Only letters and white space allowed"; 
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
				       	  if(!preg_match("/^[a-zA-Z ]*$/",$confirm))
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


		 	 $itemname = mysqli_real_escape_string($con,$itemname);
		 	 $confirm = mysqli_real_escape_string($con,$confirm);
		  
		 	 //query                  
		 	 $result = mysqli_query($con,"SELECT * FROM Sales WHERE Food_id='$itemname'");
		                      
		                        

		  	 while($row = mysqli_fetch_array($result)) 
		     {
		           
			 	  $itemname= $row['Food_name'];
			  	  $startdate = $row['Startdate'];
				  $enddate = $row['Enddate'];
								      
	    	 }

         	 if('YES' === $confirm)
		      {
                  mysqli_query($con,"DELETE FROM Sales WHERE Food_name='$itemname'");
		      }
                             

		 	  mysqli_close($con);

   	    ?>



    	<div id="container">

			<div id="top3" class="transparent" height="150px">

				<form name="logininfo" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">

					<h1 id="welcome" >Enter the Existing item you want to change..</h1><br/>
					<hr/>
					&nbsp;Item Name<br/>&nbsp;<input type="text" name="itemname" placeholder="Item Name" value="<?php echo $itemname; ?>" size="30" onblur="myitemnamevalid(this)"/> 
	                &nbsp;<label id="itemlabel" class="errorlabels"><?php echo $itemnameerr; ?></label><br/> <br/>
	                &nbsp;<input id="loginbutton" type="submit" value="DISPLAY->"/>
	                
	                <h1 id="details" >Details of the Item..</h1><br/>
	                <h2 id="h2">Item Name &amp; Description</h2><br/>
	                <hr id="hr"/>
	               
	                &nbsp;<label id="fulllabel" class="errorlabels">Item Name-<?php echo $itemname; ?></label><br/>
	                &nbsp;<input id="itemnew" type="text" name="itemnamenew" placeholder="Item Name" size="30"  style="display:none;"/><br/>
	                
	                &nbsp;<label id="startlabel" class="errorlabels">Start Date-<?php echo $startdate; ?></label><br/>
	                &nbsp;<input id="startnew" type="text" name="startdatenew" placeholder="Sart Date" size="30"style="display:none;"/><br/>
	                
	                &nbsp;<label id="endlabel" class="errorlabels">End Date-<?php echo $enddate; ?></label><br/>
	                &nbsp;<input id="endnew" type="text" name="enddatenew" placeholder="End Date" size="30"style="display:none;"/>
	               

	              
	                &nbsp;<input id="confirmdel" type="text" name="confirmdelete" placeholder="YES or NO AND PRESS CONFIRM" size="30" style="display:none;" onblur="myconfirmvalid(this)"/><br/>
	                &nbsp;<label id="confirmlabel" class="errorlabels"><?php echo $confirmerr; ?></label><br/>
	                &nbsp;<input id="loginbutton" type="button" value="DELETE->" onclick="displayedit1()"/>
	                &nbsp;<input id="loginbutton" type="submit" value="CONFIRM->"/>
			    </form>
			    
			</div>
			
		</div>
		 

 <script type="text/javascript" src="nihal_emp_script.js"></script>
	</body>
</html>
