<?php

if(isset($_GET['edit_category'])){
    $edit_category=$_GET['edit_category'];

    $get_categories="select * from `categories` where category_id=$edit_category";
    $result_query=mysqli_query($con,$get_categories);
    $row=mysqli_fetch_assoc($result_query);
    $category_title=$row['category_title'];
    

}
?>


<div class="container mt-3">
    <h2 class="text-center text-success">Edit Category</h2>
    <form action="" method="post" class="text-center">
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="category_title" class="form-label">Category Title</label>
            <input type="text" name="category_title" value="<?php echo $category_title; ?>" id="category_title" class="form-control" required/>

        </div>
        <input type="submit" name="edit_category_button" value="update category" class="btn btn-info px-3 mb-3">
    </form>
</div>

<?php
    if(isset($_POST['edit_category_button'])){
        $cat_title=$_POST['category_title'];

        $update_query="update `categories` set category_title='$cat_title' where category_id=$edit_category";
        $result_cat=mysqli_query($con,$update_query);
        if($result_cat){
            echo "<script>alert('category updated')</script>";
            echo "<script>window.open('index.php?viewcategories','_self')</script>";

        }
    }
?>