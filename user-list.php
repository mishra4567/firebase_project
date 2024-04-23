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
                                    <th>Action</th>
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
                                        <td>
                                            <a href="user-edit.php" class="btn-sm btn-primary">Edit</a>
                                            <a href="" class="btn-sm btn-danger">Delete</a>
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