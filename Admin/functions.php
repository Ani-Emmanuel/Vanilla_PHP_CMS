<?php 
//SHOWING ERROR MESSAGE
function confirmQuery($result){
    global $con;
    if (!$result) {
        die("Query Failed ".mysqli_error($con));
    }
}

//ADDING NEW CATEGORY
function addingCategory(){
	global $con;
	if (isset($_POST['submit'])) {
$cat_title = $_POST['cat_title'];
if ($cat_title == "" || empty($cat_title)) {
echo "The field should not be empty";
} else{
$cat_query = "INSERT INTO categories(cat_title) VALUE ('{$cat_title}') ";
$cat_result = mysqli_query($con,$cat_query);
if (!$cat_result) {
    die("Query Failed".mysqli_error($con));
}
} 
}
}


// DISPLAYING CATEGORIES 
function showCategories(){
	global $con;
$query = "SELECT * FROM categories";
$result = mysqli_query($con, $query);
while ($row = mysqli_fetch_assoc($result)) {
    $cat_id = $row['cat_id'];
    $cat_title = $row['cat_title'];
    echo "<tr>";
    echo "<th>$cat_id</th>";
    echo "<th>$cat_title</th>";
    echo "<th><a href='categories.php?edit={$cat_id}'>Edit</a></th>";
    echo "<th><a href ='categories.php?delete={$cat_id}'>Delete</a></th>";
    echo "</tr>";

 
}
}


// DELETING CATEGORY
function deleteCategories(){
	global $con;
if (isset($_GET['delete'])) {
    $the_delete = $_GET['delete'];
    $cat_delete_query = "DELETE FROM categories WHERE cat_id = {$the_delete} ";
    $cat_delete_result = mysqli_query($con,$cat_delete_query);
    if (!$cat_delete_result) {
        die("Delecting Failed".mysqli_error($con));
    }
    header("location: categories.php");
}

}



 ?>