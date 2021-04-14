<!DOCTYPE html>
<html>
<head>
	<title>Register </title>
	
	<?php include("css.php"); ?>
	<?php include("js.php"); ?>
</head>
<body 
style="background-color:powderblue;">
<nav class="navbar navbar-default navbar-static-top">
		<div class="container">
			



		</div>
	</nav>
	
<div class="col-md-4">
			</div>
			<div class="col-md-5">
				
				<legend class="form-heading">Create a new account</legend>
				<br />
				
				<?php include("signup1.php"); ?>
				
				<form method="post">
				  
				  <div class="form-group has-feedback" id="11" style="border: 3px solid black;">
				    <div class="input-group">
					    <span class="input-group-addon">
					    	<i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="Length: 5-10; Allowed Characters: a-z A-Z 0-9 ._@$%&" aria-hidden="true"></i>
					    </span>
					    <input type="text" class="form-control" name="id" id="id" placeholder="UserID" pattern="[a-zA-Z0-9.@$&_]{5,10}" onclick="removeClass('#11', '#21')" onblur="checkID()" required>
				    </div>
			    	<span class="glyphicon form-control-feedback" id="21" aria-hidden="true"></span>					    
				  </div>
				  <br />
				  <div class="row">
				  	<div class="col-md-6 form-group">
					    <div class="input-group" style="border: 3px solid black;">
						    <span class="input-group-addon">
						    	<i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="Length: 6-30" aria-hidden="true"></i>
						    </span>
					    	<input type="password" class="form-control" name="pwd" id="pwd" placeholder="Password" pattern=".{6,30}" required>
				    	</div>
				    </div>
				  	
				  	<div class="col-md-6">
				  		<div class="form-group has-feedback" id="12" style="border: 3px solid black;">
				    		<input type="password" class="form-control" name="re-pwd" id="re-pwd" placeholder="Re-enter Password" pattern=".{6,30}" onclick="removeClass('#12', '#22')" onblur="checkPassword()" required>
					    	<span class="glyphicon form-control-feedback" id="22" aria-hidden="true"></span>
				    	</div>
				    </div>
				  </div>
				  <br />
				  <div class="form-group has-feedback" id="13" style="border: 3px solid black;">
			    	<input type="email" class="form-control" name="email" id="email" placeholder="Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" onclick="removeClass('#13', '#23')" onblur="checkEmail()" required>
			    	<span class="glyphicon form-control-feedback" id="23" aria-hidden="true"></span>
				  </div>
				  <br />
				  <input type="submit" class="btn btn-success" name="submitted" onsubmit="return validate()" value="Create Account"></input>
				
				</form>
			
			</div>
		</div>
	</div>

</body>
</html>