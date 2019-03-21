  <?php include 'includes/header.php' ?> 
  <?php include 'includes/navigation.php' ?>

<?php 

if (isset($_POST['submit'])) {
    $firstname = mysqli_real_escape_string($con,$_POST['firstname']);
    $lastname = mysqli_real_escape_string($con,$_POST['lastname']);
    $username = mysqli_real_escape_string($con,$_POST['username']);
    $password = mysqli_real_escape_string($con,$_POST['password']);
    $email = mysqli_real_escape_string($con,$_POST['email']);
    $user_image = $_FILES['user_image']['name'];
    $user_image_temp = $_FILES['user_image']['tmp_name'];
    $user_role = 'Subscriber';

    move_uploaded_file($user_image_temp, "images/$user_image");

    $user_reg_query = "INSERT INTO users (username,user_password,user_firstname,user_lastname,user_role,user_email,user_image,user_date) ";
    $user_reg_query .= "VALUES('{$username}','{$password}','{$firstname}','{$lastname}','{$user_role}','{$email}','{$user_image}',now() )";
    $user_reg_result = mysqli_query($con,$user_reg_query);
    confirmQuery($user_reg_result);
}

 ?>
   
<div class="container">    
<section id = "login">
<div class="container">
  <div class="row">
   <div class="col-xs-6 col-xs-offset-3">
     <div class="form-wrap">
      <h1>Register</h1>
        <form role="form" action="registration.php" method="post" id="login-form" autocomplete="off" enctype="multipart/form-data" >

          <div class="form-group">
            <label for="Firstname" class="sr-only">Firstname</label>
              <input type="text" name="firstname" class="form-control" id="Firstname" placeholder="Enter your Firstname">
               </div>

            <div class="form-group">
            <label for="Lastname" class="sr-only">Lastname</label>
              <input type="text" name="lastname" class="form-control" id="Lastname" placeholder="Enter your Lastname">
               </div>

          <div class="form-group">
            <label for="username" class="sr-only">Username</label>
              <input type="text" name="username" class="form-control" id="username" placeholder="Enter desired Username">
               </div>

                  <div class="form-group">
                    <label for="email" class="sr-only">Email</label>
                      <input type="email" name="email" class="form-control" id="email" placeholder="Example@email.com">
                       </div>

                          <div class="form-group">
                        <label for="password" class="sr-only">Password</label>
                          <input type="password" name="password" class="form-control" id="password" placeholder="Enter desired Username">
                             </div>

                             <div class="form-group">
                                <label for="post_image">User Image</label>
                                <input type="file" name="user_image" class='form-control'>
                              </div>

                             <input type="submit" name="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="register">



</form>
</div>  
</div>      
</div>
</div>
</section> 
    <hr>

         <?php include 'includes/footer.php' ?>

       