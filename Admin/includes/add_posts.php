<?php 
	
	if (isset($_POST['submit'])) {
		$post_title = $_POST['post_title'];
		$post_category = $_POST['post_category'];
		$post_author = $_POST['post_author'];
		$post_tags = $_POST['post_tags'];
		$post_status = $_POST['post_status'];
		$post_image = $_FILES['image']['name'];
		$post_image_temp = $_FILES['image']['tmp_name'];
		$post_cont = $_POST['post_content'];
		$post_content = mysqli_real_escape_string($con,$post_cont);
		$post_date = date('d-m-y');

		move_uploaded_file($post_image_temp, "../images/$post_image");


		$post_query = "INSERT INTO posts (post_title,post_category_id,post_author,post_tags,post_status,post_image,post_content,post_date) ";
		$post_query .= " VALUES('{$post_title}',{$post_category},'{$post_author}','{$post_tags}','{$post_status}','{$post_image}','{$post_content}',now()) ";

		$post_result = mysqli_query($con,$post_query);
		confirmQuery($post_result); // TO CHECK IF THE QUERY WENT THROUGH	
	}

 ?>
<form action="" method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label for="title">Post Title</label>
		<input name="post_title" id="title" type="text" class="form-control"/>
	</div>
	<div class="form-group">
		<label for="category">Select Category</label><br>
		<select id="category" name="post_category">
			<?php
			$option_query = "SELECT * FROM categories";
			$option_result = mysqli_query($con,$option_query);
			confirmQuery($option_result); // TO CHECK IF THE QUERY WENT THROUGH
			while ($row = mysqli_fetch_assoc($option_result)) {
				$cat_id = $row['cat_id'];
			 	$cat_title = $row['cat_title'];
			 	echo "<option value = $cat_id>$cat_title</option>";
			 } 
			 ?>
		</select>
	</div>
	<div class="form-group">
		<label for="post_author">Post Author</label>
		<input id="post_author" name="post_author" type="text" class="form-control"/>
	</div>
	<div class="form-group">
		<label for="post_tags">Post tags</label>
		<input id="post_tags" name="post_tags" type="text" class="form-control"/>
	</div>
	<div class="form-group">
		<label for="post_status">Post Status</label>
		<input id="post_status" name="post_status" type="text" class="form-control"/>
	</div>
	<div class="form-group">
		<label for="post_image">Select Image</label>
		<input id="post_image" type="file" name="image" class="form-control">
	</div>
	<div class="form-group">
		<label for="post_content">Post Control</label>
		<textarea id="post_content" class="form-control" name="post_content" cols="30" rows="10"></textarea>
	</div>
	<div class="form-group">
		<input type="submit" name="submit" value="Publish Post" class="btn btn-primary">
	</div>
</form>