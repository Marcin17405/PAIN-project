<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="script.js"></script>
</head>
<body>


<div id="background">
        <div class="background-Right"></div>
        <div class="background-Left"></div>
    </div>
  
    <div id="slide">
        <div class="top">
            <div class="left">
                <div class="content">
                    <h2>Register</h2>
                    <form method="post">
                        
                            <input type="text" name="name" id="name" placeholder="Login" />  
                            <br />
                            <input type="password" name="password" id="password" placeholder="Hasło" />
                            <button type="reset" id="LeftToRight" 
                        class="on-off">Login
                    </button>
                    <button type="submit" name="add">Register</button>
                        
                    </form>
                </div>
            </div>
  
            <div class="right">
                <div class="content">
                    <h2>Login</h2>
                    <form method="post">
                        <div>
                            <input type="text" name="name2" id="name2" placeholder="Login" /> 
                            <br />
                            <input type="password" name="password2" id="password2" placeholder="Password" />
                        </div>
  
                        <button type="reset" id="RightToLeft" 
                            class="on-off">Register
                        </button>
                          
                        <button type="submit" name="add2">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>




    <?php 
    session_start();
    $servername ="localhost";
    $username = "root";
    $password = "";
    $dbname = "szkola";

    $conn =mysqli_connect($servername,$username,$password,$dbname);

    if(isset($_POST['add'])){

        if(!$conn){
            ?>
            <script type="text/javascript">
                alert("Baza nie działa!");
            </script>
            <?php 
        }

        $name = $_POST['name'];
        $password = $_POST['password'];
        $hash = sha1($password);
        $sql = "INSERT INTO user (name,password) VALUES ('$name','$hash')";

        if(mysqli_query($conn, $sql)){  
            ?>
            <script type="text/javascript">
                alert("Zarejestrowano!");
            </script>
            <?php  
        }else{
            ?>
            <script type="text/javascript">
                alert("Nie zarejestrowano!");
            </script>
            <?php 
        }

        mysqli_close($conn);
    }
    ?>

    <?php
    if (isset($_POST['add2'])){
        $username2 = $_POST['name2'];
        $password2 = $_POST['password2'];
        $hash2 = sha1($password2);
        $query = "SELECT * FROM user WHERE name='$username2' and password='$hash2'";
        $result = mysqli_query($conn, $query);
        $count = mysqli_num_rows($result);



    if ($count==1 ){
        $_SESSION['username']= $username2;
        header('Location: main.php');
    }
    else {
        ?>
            <script type="text/javascript">
                alert("Zły Login lub Hasło!");
            </script>
        <?php 
    }
    }
    
?>
</body>
</html>