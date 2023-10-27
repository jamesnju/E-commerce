<?php 
    include('./connection.php');


    if(isset($_POST['sell'])){
        $fname = $_POST['name'];
        $id= $_POST['nationalid'];
        $sellprice = $_POST['Amount'];
        $item= $_POST['itemname'];
        $whysell = $_POST['itemage'];
        $proof = $_POST['image'];
        $description =$_POST['description'];
        $product_image=$_POST['productimage'];
        $proof = $_POST['proofidentity'];

        /*inserting images*/
        $product_image1 = $_FILES['productimage']['name'];
        $proof = $_FILES['proof']['name'];
        

        /*give images tempory names*/
        $temp_image1 = $_FILES['productimage']['tmp_name'];
        $temp_image2 = $_FILES['proof']['tmp_name'];
        

        $Sql = "insert into `seller_detail` (seller_id,seller_fname,national_id	price,item_name,reason,item_image,proof,description) values ($fname
        $id ,$sellprice,$item,$whysell,$proof,$description,$product_image,$proof)";
        $result=mysqli_query($con, $Sql);
        if($result){
            echo"success";
        }
    }
    
?>
<DOCTYPE html>
<html>

 <body>
    <div class="sellcont">
        <fieldset>
        <form action="" class="form">
            <label for=""><p>Full Name</p>
                <input type="text" placeholder="Enter Name" name="name" required>
            </label>
            <label for=""><p>National Id</p>
                <input type="number" name="nationalid" placeholder="national id" maxlength="8" required>
            </label>
            <label for=""><p>Selling Price</p>
                <input type="number" name="Amount" placeholder="Enter price of the item" required>
            </label>
            <label for=""><p>Item Name</p>
                <input type="text" name="itemname" placeholder="Name of item" required>
            </label>
            <div class="age">
            <label for=""><p>Reason for selling the item?</p>
            <input type="radio" name="itemage"  value="on" required><p>Bout New items</p>
            <input type="radio" name="itemage"  value="on" required><p>Old</p>
            <input type="radio" name="itemage"  value="on" required><p> Relocation</p>
            <input type="radio" name="itemage"  value="on" required><p>Unused</p>
            <input type="radio" name="itemage"  value="on" required><p>Earn Income</p>
            </label>
            </div>
            <label for=""><p>Image</p>
                <input type="file" name="productimage">
            </label>
            <label for=""><p>Proof of Ownership</p>
                <input type="file" name="proofidentity" required>
            </label>
            <label for=""><p>Product Description</p>
                <input type="text" placeholder="Enter short description ofyour item"  name="description" required>
            </label>
            <button name="sell">Submit</button>   
        </form>
        </fieldset>
        

    </div>
      

</body>
</html>