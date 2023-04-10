<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require 'dbcon.php';
    require 'vendor/autoload.php';

    if(isset($_POST['submit'])) {   
    $eml = $_POST["email"];
    $passw = $_POST["password"];
    $hash= md5($passw);
    // $hash= $passw;
    $random = random_int(100000, 999999);

    $sql2="SELECT * FROM `tbl_login` WHERE `log_email`='$eml' ";
    $result=mysqli_query($conn, $sql2);
    $rowcount = mysqli_num_rows( $result );
    if($rowcount > 0){
        echo ("<script LANGUAGE='JavaScript'>;
        window. alert('User with this email already exists');
        window. location. href='signup.php';
        </script>");

    }else{

        $mail = new PHPMailer(true);
        $mail->isSMTP();                                      
        $mail->Host       = 'smtp.gmail.com';                 
        $mail->SMTPAuth   = true;                                  
        $mail->Username   = 'developer.eventmanagement@gmail.com';                     
        $mail->Password   = 'bhfvennzarbscogk';                              
        $mail->SMTPSecure = 'ssl';            
        $mail->Port       = 465;
        $mail->setFrom('developer.eventmanagement@gmail.com', 'Event Managment');
        $mail->addAddress("$eml");
        //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Event management | Email Varification';
        $mail->Body    = "$random";
        //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        if($mail->send()){
            $_SESSION['hash']=$hash;
            $_SESSION['otp']= $random;
            $_SESSION['eml']= $eml;
        header("location: /project/otp/otp.php");
        

        }else{
        echo '<script> alert("Some error occured"); </script>';
        }

    }

    } 
?>

<!doctype html>
<html lang="en">

<head>
    <title>Project| Signup</title>
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
    <main>
        <div class="row d-flex justify-content-center align-items-center mt-5">
            <div class="card  col-5 border-light shadow ">
                <div class="card-body">
                    <h4 class="card-title d-flex justify-content-center">Sign Up</h4>
                    <p class="card-text p-3 d-flex justify-content-center">
                    <form action="" method="POST">
                        <div class="mb-3 m-3">
                            <input type="text" class="form-control m-3" name="email" id="email" aria-describedby="helpId"
                                placeholder="Enter email" REQUIRED>
                            <input type="password" class="form-control m-3" name="password" id="password" aria-describedby="helpId"
                                placeholder="New password" REQUIRED>
                            <input type="password" class="form-control m-3" name="cpassword" id="cpassword" aria-describedby="helpId"
                                placeholder="Confirm password" REQUIRED>
                        </div>
                        <div class="d-flex justify-content-center align-items-center">
                            <input type="submit" name="submit" id="signup" class="btn btn-primary " value="Sign Up">
                        </div>
                    </form>
                    </p>
                </div>
                <div class="d-flex align-items-center justify-content-center">
                    <a class="text-success bg-light p-2  m-3" href="index.php">Already have account? Login</a>
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

        function matchPassword() {
            const password = passwordInput.value;
            const cpassword = cpasswordInput.value;
            const match = (password === cpassword);
            if (match) {
            cpasswordInput.classList.remove('is-invalid');
            cpasswordInput.classList.add('is-valid');
            } else {
            cpasswordInput.classList.remove('is-valid');
            cpasswordInput.classList.add('is-invalid');
            return false;
            }
        }
        </script>
</body>

</html>