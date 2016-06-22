<?php include 'header.php';?>
<?php
   include "db.php";
?>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<title>Chage Password</title>
   <script src="jquery-1.12.3.min.js"></script>
</head>
<center>
<div class="add_ctg_heading">CHANGE PASSWORD</div> 
<body>
<div class="add_ctg" style="width: 500px; margin-top:60px; padding-top: 40px; padding-bottom: 30px;">
            <table class="add_ctg_table">
			<form action="" method="post">
			
			<tr class="form-group">
            <td style="padding-right: 15px;">User Name</td>
			<td><input type ="text" name ="user_name" class="form-control"/></td>
			</tr>
			
			<tr class="form-group">
            <td style="padding-right: 15px;">Old Password</td>
			<td><input type ="password" name ="old_pass" class="form-control"/></td>
			</tr>
			
			<tr class="form-group">
            <td style="padding-right: 15px;">New Password</td>
			<td><input type ="password" name ="new_pass" class="form-control" /></td>
			</tr>
			
			<tr class="form-group">
            <td colspan="2"><input type = "submit" name="submit" value = "Change" class="btn btn-primary" style="width:35%"//></td>
			</tr>
			
            </form>
			</table>
</div>

</body>
</center>
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
         echo "<script type='text/javascript'> $( document ).ready(function() {
                                    alert('Password Successfully Change.!');
                                    window.location='login.php';
                                 });
         </script>";
      }
      else{
         echo "<script type='text/javascript'> $( document ).ready(function() {
                                    alert('Invalied UserName / Old Password..!');
                                 });
         </script>";
      }
}
?>
<?php include 'footer.php';?>
</html>