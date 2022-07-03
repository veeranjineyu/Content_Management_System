<?php 
if(isset($_GET['p_id']))
{
    $the_post_id = $_GET['p_id'];
}
    $query="SELECT * FROM posts WHERE post_id= $the_post_id";
    $select_all_posts_by_id = mysqli_query($conn,$query);
    while($row = mysqli_fetch_assoc($select_all_posts_by_id ))
    {
        $post_id = $row['post_id'];
        $post_title = $row['post_title']; 
        $post_author = $row['post_author'];
        $post_category_id = $row['post_category_id'];
        $post_status = $row['post_status'];
        $post_content = $row['post_content'];
        $post_image = $row['post_image'];
        $post_tags = $row['post_tags'];
        $post_comment_count = $row['post_comment_count'];
        $post_date = $row['post_date'];
    }

 if(isset($_POST['update_post']))
 {
    $post_title =  $_POST['title'];
    $post_author =  $_POST['author'];
    $post_category_id = $_POST['post_category'];
    $post_status = $_POST['post_status'];

    $post_image = $_FILES['image']['name'];
    $post_image_temp = $_FILES['image']['tmp_name'];
    $post_tags = $_POST['post_tags'];
    $post_content = $_POST['post_content'];

    move_uploaded_file($post_image_temp,"../images/$post_image");
    $query = "UPDATE posts SET ";
    $query.= "post_title ='{$post_title}', ";
    $query.= "post_author ='{$post_author}', ";
    $query.= "post_category_id ='{$post_category_id}', ";
    $query.= "post_image ='{$post_image}', ";
    $query.= "post_date = now(), ";
    $query.= "post_status = '{$post_status}', ";
    $query.= "post_content = '{$post_content}', ";
    $query.= "post_tags = '{$post_tags}' ";
    $query.= "WHERE post_id={$the_post_id}";
    $update_post = mysqli_query($conn,$query);
    ConformQuery($update_post);
 }

?>







<form action="" method="post" enctype="multipart/form-data">

<div class="form-group">
    <label for="title">Post Title</label>
    <input type="text" value="<?php echo $post_title;?>" name="title" class="form-control">
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
    <input type="text" value="<?php echo $post_author;?>" name="author" class="form-control">
</div>
<div class="form-group">
    <label for="post_status">Post Status</label>
    <input type="text" value="<?php echo $post_status;?>" name="post_status" class="form-control">
</div>
<div class="form-group">
    <img width='100' src="../images/<?php echo $post_image ?>" alt="">
    <input type="file" name='image' class="">
</div>
<div class="form-group">
    <label for="post_tags">Post tags</label>
    <input type="text" value="<?php echo $post_tags;?>" name="post_tags" class="form-control">
</div>
<div class="form-group">
    <label for="post_content">Post content</label>
    <textarea name="post_content" id="" cols="30" rows="10" class="form-control"><?php echo $post_content;?></textarea>
</div>

<div class="form-group">
    <input type="submit" class="btn btn-primary" name="update_post" value="Update">
</div>
</form>