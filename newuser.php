<?php
    include 'conn.php';
    session_start();/**/
    if(isset($_POST['submit'])){
        if(!empty($_POST['username']) && !empty($_POST['password'])){
            $username = $_POST['username'];
            $password = $_POST['password'];
            $search = mysqli_query($conn,'select * from user where username = "'.$username.'"');
            if(mysqli_num_rows($search) > 0){
                echo "username already in use";
            }else{
                mysqli_query($conn,"insert into user (username,password) values ('$username','$password')");
                header("Location:index.php");
            }
        }else{
            echo "please fill all the blanks";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>new user</title>
</head>
<body>
    <div><h2 align="center">Create a new account</h2></div>
    <form method="post">
        <div>username:<input type="text" name="username"></div>
        <div>password:<input type="text" name="password"></div>
        <input type="submit" name="submit">
    </form>
</body>
</html>
