<?php 
if(isset($_POST['create_post']))
{
    $post_title =  $_POST['title'];
    $post_author =  $_POST['author'];
    $post_category_id = $_POST['post_category'];
    $post_status = $_POST['post_status'];

    $post_image = $_FILES['image']['name'];
    $post_image_temp = $_FILES['image']['tmp_name'];
    $post_tags = $_POST['post_tags'];
    $post_content = mysqli_real_escape_string($conn,$_POST['post_content']);//$_POST['post_content'];
    $post_date = date('y-m-d');
    $post_comment_count = 0;


    move_uploaded_file($post_image_temp,"../images/$post_image");

    $query = "INSERT INTO posts(post_category_id,post_title,post_author,
    post_date,post_image,post_content,post_tags,post_comment_count,post_status) ";
    $query.= "VALUES({$post_category_id},'{$post_title}','{$post_author}',now(),'{$post_image}',
    '{$post_content}','{$post_tags}','{$post_comment_count}','{$post_status}')";
    $result = mysqli_query($conn,$query);
    ConformQuery($result);
}


?>




<form action="" method="post" enctype="multipart/form-data">

<div class="form-group">
    <label for="title">Post Title</label>
    <input type="text" name="title" class="form-control">
</div>

<div class="form-group">
    <label for="category_id">Post category_id</label>
    <select class="form-select" name="post_category" id="post_category">
    <?php
        $query="SELECT * FROM categories ";
        $select_all_categories = mysqli_query($conn,$query);
        ConformQuery( $select_all_categories);
        while($row = mysqli_fetch_assoc($select_all_categories))
        {
            $cat_id = $row['cat_id'];
            $cat_title = $row['cat_title']; 
            echo "<option value='{$cat_id}'>{$cat_title}</option>";
        }
    ?>
    </select>
</div>


<div class="form-group">
    <label for="Author">Post Author</label>
    <input type="text" name="author" class="form-control">
</div>
<div class="form-group">
    <label for="post_status">Post Status</label>
    <input type="text" name="post_status" class="form-control">
</div>
<div class="form-group">
    <label for="title">Post Image</label>
    <input type="file" name="image" class="">
</div>
<div class="form-group">
    <label for="post_tags">Post tags</label>
    <input type="text" name="post_tags" class="form-control">
</div>
<div class="form-group">
    <label for="post_content">Post content</label>
    <textarea name="post_content" id="" cols="30" rows="10" class="form-control"></textarea>
</div>

<div class="form-group">
    <input type="submit" class="btn btn-primary" name="create_post" value="Publish">
</div>






</form>