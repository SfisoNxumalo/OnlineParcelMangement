<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Sign In - Parcel Managent System</title>
        
        <link rel="stylesheet" type="text/css" href="css/styledesign.css">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css' />
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css' />
  <script src="https://kit.fontawesome.com/6e1efe0729.js" crossorigin="anonymous"></script>
  
  <script>
      
      function validate(form)
      {
          fail = validateUsername(form.UserName.value);
          fail += validatePassword(form.Password.value);

          if(fail === "")
          {
              return true;
          }
          else
          { 
              alert(fail); 
              return false;
          }
      }
      
      function validateUsername(field)
      {
          if(field === "") return "No Username was entered.\n";
          return "";
      }
      
      function validatePassword(field)
      {
          if(field === "") return "No Password was entered.\n";
          return "";
      }
      
  </script>
    </head>

    <body>
       <div class="menu-bar">
            <h1 class="logo">Parcel<span>Management.</span></h1>

        </div>
        <div class="admindesign">
            <img src="images/adminicon.jpg" class="adminicon">
            <h1>Sign In</h1>
            
            <form method="POST" action="Login.php" onsubmit="return validate(this)">
                <p>Username</p>
                <input type="text" name="UserName" placeholder="Enter Username" required>
                <p>Password</p>
                <input type="password" name="Password" placeholder="Enter Password" required>
                <input type="submit" name="btn-login" value="Sign In" class="btn-login">  
            </form>
            
            <form method="POST" action="CustomerLog.html">
                <div id="reg"><input type="submit" name="Register" value="Login User" class="btn-view"></div>
            </form>
            
            <form method="POST" action="RegisterUser.html">
                <div id="reg"><input type="submit" name="Register" value="Register" class="btn-view"></div>
            </form>
            
            
        </div>
    </body>
</html>
