<?php
    require 'dbcon.php';

    if(isset($_POST['submit'])) {
        $eml = $_POST["email"];
        $passw = $_POST["password"];
        $hash= md5($passw);
        // $hash= $passw;
        $sql2="SELECT * FROM `tbl_login` WHERE `log_email`='$eml' AND `log_password`='$hash'";
        $result=mysqli_query($conn, $sql2);
        $res=mysqli_fetch_array($result);
        if($res['log_password'] != $hash){
          echo '<script type="text/javascript">'; 
          echo 'alert("Invalid User");'; 
          echo 'window.location.href = "index.php";';
          echo '</script>';
        }else{
          $_SESSION['email'] = $res['log_email'];
          $loc='/project/dashboard.php';
          header("Location:  $loc");
        }
    }  
?>
<!doctype html>
<html lang="en">

<head>
  <title>Project</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body class="bg-light">
  <header>
    <!-- place navbar here -->
  </header>
  <main >
    <div class="row d-flex justify-content-center align-items-center mt-5">    
        <div class="card  col-5 border-light shadow ">
          <div class="card-body">
              <h4 class="card-title d-flex justify-content-center">Login</h4>
              <p class="card-text p-3 d-flex justify-content-center"> 
                  <form action="" method="POST">
                      <div class="mb-3 m-3">
                      <input type="text"
                          class="form-control m-3" name="email" id="email" aria-describedby="helpId" placeholder="Enter email" required>
                      <input type="password"
                          class="form-control m-3" name="password" id="password" aria-describedby="helpId" placeholder="Enter password" required>
                      <small id="helpId" class="m-3 form-text text-muted">
                          <a class="text-danger" href="">Forgot Password?</a>
                      </small>
                      </div>
                      <div class="d-flex justify-content-center align-items-center">
                          <input type="submit" name="submit" class="btn btn-primary " value="login">
                      </div>
                  </form> </p>
          </div>
          <div class="d-flex align-items-center justify-content-center">
            <a class="text-success bg-light p-2  m-3" href="signup.php" >New? Signup</a>
          </div>
        </div>
    </div>

  </main>
  <footer>
    <!-- place footer here -->
  </footer>
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
   <script>
        const emailInput = document.getElementById('email');
        const passwordInput = document.getElementById('password');
        const cpasswordInput = document.getElementById('cpassword');

        emailInput.addEventListener('input', validateEmail);
        passwordInput.addEventListener('input', validatePassword);
        cpasswordInput.addEventListener('input', matchPassword);

        function validateEmail() {
            const email = emailInput.value;
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            const valid = emailRegex.test(email);
            if (valid) {
            emailInput.classList.remove('is-invalid');
            emailInput.classList.add('is-valid');
            } else {
            emailInput.classList.remove('is-valid');
            emailInput.classList.add('is-invalid');
            return false;
            }
        }

        function validatePassword() {
            const password = passwordInput.value;
            const passwordRegex = /^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*[@#$%^&+=])(?=\S+$).{8,}$/;
            const valid = passwordRegex.test(password);
            if (valid) {
            passwordInput.classList.remove('is-invalid');
            passwordInput.classList.add('is-valid');
            } else {
            passwordInput.classList.remove('is-valid');
            passwordInput.classList.add('is-invalid');
            return false;
            }
        }
      </script>

</body>

</html>