<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="main2.css">
    <?php 
    $servername ="localhost";
    $username = "root";
    $password = "";
    $dbname = "pizzeria";
    $conn =mysqli_connect($servername,$username,$password,$dbname);
    ?>
</head>
<body>
    <div id="box">
        <h1>Welcome to admin site!</h1>
        <a href="logout.php" id="log">Logout</a>
        <br>

        <div>
        <h3>Here are the orders</h3>
<?php 
$sql = "SELECT * FROM Orders";
$result = mysqli_query($conn, $sql);
echo "<div><table><thead><tr><th>ID</th><th>Products</th><th>User</th><th>Accept?</th></tr></thead><tbody>";
while($row = mysqli_fetch_assoc($result)) {
echo "<tr>
<td>" . $row["id"] . "</td>
<td>" . $row["products"] ."</td>
<td>" . $row["user"] ."</td>
<td>" . "<form method='post'><button>Accept</button></form>" ."</td>
    </tr>";
}
echo "</tbody></table></div><br>";





?>




        </div>
    </div>
</body>
</html>