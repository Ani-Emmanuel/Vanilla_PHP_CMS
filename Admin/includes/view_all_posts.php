<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <td>Id</td>
            <td>Author</td>
            <td>Title</td>
            <td>Categories</td>
            <td>Status</td>
            <td>Images</td>
            <td>Tags</td>
            <td>Date</td>
            <td>Comments</td>
            <td>Edit</td>
            <td>Delete</td>
        </tr>
    </thead>
    <tbody>
        <?php 
            $posts_query = "SELECT * FROM posts";
            $posts_result = mysqli_query($con,$posts_query);
            while ($row = mysqli_fetch_assoc($posts_result)) {
                $post_id = $row['post_id'];
                $post_author = $row['post_author'];
                $post_title = $row['post_title'];
                $post_category_id = $row['post_category_id'];
                $post_status = $row['post_status'];
                $post_image = $row['post_image'];
                $post_tags = $row['post_tags'];
                $post_date = $row['post_date'];
                $post_comment_count = $row['post_comment_count'];

                echo "<tr>";

                echo "<td>{$post_id}</td>";
                echo "<td>{$post_author}</td>";
                echo "<td>{$post_title}</td>";

         $cat_query = "SELECT * FROM categories WHERE cat_id = $post_category_id";
            $cat_result = mysqli_query($con,$cat_query);
            while ($row = mysqli_fetch_assoc($cat_result)) {
                $cat_title = $row['cat_title'];
                echo "<td>{$cat_title}</td>";
            }
                echo "<td>{$post_status}</td>";
               echo "<td><img width='100' src='../images/$post_image' alt='image'</td>"; 
                echo "<td>{$post_tags}</td>";
                echo "<td>{$post_date}</td>";
                echo "<td>{$post_comment_count}</td>";
                echo "<td><a href='./posts.php?source=edit_post&edit_post_id={$post_id}'>Edit</a></td>";
                echo "<td><a href='./posts.php?delete={$post_id}'>Delete</a></td>";
                echo "<tr>";

            }

         ?>
    </tbody>
</table>

<?php 
if (isset($_GET['delete'])) {
    $delete_id = $_GET['delete'];
    $post_query = "DELETE FROM posts WHERE post_id = $delete_id ";
    $post_result = mysqli_query($con,$post_query);
    if (!$post_result) {
        die("Could not delete".mysqli_error($con));
    }
    header("Location: ./posts.php");
}
 ?>