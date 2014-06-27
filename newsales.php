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
			newsales.com
		</title>
		<link rel="stylesheet" type="text/css" href="nihal_emp_support.css"/>	
	</head>
	<body onload="updatesale()">
    
     
    <?php
      
		      $itemname=$startdate="";
		      $itemnameerr=$startdateerr=$enddateerr="";
		      $count=1;
		      $flag=0;
		     
		      if( $_SERVER["REQUEST_METHOD"]== "POST")
		      {
		          
		           if(empty($_POST["itemname"]))
		            {
		           	 	$itemnameerr="Item name is required.";
		            }
		           else
		            {

		            	 $itemname= test_input($_POST["itemname"]);
		            	 $count++;
		            	
					     if (!preg_match("/^[0-9]*$/",$itemname))
						  {

							  $itemnameerr="Item Name  is not valid.";
							  $count--;
						  }
						 else
						  {
							  $itemnameerr="";
						  }
		            } 


		          if(empty($_POST["startdate"]))
		           {
		           	 	$startdateerr="startdate is required.";
		           }
		           else
		           {

		            	$startdate= test_input($_POST["startdate"]);
		            	$count++;
		           } 

		              
		         if(empty($_POST["enddate"]))
		          {
		           	 	$enddateerr="Enddate is required.";
		          }
		         else
		          {

		             $enddate= test_input($_POST["enddate"]);
		             $count++;
		          }

		         
		         
		      }

		      
		      function test_input($data)
		       {
				  $data = trim($data);
				  $data = stripslashes($data);
				  $data = htmlspecialchars($data);
				  return $data;
			   }

				if($count == 4)
				{
					$flag=1;
				}

				
	            	 $con=mysqli_connect("localhost","root","lionelm10","restaurant");
				 
				 	// Check connection
				 	if (mysqli_connect_errno()) 
				 	{
					  echo "Failed to connect to MySQL: " . mysqli_connect_error();
					}
                    
					//escape variables for seurity
					$itemname = mysqli_real_escape_string($con,$itemname );
					$startdate = mysqli_real_escape_string($con,$startdate );
					$enddate = mysqli_real_escape_string($con,$enddate );
				      
				      if($flag == 1)
				      {                
							  
							  $sql="INSERT INTO Sales (Food_id, Startdate, Enddate)
							        VALUES ('$itemname', '$startdate','$enddate')";

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
					
					<h1 id="enter"> Enter New Items on Sales ...</h1>
					<hr/>
					
					<!-- &nbsp;Item Name<br/>&nbsp;<input type="text" name="itemname" placeholder="Item name" size="30" onblur="myitemnamevalid(this)"/> -->
					&nbsp;Item&nbsp;Name<br/>
					&nbsp;	 <select id="itemname" name="itemname">
						                	<option value="0">Select</option>
	
								    </select>
					&nbsp;<label id="itemlabel" class="errorlabels"><?php echo $itemnameerr; ?></label> <br/> <br/>
					
					&nbsp;Start Date<br/>&nbsp;<input type="text" name="startdate" placeholder="yyyy-mm-dd" size="30"/> 
	                &nbsp;<label id="startlabel" class="errorlabels"><?php echo $startdateerr; ?></label><br/> <br/>

	                &nbsp;End Date<br/>&nbsp;<input type="text" name="enddate" placeholder="yyyy-mm-dd" size="30"/> 
	                &nbsp;<label id="endlabel" class="errorlabels"><?php echo $enddateerr; ?></label><br/> <br/>
	               	            	         
	                &nbsp;<input id="loginbutton" type="submit" value="ADD->"/>
  

				</form>
			</div>
		</div>
	    


		 <script type="text/javascript" src="nihal_emp_script.js"></script>
	</body>
</html>