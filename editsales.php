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
				editsales.com
			</title>
			<link rel="stylesheet" type="text/css" href="nihal_emp_support.css"/>	
	</head>
	<body onload="existupdatesale()">
			 
    	<?php
      				 
      		  $itemnameerr ="";
			  $itemname=$startdate=$enddate="";
				     
		      $itemnamen=$startdaten=$enddaten="";
              $f1=$f2=$f3=0;

			 if( $_SERVER["REQUEST_METHOD"]== "POST")
			  {
				           
				 if(empty($_POST["itemname"]))
				  {
				     	 $itemnameerr="Item Name is required.";

				  }
				 else
				  {

				         $itemname= test_input($_POST["itemname"]);
				         $itemnamenn=$itemname;
				            	  
				         echo "<script>document.getElementById('".$itemnamenn."').value=". $itemname.";</script>";
				         				            				          
						 
						 if (!preg_match("/^[0-9]*$/",$itemname))
						  {

							     $itemnameerr="Item Name  is not valid.";
						  }
						 else
						  {
								 $itemnameerr="";
						  }
				   }


				               

				 if(empty($_POST["itemnamenew"]))
				  {
				           	 	
				         $itemnamen="";
				         $f1=0;
				                
				  }
				 else
				  {

				         $itemnamen= test_input($_POST["itemnamenew"]);
				         $f1=1;

				       

						 if (!preg_match("/^[0-9]*$/",$itemnamen))
						  {

							     $itemnamen="Item Name  is not valid.";
								 $f1=0;
						  }
						 else
						  {
								 $f1=1;
						  }
				  } 

				               
				 if(empty($_POST["startdatenew"]))
				  {
				          $startdaten="";
				          $f2=0;
				  }
				 else
				  {

				         $startdaten= test_input($_POST["startdatenew"]);
				         $f2=1;
				  }

				              
			     if(empty($_POST["enddatenew"]))
			      {
				         $enddaten="";
				         $f3=0;
		          }
				 else
				  {
				         $enddaten= test_input($_POST["enddatenew"]);
				         $f3=1;
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
			  $itemname = mysqli_real_escape_string($con,$itemname);


			 $result = mysqli_query($con,"SELECT Food.Food_name,Sales.Startdate,Sales.Enddate FROM Food INNER JOIN Sales ON Food.Food_id=Sales.Food_id WHERE Food.Food_id='$itemname'");
		                      
		                        

			 while($row = mysqli_fetch_array($result))
			  {
		           
					  $itemname= $row['Food_name'];
					  $startdate = $row['Startdate'];
					  $enddate = $row['Enddate'];
							      
			  }


                            // querries for updating the database
                            if($f1 == 1)
                             {  
                             	$itemnamen = mysqli_real_escape_string($con,$itemnamen);
                             	mysqli_query($con,"UPDATE Sales SET Food_id='$itemnamen' WHERE Food_id='$itemnamenn'");
                             }	

                             if($f2 == 1)
                             {  
                             	$startnamen = mysqli_real_escape_string($con,$startnamen);
                             	mysqli_query($con,"UPDATE Sales SET Startdate='$startdaten' WHERE Food_id='$itemnamenn'");
                             }

                              if($f3 == 1)
                             {  
                             	$enddaten = mysqli_real_escape_string($con,$enddaten);
                             	mysqli_query($con,"UPDATE Sales SET Enddate='$enddaten' WHERE Food_id='$itemnamenn'");
                             }

                             

				mysqli_close($con);

   		 ?>



    	<div id="container">

			<div id="top3" class="transparent" height="150px">

				<form name="logininfo" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">

					<h1 id="welcome" >Enter the Existing item you want to change..</h1><br/>
					<hr/>
					<!-- &nbsp;Item Name<br/>&nbsp;<input type="text" name="itemname" placeholder="Item Name" value="<?php echo $itemname; ?>" size="30" onblur="myitemnamevalid(this)" onkeyup="showHint(this.value)"/> -->
					&nbsp;Item&nbsp;Name<br/>
						       <select id="itemname" name="itemname">
						                	<option value="0">Select</option>
	
								    </select> 
	                &nbsp;<label id="itemlabel" class="errorlabels"><?php echo $itemnameerr; ?></label><br/> <br/>
	                &nbsp;<input id="loginbutton" type="submit" value="DISPLAY->"/>
	                
	                <h1 id="details" >Details of the Item..</h1><br/>
	                <h2 id="h2">Item Name &amp; Description</h2><br/>
	                <hr id="hr"/>
	               
	                &nbsp;<label id="fulllabel" class="errorlabels">Item Name-<?php echo $itemname; ?></label><br/>
	                <!-- &nbsp;<input id="itemnew" type="text" name="itemnamenew" placeholder="Item Name" size="30"  style="display:none;" onblur="myitemnamevalid1(this)"/><br/>
	                 -->
	                 &nbsp;<select id="itemnew" name="itemnamenew" style="display:none;">
						                	<option value="0">Select</option>
	
								    </select><br/>
	                &nbsp;<label id="startlabel" class="errorlabels">Start Date-<?php echo $startdate; ?></label><br/>
	                &nbsp;<input id="startnew" type="text" name="startdatenew" placeholder="Sart Date" size="30"style="display:none;"/><br/>
	                
	                &nbsp;<label id="endlabel" class="errorlabels">End Date-<?php echo $enddate; ?></label><br/>
	                &nbsp;<input id="endnew" type="text" name="enddatenew" placeholder="End Date" size="30"style="display:none;"/><br/> <br/> 
	               

	                &nbsp;<input id="loginbutton" type="button" value="EDIT->" onclick="displayedit3()"/>
	                &nbsp;<input id="loginbutton" type="submit" value="SAVE->"/>

			    </form>
			    
			</div>
			
		</div>
		 

     <script type="text/javascript" src="nihal_emp_script.js">
     
     </script>
	</body>
</html>
