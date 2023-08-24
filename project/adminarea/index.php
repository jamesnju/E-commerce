<?php
    include("../connection.php");
    include('../functions/functioncommon.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin Pannel</title>
    <!--fonrawosome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
     crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
     integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="../styles.css">
</head>
<body>
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
            <div class="container-fluid">
                <img src="../img/user.png" alt="Amin" class="admin p-0">

                <nav class="navbar navbar-expand-lg ">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="" class="nav-link">welcome guest</a>
                        </li>
                    </ul>

                </nav>
            </div>
        </nav>
        <div class="bg-light">
            <h3 class="text-center p-2">Manage Details</h3>

        </div>
        <div class="row">
            <div class="col-md-12 bg-secondary p-1 d-flex align-items-center">
                <div class=" p-5">
                    <a href="" ><img src="../img/black-friday-elements-assortment.jpg" class="adminname" alt=""></a>
                    <p class="text-light text-center">Admin Name</p>
                </div>
                

                <div class="button text-center">
                    <button class="my-3"><a href="insertproduct.php" class="nav-link text-light bg-dark my-1">Insert product</a></button>
                    <button><a href="index.php?viewproducts" class="nav-link text-light bg-dark my-1">View products</a></button>
                    <button><a href="index.php?insertcategory" class="nav-link text-light bg-dark my-1">Insert Categories</a></button>
                    <button><a href="index.php?viewcategories" class="nav-link text-light bg-dark my-1">View categories</a></button>
                    <button><a href="index.php?insertbrand" class="nav-link text-light bg-dark my-1">Insert Brands</a></button>
                    <button><a href="index.php?viewbrands" class="nav-link text-light bg-dark my-1">View Brands</a></button>
                    <button><a href="" class="nav-link text-light bg-dark my-1">All orders</a></button>
                    <button><a href="" class="nav-link text-light bg-dark my-1">All payments</a></button>
                    <button><a href="" class="nav-link text-light bg-dark my-1">List users</a></button>
                    <button><a href="" class="nav-link text-light bg-dark my-1">Logout</a></button>
                </div>
            </div>
        </div>
        <div class="container my-5">
            <?php 
            /*we use get to get the insert category variable*/
                if(isset($_GET['insertcategory'])){
                    include('insertcategories.php');/*if the cartegory button is active we get the file*/
                }
                if(isset($_GET['insertbrand'])){
                    include('insertbrands.php');
                }
                if(isset($_GET['viewproducts'])){
                    include('viewproduct.php');
                }
                if(isset($_GET['edit_product'])){
                    include('edit_product.php');
                }
                if(isset($_GET['delete_product'])){
                    include('delete_product.php');
                }
                if(isset($_GET['viewcategories'])){
                    include('viewcategories.php');
                }
                if(isset($_GET['viewbrands'])){
                    include('viewbrands.php');
                }
                if(isset($_GET['edit_category'])){
                    include('edit_category.php');
                }
                if(isset($_GET['edit_brands'])){
                    include('edit_brands.php');
                }
                if(isset($_GET['delete_category'])){
                    include('delete_category.php');
                }
            ?>
        </div>
       
        

    </div>


    <div class="footer">
        <?php 
            
            include('../footer.php');
        ?>
    </div>





 <!--bootstrap js-->
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
     crossorigin="anonymous"></script>
</body>
</html>