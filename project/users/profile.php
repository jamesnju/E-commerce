<?php 
    include('../connection.php');
    include('../functions/functioncommon.php');
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
</head>
<body>
    <!--navbar-->
    <div class="container-fluid1 p-0 mt-0">
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <img src="../img/black-friday-elements-assortment.jpg" alt="LOGO" class="logo"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="../index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../displayAll.php">products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="profile.php">My Account</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../cart.php"><i class="fa-solid fa-cart-shopping"></i>
          <sup>
            <?php
              getcartnumbers(); 
           ?></sup></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Total price
            <?php 
              gettotalprice();
            ?>/=
          </a>
        </li>
      
      </ul>
      <form class="d-flex" action="./searchproduct.php" method="get">
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
            <a class="nav-link" href="login.php">Login</a>
          </li>';
          }else{
            echo '<li class="nav-item">
            <a class="nav-link" href="logout.php">Logout</a>
          </li>';
          }
        ?>
        

        </ul>

    </nav>
    <div class="second">
        <h3 class="text-center">Refubished Store</h3>
        <p class="text-center">Communication is Key</p>
    </div>
    <!--product items-->
    <div class="row profilerow">
        <!--products-->
        <div class=" col-md-2">
          <ul class="navbar-nav profilepage text-center" style="height: 100vh;">
            <li class="nav-item">
                <a class="nav-link text-light"  href="profile.php"><h4>Your profile</h4></a>
            </li>
            <?php
            //fetching image from db
                $username=$_SESSION['username'];
                $select_image="select * from `regislation` where username='$username'";
                $result_image=mysqli_query($con,$select_image);
                $fetch_image=mysqli_fetch_array($result_image);
                $user_image=$fetch_image['user_image'];
                echo "
                <li class='backprofile nav-item' >
                <img src='./userimg/$user_image' class='profileimage' alt='userimage'/>
                </li>
                ";
            ?>
            <li class="nav-item">
                <a class="nav-link text-light"  href="profile.php">pending orders</a>
            </li>
            <li class="nav-item ">
                <a class="nav-link text-light"  href="profile.php?edit_account">Edit Account</a>
            </li>
            <li class="nav-item ">
                <a class="nav-link text-light"  href="profile.php?my_orders">My orders</a>
            </li>
            <li class="nav-item ">
                <a class="nav-link text-light"  href="profile.php?delete_account">Delete Account</a>
            </li>
            <li class="nav-item ">
                <a class="nav-link text-light"  href="logout.php">Logout</a>
            </li>
          </ul>
        </div>
        <div class="col-md-10">
            <?php
              getUserOrder();
              if(isset($_GET['edit_account'])){
                include('editaccount.php');
              }
              //myorders
              if(isset($_GET['my_orders'])){
                include('userorders.php');
              }
              //delete
              if(isset($_GET['delete_account'])){
                include('deleteaccount.php');
              }
            ?>
        </div>
       
    </div>

    <div class="footer">
        <?php 
            include('../footer.php');
        ?>
    </div>
    </div>



    <!--bootstrap js-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
     crossorigin="anonymous"></script>
    
</body>
</html>