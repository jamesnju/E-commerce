<?php 

    if(isset($_GET['delete_category'])){
        $delete_id=$_GET['delete_category'];

        $delete_query="delete from `categories` where category_id=$delete_id";
        $result=mysqli_query($con,$delete_query);
        if($result){
            echo"<script>alert('category deleted')</script>";
            echo"<script>window.open('index.php?viewcategories','_self')</script>";
        }
    }

?>