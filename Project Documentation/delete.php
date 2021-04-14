<?php
error_reporting(0);

	session_start();
	
	include("connection.php");
	
header("Location: " . $_SERVER["HTTP_REFERER"]);

if (isset($_GET['del'])) {
        $note_del = mysqli_real_escape_string($conn, $_GET['del']);
        $file_uploader = $_SESSION['username'];
        $del_query = "DELETE FROM uploads WHERE file_id='$note_del' AND file_uploader = '$file_uploader' ";
        $run_del_query = mysqli_query($conn, $del_query) or die (mysqli_error($conn));
        if (mysqli_affected_rows($conn) > 0) {
            echo "<script>alert('note deleted successfully');
            window.location.href='notes.php';</script>";
        }
        else {
         echo "<script>alert('error occured.try again!');</script>";   
        }
        }

?>


<!DOCTYPE html>
<html>
<head>
	<title>delete file</title>
</head>
<body>

</body>
</html>