<?php include "includes/admin_header.php"?>
  <?php 
   if(isset($_SESSION['user_id']))
   {
     $user_id = $_SESSION['user_id'];
     $query_select_user = "SELECT * FROM users WHERE user_id=$user_id";
     $result = mysqli_query($conn,$query_select_user);
     while($row = mysqli_fetch_assoc($result))
     {
        $user_id = $row['user_id']; 
        $username = $row['username']; 
        $user_firstname = $row['user_firstname'];
        $user_lastname = $row['user_lastname'];
        $user_email = $row['user_email'];
        $user_password= $row['user_password'];
        $user_role = $row['user_role'];
     }
   }  

   if(isset($_POST['update_profile']))
   {
      $username = $_POST['username']; 
      $user_firstname = $_POST['user_firstname'];
      $user_lastname = $_POST['user_lastname'];
      $user_email = $_POST['user_email'];
  
      // $post_image = $_FILES['image']['name'];
      // $post_image_temp = $_FILES['image']['tmp_name'];
      $user_password = $_POST['user_password'];
      $user_role = $_POST['user_role'];
  
      // move_uploaded_file($post_image_temp,"../images/$post_image");
      $query = "UPDATE users SET ";
      $query.= "username ='{$username}', ";
      $query.= "user_firstname ='{$user_firstname}', ";
      $query.= "user_lastname ='{$user_lastname}', ";
      $query.= "user_email ='{$user_email}', ";
      $query.= "user_password ='{$user_password}', ";
      $query.= "user_role = '{$user_role}' ";
      $query.= "WHERE user_id={$user_id}";
      $update_user = mysqli_query($conn,$query);
      ConformQuery($update_user);
   }
  



  ?>




    <div id="wrapper">
        <!-- Navigation -->
        <?php include "includes/admin_navigation.php"?>
        <!-- Navigation -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                                Welcome 
                                <small><?php echo $username; ?></small>
                        </h1>

                        <form action="" method="post" enctype="multipart/form-data">

<div class="form-group">
    <label for="username">Username</label>
    <input type="text" name="username" value="<?php echo  $username ?>" class="form-control">
</div>

<div class="form-group">
    <label for="user_firstname">FirstName</label>
    <input type="text" name="user_firstname" value="<?php echo  $user_firstname ?>" class="form-control">
</div>
<div class="form-group">
    <label for="user_lastname">LastName</label>
    <input type="text" name="user_lastname" value="<?php echo  $user_lastname ?>" class="form-control">
</div>

<div class="form-group">
    <select name="user_role" id="">
    <?php 
     echo "<option value='{$user_role}'>$user_role</option>";
     if($user_role=='Admin')
     {
        echo "<option value='Subscriber'>Subscriber</option>";
     }
     else
     {
        echo "<option value='Admin'>Admin</option>"; 
     }
    ?>
    </select>
</div>



<!-- <div class="form-group">
    <label for="title">Post Image</label>
    <input type="file" name="image" class="">
</div> -->
<div class="form-group">
    <label for="user_email">Email</label>
    <input type="email" name="user_email" value="<?php echo  $user_email ?>" class="form-control">
</div>


<div class="form-group">
    <label for="user_password">Password</label>
    <input type="password" name="user_password" value="<?php echo  $user_password?>" class="form-control">
</div>

<div class="form-group">
    <input type="submit" class="btn btn-primary" name="update_profile" value="update Profile">
</div>

</form>


                      
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
<?php include "includes/admin_footer.php"?>


