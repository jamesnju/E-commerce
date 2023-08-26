



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>view  product</title>
</head>
<body>
    <h3 class="text-center text-success">View Products</h3>
    <table class="table table-bordered mt-5">
        <thead >
            <tr>
                <th class="bg-info">Produc Id</th>
                <th class="bg-info">product Title</th>
                <th class="bg-info">Product Image</th>
                <th class="bg-info">product price</th>
                <th class="bg-info">Total Sold</th>
                <th class="bg-info">status</th>
                <th class="bg-info">edit</th>
                <th class="bg-info">Delete</th>
                <th class="bg-info"></th>
            </tr>
        </thead>
        <tbody >
            <?php
                $select_product="select * from `products`";
                $result_query=mysqli_query($con,$select_product);
                $number=0;
                while($row_fetch=mysqli_fetch_assoc($result_query)){
                    $product_id=$row_fetch['product_id'];
                    $product_title=$row_fetch['product_title'];
                    $product_image1=$row_fetch['product_image1'];
                    $product_price=$row_fetch['product_price'];
                    $status=$row_fetch['status'];
                   
                    $number++;
                    ?>
                <tr class='text-center'>
                    
                    <td class="bg-secondary text-light"><?php echo$number;?></td>
                    <td class="bg-secondary text-light"><?php echo$product_title;?></td>
                    <td class="bg-secondary text-light"><img src='./productimages/<?php echo $product_image1;?>' class='productimage'/></td>
                    <td class="bg-secondary text-light"><?php echo$product_price;?>/=</td>
                    <td class="bg-secondary text-light"><?php 
                        $get_total="select * from `orders_pending` where product_id=$product_id";
                        $totaL_result=mysqli_query($con,$get_total);
                        $row_count=mysqli_num_rows($totaL_result);
                        echo $row_count;
                    ?></td>
                    <td class="bg-secondary text-light"><?php echo $status;?></td>
                    
                    <td class="bg-secondary text-light"> <a href='index.php?edit_product=<?php echo $product_id; ?>' class='text-dark'> <i class='fa-solid fa-pen-to-square'></i> </a></td>
                    <td class="bg-secondary text-light"><a href='index.php?delete_product=<?php echo $product_id; ?>' class='text-dark'><i class='fa-solid fa-trash'></i></a></td>
                </tr>
                <?php

                }
            ?>
           
        </tbody>
    </table>
    
</body>
</html>