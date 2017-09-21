<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>welcome</title>
</head>
<body>
<?php
session_start();
if(isset($_SESSION['username'])){   /*这句话是为了判断 如果用户直接进这个url会被执行else 转回login页面*/
    if((time() - $_SESSION['last_time']) > 5){
        header("Location:logout.php");
    }else{
        $_SESSION['last_time'] = time();
        echo "<h2 align='center'>Welcome ".$_SESSION["username"]."</h2>";
        echo "<h3 align='center'>will logout after 30 sec inactive"."</h3>";
        echo "<p align='center'><a href='logout.php'>logout</a></p>";
    }
}else{
    header("Location:index.php");
}

?>
</body>
</html>

