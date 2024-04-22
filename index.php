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
            <div class="col-md-12">
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
                                    <th>action</th>
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
                                                <a href="" class="btn btn-danger">Delete</a>
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




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>