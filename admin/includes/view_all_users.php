<table class="table table-bordered table-hovered">
        <thead>
            <tr>
                <th>User_id</th>
                <th>Username</th>
                <th>Password</th>
                <th>FirstName</th>
                <th>LastName</th>
                <th>Email</th>
                <th>Role</th>
            </tr>
        </thead>
        <tbody>
<?php


    $query="SELECT * FROM users ";
    $select_all_users = mysqli_query($conn,$query);
    while($row = mysqli_fetch_assoc($select_all_users))
    {
    $user_id = $row['user_id'];
    $username = $row['username']; 
    $user_password = $row['user_password'];
    $user_firstname = $row['user_firstname'];
    $user_lastname = $row['user_lastname'];
    $user_email = $row['user_email'];
    $user_role = $row['user_role'];
    $user_image = $row['user_image'];
    //echo $post_date;
    echo "<tr>";          
    echo "<td>{$user_id}</td>";
    echo "<td>{$username}</td>";
    echo "<td>{$user_password}</td>";
    // $query="SELECT * FROM categories WHERE cat_id=$post_category_id";
    // $select_all_categories_by_id = mysqli_query($conn,$query);
    // while($row = mysqli_fetch_assoc($select_all_categories_by_id))
    // {
    //     $cat_id = $row['cat_id'];
    //     $cat_title = $row['cat_title']; 
    //    echo "<td>{$cat_title}</td>";
    // }
    echo "<td>{$user_firstname}</td>";
    echo "<td>{$user_lastname}</td>";
    // $query = "SELECT * FROM posts WHERE post_id =$comment_post_id";
    // $query_for_post_by_comment = mysqli_query($conn,$query);
    // while($row=mysqli_fetch_assoc($query_for_post_by_comment))
    // {
    //     $post_id = $row['post_id'];
    //     $post_title = $row['post_title'];
    //     echo "<td><a href='../post.php?p_id=$post_id'>$post_title</a></td>";
    // }



    echo "<td>{$user_email}</td>";
    echo "<td>{$user_role}</td>";
    echo "<td><a href='users.php?change_to_admin={$user_id}'>Make Admin</a></td>";
    echo "<td><a href='users.php?change_to_sub={$user_id}'>Make Subcriber</a></td>";
    echo "<td><a href='users.php?source=edit_user&p_id={$user_id}'>EDIT</a></td>";
    echo "<td><a href='users.php?delete={$user_id}'>DELETE</a></td>";
    echo "</tr>";
    }
?>
</tbody>
</table>
<?php
if(isset($_GET['change_to_admin']))
{
    $the_user_id = $_GET['change_to_admin'];
    $query = "UPDATE users SET user_role='Admin' WHERE user_id=$the_user_id";
    $result = mysqli_query($conn,$query);
    ConformQuery($result);
    header("Location: users.php");
}

if(isset($_GET['change_to_sub']))
{
    $the_user_id = $_GET['change_to_sub'];
    $query = "UPDATE users SET user_role='Subscriber' WHERE user_id=$the_user_id";
    $result = mysqli_query($conn,$query);
    ConformQuery($result);
    header("Location: users.php");
}



if(isset($_GET['delete']))
{
    $the_user_id = $_GET['delete'];
    $query = "DELETE FROM users WHERE user_id=$the_user_id";
    $result = mysqli_query($conn,$query);
    ConformQuery($result);
    header("Location: users.php");
}
ob_end_flush();
?>