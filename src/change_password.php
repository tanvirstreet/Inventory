<?php
   include "db.php";
?>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>Chage Password</title>
</head>
   
<body bgcolor = "#FFFFFF">

   <div align = "center">
      <div class="div1">
         <div class="div2">
            <b>Chage Password</b>
         </div>

         <div class = "div3">
            <form action="" method="post">
            <label>User Name</label><input type ="text" name ="user_name" class = "box"/><br /><br />
            <label>Old Pass</label><input type ="password" name ="old_pass" class = "box"/><br /><br />
            <label>New Pass</label><input type ="password" name ="new_pass" class = "box" /><br/><br/>
            <input type = "submit" name="submit" value = " Change "/><br />
            </form>
         </div>
      </div>
   </div>

</body>
<?php
if(isset($_POST['submit'])){

      $username = $_POST['user_name'];
      $oldPass = $_POST['old_pass'];
      $newPass = $_POST['new_pass'];
      
      $result = mysql_query("SELECT * FROM `user` WHERE user_name='$username' and password='$oldPass'");
      $data = mysql_fetch_array($result);
      $user_name = $data['user_name'];
      $password = $data['password'];
      $id = $data['id'];

      if($username==$user_name && $oldPass==$password)
      {
         $sql = "UPDATE `user` SET `password`='$newPass' WHERE user_name='$user_name'";
         mysql_query($sql);
         
         header('Location: login.php');
      }
      else
      echo "Invalid username or Old password!";
}
?>
</html>