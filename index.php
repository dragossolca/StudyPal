<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
  
  
?>


<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="bootstrap.css" />
</head>
<body>

<div class="footer">
	<div class="container">
		<div class="row">
			<div class="col-md-3 text-left">
				<img src="images/studypal.png" alt="" />
						
		    </div>
				
			<div class="col-md-6">
				<ul>
					<li><a href="index.php">HOME</a></li>
					<li><a href="library.php">LIBRARY</a></li>
					<li><a href="forum.php">FORUM</a></li>
					<li><a href="todolist.php">TO-DO LIST</a></li>
					
				</ul>
					
			</div>
			<div class="col-md-3 username">
				
	
				<?php  if (isset($_SESSION['username'])) : ?>
					<p style="color: white; font-size: 14px;">Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
					<p> <a href="index.php?logout='1'" style="color: red; font-size: 18px;">logout</a> </p>
				<?php endif ?>
	    		
			</div>
			
				
		</div>
	</div>
</div>
<div class="toggle"></div>	
<div class="section">
	<div id="MyClockDisplay">
	<script type="text/javascript">
		
		function showTime(){
			
			var date = new Date();
			var h = date.getHours();
			var m = date.getMinutes();
			var time = h + ":" + m;
			document.getElementById("MyClockDisplay").innerHTML = time;
			document.getElementById("MyClockDisplay").textContent = time;
			
			setTimeout(showTime, 200);
			
			
		}
		showTime();
	
	
	
	</script>
	</div>
	<h3 class="advice">Here's the current time! Remember, everyone needs some rest from time to time!</h3>
	


</div>





  	

		
</body>
</html>