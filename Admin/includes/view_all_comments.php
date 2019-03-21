<table class="table table-bordered table-hover">
	<thead>
		<tr>
			<td>Id</td>
			<td>Author</td>
			<td>Email</td>
			<td>In Response to</td>
			<td>Comments</td>
			<td>Status</td>
			<td>Date</td>
			<td>Approve</td>
			<td>Unapprove</td>
			<td>Delete</td>
		</tr>
	</thead>
	<tbody>
		<?php 

		$comment_query = "SELECT * FROM comments ";
		$comment_result = mysqli_query($con,$comment_query);
		confirmQuery($comment_result);
		while ($row = mysqli_fetch_assoc($comment_result)) {
			$comment_id = $row['comment_id'];
			$comment_author = $row['comment_author'];
			$comment_email = $row['comment_email'];
			$comment_post = $row['comment_post_id'];
			$comment_status = $row['comment_status'];
			$comment_content = $row['comment_content'];
			$comment_date = $row['comment_date'];

			echo "<tr>";
			echo "<td>$comment_id</td>";
			echo "<td>$comment_author</td>";
			echo "<td>$comment_email</td>";
			//QUERY TO GET THE RELETIVE POST THAT THE COMMENT WAS MADE TO
			$post_query = "SELECT * FROM posts WHERE post_id = {$comment_post} ";
			$post_result = mysqli_query($con,$post_query);
			confirmQuery($post_result);
			while ($row = mysqli_fetch_assoc($post_result)) {
				$comment_post_id = $row['post_id'];
				$comment_post_title = $row['post_title'];
				echo "<td><a href='../post.php?index={$comment_post_id}'>$comment_post_title</a></td>";

			}
			echo "<td>$comment_content</td>";
			echo "<td>$comment_status</td>";
			echo "<td>$comment_date</td>";
			echo "<td><a href='comments.php?approve={$comment_id}'>Approve<a/></td>";
			echo "<td><a href='comments.php?unapprove={$comment_id}'>Unapprove<a/></td>";
			echo "<td><a href='comments.php?delete={$comment_id}'>Delete<a/></td>";
			echo "</tr>";

		}

        // QUERY TO UPDATE THE COMMENT STATUS AS APPROVED
		if (isset($_GET['approve'])) {
			$the_approve = $_GET['approve'];
			$approve_query = "UPDATE comments SET comment_status = 'Approved' WHERE comment_id = {$the_approve} ";
			$approve_result = mysqli_query($con,$approve_query);
			confirmQuery($approve_result);
			header("location:comments.php");
			
		}

		// QUERY TO UPDATE THE COMMENT STATUS AS UNAPPROVED
		if (isset($_GET['unapprove'])) {
			$the_unapprove = $_GET['unapprove'];
			$unapprove_query = "UPDATE comments SET comment_status = 'Unapproved' WHERE comment_id = {$the_unapprove} ";
			$unapprove_result = mysqli_query($con,$unapprove_query);
			confirmQuery($unapprove_result);
			header("location:comments.php");

		}

		// QUERY TO DELETE THE COMMENT
		if (isset($_GET['delete'])) {
			$the_delete = $_GET['delete'];
			$delete_query = "DELETE FROM comments WHERE comment_id = $the_delete ";
			$delete_result = mysqli_query($con,$delete_query);
			confirmQuery($delete_result);
			header("location:comments.php");
		}

		 ?>
	</tbody>
</table>