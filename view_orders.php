<?php
session_start();

if(!isset($_SESSION['admin'])){
    header("Location: admin_login.php");
    exit();
}

include '../db_connect.php';

$result = mysqli_query($conn, "SELECT * FROM orders ORDER BY order_id DESC");
?>

<!DOCTYPE html>
<html>
<head>
<title>View Orders</title>
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
</style>
</head>
<body>

<h2>Customer Orders</h2>

<table>

<tr>
<th>Order ID</th>
<th>Customer ID</th>
<th>Total Amount</th>
<th>Status</th>
<th>Address</th>
<th>Payment</th>
<th>Date</th>
</tr>

<?php while($row = mysqli_fetch_assoc($result)){ ?>
    
    <tr>
    <td><?php echo $row['order_id']; ?></td>
    <td><?php echo $row['customer_id']; ?></td>
    <td>KES <?php echo number_format($row['total_amount'],2); ?></td>
    <td><?php echo $row['order_status']; ?></td>
    <td><?php echo $row['delivery_address']; ?></td>
    <td><?php echo $row['payment_method']; ?></td>
    <td><?php echo $row['order_date']; ?></td>
    </tr>
    
    <?php } ?>
    
    </table>
    
    <br>
    <a href="admin_dashboard.php">Back</a>
    
    </body>
    </html>
