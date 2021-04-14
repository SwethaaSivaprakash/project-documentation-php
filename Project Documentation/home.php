<!DOCTYPE html>
<html lang="en">
<head>
  <title>Project documentation</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
  .header {
 
  background-color: #000066;
  padding: 10px;
  text-align: center;
  font-size: 25px;
  color: white;
}
    /* Remove the navbar's default margin-bottom and rounded borders */ 
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }
    
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 550px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      padding-top: 50px;
      background-color: #f1f1f1;
      height: 100%;
    }
    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: powderblue;
      padding: 15px;
    }
    
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: 500;
        padding: 15px;
      }
      .row.content {height:500;} 
    }
  </style>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
       </div>
   <div class="header" id="myHeader">
  <img src="https://tcenet.tce.edu/logo.png" align="left"></img>
  <h3><i>THIAGARAJAR COLLEGE OF ENGINEERING</I></H3>
  <h6><i> <sub>~where quality and ethics matter</sub></i></h6>
  <h4 align="center"><i>PROJECT DOCUMENTATION</i></h2>
</div>
  </div>
</nav>
  
<div class="container-fluid text-center">    
  <div class="row content">
    <div class="col-sm-2 sidenav"><p>
      <a href="login.php"><h1>STUDENT</h1></a></p><p>
  
  <a href="admin.php"><h1>FACULTY</a></h1></p>
</div>
    <div class="col-sm-8 text-left"> 
      <br><br><br><h1 align="center">Welcome</h1><br>
      <p align="center">A portal designed for the beneficiary for students and faculties to retireve the projects done.
      </p>
      <hr>
      
    </div>
    </div>

<footer class="container-fluid text-center">
  <p>Footer Text</p>
</footer>

</body>
</html>
