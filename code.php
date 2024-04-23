<?php
session_start();

include('./dbcon.php');
//Register Now
if(isset($_POST['register_now_btn'])){
    $name=$_POST['fullname'];
    $phone="+91".$_POST['phone'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $userProperties=[
        'email'=>$email,
        'emailVerified'=>false,
        'phoneNumber'=>$phone,
        'password'=>$password,
        'displayName'=>$name,
    ];
    $createdUser=$auth->createUser($userProperties);
    if($createdUser){
        $_SESSION['status']="User created Successfully";
        header("location:register.php");
    }else{
        $_SESSION['status']="User Not Created";
        header("location:register.php");
    }
};
//insert data
if(isset($_POST['save_data'])){
    $firstname=$_POST['firstname'];
    $lastname=$_POST['lastname'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];

    $postData=[
        'firstname'=>$firstname,
        'lastname'=>$lastname,
        'email'=>$email,
        'phone'=>$phone,

    ];
    $ref_table="contacts";
    $postRef=$database->getReference($ref_table)->push($postData);

    if($postRef){
        $_SESSION['status']="Data Insert Successfully";
        header("location:index.php");
    }else{
        $_SESSION['status']="Data not Inserted";
        header("location:index.php");
    }


};

//Update data

if(isset($_POST['update_data'])){
    $id=$_POST['id'];
    $firstname=$_POST['firstname'];
    $lastname=$_POST['lastname'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];

    $updateData=[
        'firstname'=>$firstname,
        'lastname'=>$lastname,
        'email'=>$email,
        'phone'=>$phone,

    ];
    $ref_table="contacts/".$id;
    //this is the root reference
    $updatequery=$database->getReference($ref_table)->update($updateData);
    if($updatequery){
        $_SESSION['status']="Data Update Successfully";
        header("location:index.php");
    }else{
        $_SESSION['status']="Data not Update";
        header("location:index.php");
    };
};
if(isset($_POST['delete_btn'])){
    $id=$_POST['id_key'];
    $ref_table="contacts/".$id;
    $deleteData=$database->getReference($ref_table)->remove();
    if($deleteData){
        $_SESSION['status']="Data Delete Successfully";
        header("location:index.php");
    }else{
        $_SESSION['status']="Data not Delete";
        header("location:index.php");
    };
}


?>