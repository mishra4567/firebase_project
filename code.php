<?php
session_start();
include('./dbcon.php');
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
        header("location:add_contact.php");
    }else{
        $_SESSION['status']="Data not Inserted";
        header("location:add_contact.php");
    }


};

?>