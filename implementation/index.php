<?php 
    include('./connection.php');
    include('./functions/functioncommon.php');
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ecommerce</title>
    <!--fonrawosome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
     crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
     integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css"> 
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</head>
<body>
    <!--navbar-->
    <div class="container-fluid1 p-0">
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <img src="./img/logo.png" alt="LOGO" class="logo"></a>
      <ul class="length navbar-nav me-auto mb-2 mb-lg-0 ">
        <!-- <li class="nav-item">
          <a class="nav-link " aria-current="page" href="index.php">product</a>
        </li> -->
        <li class="nav-item">
          <a class="nav-link" href="displayAll.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./jude/About us.php">About</a>
        </li>
        <!-- <li class="nav-item">
          <a class="nav-link" href="sell.php">Sell</a>
        </li> -->
        <?php
          if(isset($_SESSION['username'])){
            echo "<li class='nav-item'>
            <a class='nav-link' href='./users/profile.php'>My Account</a>
          </li>";
          }else{
            echo "<li class='nav-item'>
            <a class='nav-link' href='./users/registration.php'></a>
          </li>";
          }
        ?>
        <li class="nav-item">
          <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i>
          <sup>
            <?php
              getcartnumbers(); 
          ?></sup></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Price
            <?php 
              gettotalprice();
            ?>/=
          </a>
        </li>
      
      </ul>
      <form class="d-flex" action="searchproduct.php" method="get">
        <input class="form-control me-2" name="search_data" type="search" placeholder="Search" aria-label="Search">
        <!--<button class="btn btn-outline-dark" type="submit">Search</button>-->
        <input type="submit" value="search" name="searchdata" class="btn btn-outline text-light">
      </form>
    </div>
  </div>
</nav>
<!--sidebar-->
<?php
cart();//calling cart function
?>
    <nav class="welcom navbar navbar-expand-lg">
        <ul class="navbar-nav me-auto">
        <?php 
        //displays username if logged in
        if(!isset($_SESSION['username'])){
          echo '<li class="nav-item">
          <a class="nav-link" href="#">Welcome Guest</a>
        </li>';
        }else{
          echo '<li class="nav-item">
          <a class="nav-link" href="#">Welcome '.$_SESSION['username'].'</a>
        </li>';
        }
      ?>
        
        <?php //checks if user is logged in or not
        
          if(!isset($_SESSION['username'])){
            echo '<li class="nav-item">
            <a class="nav-link" href="./users/login.php">Login</a>
          </li>';
          }else{
            echo '<li class="nav-item">
            <a class="nav-link" href="./users/logout.php">Logout</a>
          </li>';
          }
        ?>
        
        </ul>
    </nav>-
    <div class="second">
        <h3 class="text-center ">Nafuu Commerce</h3>
        <p class="text-center">Buyers Best Option</p>
    </div>
    <!--product items-->
    <div class="row outsiderow">
        <!--products-->
        <div class="col-md-10">
            <div class="row insiderow">
                <?php
                
                getproducts();
                getuniquebrands();
                getuniquecategories();
                //$ip = getIPAddress(); 
                //echo 'User Real IP Address - '.$ip;
                
                
                /*

                    $select_query="select * from `products` order by rand() limit 0.9";// limit showsmax number of product to view per page you can by order product title or random
                    $result = mysqli_query($con,$select_query);
                    while($row=mysqli_fetch_assoc($result)){
                        $product_title = $row['product_title'];
                        $product_description = $row['product_description'];
                        $product_keywords = $row['product_keywords'];
                        $category_id = $row['category_id'];
                        $brand_id = $row['brand_id'];
                        $product_image1 = $row['product_image1'];
                        $product_image2 = $row['product_image2'];
                        $product_image3 = $row['product_image3'];
                        $product_price = $row['product_price'];
                        
                        echo "<div class='col-md-4 mb-3'>
                        <div class='card'>
                            <img src='../adminarea/productimages/$product_image2' class='card-img-top' alt='$product_title'>
                            <div class='card-body'>
                                <h5 class='card-title'>$product_price </h5>
                                <h5 class='card-title'>$product_title </h5>
                                <p class='card-text'>$product_description</p>
                                <a href='#' class='btn btn-info'>Add to cart</a>
                                <a href='#' class='btn btn-info'>View more</a>
                            </div>
                        </div>";
                    }
                    */
                ?>
            </div>
        </div>
        <!--sidenavbar-->
        <div class="col-md-2 bg-dark p-0">
            <ul class="navbar-nav me-auto text-center">
                <!--brands-->
                <li class="nav-item bg-dark">
                    <a href="#" class="nav-link text-dark bg-light"><h4>BRANDS</h4></a>
                </li>
                <?php
                    getbrands();
                    //getuniquebrands();
                    /*
                
                    $select_query = "select * from `brands` ";
                    $select_result = mysqli_query($con,$select_query);
                    while($row_data = mysqli_fetch_assoc($select_result)){
                        $brand_title = $row_data['brand_title'];
                        $brand_id = $row_data['brand_id'];
                        echo "<li class='nav-item bg-dark'>
                        <a href='index.php?brand=$brand_id' class='nav-link text-light'>$brand_title</a>
                    </li>";
                    }*/
                
                ?>
            </ul>
            <!--category-->
            <ul class="navbar-nav mg-auto text-center">
                <li class="nav-item bg-dark">
                    <a href="#" class="nav-link text-dark bg-light"><h4>CATEGORY</h4></a>
                </li>
                <?php
                
                getcategory();
                /*
                $select_query = "select * from `categories`";
                $result = mysqli_query($con,$select_query);
                while($row = mysqli_fetch_assoc($result)){
                    $category_title = $row['category_title'];
                    $category_id = $row['category_id'];
                    echo "<li class='nav-item bg-dark'>
                    <a href='index.php?category=$category_id' class='nav-link text-light'>$category_title</a>
                </li>";
                }*/
                
                
                ?>
            </ul>
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