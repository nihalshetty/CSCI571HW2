<?php ob_start();session_start(); ?>

<!DOCTYPE html>

<html>
	<head>
			<title>
				homework2.com
			</title>
			<link rel="stylesheet" type="text/css" href="nihal_login_support.css"/>	
	</head>
	<body>
    
    <?php
         
         $username= $password="";
		 $usernameerr=$passworderr="";

		 if( $_SERVER["REQUEST_METHOD"]== "POST")
		  {


		     if(empty($_POST["username"]))
		      {
		         $usernameerr="Username is invalid.";
		      }
		     else
		      {
		         $username= test_input($_POST["username"]);
		      } 

		     if(empty($_POST["password"]))
		      {
		         $passworderr="Password is invalid.";
		      }
		     else
		      {

		         $password= test_input($_POST["password"]);
		      } 
		        


		       

									$con=mysqli_connect("localhost","root","lionelm10","restaurant");
									
									// Check connection
									if (mysqli_connect_errno()) 
									{

									  echo "Failed to connect to MySQL: " . mysqli_connect_error();
									}

									$username = mysqli_real_escape_string($con,$username);
									$password = mysqli_real_escape_string($con,$password);


									$result = mysqli_query($con,"SELECT * FROM Employee WHERE Username='$username' AND PASSWORD='$password';");

									if($row = mysqli_fetch_array($result))
									 {

										$_SESSION['Username']= $row['Username'];
										$_SESSION['Firstname']= $row['Firstname'];
										$_SESSION['Lastname']= $row['Lastname'];
						                $_SESSION['Type_id'] = $row['Type_id'];
						                $_SESSION['Time']= time()+ 120;

									  // echo $row['Firstname'] . " " . $row['Lastname'];
									  // echo "<br>";

						                if($row['Type_id']== 1)
						                {header('Location: admin.php');
						                }
						                else if($row['Type_id']==2)
						                {header('Location: manager.php');
						                }
						                else if($row['Type_id']==3)
						                {header('Location: employee.php');
						                }
									 }
									else
									 {
										$usernameerr="Username is invalid.";
										$passworderr="Password is invalid.";
										
									 }

					mysqli_close($con);
		  }

		       



		 function test_input($data) 
		  {
		      $data = trim($data);
		      $data = stripslashes($data);
			  $data = htmlspecialchars($data);
			  return $data;
		  }
           
    ?>

		<div id="container">
			<div id="logo">
				<img src="logofinal1.png" alt="bigbanglogo" width="500" height="100" style="margin-left:5px;" />

			</div>
			<div id="login" class="transparent" height="150px">
				<form name="logininfo" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
					
					<h1 id="enter"> Enter Your Login Details...</h1>
					<hr/>
					&nbsp;Username<br/>&nbsp;<input type="text" name="username" placeholder="Username" size="30" onblur=" myaccnamevalid(this)"/>
					&nbsp;<label id="userlabel" class="errorlabels"><?php echo $usernameerr; ?></label> <br/> <br/>
					&nbsp;Password<br/>&nbsp;<input type="password" name="password" placeholder="Password" size="30" onlbur="mypasswordvalid(this)"/> 
	                &nbsp;<label id="passlabel" class="errorlabels"><?php echo $passworderr; ?></label><br/> <br/>
	                &nbsp;<input id="loginbutton" type="submit" value="Click Here->"/>
  

				</form>
			</div>
			<div id="extraimages" class="transparent"> 
          <br/> 
          </div>
          <div id="overextraimages">
          &nbsp;&nbsp;&nbsp;<img src="2.jpg" alt="bigbanglogo" width="225" height="100" style="margin-left:5px;opacity:1;border:3px solid white;border-radius:4px;" /><br/><br/>
		  &nbsp;&nbsp;&nbsp;<img src="1.jpg" alt="bigbanglogo" width="225" height="100" style="margin-left:5px;opacity:1;border:3px solid white; border-radius:4px; " /><br/><br/>
		  &nbsp;&nbsp;&nbsp;<img src="3.jpg" alt="bigbanglogo" width="225" height="100" style="margin-left:5px;opacity:1;border:3px solid white; border-radius:4px; " /><br/><br/>
		  &nbsp;&nbsp;&nbsp;<img src="5.jpg" alt="bigbanglogo" width="225" height="100" style="margin-left:5px;opacity:1;border:3px solid white; border-radius:4px; " />
		        </div>
		</div>
	    <div id="footer"  >
          	Private Policy. Copy Right &copy; 2014, 13 Restaurant &amp; Lounge Bar. All Rights Reserved.
        </div>



     <script>

function myaccnamevalid(x)
{

  var val = x.value.trim();
  var check=/[^a-zA-z 0-9]/;
  var check1=/^[^a-zA-z]/;
  var check2 = /[0-9]/;
   
   if(val.match(check))
   {  
       //checking for special character
       document.getElementById("userlabel").style.visibility= "visible";
       document.getElementById("userlabel").innerHTML= "    Invalid: Use Alpha-Numeric.";
       //document.getElementById("userlabel").style.display= "block";

   }
   else if (val.match(check1))
   {
      
       //checking for first digit to be aplhabet
       document.getElementById("userlabel").style.visibility= "visible";
       document.getElementById("userlabel").innerHTML= "   Invalid: Use Alpha-Numeric.";
       //document.getElementById("userlabel").style.display= "block";

   }
   else if(!(val))
   {     
        //checking whether the field is empty
        document.getElementById("userlabel").style.visibility= "visible";
        document.getElementById("userlabel").innerHTML= "    Field cannot be blank";
        //document.getElementById("userlabel").style.display= "block";

   }
   else if( (val.length < 0) && (val.length) >9 )
   {
        document.getElementById("userlabel").style.visibility= "visible";
        document.getElementById("userlabel").innerHTML= "    Invalid:length should be (0-9).";
        // document.getElementById("userlabel").style.display= "block";  
   }
   else if(val.match(check2))
   {    
        document.getElementById("userlabel").style.display= "none";


   }
   else
   {
       document.getElementById("userlabel").style.visibility= "visible";
       document.getElementById("userlabel").innerHTML= "    Invalid: Use Alpha-Numeric.";
      // document.getElementById("userlabel").style.display= "block";
   }
  

  
}

function mypasswordvalid(x)
{

    var val= x.value.trim(); 
    var passw=  /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20}$/;
   
       if(!(val))
        {     
             //checking whether the field is empty
             document.getElementById("passlabel").style.visibility= "visible";
             document.getElementById("passlabel").innerHTML= "    Field cannot be blank";
             // document.getElementById("passlabel").style.display= "block";      
        }
       else if( (val.length < 0) && (val.length) >7 )
       {
             document.getElementById("passlabel").style.visibility= "visible";
             document.getElementById("passlabel").innerHTML= "    Invalid:length should be (0-7 ).";
          	 // document.getElementById("passlabel").style.display= "block";  
       }
      else if(val.match(passw))
       {
             //checking for password
             document.getElementById("passlabel").style.display= "none";

       }
      else
       {
             document.getElementById("passlabel").style.visibility= "visible";
             document.getElementById("passlabel").innerHTML= "    Invalid: Use Alpha-Numeric & one Spcl Char,Upper & Lower case Letter";
             //document.getElementById("passlabel").style.display= "block";
       }             
    

}

     </script>
	</body>
</html>