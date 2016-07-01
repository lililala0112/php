<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<body>
<!-- 啟用session -->
<?php session_start(); ?>
<!-- 設定session -->
<?php $_SESSION['user_id']=123;?>
<?php setcookie('aa','123');?>
<!-- 讀取session -->
<?php echo $_SESSION['user_id'] ?>
<!-- 刪除指定SEESION值 -->
<?php unset($_SESSION['user_id'])  ?>
<?php 
  if(isset($_SESSION['user_id'])){
     echo 'exist';
  }else{
     echo 'earse';
  } 

?>
<!-- 登入驗證 -->
 <?php
 $_SESSION['token']=rand(100,80);
?>

<form action="test.php" method="post">
  <label for="token" >驗證碼 : <?php  echo $_SESSION['token']; ?></label>
  <input type="text" name="token" id="token"/>
    <input type="submit"  />
</form>

<!-- 防止計數器灌水 -->
<?php 
    if(!isset($_SESSION['countOK'])){
      if(isset($_COOKIE['visitTimes'])){
           $visitTime = $_COOKIE['visitTimes'] + 1;
           $expireToday = strtotime(date('Y-m-d 23:59:59'));//通过 strtotime() 函数创建日期和时间
           setcookie('visitTimes',$visitTime,$expireToday);
           echo '<p>這是你今天第'.$visitTime.'次造訪</p>';
      }else{
           setcookie('visitTimes',1,$expireToday);
           echo '<p>這是你今天第1次造訪</p>';
      }
      $_SESSION['countOK'] = 1;
    }else{
       $visitTime = $_COOKIE['visitTimes'];
       echo '<p>Welcome!'.$visitTime.'次造訪</p>';
    }

?>

<p></p>
</body>
</html>