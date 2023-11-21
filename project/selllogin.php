<?php
    @session_start();
    include('./connection.php');

    if (isset($_POST['seller_login'])) {
        $username  = $_POST['username'];
        $password  = $_POST['password'];
    
        $select_sql = "SELECT * FROM `sellregistration` WHERE seller_username='$username'";
        $result = mysqli_query($con, $select_sql);
    
        if ($result) {
            $user_data = mysqli_fetch_assoc($result);
    
            if ($user_data && password_verify($password, $user_data['password'])) {
                echo "<script>alert('Login Successful')</script>";
                echo "<script>window.open('upload.php', '_self')</script>";
            } else {
                echo "<script>alert('Invalid username or password')</script>";
            }
        } else {
            echo "<script>alert('Error in database query')</script>";
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
    <link rel="stylesheet" href="../styles.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
 
</head>
<body>
    <div class="container-login">
        <fieldset>
            <h2 class="text-center">SEll LOGIN FORM</h2>
            <div class="row ">
                <div class="co">
                    <form class="form" action="" method="post" enctype="multipart/form-data">
                        <!-- username -->
                        <div >
                            <label for="username " class="form-label"><p>username</p></label>
                            <input type="text " id="username" class="form-control" placeholder="username" autocomplete="off" required name="username">
                        </div>
                    <!--  password -->
                        <div>
                            <label for="password" class="form-label"><p>password</p></label>
                            <input type="password" id="password" class="form-control" placeholder="password" autocomplete="off" required name="password">
                        </div>
                        
                        <div class="btnlog">
                            <button type="submit" name="seller_login">Login</button>
                        </div>
                        <p><a href="#"> Forgot password ?</a></p>
                        <p class="s">Don't have an account ?
                            <a href="sellregislation.php" class="text-decoration-none"> Click here to Register</a></p>
                    </form>
                </div>
            </div>
        </fieldset>
    </div>
<script>
    swal({
  title: "Good job!",
  text: "You clicked the button!",
  icon: "success",
  button: "Aww yiss!",
});
</script>
    










    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


<!--bootstrap js-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
     crossorigin="anonymous"></script>
    
</body>
</html>