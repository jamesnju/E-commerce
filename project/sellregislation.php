<?php
    include('./connection.php');
    include('./functions/functioncommon.php');


    if (isset($_POST['seller_register'])) {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];
    
        if ($password != $confirm_password) {
            echo "<script>alert('Passwords do not match')</script>";
        } else {
            $hash_password = password_hash($password, PASSWORD_DEFAULT);
            $select = "SELECT * FROM `sellregistration` WHERE seller_username='$username' OR selleremail='$email'";
            $select_result = mysqli_query($con, $select);
            $row = mysqli_num_rows($select_result);
    
            if ($row > 0) {
                echo "<script>alert('User already exists')</script>";
            } else {
                $insert_query = "INSERT INTO `sellregistration` (seller_username, selleremail, password) VALUES ('$username', '$email', '$hash_password')";
                $result_query = mysqli_query($con, $insert_query);
                if ($result_query) {
                    echo "<script>alert('Seller successfully registered')</script>";
                } else {
                    echo "<script>alert('Registration failed')</script>";
                }
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>registration</title>
    <!--fonrawosome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="./styles.css"> 
</head>
<body>
    <div class="reg container-fluid  my-0 py-3" >
        <fieldset>
        <h2 class="text-center text-success">Sell REGISTRATION FORM</h2>
        <div class=" cont row d-flex align-items-center justify-content-center h-20rem">
            <div class="col-lg-12 col-xl-6 ">
                <form action="" method="post" enctype="multipart/form-data">
                    <!-- username -->
                    <div class="form-outline mb-4">
                        <label for="username " class="form-label">username</label>
                        <input type="text " id="username" class="form-control" placeholder="username" autocomplete="off" required name="username">
                    </div>
                    <!-- email -->
                    <div class="form-outline mb-4">
                        <label for="email " class="form-label">email</label>
                        <input type="email" id="email" class="form-control" placeholder="email" autocomplete="off" required name="email">
                    </div>
                <!--  password -->
                    <div class="form-outline mb-4">
                        <label for="password" class="form-label">password</label>
                        <input type="password" id="password" class="form-control" placeholder="password" autocomplete="off" required name="password">
                    </div>
                    <!--  cornfirm password -->
                    <div class="form-outline mb-4">
                        <label for="confirmpassword" class="form-label">confirm password</label>
                        <input type="password" id="cornfirm_password" class="form-control" placeholder="confirm_password" autocomplete="off" required name="confirm_password">
                    </div>
                    <div class=" mt-4 pt-2">
                        <input type="submit" value="Register" class="submit py-3 px-3 text-dark" name="seller_register">
                    </div>
                    <p class="small fw-bold mt-2 pt-1 mb-0">Already have an account ?
                        <a href="selllogin.php" class="text-decoration-none"> Log in here</a></p>
                </form>
            </div>
        </div>
        </fieldset>
    </div>

    











<!--bootstrap js-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
     crossorigin="anonymous"></script>
    
</body>
</html>