



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
        <thead class="bg-info">
            <tr>
                <th>Produc Id</th>
                <th>product Title</th>
                <th>Product Image</th>
                <th>product price</th>
                <th>Total Sold</th>
                <th>status</th>
                <th>edit</th>
                <th>Delete</th>
                <th></th>
            </tr>
        </thead>
        <tbody class="bg-secondary text-light">
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
                    
                    <td><?php echo$product_id;?></td>
                    <td><?php echo$product_title;?></td>
                    <td><img src='../productimages/<?php echo $product_image1;?>' class='productimage'/></td>
                    <td><?php echo$product_price;?>/=</td>
                    <td><?php 
                        $get_total="select * from `orders_pending` where product_id=$product_id";
                        $totaL_result=mysqli_query($con,$get_total);
                        $row_count=mysqli_num_rows($totaL_result);
                        echo $row_count;
                    ?></td>
                    <td><?php echo $status;?></td>
                    
                    <td> <a href='index.php?edit_product=<?php echo $product_id; ?>' class='text-dark'> <i class='fa-solid fa-pen-to-square'></i> </a></td>
                    <td><a href='index.php?delete_product=<?php echo $product_id; ?>' class='text-dark'><i class='fa-solid fa-trash'></i></a></td>
                </tr>
                <?php

                }
            ?>
           
        </tbody>
    </table>
    
</body>
</html>