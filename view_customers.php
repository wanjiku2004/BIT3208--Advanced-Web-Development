<?php
session_start();

if(!isset($_SESSION['admin'])){
    header("Location: admin_login.php");
    exit();
}

include '../db_connect.php';

$result = mysqli_query($conn,"SELECT * FROM customers");
?>

<!DOCTYPE html>
<html>
<head>
<title>Customers</title>
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

<h2>Registered Customers</h2>

<table>

<tr>
<?php
$fields = mysqli_fetch_fields($result);
foreach($fields as $field){
    echo "<th>".$field->name."</th>";
}
?>
</tr>

<?php
mysqli_data_seek($result,0);

while($row = mysqli_fetch_assoc($result)){
    echo "<tr>";
    
    foreach($row as $value){
        echo "<td>$value</td>";
    }
    
    echo "</tr>";
}
?>

</table>

<br>
<a href="admin_dashboard.php">Back</a>

</body>
</html>
