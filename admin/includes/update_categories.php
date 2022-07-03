
    <form action="" method="post">
    <label for="cat-title">Edit Category</label>
    <div class="form-group">
    <?php
    if(isset($_GET['edit']))
    { 
    $cat_id =$_GET['edit']; 
    $query="SELECT * FROM categories WHERE cat_id='{$cat_id}'";
    $select_categories_id = mysqli_query($conn,$query);
    while($row = mysqli_fetch_assoc( $select_categories_id))
    {
        $cat_id = $row['cat_id'];
        $cat_title = $row['cat_title']; 
        ?>
        <input value="<?php if(isset( $cat_title)){ echo $cat_title;} ?>" name="cat_title" class="form-control" type="text">

    <?php }}?> 

    <?php ///UPDATE QUERY
    if(isset($_POST['update_category']))
    {
        $cat_title =$_POST['cat_title'];
        $query_for_category_edit = "UPDATE categories SET cat_title ='{$cat_title}' WHERE cat_id = {$cat_id};";
        $result = mysqli_query($conn,$query_for_category_edit);
        if(!$result)
        {
            die("Failed to Edit".mysqli_error($conn));
        }
    }
        
    ?>





    </div>
    <div class="form-group">
    <input class="btn btn-primary" name="update_category" type="submit" value="update_category">
    </div>
    </form>