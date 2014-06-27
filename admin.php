<?php ob_start();session_start(); ?>
<!DOCTYPE html>

<?php 
      $fullname= $_SESSION['Firstname']." ". $_SESSION['Lastname'];

	  if( !(isset($_SESSION['Type_id']) && $_SESSION['Type_id'] == 1) )
	   {
			header('Location: login.php');
	   }

?>

<html>
	<head>
			<title>
				admin.com
			</title>
			<link rel="stylesheet" type="text/css" href="nihal_admin_support.css"/>	
	</head>
	<body id="body" onclick="checktime()">

		<?php

		 if( $_SERVER["REQUEST_METHOD"]== "POST")
		  {

		 	 if(isset($_SESSION['Username']))
              {
                    unset($_SESSION['Username']);
                    unset($_SESSION['Firstname']);
                    unset($_SESSION['Lastname']);
                    unset($_SESSION['Type_id']);

              }

                   header('Location: login.php');
		       	  

		  }
		?>

    	<div id="container">
			<div id="logo">
				<img src="logofinal1.png" alt="bigbanglogo" width="500" height="100" style="margin-left:5px;" />
			</div>

			<div id="top1" class="transparent" height="150px">
				<h1 id="welcome" >Welcome <?php echo $fullname; ?></h1>
				<br/>&nbsp;<a href="newuser.php" target="idisplay" style="text-decoration:none;">Add a New Employee</a><br/>
				<br/>&nbsp;<a href="edituser.php" target="idisplay"style="text-decoration:none;" >Edit an Existing Employee</a><br/>
				<br/>&nbsp;<a href="deleteuser.php" target="idisplay" style="text-decoration:none;">Delete an Existing Employee</a><br/>
			</div>

			<div id="foriframe">
				<iframe src="" name="idisplay" class="transparent" seamless></iframe>
			</div>

			<div id="logout">
				<form name="admininfo" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
				 &nbsp;<input id="logoutbutton" type="submit" value="LOGOUT->" />
				</form>
			</div>

		</div>

		 <div id="quote" align="right">
		          <p id="firstline" style="font-size:30px"> "One cannot think sleep love well </p>
		          <p id="firstline"style="font-size:30px" >if one has not <span style="color:#FFFFFF;">dined</span>&nbsp;well"<br/>-Virginia Wolf</p>
		          <br/>
		          <br/>
	    </div>

		 <div id="footer"  >
          	Private Policy. Copy Right &copy; 2014, 13 Restaurant &amp; Lounge Bar. All Rights Reserved.
         </div>




	</body>
</html>


