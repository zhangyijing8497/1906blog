<?php
    $user = 'root';
    $pass = '123456abc';
    $dbh = new PDO('mysql:host=localhost;dbname=1906blog', $user, $pass);

    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $stmt = $dbh->prepare("select * from users where username=?");
    $stmt->bindParam(1, $username);
    $res = $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($password == $user['password']){
        echo "<script>alert('登陆成功');location='index.html'</script>";
    }else{
        echo "<script>alert('登陆失败'); history.go(-1);</script>"; 
    }  
?>