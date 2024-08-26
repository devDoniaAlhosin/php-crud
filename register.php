<?php
require 'lib/db.php';
require 'Design/register.html';
session_start();
if(isset($_SESSION['username'])){
    header('Location: index.php');
    exit();
}

if(isset($_POST['username'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirm_password'];
    $age = $_POST['age'];
    $status = $_POST['status'];
    $img = $_FILES['img']['name'];
    $img_tmp = $_FILES['img']['tmp_name'];
    move_uploaded_file($img_tmp,"img/$img");

}
if ($password !== $confirmpassword) {
    $error = "Passwords do not match!";
    include('register.php');
    exit;
}
registerUser([
    'username' => $username,
    'email' => $email,
    'password' => $password,
    'age' => $age,
    'status' => $status,
    'img' => $img
]);


header('location: Login.php');
exit();

?>



