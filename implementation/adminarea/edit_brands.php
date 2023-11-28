<?php

if(isset($_GET['edit_brands'])){
    $edit_brand=$_GET['edit_brands'];

    $get_brands="select * from `brands` where brand_id=$edit_brand";
    $result_query=mysqli_query($con,$get_brands);
    $row=mysqli_fetch_assoc($result_query);
    $brand_title=$row['brand_title'];
    

}
?>


<div class="container mt-3">
    <h2 class="text-center text-success">Edit brands</h2>
    <form action="" method="post" class="text-center">
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="brand_title" class="form-label">Brand Title</label>
            <input type="text" name="brand_title" value="<?php echo $brand_title; ?>" id="brand_title" class="form-control" required/>

        </div>
        <input type="submit" name="edit_brand_button" value="update brands" class="btn btn-info px-3 mb-3">
    </form>
</div>

<?php
    if(isset($_POST['edit_brand_button'])){
        $brand_title=$_POST['brand_title'];

        $update_query="update `brands` set brand_title='$brand_title' where brand_id=$edit_brand";
        $result_brand=mysqli_query($con,$update_query);
        if($result_brand){
            echo "<script>alert('brands updated')</script>";
            echo "<script>window.open('index.php?viewbrands','_self')</script>";

        }
    }
?>