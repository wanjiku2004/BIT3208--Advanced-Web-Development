<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
include 'db_connect.php';

if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    die("Your cart is empty.");
}

$total_amount = 0;

foreach ($_SESSION['cart'] as $product_id => $quantity) {
    
    $product_id = (int)$product_id;
    
    $result = mysqli_query(
        $conn,
        "SELECT * FROM products WHERE product_id = $product_id"
    );
    
    if ($product = mysqli_fetch_assoc($result)) {
        $total_amount += ($product['price'] * $quantity);
    }
}

/* Get checkout form values */
$delivery_address = $_POST['address'] ?? '';
$payment_method = "Cash on Delivery";

/* Temporary customer id */
$customer_id = 1;

/* Save order */

$order_sql = "
INSERT INTO orders
(
    customer_id,
total_amount,
order_status,
delivery_address,
payment_method
)
VALUES
(
    '$customer_id',
'$total_amount',
'Pending',
'$delivery_address',
'$payment_method'
)
";

if (!mysqli_query($conn, $order_sql)) {
    die("Order Error: " . mysqli_error($conn));
}

$order_id = mysqli_insert_id($conn);

/* Save ordered items */

foreach ($_SESSION['cart'] as $product_id => $quantity) {
    
    $product_id = (int)$product_id;
    
    $result = mysqli_query(
        $conn,
        "SELECT * FROM products WHERE product_id = $product_id"
    );
    
    if ($product = mysqli_fetch_assoc($result)) {
        
        $price = $product['price'];
        
        mysqli_query(
            $conn,
            "INSERT INTO order_items
            (order_id, product_id, quantity, price)
        VALUES
        ('$order_id','$product_id','$quantity','$price')"
        );
        
        mysqli_query(
            $conn,
            "UPDATE products
            SET stock_quantity = stock_quantity - $quantity
            WHERE product_id = $product_id"
        );
    }
}

unset($_SESSION['cart']);
?>

<!DOCTYPE html>
<html>
<head>
<title>Order Successful</title>
<style>
body{
    font-family:Arial;
    background:#f4f4f4;
}
.box{
    max-width:600px;
    margin:50px auto;
    background:white;
    padding:30px;
    text-align:center;
    border-radius:10px;
}
.btn{
    background:#2e7d32;
    color:white;
    padding:10px 20px;
    text-decoration:none;
    border-radius:5px;
}
</style>
</head>
<body>

<div class="box">

<h1>Order Placed Successfully</h1>

<p>Order Number: <strong>#<?php echo $order_id; ?></strong></p>

<p>Total Amount: <strong>KES <?php echo number_format($total_amount,2); ?></strong></p>

<a href="products.php" class="btn">Continue Shopping</a>

</div>

</body>
</html>
