<?php 
    // initialize errors variable
	$errors = "";

	// connect to database
	$db = mysqli_connect("localhost", "root", "", "todo");

	// insert a quote if submit button is clicked
	if (isset($_POST['submit'])) {
		if (empty($_POST['task'])) {
			$errors = "You must fill in the task";
		}else{
			$task = $_POST['task'];
			$sql = "INSERT INTO data (task) VALUES ('$task')";
			mysqli_query($db, $sql);
			header('location: index.php');
		}
	}	
  // delete task
if (isset($_GET['del_task'])) {
	$id = $_GET['del_task'];

	mysqli_query($db, "DELETE FROM data WHERE id=".$id);
	header('location: index.php');
}

//edit task
if (isset($_GET['edit_task'])) {
  $id = $_GET['edit_task'];
  $update = true;
  $record = mysqli_query($db, "SELECT * FROM data WHERE id=$id");

  if (count($record) == 1 ) {
    $n = mysqli_fetch_array($record);
    $tasks = $n['tasks'];
  }
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>ToDo List Application</title>
  <link rel="stylesheet" type="text/css" href="index.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
	<div class="heading">
		<h2 style="font-style: 'Hervetica';">My ToDo List</h2>
	</div>
	<form method="post" action="index.php" class="input_form">
  <?php if (isset($errors)) { ?>
	<p><?php echo $errors; ?></p>
<?php } ?>
		<input type="text" name="task" class="task_input">
		<button type="submit" name="submit" class="btn btn-outline-secondary">Add Task</button>

	</form>
  <table>
	<thead>
		<tr>
			<th>S.No.</th>
			<th>Tasks</th>
			<th>Action</th>
		</tr>
	</thead>

	<tbody>
		<?php 
		// select all tasks if page is visited or refreshed
		$tasks = mysqli_query($db, "SELECT * FROM data");

		$i = 1; while ($row = mysqli_fetch_array($tasks)) { ?>
			<tr>
				<td> <?php echo $i; ?> </td>
				<td class="task"> <?php echo $row['task']; ?> </td>
				<td> 
					<a href="index.php?del_task=<?php echo $row['id'] ?>"><button type="button" class="btn btn-outline-warning">Done</button></a> 
				</td>

			</tr>
		<?php $i++; } ?>	
	</tbody>
</table>



</body>
</html>