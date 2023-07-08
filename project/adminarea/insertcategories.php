<?php
    include("../connection.php");

    if(isset($_POST['insertcategories'])){
        $category_title = $_POST['cattitle'];

        /*checking if it exists into the database*/
        $select_query = "select * from `categories` where category_title=('$category_title')";
        $select_result = mysqli_query($con, $select_query);
        $number = mysqli_num_rows($select_result);
        if($number>0){
            echo "<script>alert('already inserted')</script>";
        }else{
            /*inserting inot the dbs*/
            $insert_query = "insert into `categories` (category_title) values ('$category_title')";
            $resut = mysqli_query($con, $insert_query);
            if($resut){
                echo "<script>alert('successfull')</script>";
            }
        }
    }




?>
<h2 class="text-center">INSERT CATEGORIES</h2>
<form action="" method="post" class="mb-2">
    <div class="input-group w-90 mb-3">
        <span class="input-group-text bg-info"  id="basic-addon1"><i class="fa fa-receipt">

        </i></span>
        <input type="text" class="form-control" name="cattitle" placeholder="Insert category"
        aria-label="categories" aria-describedby="basic-addon1">
    </div>
    <div class="input-group w-10 mb-2 m-auto">
        <input type="submit" class="bg-info border-0 p-2 my-3"
         name="insertcategories" value="Insert categories"
        >
    </div>
</form>