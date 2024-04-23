<?php
include("./dbcon.php");
include("./authentication.php")
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Firebase Project</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-4">
                <div class="card">
                    <div class="card-heading">
                        <h4>Registered User Edit - Firebase Authentication</h4>
                    </div>
                    <div class="card-body">
                        <form action="">
                            <form action="code.php" method="post">
                                <div class="form-group mb-3">
                                    <label for="">Full Name</label>
                                    <input type="text" name="fullname" id="" class="form-control">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="">Phone Number</label>
                                    <input type="text" name="phone" id="" class="form-control">
                                </div>
                                <div class="form-group mb-3">
                                <button type="submit" name="register_now_btn" class="btn btn-primary">Register New</button>
                                <a href="./home.php" class="btn btn-primary">Home</a>
                            </div>
                            </form>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>