<?php
include("./authentication.php");
include("./dbcon.php");
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
            <div class="col-md-3">
                <div class="card my-3">
                    <div class="card-body">
                        <h5>Total Records:
                            <?php
                            $ref_table = "contacts";
                            $totalnum=$database->getReference($ref_table)->getSnapshot()->numChildren();
                            echo $totalnum;
                            ?>
                        </h5>
                    </div>
                </div>
            </div>
            <div class="col-md-9 my-3 text-end">
                <a href="login.php" class="btn btn-success">Login</a>
                <a href="logout.php" class="btn btn-danger">Logout</a>
                <a href="register.php" class="btn btn-primary">Register</a>
            </div>
            <div class="col-md-12">
                <?php
                if (isset($_SESSION['status'])) {
                    echo "<h4>" . $_SESSION['status'] . "</h4>";
                    unset($_SESSION['status']);
                }
                ?>
                <div class="card mt-4">
                    <div class="card-header">
                        <h4>Firebase and php CRUD- Feach
                            <a href="add_contact.php" class="btn btn-primary fload-end">ADD</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>sl.no</th>
                                    <th>first name</th>
                                    <th>last name</th>
                                    <th>email</th>
                                    <th>phone number</th>
                                    <th>edit</th>
                                    <th>delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include('./dbcon.php');

                                $ref_table = "contacts";
                                $fetchdata = $database->getReference($ref_table)->getValue();

                                if ($fetchdata > 0) {
                                    $i = 0;
                                    foreach ($fetchdata as $key => $row) {
                                        $i++;
                                ?>
                                        <tr>
                                            <td><?= $i ?></td>
                                            <td><?= $row['firstname'] ?></td>
                                            <td><?= $row['lastname']; ?></td>
                                            <td><?= $row['email']; ?></td>
                                            <td><?= $row['phone']; ?></td>
                                            <td>
                                                <a href="edit.php?id=<?= $key; ?>" class="btn btn-success">Edit</a>
                                            </td>
                                            <td>
                                                <form action="./code.php" method="post">
                                                    <input type="hidden" name="id_key" value="<?= $key; ?>">
                                                    <button type="submit" name="delete_btn" class="btn btn-danger">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php

                                    }
                                } else {

                                    ?>
                                    <tr>
                                        <td colspan="6">No Record Found</td>
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



