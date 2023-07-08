<?php
    include("../connection.php");

    if(isset($_POST['insertbrand'])){
        $brand_title = $_POST['cattitle'];

        $select_query = "select * from `brands` where brand_title=('$brand_title')";
        $select_result = mysqli_query($con, $select_query);
        $num = mysqli_num_rows($select_result);
        if($num>0){
            echo "<script>alert('brand already exists')</script>";
        }else{


            $insert_query = "insert into `brands`(brand_title) values ('$brand_title')";
            $result = mysqli_query($con, $insert_query);
            if($result){
                echo "<script>alert('brand inserted')</script>";
            }
        }    
    }
?>
        <h2 class="text-center">INSERT BRANDS</h2>
<form action="" method="post" class="mb-2">
    <div class="input-group w-90 mb-3">
        <span class="input-group-text bg-info"  id="basic-addon1"><i class="fa fa-receipt">

        </i></span>
        <input type="text" class="form-control" name="cattitle" placeholder="Insert brand"
        aria-label="brands" aria-describedby="basic-addon1">
    </div>
    <div class="input-group w-10 mb-2 m-auto">
        <input type="submit" class="bg-info my-3 p-2"
         name="insertbrand" value="Insert brands"
        >
    </div>
</form>