<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Firebase Project</title>
</head>
<body>
<?php
session_start();
?>


<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card mt-4">
                <div class="card-header">
                    <h4>Firebase and php CRUD- ADD or Edit Data in firebase database
                        <a href="./index.php" class="btn btn-danger fload-end">BACK</a>
                    </h4>
                </div>
                <div class="card-body">
                    
                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <?php 
                            $ref_table="contacts";
                            $id=$_GET['id'];
                            $editdata = $database->getReference($ref_table)->getChild($id)->getValue();

                            ?>
                            <form action="code.php" method="post">
                                <div class="form-group mb-3">
                                    <label for="">First Name</label>
                                    <input type="text" name="firstname" class="form-control">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="">Last Name</label>
                                    <input type="text" name="lastname" class="form-control">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="">Email ID</label>
                                    <input type="text" name="email" class="form-control">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="">Phone No.</label>
                                    <input type="text" name="phone" class="form-control">
                                </div>
                                <div class="form-group mb-3">
                                    <button type="submit" name="Update_data" class="btn btn-primary">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>