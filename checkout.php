```php
<?php
session_start();

if(!isset($_SESSION['cart']) ||
    empty($_SESSION['cart'])){
    die("Your cart is empty.");
    }
    ?>
    
    <!DOCTYPE html>
    <html>
    <head>
    <title>Checkout</title>
    <style>
    .container{
        width:500px;
        margin:auto;
        padding:20px;
    }
    
    input,textarea{
        width:100%;
        padding:10px;
        margin-bottom:15px;
    }
    
    button{
        background:#2e7d32;
        color:white;
        padding:12px;
        border:none;
        width:100%;
    }
    </style>
    </head>
    
    <body>
    
    <div class="container">
    
    <h1>Checkout</h1>
    
    <form action="place_order.php"
    method="POST">
    
    <label>Full Name</label>
    <input type="text"
    name="fullname"
    required>
    
    <label>Phone Number</label>
    <input type="text"
    name="phone"
    required>
    
    <label>Delivery Address</label>
    <textarea
    name="address"
    required></textarea>
    
    <button type="submit">
    Place Order
    </button>
    
    </form>
    
    </div>
    
    </body>
    </html>
    ```
    
