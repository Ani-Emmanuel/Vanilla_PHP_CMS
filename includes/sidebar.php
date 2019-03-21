            <div class="col-md-4">
                <!-- Blog Search Well -->
                <div class="well">
                    <h4>Blog Search</h4>
                    <form action="search.php" method="post">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control">
                        <span class="input-group-btn">
                            <button class="btn btn-default" name = "submit" type="submit">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                    </div>
                    </form>
                    <!-- /.input-group -->
                </div>

                 <div class="well">
                    <h4>Login</h4>
                    <form action="includes/login.php" method="post">
                    <div class="form-group">
                        <input type="text" name="username" class="form-control" placeholder="Enter username">
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" placeholder="Enter password">
                    </div>
                    <div class="form-group">
                        <input type="submit" name="login" class="btn btn-primary" value="login">
                        <small class="btn"><a href="./registration.php">Click here to Register</a></small>
                    </div>
                    </form>
                    <!-- /.input-group -->
                </div>


                <!-- Blog Categories Well -->
                <div class="well">
                    <h4>Blog Categories</h4>
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="list-unstyled">
                    <?php 
                        $query = "SELECT * FROM categories";
                        $result = mysqli_query($con,$query);
                        if (!$result) {
                            die("Query failed".mysqli_error($con));
                        }
                        while ($row = mysqli_fetch_assoc($result)) {
                            $cat_id = $row['cat_id'];
                             $cat_title = $row['cat_title'];
                             echo "<li><a href='./category.php?post_cat_id=$cat_id'>{$cat_title}</a>
                                </li>";
                        }
                     ?>
                                
                            </ul>
                        </div>
                        <!-- /.col-lg-6 -->
                        <!-- /.col-lg-6 -->
                    </div>
                    <!-- /.row -->
                </div>

                <!-- Side Widget Well -->
                <div class="well">
                    <h4>Side Widget Well</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
                </div>

            </div>