<?php 

function ConformQuery($result)
{
    global $conn;
    if(!$result)
    {
        die("Unable to insert bro".mysqli_error($conn));
    } 
}


function insert_categories()
{
    global $conn;
    if(isset($_POST['submit']))
    {
     $cat_title = $_POST['cat_title'];
     if( $cat_title=="" || empty($cat_title)) 
     {
         ?>
         <h3 id="info-message">This Field Should Not be Empty</h3>
         <script>
         setTimeout(function(){
         document.getElementById('info-message').style.display = 'none';}, 3000);
         </script>
         <?php
     }
     else
     {
         $query_for_add_category = "INSERT INTO categories(cat_title) VALUES ('$cat_title')";
         $result = mysqli_query($conn, $query_for_add_category);
         if(!$result)
         {
             die("Unable To add".mysqli_error($conn));
         }
    }
    }
}

function showAllCategories()
{
    global $conn;
    $query="SELECT * FROM categories ";
    $select_all_categories = mysqli_query($conn,$query);
    while($row = mysqli_fetch_assoc($select_all_categories))
    {
        $cat_id = $row['cat_id'];
        $cat_title = $row['cat_title']; 
        echo "<tr>";          
        echo "<td>{$cat_id}</td>";
        echo "<td>{$cat_title}</td>";
        echo "<td><a href='categories.php?delete={$cat_id}'>DELETE</a></td>";
        echo "<td><a href='categories.php?edit={$cat_id}'>EDIT</a></td>";
        echo "</tr>";
    }
}

function Delete_categories()
{
    global $conn;
    if(isset($_GET['delete']))
    {
        $the_cat_id =$_GET['delete'];
        $query_for_category_delete = "DELETE FROM CATEGORIES WHERE cat_id= $the_cat_id";
        $result = mysqli_query($conn,$query_for_category_delete);
        header("Location: categories.php");
        if(!$result)
        {
            die("Failed to delete".mysqli_error($conn));
        } 
    } 
}

?>