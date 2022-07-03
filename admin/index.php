<?php include "includes/admin_header.php"?>
    <div id="wrapper">
        <!-- Navigation -->
        <?php include "includes/admin_navigation.php"?>
        <!-- Navigation -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                
                    <div class="col-lg-12">
                        <!-- <marquee behavior="" direction="" scrollamount="12"> -->
                        <h1 class="page-header">
                            Welcome 
                            <small><?php echo $_SESSION['username'] ?></small>
                        </h1>
                        <!-- </marquee> -->
     
                <!-- /.row -->
                
                <div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-file-text fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
<?php 
$query_for_count_posts = "SELECT * FROM posts";
$result= mysqli_query($conn,$query_for_count_posts);
$post_count = mysqli_num_rows($result);
echo "<div class='huge'>$post_count</div>";
?>
                        <div>Posts</div>
                    </div>
                </div>
            </div>
            <a href="posts.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-comments fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
<?php 
$query_for_count_comments = "SELECT * FROM comments";
$result= mysqli_query($conn,$query_for_count_comments);
$comments_count = mysqli_num_rows($result);
echo "<div class='huge'>$comments_count</div>";
?>
                      <div>Comments</div>
                    </div>
                </div>
            </div>
            <a href="comments.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-user fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
<?php 
$query_for_count_users = "SELECT * FROM users";
$result= mysqli_query($conn,$query_for_count_users);
$users_count = mysqli_num_rows($result);
echo "<div class='huge'>$users_count</div>";
?>
                        <div> Users</div>
                    </div>
                </div>
            </div>
            <a href="users.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-list fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                    <?php 
$query_for_count_categories = "SELECT * FROM categories";
$result= mysqli_query($conn,$query_for_count_categories);
$categories_count = mysqli_num_rows($result);
echo "<div class='huge'>$categories_count </div>";
?>
                         <div>Categories</div>
                    </div>
                </div>
            </div>
            <a href="categories.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
</div>
                <!-- /.row -->



<div class="row">

<?php 
$query_for_count_drafted_posts = "SELECT * FROM posts WHERE post_status='draft'";
$result= mysqli_query($conn,$query_for_count_drafted_posts);
$post_draft_count = mysqli_num_rows($result);


$query_for_count_unapproved_comments = "SELECT * FROM comments WHERE comment_status='Unapproved'";
$result= mysqli_query($conn,$query_for_count_unapproved_comments);
$comments_unapproved_count = mysqli_num_rows($result);


$query_for_count_subcribers = "SELECT * FROM users WHERE user_role='Subscriber'";
$result= mysqli_query($conn,$query_for_count_subcribers);
$subcriber_count = mysqli_num_rows($result);

?>




<script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Data','Count'],
          ['posts',<?php echo  $post_count ?>],
          ['draft_posts',<?php echo $post_draft_count ?>],
          ['comments',<?php echo  $comments_count ?>],
          ['Unapporved_comments',<?php echo  $comments_unapproved_count ?>],
          ['users',<?php echo  $users_count ?>],
          ['subscribers',<?php echo  $subcriber_count ?>],
          ['posts',<?php echo  $post_count ?>]
        ]);

        var options = {
          chart: {
            title: '',
            subtitle: '',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
  <div id="columnchart_material" style="width: 'auto'; height: 500px;"></div>





</div>

                

                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
<?php include "includes/admin_footer.php"?>

