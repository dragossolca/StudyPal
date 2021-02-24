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

<?php


	$errors = "";
	$db = mysqli_connect('localhost','root','','todo');
	
	if(isset($_POST['submit'])){
		$task = $_POST['task'];
		if(empty($task)){
			$errors = "You must fill in the task";
		} else{
		
		mysqli_query($db,"INSERT INTO tasks (task) VALUES ('$task')");
		header('location: todolist.php');
		}
		
	}
	
	if(isset($_GET['del_task'])) {
		$id = $_GET['del_task'];
		mysqli_query($db, "DELETE FROM tasks WHERE id=$id");
		header('location: todolist.php');
	}
	$tasks = mysqli_query($db, "SELECT * FROM tasks");
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
					<p> <a href="todolist.php?logout='1'" style="color: red; font-size: 18px;">logout</a> </p>
				<?php endif ?>
	    		
			</div>
			
				
		</div>
	</div>
</div>

	
	<form method = "POST"action="todolist.php">
	<?php if(isset($errors)) { ?>
		<p><?php echo $errors; ?></p>
	<?php } ?>
		<input type="text" name="task" class="task_input">
		
		<button type = "submit" class = "btn btn-primary" name = "submit">Add Task</button>
		
	</form>

	<table>
		<thead>
			<tr>
				<th>Nr</th>
				<th>Task</th>
				<th>Action</th>
			
			</tr>
		
		
		</thead>
		
		<tbody>
		<?php $i=1; while ($row = mysqli_fetch_array($tasks)){ $i  ?>
			<tr>
				<td><?php echo $i; ?></td>
				<td class="task"><?php echo $row['task'];  ?></td>
				<td class="delete">
					<a href="todolist.php?del_task=<?php echo $row['id']; ?>">x</a>
				</td>
				
			</tr>
		<?php $i++; } ?>
		
		
		</tbody>
	
	
	</table>




  	

		
</body>
</html>

