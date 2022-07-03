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
                        <h1 class="page-header">
                            Welcome 
                            <small><?php echo $_SESSION['username']; ?></small>
                        </h1>
                       <div class="col-xs-6">
                        <?php     
                        insert_categories();
                        ?>

                       <form action="categories.php" method="post">
                        <label for="cat-title">Category Name</label>
                        <div class="form-group">
                            <input name="cat_title" class="form-control" type="text">
                        </div>
                        <div class="form-group">
                            <input class="btn btn-primary" name="submit" type="submit" value="Add Category">
                        </div>
                       </form>
                        <?php //update Categories 
                        if(isset($_GET['edit']))
                        {
                            $cat_id =$_GET['edit'];
                            include "includes/update_categories.php"; 
                        }
                        ?>


                       </div>
                       <div class="col-xs-6">
                       <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Category Title</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php  showAllCategories(); ?>
                        <?php Delete_categories();?>
                        </tbody>
                       </table>                       
                        </div>

                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
<?php include "includes/admin_footer.php"?>


