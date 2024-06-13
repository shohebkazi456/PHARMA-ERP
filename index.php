<?php
  
  session_start();

?>
<!doctype html>
<html lang="en">

<head>
  <link rel="icon" type="image/png" href="assets/img/t_icon1.png">
  <title>AS Pharma Login</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- Material Kit CSS -->
  <link href="assets/css/material-dashboard.css?v=2.1.2" rel="stylesheet" />

    <script type="text/javascript">

        function preventBack() { 
            window.history.forward();  
        } 
          
        setTimeout("preventBack()", 0); 
          
        window.onunload = function () { null }; 

    </script> 

</head>

<body>

  <br><br><br><br><br>

  <div class="content">
    <div class="container">
            <!-- your content here -->

            <center>

                <h2>AS PHARMA</h2>

                <div style="width: 50%">
                  
                  <div class="card">

                    <div class="card-header card-header-primary">
                      <h4 class="card-title">Login</h4>
                    </div>

                    <div class="card-body">

                      <form method="post">

                        <div class="form-group">
                          <label class="bmd-label-floating float-left">Username</label>
                          <input type="text" class="form-control" name="username"required autocomplete="off">
                        </div>

                        <div class="form-group">
                          <label class="bmd-label-floating float-left">Password</label>
                          <input type="password" class="form-control" name="password" required autocomplete="off">
                        </div>

                         <button type="submit" name="loginBtn" class="btn btn-primary pull-center">Login</button>

                      </form>

                    </div>

                  </div>

                </div>  

            </center>

    </div>

  </div>

      <?php

            include 'DB Files/db_config.php';

            class Login extends Database
            {

              public function checkLogin($username,$password)
              {

                $con=$this->connect();

                $res=$con->query("select * from users where username='$username' and password='$password'");

                $data=mysqli_num_rows($res);

                if($data>0)
                {
                  $_SESSION['username']=$username;

                  echo "<script>

                          alert('User Login Successfully');
                      
                          window.location='User/user_dashboard.php';
                
                        </script>";
                 
                }
                else if($username=='admin' && $password=='admin123')
                {
                  $_SESSION['username']=$username;

                  echo "<script>

                          alert('Admin Login Successfully');
                      
                          window.location='Admin/admin_dashboard.php';
                
                        </script>";
 
                }
                else
                {
                  echo "<script>

                          alert('Incorrect username or password');
                      
                          window.location='index.php';
                
                        </script>";
                }

              }
 
            }
            
            $l=new Login();

            extract($_POST);

            if(isset($loginBtn))
            {

              $l->checkLogin($username,$password);

            }

      ?>

    <br><br><br><br><br>
 
      <footer class="footer">
        <div class="container-fluid">
          <nav class="float-left">
            <ul>
              <li>
                <a href="https://www.anvistar.in">
                  Anvistar Development
                </a>
              </li>
            </ul>
          </nav>
          <div class="copyright float-right">
            &copy;
            <script>
              document.write(new Date().getFullYear())
            </script>, made with <i class="material-icons">favorite</i> by
            <a href="https://www.anvistar.in" target="_blank">Anvistar Development</a> for a better web.
          </div>
        </div>
      </footer>
 
</body>

</html>