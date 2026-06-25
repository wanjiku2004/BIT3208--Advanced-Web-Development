<?php
session_start();

if(!isset($_SESSION['admin'])){
    header("Location: admin_login.php");
    exit();
}

include '../db_connect.php';

/* Delete Product */

if(isset($_GET['delete'])){
    
    $id = (int)$_GET['delete'];
    
    mysqli_query(
        $conn,
        "DELETE FROM products
        WHERE product_id = $id"
    );
    
    header("Location: manage_products.php");
    exit();
}

$result = mysqli_query(
    $conn,
    "SELECT * FROM products"
);
?>

<!DOCTYPE html>
<html>
<head>
<title>Manage Products</title>

<style>
table{
    width:100%;
    border-collapse:collapse;
}

th,td{
    border:1px solid #ddd;
    padding:10px;
}

th{
    background:#2e7d32;
    color:white;
}

.delete{
    color:red;
}
</style>

</head>
<body>

<h2>Manage Products</h2>

<table>

<tr>
<th>ID</th>
<th>Name</th>
<th>Category</th>
<th>Price</th>
<th>Stock</th>
<th>Brand</th>
<th>Action</th>
</tr>

<?php while($row = mysqli_fetch_assoc($result)){ ?>
    
    <tr>
    
    <td><?php echo $row['product_id']; ?></td>
    <td><?php echo $row['product_name']; ?></td>
    <td><?php echo $row['category']; ?></td>
    <td><?php echo $row['price']; ?></td>
    <td><?php echo $row['stock_quantity']; ?></td>
    <td><?php echo $row['brand']; ?></td>
    
    <td>
    <a href="manage_products.php?delete=<?php echo $row['product_id']; ?>"
    class="delete"
    onclick="return confirm('Delete product?')">
    Delete
    </a>
    </td>
    
    </tr>
    
    <?php } ?>
    
    </table>
    
    <br>
    <a href="admin_dashboard.php">Back</a>
    
    </body>
    </html>
