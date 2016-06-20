<html>

   <head>
		<link rel="stylesheet" type="text/css" href="style.css">
		<title>Inventory System || Login Page</title>
   </head>
   
   <body bgcolor = "#FFFFFF">
	
      <div align = "center">
         <div class="div1">
            <div class="div2"><b>Login</b></div>
				
            <div class = "div3">

<!--Your Working Area-->             
               <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                  <label>UserName  :</label><input type ="text" name="username" class="box"/><br /><br />
                  <label>Password  :</label><input type ="password" name="password" class="box" /><br/><br/>
				     <a href="change_password.php" class="passchange">Change Password</a>
                  <input type="submit" name="submit" value ="Submit"/><br />
               </form>
			</div>
				
         </div>
      </div>

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
      else
      echo "Invalid username or password!";
}
?>
</html>
