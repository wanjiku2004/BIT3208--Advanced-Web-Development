<?php

include 'db_connect.php';

if(isset($_POST['register'])){
    
    $first_name = mysqli_real_escape_string($conn,$_POST['first_name']);
    $last_name = mysqli_real_escape_string($conn,$_POST['last_name']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $phone = mysqli_real_escape_string($conn,$_POST['phone']);
    $address = mysqli_real_escape_string($conn,$_POST['address']);
    
    $password = password_hash(
        $_POST['password'],
        PASSWORD_DEFAULT
    );
    
    $check =
    mysqli_query(
        $conn,
        "SELECT * FROM customers WHERE email='$email'"
    );
    
    if(mysqli_num_rows($check) > 0){
        
        die("Email already exists.");
        
    }
    
    $sql = "
    INSERT INTO customers
    (
        first_name,
        last_name,
        email,
        password,
        phone,
        address
        )
        VALUES
        (
            '$first_name',
            '$last_name',
            '$email',
            '$password',
            '$phone',
            '$address'
            )
            ";
    
    if(mysqli_query($conn,$sql)){
        
        header("Location: login.html");
        exit();
        
    }else{
        
        echo mysqli_error($conn);
        
    }
}
?>
