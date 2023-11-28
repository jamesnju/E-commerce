<?php 

    if(isset($_GET['delete_brands'])){
        $delete_id=$_GET['delete_brands'];

        $delete_query="delete from `brands` where brand_id=$delete_id";
        $result=mysqli_query($con,$delete_query);
        if($result){
            echo"<script>alert('brands deleted')</script>";
            echo"<script>window.open('index.php?viewbrands','_self')</script>";
        }
    }

?>