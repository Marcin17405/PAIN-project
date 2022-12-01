<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="main.css" class="css">
</head>
<body>
<a id="logout" href='logout.php'>Logout</a><br><br>
<div id="forms">
    <?php
    session_start();
        if (isset($_SESSION['username'])){
    $username2 = $_SESSION['username'];
    echo "<div> Witaj ".$username2 ."</div> <br>";
 }
 else {
    header('Location: index.php');
 }
 



?>
<h2>Wprowadz swoje dane</h2>
<form method="post">
        <input type="text" name="userage" id="userage" placeholder="Age">
        <input type="text" name="username" id="username" placeholder="Name">
        <input type="text" name="usersurname" id="usersurname" placeholder="Surname">
        <button type="submit" name="add_userdata">Ustaw</button>
</form><br>
    <?php 



    $servername ="localhost";
    $username = "root";
    $password = "";
    $dbname = "szkola";
    $conn =mysqli_connect($servername,$username,$password,$dbname);

    if(isset($_POST['add_userdata'])){
        $userage = $_POST['userage'];
        $username = $_POST['username'];
        $usersurname = $_POST['usersurname'];
        $sql = "UPDATE user SET imie = '$username', wiek = '$userage', nazwisko = '$usersurname' WHERE name = '$username2'";
        if(mysqli_query($conn, $sql)){  
            echo "Dodano! <br>";   
        }else{
            echo "Nie Dodano! <br>";
        }
    }




    $sql = "SELECT * FROM user";
    $result = mysqli_query($conn, $sql);
    echo "UŻYTKOWNICY <br>";
    while($row = mysqli_fetch_assoc($result)) {
    echo "Login: " . $row["name"]. ", Password: " . $row["password"]. ", Name: " . $row["imie"]. ", Surname: " . $row["nazwisko"]. ", Age: " . $row["wiek"]. "<br>";
    }
 ?>
 <form method="post">
        <input type="text" name="name3" id="name3" placeholder="Login">
        <input type="text" name="password3" id="password3" placeholder="Hasło">
        <button type="submit" name="add_user">Dodaj</button>
 </form>
 <?php
    if(isset($_POST['add_user'])){
        $name3 = $_POST['name3'];
        $password3 = $_POST['password3'];
        $hash = sha1($password3);
        $sql = "INSERT INTO user (name,password) VALUES ('$name3','$hash')";
        if(mysqli_query($conn, $sql)){  
            
            echo "Dodano!";   
        }else{
            echo "Nie Dodano!";
        }
    }

        echo "<br><br>";
        $sql2 = "SELECT * FROM class";
        $result = mysqli_query($conn, $sql2);
        echo "KLASY <br>";
        while($row = mysqli_fetch_assoc($result)) {
        echo "ID: " . $row["id"]. ", Name: " . $row["name"]."<br>";
        }
?>
      <form method="post">
        <input type="text" name="id" id="id" placeholder="Login">
        <input type="text" name="class_name" id="class_name" placeholder="Hasło">
        <button type="submit" name="add_class">Dodaj</button>
    </form>  
<?php

        if(isset($_POST['add_class'])){
            $id = $_POST['id'];
            $name = $_POST['class_name'];
            $sql = "INSERT INTO class (id,name) VALUES ('$id','$name')";
            if(mysqli_query($conn, $sql)){  
                
                echo "Dodano!";   
            }else{
                echo "Nie Dodano!";
            }
        }

        echo "<br><br>";
        $sql3 = "SELECT * FROM student";
        $result = mysqli_query($conn, $sql3);
        echo "STUDENCI <br>";
        while($row = mysqli_fetch_assoc($result)) {
        echo "ID: " . $row["id"]. ", Name: " . $row["name"]. ", Surname: " . $row["surname"]."<br>";
        }
        ?>

        <form method="post">
               <input type="text" name="id2" id="id2" placeholder="ID">
               <input type="text" name="student_name" id="student_name" placeholder="Name">
               <input type="text" name="student_surname" id="student_surname" placeholder="Surname">
               <button type="submit" name="add_student">Dodaj</button>
        </form>
        <?php
        if(isset($_POST['add_student'])){
            $id = $_POST['id2'];
            $name = $_POST['student_name'];
            $surname = $_POST['student_surname'];
            $sql = "INSERT INTO student (id,name,surname) VALUES ('$id','$name','$surname')";
            if(mysqli_query($conn, $sql)){  
                
                echo "Dodano!";   
            }else{
                echo "Nie Dodano!";
            }
        }
        
        echo "<br><br>";
        $sql4 = "SELECT * FROM subject";
        $result = mysqli_query($conn, $sql4);
        echo "PRZEDMITOY <br>";
        while($row = mysqli_fetch_assoc($result)) {
        echo "ID: " . $row["id"]. ", Name: " . $row["name"]."<br>";
        }
        ?>

 <form method="post">
        <input type="text" name="id3" id="name3" placeholder="ID">
        <input type="text" name="subject_name" id="password3" placeholder="Name">
        <button type="submit" name="add_subject">Dodaj</button>
 </form>
 <?php
    if(isset($_POST['add_subject'])){
        $id = $_POST['id3'];
        $name = $_POST['subject_name'];
        $sql = "INSERT INTO subject (id,name) VALUES ('$id','$name')";
        if(mysqli_query($conn, $sql)){  
            
            echo "Dodano!";   
        }else{
            echo "Nie Dodano!";
        }
    }

        echo "<br><br>";
        $sql5 = "SELECT * FROM teacher";
        $result = mysqli_query($conn, $sql5);
        echo "NAUCZYCIELE <br>";
        while($row = mysqli_fetch_assoc($result)) {
        echo "ID: " . $row["id"]. ", Name: " . $row["name"]. ", Surname: " . $row["surname"]. ", Age: " . $row["age"]."<br>";
        }
?>
 <form method="post">
        <input type="text" name="id4" id="id4" placeholder="ID">
        <input type="text" name="teacher_name" id="teacher_name" placeholder="Name">
        <input type="text" name="teacher_surname" id="teacher_surname" placeholder="Surname">
        <input type="text" name="age" id="age" placeholder="Age">
        <button type="submit" name="add_teacher">Dodaj</button><br><br>
 </form>
 </div>
 <?php 
    if(isset($_POST['add_teacher'])){
        $id = $_POST['id4'];
        $name = $_POST['teacher_name'];
        $surname = $_POST['teacher_surname'];
        $age = $_POST['age'];
        $sql = "INSERT INTO teacher (id,name,surname,age) VALUES ('$id','$name','$surname','$age')";
        if(mysqli_query($conn, $sql)){  
            
            echo "Dodano!";   
        }else{
            echo "Nie Dodano!";
        }
    }
 
 ?>
</body>
</html>