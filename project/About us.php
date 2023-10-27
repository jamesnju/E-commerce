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
        <h3 class="text-center">About Us</h3>
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
    <div class="mainsection">    
    <section class="section">
        <h2>Our Story</h2>
        <p>Welcome to our innovative company! For many years, we've been on a mission to revolutionize the way people access high-quality products. Our unique system involves acquiring secondary products from their original owners, meticulously refurbishing them to meet specific needs, and then making them available to you at an incredibly affordable cost.</p>
        <p>But it's not just about savings. Our system champions the principles of sustainability, affordability, and quality assurance. We believe in the power of reusing products to reduce waste, and our commitment to sustainability goes hand in hand with our promise of quality. Our customers enjoy a seamless and improved transaction experience, all while contributing to a greener, more sustainable future.</p>

    </section>
    <section class="section">
        <section class="section">
        <h2>Our Team</h2><br>
        <p>Meet the talented individuals who make our company great...</p>
        </section>
        <div class="team">
            <img src="./jude/team/WhatsApp Image 2023-10-11 at 11.25.10 PM.jpeg" alt="Our Team">
            <p><strong> CLITON PETER</strong></p>
            <p>PROJECT MANAGER</p>
        </div>
        <div class="team">
            <img src="./jude/team/jude.jpeg" alt="Our Team">
            <p><strong> JUDE  ORINA</strong></p>
            <p>DEVELOPER</p>
        </div> 
        <div class="team">
            <img src="./jude/team/stell.jpeg" alt="Our Team">
            <p><strong>STELLAR MBUTHIA</strong></p>
            <p>PROJECT DESIGNER</p>
        </div>     
        <div class="team">
            <img src="./jude/team/james.jpg" alt="Our Team">
            <p><strong>JAMES NJUGUNA</strong></p>
            <p>DEVELOPER</p>
        </div> 
        <div class="team">
            <img src="./jude/team/rich2.jpeg" alt="Our Team">
            <p><strong>RICHARD OTIENO</strong></p>
            <p>MORAL SUPPORT</p>
        </div> 
        <div class="team">
            <img src="./jude//team/fich.jpeg" alt="Our Team">
            <p><strong>CYTHIA MUEMBI</strong></p>
            <p>DESIGNER DEVELOPER</p>
        </div> 
        <div class="team">
            <img src="./jude/team.jpeg" alt="Our Team">
            <p><strong>JUSH</strong></p>
            <p>DEVELOPER</p>
        </div> 
    </section>
    <section class="section">
        <h2>Our Mission</h2>
        <p>Our mission is to provide high-quality products and services to our clients...</p>
    </section>
    </div>
    <div class="footer">
        <?php 
            include('./footer.php');
        ?>
    </div>
</body>
</html>
