```php
<?php
include 'db_connect.php';

$result = mysqli_query($conn, "SELECT * FROM products");
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Kikapu Mart Products</title>

<style>
body{
    font-family: Arial, sans-serif;
    background:#f4f4f4;
    margin:0;
    padding:20px;
}

h1{
    text-align:center;
    color:#2e7d32;
}

.products-grid{
    display:grid;
    grid-template-columns:
    repeat(auto-fit,minmax(250px,1fr));
    gap:20px;
    margin-top:30px;
}

.product-card{
    background:white;
    border-radius:10px;
    padding:15px;
    box-shadow:0 2px 10px rgba(0,0,0,.1);
    text-align:center;
}

.product-card img{
    width:100%;
    height:220px;
    object-fit:cover;
    border-radius:8px;
}

.product-card h3{
    margin:10px 0;
}

.price{
    color:#2e7d32;
    font-size:20px;
    font-weight:bold;
}

button{
    background:#2e7d32;
    color:white;
    border:none;
    padding:10px 15px;
    border-radius:5px;
    cursor:pointer;
}

button:hover{
    background:#1b5e20;
}
</style>

</head>
<body>

<h1>Available Products</h1>

<div class="products-grid">

<?php
while($row = mysqli_fetch_assoc($result)){
    ?>
    
    <div class="product-card">
    
    <?php
    if(!empty($row['image_url'])){
        ?>
        <img src="<?php echo $row['image_url']; ?>" alt="">
        <?php
    }else{
        ?>
        <img src="https://via.placeholder.com/300x220?text=No+Image" alt="">
        <?php
    }
    ?>
    
    <h3><?php echo $row['product_name']; ?></h3>
    
    <p><strong>Brand:</strong>
    <?php echo $row['brand']; ?></p>
    
    <p><strong>Category:</strong>
    <?php echo $row['category']; ?></p>
    
    <p><?php echo $row['description']; ?></p>
    
    <p class="price">
    KES <?php echo number_format($row['price'],2); ?>
    </p>
    
    <p>
    Stock:
    <?php echo $row['stock_quantity']; ?>
    </p>
    
    <a href="cart.php?product_id=<?php echo $row['product_id']; ?>">
    <button>Add To Cart</button>
    </a>
    
    </div>
    
    <?php
}
?>

</div>

</body>
</html>
```

