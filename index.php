<?php
include "db_conn.php";

//creation of DataBase
// $sql = "CREATE DATABASE todo";
// $result = mysqli_query($conn, $sql);

// if(!$result){
//     die("Connection failed: " . mysqli_query_error());
// }

//Creation of table
// $sql = "CREATE TABLE `data`(
//     id INT(10) PRIMARY KEY NOT NULL AUTO_INCREMENT, 
//     task VARCHAR(500)
//     )";
// // $result = mysqli_query($conn, $sql);
// $result = mysqli_query($conn, $sql);

// if(!$result){
//     echo "Error creating table: " . $conn->error;
// }

$task = $_POST["task"];
$sql = "INSERT INTO `data` (id, task)
VALUES ('', '$task')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<style>
  form{
    width: 50%; 
	margin: 50px auto; 
	border-radius: 5px; 
	padding: 10px;
	background: #E4C9FF;
	border: 1px solid #A65FF6;
  }
.add_btn{
    background: #77DD76;
    padding: 2px 10px;
	border: 1px solid #d9dadc;
  border-radius:3px;
  color: #383838;
  }
  .edit_btn{
    background: #FFB449;
    padding: 2px 10px;
	border: 1px solid #d9dadc;
  border-radius:3px;
  color: #383838;
  }
  .del_btn{
    background: #ff6961;
    padding: 2px 10px;
	border: 1px solid #d9dadc;
  border-radius:3px;
  color: #383838;
  }
  .add_btn:hover,.edit_btn:hover,.del_btn:hover{
    border: 1px solid #383838;
  }
</style>

    <title>Never Ending List</title>
  </head>
  <body>
   
  <!-- <div class="container pt-5">
    <h3>Never Ending List</h3>
    <div class="p-5">
        <label for="exampleFormControlInput1" class="form-label">Todo Title</label>
        <input type="text" name="task" class="task" id="task" placeholder="Type here....">
    </div>
  </div> -->

  <div class="heading" style="width: 50%;margin: 30px auto; ">
  <h3>Never Ending List</h3>
	</div>
	<form method="post" action="#">
  <label for="exampleFormControlInput1" class="form-label">Todo Title</label><br>
		<input type="text" name="task" class="task_input" size="50">
		<button type="submit" name="submit" id="add_btn" class="add_btn">Add</button>
    <button type="edit" name="edit" id="edit_btn" class="edit_btn">Edit</button>
    <button type="del" name="del" id="del_btn" class="del_btn">Delete</button>

	</form>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>