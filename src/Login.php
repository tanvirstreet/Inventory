<?php include 'header.php';?>
<html>

   <head>
		<link rel="stylesheet" type="text/css" href="style.css">
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<title>Inventory System || Login</title>
		<script src="jquery-1.12.3.min.js"></script>
   </head>
   
   <body bgcolor = "#FFFFFF">

		<center>
<div class="add_ctg_heading">LOGIN</div>

		<div class="add_ctg" style="width: 500px; margin-top:80px; padding-top: 40px; padding-bottom: 40px;">
			<table class="add_ctg_table">
               <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                  <tr class="form-group">
				  <td style="padding-right: 15px;">UserName</td>
				  <td><input type="text" name="username" class="form-control"/></td>
				  </tr>
				  
				  <tr class="form-group">
				  <td style="padding-right: 15px;">Password</td>
                  <td><input type ="password" name="password" class="form-control"/></td>
				  </tr>
				  </tr>
				  </table>
				
				<div style="padding-top:12px">
				<a href="change_password.php" class="btn btn-primary" style="width:20%">Change</a>
				&nbsp;<input type="submit" name="submit" value ="Login" class="btn btn-primary" style="width:20%"/>
				</div>
				  
               </form>
		</div>
		
		</center>
   </body>
<?php
include "db.php";
if(isset($_POST['submit'])){

      $user_name = $_POST['username'];
      $pass = $_POST['password'];
      
      $result = mysql_query("SELECT * FROM `user` WHERE user_name='$user_name' and password='$pass'");
      $data = mysql_fetch_array($result);
      $username = $data['user_name'];
      $password = $data['password'];
      $id = $data['id'];

      if($user_name==$username && $pass = $password)
      {
         session_start();
         $_SESSION['username']= $user_name;
         $_SESSION['id'] = $id;
         
         header('Location: home.php');
      }
      else{
      	 echo "<script type='text/javascript'> $( document ).ready(function() {
										    	alert('Invalied UserName / Password..!');
											});
			</script>";
      }
}
?>
<?php include 'footer.php';?>
</html>
