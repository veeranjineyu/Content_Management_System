<?php include "db.php"?>
<?php session_start();?>
<?php 
if(isset($_POST['login']))
{
    echo $username = $_POST['username'];
    $password = $_POST['password'];
    $username = mysqli_real_escape_string($conn,$username);
    $password = mysqli_real_escape_string($conn,$password);
    $query_for_users = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($conn,$query_for_users);
    if(!$result)
    {
        die("Unable to fectch the date".mysqli_error($conn));
    }
    $row = mysqli_fetch_assoc($result);
        $the_user_id = $row['user_id'];
        $the_username = $row['username'];
        $the_password = $row['user_password'];
        $the_firstname = $row['user_firstname'];
        $the_lastname = $row['user_lastname'];
        $the_role = $row['user_role'];
     if($the_username == $username && $the_password == $password)
     {
        $_SESSION['user_id'] = $the_user_id;
        $_SESSION['username']= $the_username;
        $_SESSION['firstname'] =  $the_firstname;
        $_SESSION['lastname'] = $the_lastname;
        $_SESSION['user_role'] = $the_role;
       header('Location: ../admin'); 
     }
     else
     {
        header("Location: ../index.php");
     }
}

?>