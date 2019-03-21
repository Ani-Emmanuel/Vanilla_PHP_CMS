<table class="table table-bordered table-hover">
	<thead>
		<tr>
			<td>Id</td>
			<td>Username</td>
			<td>Firstname</td>
			<td>Lastname</td>
			<td>Email</td>
			<td>Role</td>
			<td>Date</td>
			<td>Admin</td>
			<td>Subscriber</td>
			<td>Edit</td>
			<td>Delete</td>
		</tr>
	</thead>
	<tbody>
		<!-- QUERY TO SELECT ALL USER FROM THE DATABASE -->
		<?php 

		$user_query = "SELECT * FROM users ";
		$user_result = mysqli_query($con,$user_query);
		confirmQuery($user_result); // function to check if the query is true
		while ($row = mysqli_fetch_assoc($user_result)) {
			$user_id = $row['user_id'];
			$username = $row['username'];
			$user_firstname = $row['user_firstname'];
			$user_lastname = $row['user_lastname'];
			$user_email = $row['user_email'];
			$user_role = $row['user_role'];
			$user_date = $row['user_date'];



			echo "<tr>";
			echo "<td>$user_id</td>";
			echo "<td>$username</td>";
			echo "<td>$user_firstname</td>";
			echo "<td>$user_lastname</td>";
			echo "<td>$user_email</td>";
			echo "<td>$user_role</td>";
			echo "<td>$user_date</td>";
			echo "<td><a href ='./users.php?change_to_admin={$user_id}'>Admin</a></td>";
     		echo "<td><a href ='./users.php?change_to_subscriber={$user_id}'>Subscriber</a></td>";
			echo "<td><a href='./users.php?source=edit_user&edit_user_id={$user_id}'>Edit</a></td>";
			echo "<td><a href='./users.php?delete={$user_id}'>Delete</a></td>";
			echo "</tr>";
		}



		// QUERY TO DELETE USER FROM THE TABLE
		if (isset($_GET['delete'])) {
			$delete_id = $_GET['delete'];

			$user_delete_query = "DELETE FROM users WHERE user_id = $delete_id ";
			$user_delete_result = mysqli_query($con,$user_delete_query);
			confirmQuery($user_delete_result); // function to check if the query is true
			header("location:users.php");
		}

		// QUERY TO CHANGE A USER ROLE TO AN ADMIN
		if (isset($_GET['change_to_admin'])) {
			$user_admin_id = $_GET['change_to_admin'];

			$user_admin_query = "UPDATE users SET user_role = 'Admin' WHERE user_id = {$user_admin_id} ";
			$user_admin_result = mysqli_query($con,$user_admin_query);
			confirmQuery($user_admin_result);
			header("location:users.php");

		}

		// QUERY TO CHANGE A USER ROLE TO A SUBSCRIBER
		if (isset($_GET['change_to_subscriber'])) {
			$user_subscriber_id = $_GET['change_to_subscriber'];

			$user_subscriber_query = "UPDATE users SET user_role='Subscriber' WHERE user_id={$user_subscriber_id} ";
			$user_subscriber_result = mysqli_query($con,$user_subscriber_query);
			confirmQuery($user_subscriber_result);
			header("location:users.php");
		}


		 ?>
	</tbody>
</table>