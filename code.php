<?php
session_start();

include('./dbcon.php');
//Register Now
if (isset($_POST['register_now_btn'])) {
    $name = $_POST['fullname'];
    $phone = "+91" . $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $userProperties = [
        'email' => $email,
        'emailVerified' => false,
        'phoneNumber' => $phone,
        'password' => $password,
        'displayName' => $name,
    ];
    $createdUser = $auth->createUser($userProperties);
    if ($createdUser) {
        $_SESSION['status'] = "User created Successfully";
        header("location:register.php");
    } else {
        $_SESSION['status'] = "User Not Created";
        header("location:register.php");
    }
};
//insert data
if (isset($_POST['save_data'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    //image input
    $buffer=$_FILES['pro_image']['tmp_name'];
    $fileName=time().$_FILES['pro_image']['name'];
    move_uploaded_file($buffer,"product_img/".$fileName);

    $postData = [
        'firstname' => $firstname,
        'lastname' => $lastname,
        'email' => $email,
        'phone' => $phone,
        'image'=>$fileName,

    ];
    $ref_table = "contacts";
    $postRef = $database->getReference($ref_table)->push($postData);

    if ($postRef) {
        $_SESSION['status'] = "Data Insert Successfully";
        header("location:index.php");
    } else {
        $_SESSION['status'] = "Data not Inserted";
        header("location:index.php");
    }
};

//Update data

if (isset($_POST['update_data'])) {
    $id = $_POST['id'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $updateData = [
        'firstname' => $firstname,
        'lastname' => $lastname,
        'email' => $email,
        'phone' => $phone,

    ];
    $ref_table = "contacts/" . $id;
    //this is the root reference
    $updatequery = $database->getReference($ref_table)->update($updateData);
    if ($updatequery) {
        $_SESSION['status'] = "Data Update Successfully";
        header("location:index.php");
    } else {
        $_SESSION['status'] = "Data not Update";
        header("location:index.php");
    };
};
if (isset($_POST['delete_btn'])) {
    $id = $_POST['id_key'];
    $ref_table = "contacts/" . $id;
    $deleteData = $database->getReference($ref_table)->remove();
    if ($deleteData) {
        $_SESSION['status'] = "Data Delete Successfully";
        header("location:index.php");
    } else {
        $_SESSION['status'] = "Data not Delete";
        header("location:index.php");
    };
}
// user update data
if (isset($_POST['user_edit_update_btn'])) {
    $name=$_POST['fullname'];
    $phone=$_POST['phone'];

    $uid=$_POST['user_id'];
    $properties=[
        'displayName'=>$name,
        'phoneNumber'=>$phone,
    ];
    $updateUser=$auth->updateUser($uid,$properties);
    if ($updateUser) {
        $_SESSION['status'] = "User Update Successfully";
        header("location:user-edit.php?id=$uid");
    } else {
        $_SESSION['status'] = "User not Update";
        header("location:user-edit.php?id=$uid");
    };
}
// enabledisable_user_btn Account
if(isset($_POST['enabledisable_user_btn'])){
    $disena=$_POST['account_disena'];
    $uid=$_POST['user_id'];

    if($disena=="disable"){
        //disable the account
        $updatedUser=$auth->disableUser($uid);
        $msg="User A/C is disabled";
    }else{
        //anable the account
        $updatedUser=$auth->enableUser($uid);
        $msg="User A/C is enabled";
    }
    if ($updatedUser) {
        $_SESSION['status'] = "$msg";
        header("location:user-edit.php?id=$uid");
    } else {
        $_SESSION['status'] = "Samthing Went Wrong";
        header("location:user-edit.php?id=$uid");
    };
}
//user acount delete
if(isset($_POST['user_delete_btn'])){
    $uid=$_POST['user_id'];
    try{
        $auth->deleteUser($uid);
        $_SESSION['status']="Acount Deleted";
        //$e->getMessage();
        header("location:user-list.php");
        exit();
    }catch(Exception $e){
        $_SESSION['status']="No Such ID Found";
        //$e->getMessage();
        header("location:user-list.php");
        exit();
    }
}