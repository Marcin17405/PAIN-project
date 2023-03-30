<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    
</head>
<body>
<div class="container">
		<form method="post" >
			<h3>Admin Login Form</h3>
			<label for="name2"><b>Login</b></label>
			<input name="name2" type="text" placeholder="Enter Login" required>

			<label for="password"><b>Password</b></label>
			<input name="password2" type="password" placeholder="Enter Password" required>

			<button name = "add2" type="submit">Login</button>
            <p>Go back to user site <a href="index.php">click here!</a></p>
		</form>
            
	</div>
<?php 
    session_start();
    $servername ="localhost";
    $username = "root";
    $password = "";
    $dbname = "pizzeria";
    $conn =mysqli_connect($servername,$username,$password,$dbname);
    if (isset($_POST['add2'])){
        $username2 = $_POST['name2'];
        $password2 = $_POST['password2'];
        $hash2 = sha1($password2);
        $query = "SELECT * FROM user WHERE name='$username2' and password='$hash2'";
        $result = mysqli_query($conn, $query);
        $count = mysqli_num_rows($result);
    if ($count==1 ){
        $_SESSION['username']= $username2;
        header('Location: main2.php');
    }
    else {
        echo '<script type ="text/JavaScript">';  
        echo 'alert("Invalid Password!")';  
        echo '</script>';  
    }
    }

    mysqli_close($conn);
    
?>
</body>
</html>