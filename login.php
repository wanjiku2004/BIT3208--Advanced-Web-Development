<?php

session_start();
include 'db_connect.php';

if(isset($_POST['login'])){
    
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    $sql =
    "SELECT * FROM customers
    WHERE email='$email'";
    
    $result =
    mysqli_query($conn,$sql);
    
    if(mysqli_num_rows($result)==1){
        
        $user =
        mysqli_fetch_assoc($result);
        
        if(password_verify(
            $password,
            $user['password']
        )){
            
            $_SESSION['customer_id']
            =
            $user['customer_id'];
            
            $_SESSION['customer_name']
            =
            $user['first_name'];
            
            header("Location: products.php");
            exit();
            
        }
    }
    
    echo "Invalid Email or Password";
    
}
?>
