<?php
session_start();

if(!isset($_SESSION['client_id'])){
    header("Location: login.html");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Dashboard</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

<h1>Welcome to Kikapu Mart</h1>

<h3>
<?php echo $_SESSION['client_name']; ?>
</h3>

<p>You have successfully logged in.</p>

<a href="logout.php">
<button>Logout</button>
</a>

</div>

</body>
</html>
