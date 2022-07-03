<?php  include "includes/db.php";?>
<?php include "includes/header.php"?>
<?php include "includes/navigation.php"?>
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

<?php
      $the_post_id=0;
    if(isset($_GET['p_id']))
    {
        $the_post_id = $_GET['p_id'];
    }
    $query = "SELECT * FROM posts where post_id =  $the_post_id";
    $select_all_posts_query = mysqli_query($conn,$query);
    while($row = mysqli_fetch_assoc($select_all_posts_query))
    {
                $post_title = $row['post_title'];
                $post_author = $row['post_author'];
                $post_date = $row['post_date'];
                $post_content = $row['post_content'];
                $post_image = $row['post_image'];
              ?>


                <!-- First Blog Post -->
                <h2>
                    <a href="#"><?php echo $post_title ?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $post_author ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date ?></p>
                <hr>
                <img class="img-responsive" src="images/<?php echo $post_image?>" alt="">
                <hr>
                <p><?php echo  $post_content ?></p>
                <hr>
<?php  } ?>


<?php 
    if(isset($_POST['create_comment']))
    {
        $comment_post_id = $_GET['p_id'];
        $comment_email = $_POST['comment_email'];
        $comment_content = $_POST['comment_content'];
        $comment_author = $_POST['comment_author'];
        $query = "INSERT INTO comments(comment_post_id,comment_author,comment_email,comment_content,
        comment_status,comment_date) ";
        $query.= "VALUES ($comment_post_id,'{$comment_author}','{$comment_email}','{$comment_content}',
        'Unapproved',now())";  
        $result = mysqli_query($conn,$query);
        if(!$result)
        {
            die("Unable to Post comment".mysqli_error($conn));
        }  
        $query_to_increase_comment_count = "UPDATE posts SET post_comment_count = post_comment_count+1 ";
        $query_to_increase_comment_count.="WHERE post_id=$comment_post_id";
        $result_increase = mysqli_query($conn,$query_to_increase_comment_count);
        if(!$result_increase)
        {
            die("Unable to increase");
        }   
    }
  ?>


<div class="well">
 <h4>Leave a Comment</h4>
 <form action="" method="post" role="form">
   <div class="form-group">
    <label for="comment_email">Email</label>
    <input type="text" name="comment_email" class="form-control">
   </div>
   <div class="form-group">
    <label for="comment_author">Author</label>
    <input type="text" name="comment_author" class="form-control">
   </div>
   <div class="form-group">
    <label for="comment_content">Write Ur comment</label>
    <textarea name="comment_content" class="form-control"></textarea>
   </div>
   <button type="submit" name="create_comment" class="btn btn-primary">Submit</button>
 </form>


</div>            





                <h1>Posted Comments</h1>
               <?php 
               
               $query_for_display_comments = "SELECT * FROM comments WHERE comment_post_id=$the_post_id ";
               $query_for_display_comments.="AND comment_status='Approved' ORDER BY comment_id DESc";
               $result = mysqli_query($conn,$query_for_display_comments);
               if(!$result)
               {
                die("Unable Show Comments");
               }
               while($row=mysqli_fetch_assoc($result))
               {
                 $comment_email = $row['comment_email'];
                 $comment_author = $row['comment_author'];
                 $comment_date = $row['comment_date'];
                 $comment_content = $row['comment_content'];
                ?>

                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><?php echo $comment_author ?>
                            <small><?php echo $comment_date ?></small>
                        </h4>
                        <?php echo $comment_content ?>
                    </div>
                </div>


               <?php } ?>
            </div>
           
         <?php include "includes/sidebar.php" ?>
        </div>
        <!-- /.row -->

        <hr>

<?php include "includes/footer.php" ?> 