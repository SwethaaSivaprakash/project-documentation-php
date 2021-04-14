<?php

	session_start();
	
	if(!isset($_SESSION['username'])){
		header("Location: login.php");
	}

	error_reporting(0);
	
	include("connection.php");

?>

<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<title>Project Documentation</title>
	
	<?php include("css.php"); ?>
	<?php include("js.php"); ?>

</head>
<body style="background-color:powderblue;">
	
	
	<nav class="navbar fixed-top navbar-expand-md navbar-dark bg-primary mb-3">
    
<br>
<table>
	<tr><td>
	<div class="navbar-collapse collapse" id="collapsingNavbar">
        <class="navbar-nav">
        	<br>
             <class="nav-item active">
                <a class="nav-link" href="home.php" style="color:white;">Home <span class="sr-only"></span></a>
                    
    </div>
</td>
<td>
    <div class="navbar-collapse collapse" id="collapsingNavbar">
        <class="navbar-nav">
   		<br>
   		<class="nav-item active">
        <class="<?php if($_GET['page']==1){ echo 'active'; } ?>"><a href="?page=1" style="color:white;">Upload</a></li>
    

</div>	
</td>
<td>		
				<div class="navbar-collapse collapse" id="collapsingNavbar">
        <class="navbar-nav">
        	<br>
        	<class="nav-item active">
                <class="<?php if($_GET['page']==2){ echo 'active'; } ?>"><a href="?page=2" style="color:white;">Profile Settings</a></li>
                <br>
            
    </div>
</td>
<td>
    <div><br>

                <class="navbar-right"><a href="logout.php" style="color:white;">Log Out</a>
    </div>
</td>
</tr>
</table>
    </div>
	</nav>
	
 
		
		<?php 
		
			switch($_GET['page']){
				
				case 1: include("upload.php");break;
				case 2: include("pr_settings.php");break;
			} 
			
		?>
		
</body>
</html>