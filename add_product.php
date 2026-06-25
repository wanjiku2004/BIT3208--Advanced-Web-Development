<?php
session_start();

if(!isset($_SESSION['admin'])){
    header("Location: admin_login.php");
    exit();
}

include '../db_connect.php';

if(isset($_POST['add_product'])){
    
    $product_name = $_POST['product_name'];
    $category = $_POST['category'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $stock_quantity = $_POST['stock_quantity'];
    $brand = $_POST['brand'];
    
    $sql = "INSERT INTO products
    (product_name, category, description, price, stock_quantity, brand)
    VALUES
    (
        '$product_name',
     '$category',
     '$description',
     '$price',
     '$stock_quantity',
     '$brand'
    )";
    
    if(mysqli_query($conn,$sql)){
        $message = "Product added successfully!";
    } else {
        $message = "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Add Product</title>
</head>
<body>

<h2>Add Product</h2>

<?php
if(isset($message)){
    echo "<p>$message</p>";
}
?>

<form method="POST">

<label>Product Name</label><br>
<input type="text" name="product_name" required><br><br>

<label>Category</label><br>
<input type="text" name="category" required><br><br>

<label>Description</label><br>
<textarea name="description" required></textarea><br><br>

<label>Price</label><br>
<input type="number" step="0.01" name="price" required><br><br>

<label>Stock Quantity</label><br>
<input type="number" name="stock_quantity" required><br><br>

<label>Brand</label><br>
<input type="text" name="brand" required><br><br>

<button type="submit" name="add_product">
Add Product
</button>

</form>

<br>

<a href="admin_dashboard.php">Back to Dashboard</a>

</body>
</html>
