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
					<p> <a href="forum.php?logout='1'" style="color: red; font-size: 18px;">logout</a> </p>
				<?php endif ?>
	    		
			</div>
			
				
		</div>
	</div>
</div>

<form action="" method="POST">

   <div class="input-group">
   <label> Comment: <br>
    <textarea name="Comment" class="Input" style="width: 325px" required></textarea>
   </label>
   </div>
   <br><br> 
   <div class="input-group">
   <button type="submit" name="Submit"  class="btn btn-primary">Submit</button>
	</div>
  </form>





  	

		
</body>
</html>

<?php
 
 if(isset($_POST['Submit'])){
  

  $Name = $_SESSION['username'];
  $Comment = $_POST['Comment'];

  #Get old comments
  $old = fopen("comments.txt", "r+t");
  $old_comments = fread($old, 1024);

  #Delete everything, write down new and old comments
  $write = fopen("comments.txt", "w+");
  $string = "<b>".$Name."</b><br>".$Comment."<br>\n".$old_comments;
  fwrite($write, $string);
  fclose($write);
  fclose($old);
 }

 #Read comments
 $read = fopen("comments.txt", "r+t");
 echo "<br><br>Comments<hr>".fread($read, 1024);
 fclose($read);

?>
