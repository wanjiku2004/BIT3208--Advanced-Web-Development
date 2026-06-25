
<?php
session_start();
include 'db_connect.php';

/* Add product to cart */
if(isset($_GET['product_id'])){
    
    $product_id = (int)$_GET['product_id'];
    
    if(!isset($_SESSION['cart'])){
        $_SESSION['cart'] = [];
    }
    
    if(isset($_SESSION['cart'][$product_id])){
        $_SESSION['cart'][$product_id]++;
    }else{
        $_SESSION['cart'][$product_id] = 1;
    }
}

$grandTotal = 0;
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Shopping Cart</title>

<style>
body{
    font-family:Arial,sans-serif;
    padding:20px;
}

table{
    width:100%;
    border-collapse:collapse;
}

th,td{
    border:1px solid #ddd;
    padding:10px;
    text-align:center;
}

th{
    background:#2e7d32;
    color:white;
}

button{
    background:#2e7d32;
    color:white;
    border:none;
    padding:10px 15px;
    border-radius:5px;
    cursor:pointer;
}

.actions{
    margin-top:20px;
}
</style>

</head>
<body>

<h1>Shopping Cart</h1>

<table>

<tr>
<th>Product</th>
<th>Price</th>
<th>Quantity</th>
<th>Total</th>
</tr>

<?php

if(isset($_SESSION['cart']) && !empty($_SESSION['cart'])){
    
    foreach($_SESSION['cart'] as $product_id => $quantity){
        
        $sql = "SELECT * FROM products
        WHERE product_id = $product_id";
        
        $result = mysqli_query($conn,$sql);
        
        if($product = mysqli_fetch_assoc($result)){
            
            $total =
            $product['price'] * $quantity;
            
            $grandTotal += $total;
            ?>
            
            <tr>
            <td><?php echo $product['product_name']; ?></td>
            <td>KES <?php echo number_format($product['price'],2); ?></td>
            <td><?php echo $quantity; ?></td>
            <td>KES <?php echo number_format($total,2); ?></td>
            </tr>
            
            <?php
        }
    }
}
?>

<tr>
<td colspan="3">
<strong>Grand Total</strong>
</td>

<td>
<strong>
KES <?php echo number_format($grandTotal,2); ?>
</strong>
</td>
</tr>

</table>

<div class="actions">

<a href="products.php">
<button>Continue Shopping</button>
</a>

<a href="checkout.php">
<button>Checkout</button>
</a>

</div>

</body>
</html>
```

