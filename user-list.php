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
                <div class="card">
                    <div class="card-heading">
                        <h4>Registered User List - Firebase Authentication</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Sl.No</th>
                                    <th>Display Name</th>
                                    <th>Phone No.</th>
                                    <th>Email Id</th>
                                    <th>Enabled/Disabled</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $users = $auth->listUsers();
                                $i = 1;
                                foreach ($users as $user) {
                                ?>
                                    <tr>
                                        <td><?= $i++ ?></td>
                                        <td><?= $user->displayName ?></td>
                                        <td><?= $user->phoneNumber ?></td>
                                        <td><?= $user->email ?></td>
                                        <td>
                                            <?php
                                            if ($user->disabled) {
                                                echo "A/C Disabled";
                                            } else {
                                                echo "A/C Anabled";
                                            }
                                            ?>
                                        </td>
                                        <td><a href="user-edit.php?id=<?= $user->uid; ?>" class="btn-sm btn-primary">Edit</a></td>
                                        <td>
                                            <!-- <a href="" class="btn-sm btn-danger">Delete</a> -->
                                            <form action="./code.php" method="post">
                                                <input type="hidden" name="user_id" value="<?= $user->uid; ?>">
                                                <button type="submit" name="user_delete_btn" class="btn btn-sm btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>