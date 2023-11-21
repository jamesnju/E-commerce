<?php 
    include('./connection.php');
    include('./functions/functioncommon.php');

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
    <div class="container-fluid1 p-0 mt-0">
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <img src="./img/logo.png" alt="LOGO" class="logo"></a>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="length navbar-nav me-auto mb-2 mb-lg-0">
        <!-- <li class="nav-item">
          <a class="nav-link" aria-current="page" href="index.php">procts</a>
        </li> -->
        <li class="nav-item">
          <a class="nav-link" href="displayAll.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="About us.php">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="sell.php">Sell</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="faq.php">FAQ</a>
        </li>
        <!-- <li class="nav-item">
          <a class="nav-link" href="./users/registration.php">Register</a>
        </li> -->
        <li class="nav-item">
          <a class="nav-link" href="./cart.php"><i class="fa-solid fa-cart-shopping"></i><sup>
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
        <input class="form-control me-2 " name="search_data" type="search" placeholder="Search" aria-label="Search">
        <!--<button class="btn btn-outline-dark" type="submit">Search</button>-->
        <input type="submit" value="search" name="searchdata" class="btn btn-outline text-light">
      </form>
    </div>
  </div>
</nav>
<!--sidebar-->
    <nav class="welcom navbar navbar-expand-lg ">
        <ul class="navbar-nav me-auto">
        <?php 
        
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

    </nav>
    <div class="second">
        <h3 class="text-center text-success">Nafuu  Commerce</h3>
        <p class="text-center">Buyers Best Option</p>
    </div>
    
    <div class="sellcont">
    <h1 class="text-center text-success">Fill the form to Sell</h1>
        <fieldset>
        <form action="" class="form">
            <label for=""><p>Full Name</p>
                <input type="text" placeholder="Enter Name" name="name" required>
            </label>
            <label for=""><p>National Id</p>
                <input type="number" name="nationalid" placeholder="national id" min='0'  maxlength="8" ma required>
            </label>
            <label for=""><p>Selling Price</p>
                <input type="number" name="Amount" placeholder="Enter price of the item" required>
            </label>
            <label for=""><p>Item Name</p>
                <input type="text" name="itemname" placeholder="Name of item" required>
            </label>
            <div class="age">
              <p>Reason for selling the item?</p>
              <label>
              <input type="radio" name="itemage"  value="on" required><p>Upgrade</p>
              <input type="radio" name="itemage"  value="on" required><p>Old</p>
              <input type="radio" name="itemage"  value="on" required checked><p> Relocation</p>
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