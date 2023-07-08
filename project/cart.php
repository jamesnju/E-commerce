<?php 
    include('./connection.php');
    include('./functions/functioncommon.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cartpage</title>
    <!--fonrawosome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
     crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
     integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css"> 
</head>
<body>
    <!--navbar-->
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <img src="./img/black-friday-elements-assortment.jpg" alt="LOGO" class="logo"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="displayAll.php">products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i>
          <sup>
            <?php
              getcartnumbers(); 
           ?></sup></a>
        </li>
       
      
      </ul>
    </div>
  </div>
</nav>
<!--sidebar-->
<?php
cart();//calling cart function
?>
    <nav class="navbar navbar-expand-lg bg-body-secondary">
        <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link" href="#">welcome guest</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Login</a>
        </li>

        </ul>

    </nav>
    <div class="bg-light">
        <h3 class="text-center">Hidden store</h3>
        <p class="text-center">commucincation</p>
    </div>
   <div class="container">
    <div class="row">
        <table class="table-border text-center">
            <tr>
                <thead>
                    <th>Product Title</th>
                    <th>Product image</th>
                    <th>Quantity</th>
                    <th>Total Price</th>
                    <th>Remove</th>
                    <th colspan="2">Operations</th>
                </thead>
                <tbody>
                    <?php
                        /*fetching cart itms from db*/
                        
                        global $con;
                        $ip = getIPAddress();
                        $total_price=0;
                        $select_ipquery="select * from `cart` where ip_address='$ip'";
                        $result = mysqli_query($con,$select_ipquery);
                        while($row=mysqli_fetch_array($result)){
                            $product_id=$row['product_id'];
                            $select_product="select * from `products` where product_id='$product_id'";
                            $result_query=mysqli_query($con,$select_product);
                            while($row_productprice=mysqli_fetch_array($result_query)){
                                $product_price=array($row_productprice['product_price']);
                                $price_table=$row_productprice['product_price'];
                                $product_title=$row_productprice['product_title'];
                                $product_image1=$row_productprice['product_image1'];
                                $product_values=array_sum($product_price);
                                $total_price+=$product_values;
                            
                       

                    ?>
                    <tr>
                        <td><?php echo $product_title ?></td>
                        <td><img src="./img/<?php echo $product_image1 ?>" alt=".."class="cart_img"></td>
                        <td><input type="text" class="form-input w-50" name="" id=""></td>
                        <td><?php echo $price_table ?></td>
                        <td>
                            <button  class="bg-info px-3 py-2 border-0 mx-3">Update</button><button  class="bg-info px-3 py-2 border-0 mx-3">Remove</button>
                        </td>
                    </tr>
                <?php                    }}?>    
                </tbody>    
            </tr>
        </table>
        <div>
            <!--subtotal-->
            <h4 class="px-3"><strong>Subtotal: <?php gettotalprice(); ?></strong></h4>
            <a href="index.php"><button class="bg-info px-3 py-2 border-0 mx-3">continue shopping</button></a>
            <a href="#"><button class="bg-dark text-light p-3 py-2 border-0 mx-3">Check Out</button></a>

        </div>
    </div>

   </div>

    <div class="footer">
        <?php 
            include('./footer.php');
        ?>
    </div>
    </div>



    <!--bootstrap js-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
     crossorigin="anonymous"></script>
    
</body>
</html>