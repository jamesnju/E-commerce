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
    <link rel="stylesheet" href="../styles.css"> 
    <!-- <link rel="stylesheet" href="cascade.css"> -->
</head>
<body>
    <!--navbar-->
    <div class="container-fluid1 p-0">
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <img src="../img/logo.png" alt="LOGO" class="logo"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="length navbar-nav me-auto mb-2 mb-lg-0">
        <!-- <li class="nav-item">
          <a class="nav-link" aria-current="page" href="../index.php">Home</a>
        </li> -->
        <li class="nav-item">
          <a class="nav-link" href="../displayAll.php">Home</a>
        </li>
        <!-- <li class="nav-item">
            <a class="nav-link" href="../users/registration.php">Register</a>
        </li> -->
        <li class="nav-item">
          <a class="nav-link" href="../cart.php"><i class="fa-solid fa-cart-shopping"></i></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Price</a>
        </li>
      
      </ul>
      <form class="d-flex" action="../searchproduct.php" method="get">
        <input class="form-control me-2" name="search_data" type="search" placeholder="Search" aria-label="Search">
        <!--<button class="btn btn-outline-dark" type="submit">Search</button>-->
        <input type="submit" value="search" name="searchdata" class="btn btn-outline text-light">
      </form>
    </div>
  </div>
</nav>
<!--sidebar-->
    <nav class="welcom navbar navbar-expand-lg">
        <ul class="navbar-nav me-auto">
        <?php 
        //displays username ifuser is  logged in
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
        <?php 
        //checks if user is logged in or not
        if(!isset($_SESSION['username'])){
          echo '<li class="nav-item">
          <a class="nav-link" href="../users/login.php">Login</a>
        </li>';
        }else{
          echo '<li class="nav-item">
          <a class="nav-link" href="../users/logout.php">Logout</a>
        </li>';
        }
      ?>

        </ul>

    </nav>
    <div class="second">
        <h3 class="text-center text-success">NAFUU COMMERCE  STORE FAQ</h3>
        <p class="text-center">communication is Key</p>
    </div>
    <!--product items-->
    <div class="row">
        <!--products-->
        <div class="col-md-10">
            <div class="row">
                <?php
                searchproducts();
                ?>
            </div>
        </div>
    </div>
<div class="faq bg-light">
    <div class="section">
    <h2>1. Q.How can I order?</h2>
    <p>A. You can order by using our platform.when you find a product you need,add to cart, login and go through the process.</p>
    </div>
    <div class="section">
    <h2>2. Q.What payment methods can we use?</h2><br><br>
    <p>A. You can make your payment offline or Online payment by follwing the simple steps. </p>
    </div>
   <div class="section">
   <h2>3. Q.Do you have the product in stock?</h2>
    <p >A.All the products shown  on our site are in stock.Order lead time depends on the  products and quantities</p>
   </div>
   <div class="section">
   <h2>4.How can i retrive my password?</h2>
    <p>A.Just click on forgot password instruction on password retrival will be sent to your email.</p>
    
   </div>
   <div class="section">
   <h2>5. Q.Shipping time?</h2>
    <p> A. Shipping time will be confirmed once the order confirmation has been confirmed  and payment received, the items purchased will be  received within 24 hour</p>
    
   </div>
   <div class="section">
   <h2>6. Q.Shipping cost?</h2>
    <p> A.Shipping cost is dependent on the products you order as well as your place of locality or the location where the good is to be delivered</p>
    
   </div>
   <div class="footer">
        <?php 
            include('./footer.php');
        ?>
    </div>
</div>    
</body>
</html>