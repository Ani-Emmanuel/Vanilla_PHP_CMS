<?php 


if (isset($_POST['submit'])) {
	$user_firstname = $_POST['user_firstname'];
	$user_lastname = $_POST['user_lastname'];
	$user_role = $_POST['user_role'];
	$username = $_POST['username'];
	$user_password= $_POST['user_password'];
	$user_email = $_POST['user_email'];
	$user_image = $_FILES['user_image']['name'];
	$user_temp_image = $_FILES['user_image']['tmp_name'];
	$post_date = date('d-m-y');
	

	move_uploaded_file($user_temp_image, "../images/$user_image");


	$add_user_query = "INSERT INTO users (username,user_password,user_firstname,user_lastname,user_role,user_image,user_date, user_email ) ";
	$add_user_query .= " VALUES('{$username}','{$user_password}','{$user_firstname}','{$user_lastname}','{$user_role}','{$user_image}',now(),'{$user_email}' )";

	$add_user_result = mysqli_query($con,$add_user_query);
	confirmQuery($add_user_result);
echo "User Created: " . " " . "<a href = 'users.php'>View Users</a>";

}


 ?>


<form action="" method="post" enctype="multipart/form-data">
	
<div class="form-group">
	<label for="firstname">Firstname</label>
	<input type="text" name="user_firstname" class='form-control'>
</div>

<div class="form-group">
	<label for="lastname">Lastname</label>
	<input type="text" name="user_lastname" class='form-control'>
</div>

<div class="form-group">
	<select  name = "user_role" >
	<option value="subcriber">Select Options</option>
	<option value="Admin">Admin</option>
	<option value="Subcriber">Subcriber</option>
	</select>
</div>


<div class="form-group">
	<label for="username">Username</label>
	<input type="text" name="username" class='form-control'>
</div>

<div class="form-group">
	<label for="password">Password</label>
	<input type="password" name="user_password" class='form-control'>
</div>


<div class="form-group">
	<label for="email">Email</label>
	<input type="email" name="user_email" class='form-control'>
</div>


<div class="form-group">
	<label for="post_image">User Image</label>
	<input type="file" name="user_image" class='form-control'>
</div>


<div class="form-group">
	<input type="submit" name="submit" value='Add user' class='btn btn-primary'>
</div>


</form>