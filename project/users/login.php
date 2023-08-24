<?php
    @session_start();
    include('../connection.php');
    include('../functions/functioncommon.php');
    
    if(isset($_POST['user_login'])){
        $username = $_POST['username'];
        $password =$_POST['password'];
        $user_ip = getIPAddress();
            //selecting userlogin details
        $sql_query="select * from `regislation` where username='$username'";
        $result_query=mysqli_query($con,$sql_query);
        $rows_count=mysqli_num_rows($result_query);//checks if the row is empty
        $row_data=mysqli_fetch_assoc($result_query);//fetches data stored in db

        // checkiing if user has itms in cart 
        $select="select * from `cart` where ip_address='$user_ip'";
        $result=mysqli_query($con,$select);
        $row_count_cart=mysqli_num_rows($result);

        if($rows_count>0){
            $_SESSION['username']=$username;
            //matching the hashed pass in the db for verification
            if(password_verify($password,$row_data['user_password'])){
                if($rows_count==1 AND $row_count_cart ==0){
                    echo "<script>alert('login successful')</script>";
                    echo "<script>window.open('profile.php','_self')</script>";
                }else{
                    $_SESSION['username']=$username;//storesthe userdetails
                    echo "<script>alert('login successful')</script>";
                    echo "<script>window.open('payment.php','_self')</script>";
                }
            }else{
                //echo "<h2 class='text-center text-danger'> wrong pass</h2>";
                echo "<script>alert('wrong username or password')</script>";
            }
            
        }else{
            echo "<script>alert('wrong username or password')</script>";
           // echo "<h2 class='text-center text-danger'> wrong pass</h2>";
        }

    }

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!--fonrawosome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
     crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
     integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css"> 
</head>
<body>
    <div class="container-fluid my-3">
        <h2 class="text-center">LOGIN FORM</h2>
        <div class="row d-flex align-items-center justify-content-center mt-5">
            <div class="col-lg-12 col-xl-6">
                <form action="" method="post" enctype="multipart/form-data">
                    <!-- username -->
                    <div class="form-outline mb-4">
                        <label for="username " class="form-label">username</label>
                        <input type="text " id="username" class="form-control" placeholder="username" autocomplete="off" required name="username">
                    </div>
                
                   <!--  password -->
                    <div class="form-outline mb-4">
                        <label for="password" class="form-label">password</label>
                        <input type="password" id="password" class="form-control" placeholder="password" autocomplete="off" required name="password">
                    </div>
                    
                    <div class="mt-4 pt-2">
                        <input type="submit" value="Login" class="bg-info py-3 px-3 border-0" name="user_login">
                    </div>
                    <p><a href="#"> forgot password ?</a></p>
                    <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account ?
                        <a href="registration.php" class="text-decoration-none"> Click here to Register</a></p>
                </form>
            </div>
        </div>
    </div>

    











<!--bootstrap js-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
     crossorigin="anonymous"></script>
    
</body>
</html>