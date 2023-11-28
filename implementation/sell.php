<?php 
    include('./connection.php');
    // include('./functions/functioncommon.php');
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
    <link rel="stylesheet" href="./styles.css"> 
    
    <!-- <link rel="stylesheet" href="cascade.css"> -->
</head>
<body>
    <!--navbar-->
    <div class="container-fluid1 p-0">
        <nav class="navbar navbar-expand-lg">
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
          if(!isset($_SESSION['username'])){
            echo '<li class="nav-item">
            <a class="nav-link" href="login.php">Login</a>
          </li>';
          }else{
            echo '<li class="nav-item">
            <a class="nav-link" href="./users/logout.php">Logout</a>
          </li>';
          }
        ?>

        </ul>

    </nav>
    <?php
            if(!isset($_SESSION['username'])){
              include('./selllogin.php');
            }else{
              include('./upload.php');
            }
            ?>
            <a href=""></a>
        </form>
    </fieldset>
    <div class="footer">
        <?php 
            include('./footer.php');
        ?>
    </div>
</body>
</html>