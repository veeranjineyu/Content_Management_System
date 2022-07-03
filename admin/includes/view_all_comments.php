<table class="table table-bordered table-hovered">
        <thead>
            <tr>
                <th>Id</th>
                <th>Author</th>
                <th>Comment</th>
                <th>Email</th>
                <th>Status</th>
                <th>In Response to</th>
                <th>Date</th>
                <th>Aprove</th>
                <th>Unaprove</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
<?php

use LDAP\Result;

    $query="SELECT * FROM comments ";
    $select_all_comments = mysqli_query($conn,$query);
    while($row = mysqli_fetch_assoc($select_all_comments))
    {
    $comment_id = $row['comment_id'];
    $comment_content = $row['comment_content']; 
    $comment_author = $row['comment_author'];
    $comment_post_id = $row['comment_post_id'];
    $comment_status = $row['comment_status'];
    $comment_email = $row['comment_email'];
    $comment_date = $row['comment_date'];
    //echo $post_date;
    echo "<tr>";          
    echo "<td>{$comment_id}</td>";
    echo "<td>{$comment_author}</td>";
    echo "<td>{$comment_content}</td>";
    // $query="SELECT * FROM categories WHERE cat_id=$post_category_id";
    // $select_all_categories_by_id = mysqli_query($conn,$query);
    // while($row = mysqli_fetch_assoc($select_all_categories_by_id))
    // {
    //     $cat_id = $row['cat_id'];
    //     $cat_title = $row['cat_title']; 
    //    echo "<td>{$cat_title}</td>";
    // }
    echo "<td>{$comment_email}</td>";
    echo "<td>{$comment_status}</td>";
    $query = "SELECT * FROM posts WHERE post_id =$comment_post_id";
    $query_for_post_by_comment = mysqli_query($conn,$query);
    while($row=mysqli_fetch_assoc($query_for_post_by_comment))
    {
        $post_id = $row['post_id'];
        $post_title = $row['post_title'];
        echo "<td><a href='../post.php?p_id=$post_id'>$post_title</a></td>";
    }



    echo "<td>{$comment_date}</td>";
    echo "<td><a href='comments.php?Approve=$comment_id'>Aprove</a></td>";
    echo "<td><a href='comments.php?Unapprove=$comment_id'>Unaprove</a></td>";
    echo "<td><a href='comments.php?delete=$comment_id'>DELETE</a></td>";
    echo "</tr>";
    }
?>
</tbody>
</table>
<?php
if(isset($_GET['Approve']))
{
    $the_comment_id = $_GET['Approve'];
    $query = "UPDATE comments SET comment_status='Approved' WHERE comment_id=$the_comment_id";
    $result = mysqli_query($conn,$query);
    ConformQuery($result);
    header("Location: comments.php");
}

if(isset($_GET['Unapprove']))
{
    $the_comment_id = $_GET['Unapprove'];
    $query = "UPDATE comments SET comment_status='Unapproved' WHERE comment_id=$the_comment_id";
    $result = mysqli_query($conn,$query);
    ConformQuery($result);
    header("Location: comments.php");
}



if(isset($_GET['delete']))
{
    $the_comment_id = $_GET['delete'];
    $query = "DELETE FROM comments WHERE comment_id=$the_comment_id";
    $result = mysqli_query($conn,$query);
    ConformQuery($result);
    header("Location: comments.php");
}
ob_end_flush();
?>