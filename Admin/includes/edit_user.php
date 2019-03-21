<?php 
// EDIT USER CODE
if (isset($_GET['edit_user_id'])) {
	$edit_user_id = $_GET['edit_user_id'];

	$user_edit_query = "SELECT * FROM users WHERE user_id = $edit_user_id ";
	$user_edit_result = mysqli_query($con,$user_edit_query);
	confirmQuery($user_edit_result); // CHECKING IF THE QUERY IS VALID

	while ($row = mysqli_fetch_assoc($user_edit_result)) {
		$user_firstname = $row['user_firstname'];
		$user_lastname = $row['user_lastname'];
		$username = $row['username'];
		$user_role = $row['user_role'];
		$user_password = $row['user_password'];
		$user_email = $row['user_email'];
		$user_image = $row['user_image'];
	}
}

// UPDATE USER CODE
if (isset($_POST['submit'])) {
	$user_firstname = $_POST['user_firstname'];
	$user_lastname = $_POST['user_lastname'];
	$username = $_POST['username'];
	$user_role = $_POST['user_role'];
	$user_password = $_POST['user_password'];
	$user_email = $_POST['user_email'];
	$user_image = $_FILES['user_image']['name'];
	$user_image_temp = $_FILES['user_image']['tmp_name'];

	move_uploaded_file($user_image_temp, "../images/$user_image");

	if (empty($user_image)) {
		$user_image_query = "SELECT * FROM users WHERE user_id = {$edit_user_id} ";
		$user_image_result = mysqli_query($con,$user_image_query);
		confirmQuery($user_image_result);
		while ($row = mysqli_fetch_assoc($user_image_result)) {
		 	$user_image = $row['user_image'];
		 } 
	}

$update_user_query = "UPDATE users SET user_firstname='{$user_firstname}',user_lastname='{$user_lastname}',user_role='{$user_role}',username='{$username}',user_password='{$user_password}',user_email='{$user_email}',user_image='{$user_image}' WHERE user_id = {$edit_user_id} ";

$update_user_result = mysqli_query($con,$update_user_query);
confirmQuery($update_user_result);

}

 ?>



<form action="" method="post" enctype="multipart/form-data">
	
<div class="form-group">
	<label for="firstname">Firstname</label>
	<input type="text" name="user_firstname" value="<?php echo($user_firstname); ?>" class='form-control'>
</div>

<div class="form-group">
	<label for="lastname">Lastname</label>
	<input type="text" name="user_lastname" value="<?php echo($user_lastname); ?>" class='form-control'>
</div>

<div class="form-group">
	<select  name = "user_role" >
		<!-- CODE TO GET THE USER ROLE FROM THE DB -->
	<?php 
	      echo "<option>$user_role</option>";
		if ($user_role == 'Admin') {
			echo "<option value = 'Subscriber'>Subscriber</option>";
		}else{
			echo "<option value = 'Admin'>Admin</option>";
		}
	 ?>
	</select>
</div>


<div class="form-group">
	<label for="username">Username</label>
	<input type="text" name="username" value="<?php echo($username); ?>" class='form-control'>
</div>

<div class="form-group">
	<label for="password">Password</label>
	<input type="password" name="user_password" value="<?php echo($user_password);?>" class='form-control'>
</div>


<div class="form-group">
	<label for="email">Email</label>
	<input type="email" name="user_email" value="<?php echo($user_email); ?>" class='form-control'>
</div>


<div class="form-group">
	<img width="100" src="../images/<?php echo $user_image; ?>">
	<input type="file" name="user_image" value="<?php echo($user_image); ?>" class='form-control'>
</div>


<div class="form-group">
	<input type="submit" name="submit" value='Add user' class='btn btn-primary'>
</div>


</form>