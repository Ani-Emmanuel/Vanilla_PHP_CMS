<?php 
 	// EDIT POST CODE
if (isset($_GET['edit_post_id'])) {
	$edit_post_id = $_GET['edit_post_id'];
}

    $edit_query = "SELECT * FROM posts WHERE post_id = {$edit_post_id} ";
	$edit_result = mysqli_query($con,$edit_query);
	while ($row = mysqli_fetch_assoc($edit_result)) {
		$post_title = $row['post_title'];
		$post_author = $row['post_author'];
		$post_tags = $row['post_tags'];
		$post_status = $row['post_status'];
		$post_content = $row['post_content'];
		$post_image = $row['post_image'];
	}

 // UPDATE POST CODE 
	if (isset($_POST['submit'])) {
		$post_title = $_POST['post_title'];
		$post_category = $_POST['post_category'];
		$post_author = $_POST['post_author'];
		$post_tags = $_POST['post_tags'];
		$post_image = $_FILES['image']['name'];
		$temp_image = $_FILES['image']['tmp_name'];
		$post_status = $_POST['post_status'];
		$post_content = $_POST['post_content'];
		$post_date = date('d-m-y');

		move_uploaded_file($temp_image, '../images/$post_image');

		if (empty($post_image)) {
			$image_query = "SELECT * FROM posts WHERE post_id = $edit_post_id";
			$image_result = mysqli_query($con,$image_query);
			while ($row = mysqli_fetch_assoc($image_result)) {
				$post_image = $row['post_image'];
			}
		}


		$update_post_query = "UPDATE posts SET post_title='{$post_title}',post_category_id={$post_category},post_author='{$post_author}',post_tags='{$post_tags}',post_image='{$post_image}',post_status='{$post_status}',post_content='{$post_content}',post_date=now() WHERE post_id = {$edit_post_id} ";
		$update_post_result = mysqli_query($con,$update_post_query);
		confirmQuery($update_post_result);
		
	}

 ?>

<form action="" method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label for="title">Post Title</label>
		<input name="post_title" value="<?php echo $post_title; ?>" id="title" type="text" class="form-control"/>
	</div>
	<div class="form-group">
		<label for="category">Select Category</label><br>
		<select id="category" name="post_category">
			<!-- CODE TO GET THE POST CATEGORY FROM THE DB -->
			<?php
			$option_query = "SELECT * FROM categories";
			$option_result = mysqli_query($con,$option_query);
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
		<input id="post_author" value="<?php echo $post_author; ?>" name="post_author" type="text" class="form-control"/>
	</div>
	<div class="form-group">
		<label for="post_tags">Post tags</label>
		<input id="post_tags" value="<?php echo $post_tags; ?>" name="post_tags" type="text" class="form-control"/>
	</div>
	<div class="form-group">
		<select name="post_status">
			<!-- CODE TO GET THE POST STATUS FROM THE DB -->
			<?php 
			echo "<option>$post_status</option>";
			if ($post_status == 'draft') {
				echo "<option value = 'publish'>Publish</option>";
			}else{
				echo "<option value = 'draft'>Draft</option>";
			 
			}
			?>

		</select>
	</div>
	<div class="form-group">
		<img width="100" src="../images/<?php echo $post_image; ?>">
	<input type="file" name="image">
	</div>
	<div class="form-group">
		<label for="post_content">Post Control</label>
		<textarea id="post_content" class="form-control" name="post_content" cols="30" rows="10"><?php echo $post_content ?></textarea>
	</div>
	<div class="form-group">
		<input type="submit" name="submit" value="Publish Post" class="btn btn-primary">
	</div>
</form>