<?php
session_start();
if(isset($_SESSION['verified_user_id'])){
    $_SESSION['status']="You are already Logged In";
    header("location:home.php");
    exit();
}
include("./dbcon.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Firebase Project</title>
    <script src="./assets/js/script.js"></script>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <?php
                if (isset($_SESSION['status'])) {
                    echo "<h4 class='alert alert-success'>" . $_SESSION['status'] . "</h4>";
                    unset($_SESSION['status']);
                }
                ?>
                <div class="card mt-4">
                    <div class="card-header">
                        <h4>Login Form</h4>
                    </div>
                    <form action="logincode.php" method="post" onsubmit="return validatePassword()">
                        <div class="card-body">
                            <div class="form-group mb-3">
                                <label for="">Email Address </label>
                                <input type="email" name="email" id="" class="form-control" placeholder="Enter Email ID">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Password</label>
                                <input type="password" name="password" id="password" maxlength="6" class="form-control" placeholder="Enter 6 Digit Password">
                            </div>
                            <div class="form-group mb-3">
                                <button type="submit" name="login_now_btn" class="btn btn-primary">Login Now</button>
                                <a href="./register.php" class="btn btn-primary">Register</a>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>