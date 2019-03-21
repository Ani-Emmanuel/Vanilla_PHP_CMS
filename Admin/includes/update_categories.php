<form action="" method="post">
	<div class="form-group">
    	<label for="cat_title">Edit Category</label>
<?php 

// EDITING CATEGORIES 

if (isset($_GET['edit'])) {
$the_edit = $_GET['edit'];
$cat_edit_query = "SELECT * FROM categories WHERE cat_id = {$the_edit} ";
$cat_edit_result = mysqli_query($con,$cat_edit_query);

while ($row = mysqli_fetch_assoc($cat_edit_result)) {
$cat_edit_title = $row['cat_title'];

?>
<input class="form-control" type="input" name="edit_cat_title" value="<?php echo $cat_edit_title ?>" placeholder="Update ategory" />
<?php  }}?> 


 <?php 
// UPDATING CATEGORY

if (isset($_POST['update_btn'])) {
    $edit_cat_title = $_POST['edit_cat_title'];
    $cat_id = $_GET['edit'];

    $update_query = "UPDATE categories SET cat_title = '{$edit_cat_title}' WHERE cat_id = {$cat_id} ";
    $update_result = mysqli_query($con,$update_query);

}

 ?>	

	</div>
	<div class="form-group">
    	<input class="btn btn-primary" type="submit" name="update_btn" value="Edit Category" />   
	</div>
</form>
