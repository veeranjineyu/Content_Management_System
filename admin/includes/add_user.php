<?php 
if(isset($_POST['create_user']))
{
    $username =  $_POST['username'];
     $username;
    $user_firstname =  $_POST['user_firstname'];
    $user_lastname = $_POST['user_lastname'];
    $user_password = $_POST['user_password'];

    // $post_image = $_FILES['image']['name'];
    // $post_image_temp = $_FILES['image']['tmp_name'];
    $user_email = $_POST['user_email'];  
    $user_role = $_POST['user_role'];




    // move_uploaded_file($post_image_temp,"../images/$post_image");

    $query = "INSERT INTO users(username,user_firstname,user_lastname,
    user_password,user_email,user_role) ";
    $query.= "VALUES('{$username}','{$user_firstname}','{$user_lastname}','{$user_password}','{$user_email}',
    '{$user_role}')";
    $result = mysqli_query($conn,$query);
    ConformQuery($result);
    echo "Successfully User Created"."<a href='users.php'>View Users</a>";
}
?>




<form action="" method="post" enctype="multipart/form-data">

<div class="form-group">
    <label for="username">Username</label>
    <input type="text" name="username" class="form-control">
</div>

<div class="form-group">
    <label for="user_firstname">FirstName</label>
    <input type="text" name="user_firstname" class="form-control">
</div>
<div class="form-group">
    <label for="user_lastname">LastName</label>
    <input type="text" name="user_lastname" class="form-control">
</div>

<div class="form-group">
    <select name="user_role" id="">
    <option value="subscriber">select Option</option>
        <option value="admin">Admin</option>
        <option value="subscriber">Subscriber</option>
    </select>
</div>



<!-- <div class="form-group">
    <label for="title">Post Image</label>
    <input type="file" name="image" class="">
</div> -->
<div class="form-group">
    <label for="user_email">Email</label>
    <input type="email" name="user_email" class="form-control">
</div>


<div class="form-group">
    <label for="user_password">Password</label>
    <input type="password" name="user_password" class="form-control">
</div>

<div class="form-group">
    <input type="submit" class="btn btn-primary" name="create_user" value="Create User">
</div>

</form>