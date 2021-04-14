<?php 
	
	error_reporting(0);

	session_start();
	
	include("connection.php");
	
	$userid_st = 0;
	$password_st = 0;
	
	if(isset($_POST['logged'])==1){
		$password = mysqli_real_escape_string($dbc, $_POST['password']);
		
		$q1 = "SELECT * FROM users WHERE id='$_POST[userid]'";
		$q2 = "SELECT * FROM users WHERE id='$_POST[userid]' AND pwd=SHA1('$password')";
				
		if(mysqli_num_rows(mysqli_query($dbc, $q1))==1){
			$userid_st = 1;
			if(mysqli_num_rows(mysqli_query($dbc, $q2))==1){
				$password_st = 1;
				$_SESSION['username'] = $_POST['userid'];
				header("Location: index.php");
			}
			else{
				$password_st = -1;
			}
		}
		else{
			$userid_st = -1;
			$password_st = -1;
		}
	}
	 
?>

<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=0.5, maximum-scale=0.5, user-scalable=no">
    

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300" rel="stylesheet">

    <!-- simple captcha style -->
    <link rel="stylesheet" href="captcha.css"> 

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	
	<title>LogIn </title>
	
	<?php include("css.php"); ?>
	<?php include("js.php"); ?>
	

</head>
<body style="background-color:powderblue;">
	
	<nav class="navbar navbar-default navbar-static-top">
		<div class="container">
			



		</div>
	</nav>
	
	<div class="container">
		<div class="row">
			<div class="col-md-3">

				<legend class="form-heading">LogIn</legend>
				<br />

				<form action="" method="post">
	        		<div class="form-group<?php if($userid_st==1){echo " has-success has-feedback";}elseif($userid_st==-1){echo " has-error has-feedback";} ?>" style="border: 3px solid black;">
	          			<input type="text" id="userid" name="userid" class="form-control" placeholder="UserID" required>
					    <?php if($userid_st==1){ ?>
					    	<span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>
					    <?php }elseif($userid_st==-1){ ?>
					    	<span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
					    <?php } ?>
	        		</div>
	        		<br />
	        		<div class="form-group<?php if($password_st==1){echo " has-success has-feedback";}elseif($password_st==-1){echo " has-error has-feedback";} ?>" style="border: 3px solid black;">
	          			<input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
					    <?php if($password_st==1){ ?>
					    	<span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>
					    <?php }elseif($password_st==-1){ ?>
					    	<span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
					    <?php } ?>
	        		</div>
	        		<br />
	        		<div class="form-group">
	        			<div id="captcha">
            <div class="form-group">
                <label for="pwd">Captcha:</label>

                <!-- input captcha -->
                <div class="captcha-code">
                    <div class="code">
                        <div class="dynamic-code"></div>
                    </div>
                    <div class="captcha-reload">
                        <i class="ion-ios-loop-strong"></i>
                    </div>
                </div>
                <div class="captcha-input" >
                    <input type="text" class="form-control" id="captcha-input"  required autocomplete="off"  placeholder="Enter captcha code ...">
                    <span id="errCaptcha"></span>
                </div>

            </div></div>
              <script src="captcha.js">
	
</script>
	        		</div>
	        		<table>
	        			<tr>
	        				<td>
	        		<div class="form-group">
	        			<input type="submit" class="btn btn-primary" name="logged" value="Log In"></input>
	        		</div>
	        	</td>
	        	<td >

	        		<div class="form-group" ><right>

	        			
	        			<a href="newuser.php" class="btn btn-primary">new user</a>
	        		</div></right>
	        	
	        </td>
	       
	        </tr>
	        

	    </table>
	      		</form>
				
			
</body>
</html>