<?php include 'includes/header.php'; ?>
    <!-- Navigation -->
<?php include 'includes/navigation.php'; ?>
   


    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>
                <?php 

                if (isset($_GET['index'])) {
                   $the_index_id = $_GET['index'];
                }

            $query = "SELECT * FROM posts WHERE post_id = $the_index_id ";
            $posts_result = mysqli_query($con,$query);
            if (!$posts_result) {
                die("Query failed".mysqli_error($con));
            }
            while ($row = mysqli_fetch_assoc($posts_result)) {
                $post_id = $row['post_id'];
                $post_title = $row['post_title'];
                $post_author = $row['post_author'];
                $post_date = $row['post_date'];
                $post_image = $row['post_image'];
                $post_content = $row['post_content'];


                 ?>

                 <?php 

                 if (isset($_POST['submit'])) {
                     
                 }

                  ?>


                <!-- First Blog Post -->
                <h2>
                    <a href="#"><?php echo $post_title; ?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $post_author; ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date; ?></p>
                <hr>
                <img class="img-responsive" src="images/<?php echo $post_image; ?>" alt="">
                <hr>
                <p><?php echo $post_content; ?></p>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>
                <?php } ?>


                <!-- QUERY TO SUBMIT COMMENTS MADE ON A POST -->

                <?php 

                if (isset($_POST['post_comment'])) {
                    $comment_author = $_POST['comment_author'];
                    $comment_email = $_POST['comment_email'];
                    $comment_content = $_POST['comment_content'];
                    $comment_date = date('d-m-y');

                    $comment_query = "INSERT INTO comments(comment_author,comment_email,comment_content,comment_date,comment_post_id ) ";
                    $comment_query .="VALUES ('{$comment_author}','{$comment_email}','{$comment_content}','{$comment_date}', $the_index_id )";

                    $comment_result = mysqli_query($con,$comment_query);
                    confirmQuery($comment_result);
                }






                 ?>



<div class="well">
<h4>Leave a Comment:</h4>
<form action = "" method = "post" role="form">

<div class="form-group">
<label for = "comment_author">Authur</label>
<input type="text" name="comment_author" id="comment_author" class="form-control">
</div>

<div class="form-group">
<label for = "comment_email">Email</label>
<input type="email" id="comment_email" class="form-control" name = "comment_email">
</div>

<div class="form-group">
<label for = "comment_content">Comment</label>
<textarea name="comment_content" id="comment_content" class="form-control" rows="3"></textarea>
</div>
<button type="submit" name = "post_comment" class="btn btn-primary">Submit</button>
</form>
</div>

<!-- QUERY TO DISPLAY ALL COMMENTS ABOUT A POST -->
<?php 

$post_comment_query = "SELECT * FROM comments WHERE comment_post_id = $the_index_id ";
$post_comment_result = mysqli_query($con,$post_comment_query);
confirmQuery($post_comment_result);
while ($row = mysqli_fetch_assoc($post_comment_result)) {
    $comment_author = $row['comment_author'];
    $comment_date = $row['comment_date'];
    $comment_content = $row['comment_content'];

 ?>
<div class="media">
<a class="pull-left" href="#">
<img class="media-object" src="http://placehold.it/64x64" alt="">
</a>
<div class="media-body">
<h4 class="media-heading"><?php echo $comment_author; ?>
<small> <?php echo $comment_date;?> </small>
</h4>
<?php echo $comment_content;?>
</div>
</div>

<?php } ?>


</div>
             
            <!-- Blog Sidebar Widgets Column -->
            <?php include 'includes/sidebar.php'; ?>

        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
      <?php include 'includes/footer.php'; ?>