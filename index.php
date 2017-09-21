<?php
    include 'conn.php';
    session_start();
    if(isset($_POST['submit'])){
        $_SESSION['username'] = $_POST['username'];
        $_SESSION['password'] = $_POST['password'];
        $_SESSION['last_time'] = time();
        if(!empty($_POST['username']) && !empty($_POST['password'])){
            $username = $_POST['username'];
            $password = $_POST['password'];
            $result = mysqli_query($conn,"select * from user where username = \"$username\" and password = \"$password\"");
            if(mysqli_num_rows($result) > 0){
                header("Location:welcome.php");
            }else{
                echo "account's invalid";
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
    <title>Title</title>
</head>
<body>
<!-- <form action="logincheck.php" method="post"> 可以不写action 直接在这一页顶端进行判断就行 -->
<form method="post">
    username:<input type="text" id="username" name="username"><br/>
    password:<input type="text" id="password" name="password"><br/>
    <input type="submit" id="submit" name="submit" value="submit"></input>
    <a href="newuser.php">new user?</a>
</form>
</body>
</html>