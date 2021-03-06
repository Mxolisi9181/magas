<?php 

  session_start(); 

  require('php/includes/connect.db.php');
  $sql = "SELECT * FROM doctor";

  $conn = new Database_Connection();
	$connection_link = $conn->connect();

?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
<link href="css/bootstrap/bootstrap.css" rel="stylesheet" type="text/css" media="screen">
<link href="css/bootstrap/bootstrap4.css" rel="stylesheet" type="text/css" media="screen">
<link href="css/bootstrap/bootstrap-grid.css" rel="stylesheet" type="text/css" media="screen">
<link rel="stylesheet" type="text/css" href="css/index.css" media="screen">
<link href="css/bootstrap/bootstrap-reboot.css" rel="stylesheet" type="text/css" media="screen">
<script src="js/functions.js" type="text/javascript"></script>
<script type="text/javascript">
	function clearForm(){
		document.getElementById('pdate').innerHTML = " ";
		document.getElementById('pname').innerHTML = " ";
		document.getElementById('psurname').innerHTML = " ";
		document.getElementById('pdoc').innerHTML = " ";
	}
</script>
</head>
<body>
	<div class="container">
		<nav class="navbar navbar-expand-lg navbar-light bg-danger">
			<p style="margin-top: 7px, margin-top7px;" class="text-right"><?php 
	//echo $_SESSION['user'];
 ?></p>
  <a class="navbar-brand" href="#">Menu</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Doctors</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="appointment.php">View Appointments</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Action
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <li class="nav-item">
        <form nethod="post" action="logout.php">
        	<button class="btn btn-dark" type="submit">Logout</button>
        </form>
      </li>
    </ul>
  </div>
</nav>
 <div class="panel">
 	<div class="panel-heading btn-danger">
 		<h1 id="header-text">Create Appointment</h1>
 	</div>
 	<div class="panel-body">
 		<form method="post" action="createApp.php">
 			 <div class="form-group">
                <label for="pdate">Date</label>
                   <input type="date" required id="pdate" name="pdate" autofocus="true" class="form-control"/>
             </div>
             <div class="form-group">
                <label for="pname">Patient Name</label>
                   <input type="text" required id="pname" name="pname" autofocus="true" class="form-control"/>
             </div>
             <div class="form-group">
                <label for="psurname">Patient Surname</label>
                   <input type="text" id="psurname" required name="psurname" autofocus="true" class="form-control"/>
             </div>
             <div class="form-group">
                <label for="pdoc">Doctor</label>
                   <select class="form-control" id="exampleSelect1">
                   <option selected>Select a doctor....</option>
                     <?php
                        $result = $connection_link->query($sql);
                      
                      while($row = mysqli_fetch_assoc($result)){ ?>
                        <option class="option"><?php
                          echo $row['doc_name'] . " ".$row['doc_surname'];
                        ?></option>
                      
                      <?php }
                      $connection_link->close();
                     ?>
                   </select>
             </div>
             <div class="form-group">
                <button class="btn btn-danger col-md-12" type="submit">Create Appointment</button>
            </div>
 		</form>
 	</div>
 </div>
</div>
</body>
</html>