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
                <?php
                    if(isset($_SESSION['status'])){
                        echo "<h4 class='alert alert-success'>".$_SESSION['status']."</h4>";
                        unset($_SESSION['status']);
                    }
                ?>
                <div class="col-md12 mt-4">
                    <div class="card">
                        <div class="card-header">
                            <h4>Registered User Enable Or Disable - Firebase Authentication</h4>
                        </div>
                        <div class="card-body">
                            <form action="./code.php" method="post">
                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="hidden" name="user_id" value="<?= $_GET['id'] ?>">
                                        <div class="form-group mb-3">
                                            <select name="account_disena" id="" class="form-control" required>
                                                <option value="">--Select--</option>
                                                <option value="disable">Disable</option>
                                                <option value="enable">Enable</option>
                                            </select>
                                        </div>
                                        <div class="form-group mb-3">
                                            <button type="submit" name="enabledisable_user_btn" class="btn btn-primary">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h4>Registered User Edit - Firebase Authentication</h4>
                    </div>
                    <div class="card-body">
                        <form action="./code.php" method="post">
                            <?php
                            if (isset($_GET['id'])) {
                                $user_id = $_GET['id'];
                                $user = $auth->getUser($user_id);
                            ?>
                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="hidden" name="user_id" value="<?= $user_id ?>">
                                        <div class="form-group mb-3">
                                            <label for="">Full Name</label>
                                            <input type="text" name="fullname" id="" value="<?= $user->displayName; ?>" class="form-control">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="">Phone Number</label>
                                            <input type="text" name="phone" id="" value="<?= $user->phoneNumber; ?>" class="form-control">
                                        </div>
                                        <div class="form-group mb-3">
                                            <button type="submit" name="user_edit_update_btn" class="btn btn-primary">Update New</button>
                                            <a href="./user-list.php" class="btn btn-danger">Back</a>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>