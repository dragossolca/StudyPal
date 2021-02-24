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
					<p> <a href="library.php?logout='1'" style="color: red; font-size: 18px;">logout</a> </p>
				<?php endif ?>
	    		
			</div>
			
				
		</div>
	</div>
</div>

<br />
<form method="POST" enctype="multipart/form-data" action="upload.php">
 <input type="file" name="file">
 <input type="submit" value="Upload">
</form>
<br />

<p style="color: #134493; font-size: 20px; font-weight: bold;">List of available documents:</p>	







  	

		
</body>
</html>
<?php



$files = scandir("uploads");
for ($a = 2; $a < count($files); $a++) {
 
 ?>
 <p>
        <a downloads="<?php echo $files[$a] ?>" href="uploads/<?php echo $files[$a] ?>"><?php echo $files[$a] ?></a>
    </p>
 <?php
}