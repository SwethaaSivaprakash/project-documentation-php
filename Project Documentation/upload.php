<div class="container">
	<div class="row">
		<div class="col-md-3">

			<h2 class="form-heading">Upload</h2>
			<br />    		

<?php
error_reporting(0);

	session_start();
	
	include("connection.php");
	
if (isset($_POST['uploaded'])==1) {
	
	$file = $_FILES['file'];

	$fileName = $_FILES['file']['name'];
	$fileTmpName = $_FILES['file']['tmp_name'];
	$fileSize = $_FILES['file']['size'];
	$fileError = $_FILES['file']['error'];
	$fileType = $_FILES['file']['type'];

	$fileExt = pathinfo($fileName, PATHINFO_EXTENSION);

	$allowed = array('pdf', 'txt', 'doc', 'docx', 'png', 'jpg', 'jpeg');

	if (in_array($fileExt, $allowed)) {
		if ($fileError === 0) {
			if ($fileSize < 104857601) {

				$q = "SELECT * FROM docs WHERE filename='$fileName'";

				if (mysqli_num_rows(mysqli_query($dbc, $q)) == 0) {

					$fileDestination = 'C:\\wamp\\www\\Project Documentation\\upload\\'.$fileName;
					move_uploaded_file($fileTmpName, $fileDestination);
				
					$created = @date('Y-m-d H:i:s');
					$description = mysqli_real_escape_string($dbc, $_POST['description']);
					
					$sql = "INSERT INTO docs (filename, created, branch, semester, uploader, description) VALUES ('$fileName', '$created', '$_POST[branch]', '$_POST[semester]', '$_SESSION[username]', '$description')";
            		mysqli_query($dbc, $sql);
				
					echo "<p class='alert alert-success'>File uploaded successfully</p><br>";
				}
				else{
					echo "<p class='alert alert-warning'>File already exixts. Check it out OR Change your filename and try again...</p><br>";
				}
			}
			else{
				echo "<p class='alert alert-warning'>File too large</p><br>";
			}
		}
		else{
			echo "<p class='alert alert-danger'>Error uploading file</p><br>";
		}
	}
	else{
		echo "<p class='alert alert-danger'>Invalid file type</p><br>";
	}
}

?>

    		<form action="" method="post" enctype="multipart/form-data">
				<div class="form-group">
				    <label for="file">Project Input* : </label>
				    <div class="input-group">
					    <span class="input-group-addon">
					    	<i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="Supported File Format: pdf, txt, doc, docx, png, jpg, jpeg" aria-hidden="true"></i>
					    </span>
					    <input type="file" class="btn btn-default" style="width: 225px" id="file" name="file" required>
					</div>
				</div>
				<div class="form-group">
					<label for="branch">Branch* : </label>
						<select class="form-control" id="branch" name="branch" required>
						  <option value="">Select Branch</option>
						  
						  <?php 
						  
						  	$q = "SELECT * FROM courses";
							$r = mysqli_query($dbc, $q);
							
						  	while($row = mysqli_fetch_array($r)){ 
						  
						  ?>			
						  
						  		<option value="<?php echo $row['code']; ?>"><?php echo $row['name']; ?></option>
						  
						  <?php } ?>
						
						</select>
				</div>
				<div class="form-group">
					<label for="semester">Semester* : </label>
					<select class="form-control" id="semester" name="semester" required>
					  <option value="">Select Sem</option>
						  
						  <?php for($i=1;$i<=9;$i++){ 
						  			if($i==7){
						  ?>			
						  
						  			<option value="7-Reference">7-Reference</option>
						  
						  <?php } elseif($i==8){ ?>
						  
						  			<option value="7-social">7-social</option>
						  <?php } elseif($i==9){ ?>
						  
						  			<option value="7-Intern">7-Intern</option>
						  
						  <?php } else{ ?>
						  
						  			<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
						  
						  <?php }} ?>
						
					</select>
				</div>
				<div class="form-group">
					<label for="description">Subject(Topic) / Description : </label>
					<textarea class="form-control" id="description" name="description" rows="3"></textarea>
				</div>
    			<input type="submit" class="btn btn-success" name="uploaded" value="Upload">
    		</form>
			
		</div>
		<div class="col-md-1">
		</div>		
		<div class="col-md-8">
			<h2 class="form-heading">My Uploads</h2>
			<br />
		            
					<?php

						if($_GET['id']){
							
						
							$q = "SELECT * FROM docs WHERE sl=".$_GET['id'];
							$r = mysqli_fetch_assoc(mysqli_query($dbc, $q));
							unlink("C:/wamp/www/Project Documentation/upload/".$r['filename']);

							$q = "DELETE FROM docs WHERE sl=".$_GET['id'];
							mysqli_query( $dbc,$q);							
			
						}
						?>
				
		            
		    <table class="table table-hover">
		        <tr>
		            <th class="likes"><i class="fa fa-thumbs-up" aria-hidden="true"></i></th>
		            <th>#</th>
		            <th>Filename</th>
		            <th>Created</th>
		            <th>Branch</th>
		            <th>Sem</th>
		            <th>Description</th>
		            <th>View</th>
		            <th>Delete</th>
		        </tr>
		        
		        <?php
		
				$q = "SELECT * FROM docs WHERE uploader='$_SESSION[username]' ORDER BY upvote DESC, created DESC";				
				$r = mysqli_query($dbc, $q);

		        $i = 1;
		        while($row = mysqli_fetch_array($r)) { ?>
		        <tr>
		            <td class="likes"><?php echo $row['upvote']; ?></td>
		            <td><?php echo $row['sl']; ?></td>
		            <td><?php echo $row['filename']; ?></td>
		            <td><?php echo $row['created']; ?></td>
		            <td><?php echo $row['branch']; ?></td>
		            <td><?php echo $row['semester']; ?></td>
		            <td><?php echo $row['description']; ?></td>
		            <td><a href="view_file.php?doc=<?php echo $row['filename']; ?>" target="_blank"><i class="fa fa-file" aria-hidden="true" download></i></a></td>
		            <td><a onClick=\"javascript: return confirm('Are you sure you want to delete this post?')\" 
		            	href='?del=$file_id'><i class='fa fa-times' style='color: red;'></i>delete</a></td>
		            <!--
		            <td><a href="" id="<?php echo $row['sl']; ?>" class="btn btn-default btn-delete" delete='true'><i class="fa fa-trash dislikes" aria-hidden="true" ></i></a></td>
		        -->
		        </tr>
		        <?php } ?>
		    
		    </table>
			
		</div>
	</div>
</div>

