```php
<?php
session_start();

if(!isset($_SESSION['admin'])){
    header("Location: admin_login.php");
    exit();
}

include '../db_connect.php';
?>

<!DOCTYPE html>
<html>
<head>
<title>Admin Dashboard</title>
</head>
<body>

<h1>Admin Dashboard</h1>

<p>
Welcome,
<?php echo $_SESSION['admin']; ?>
</p>

<hr>

<h3>Management Menu</h3>

<ul>
<li><a href="add_product.php">Add Product</a></li>
<li><a href="manage_products.php">Manage Products</a></li>
<li><a href="view_orders.php">View Orders</a></li>
<li><a href="view_customers.php">View Customers</a></li>
<li><a href="admin_logout.php">Logout</a></li>
</ul>

</body>
</html>
```
