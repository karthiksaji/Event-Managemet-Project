<?php
    require '../dbcon.php';


    if(isset($_POST['submit'])){
        // $debug->log("values posted");
        // $debug->log($_POST["first"]);

        $otp1= $_POST["first"];
        $otp2= $_POST["second"];
        $otp3= $_POST["third"];
        $otp4= $_POST["fourth"];
        $otp5= $_POST["fifth"];
        $otp6= $_POST["sixth"];
        $otp="{$otp1}{$otp2}{$otp3}{$otp4}{$otp5}{$otp6}";
        $otpe= $_SESSION['otp'];
        $eml=$_SESSION['eml'];
        $hash=$_SESSION['hash'];
        if($otp == $otpe){
            $sql2="INSERT INTO `tbl_login`(`log_email`, `log_password`) VALUES ('$eml','$hash')";
            $result=mysqli_query($conn, $sql2);
            
            session_unset();
            session_destroy();
            session_start();
            $_SESSION['email'] = $eml;
            header('Location: ../dashboard.php');
        }else{
            //create try variable from signup and update in session variable,check by adding a else if here.
            echo ("<script LANGUAGE='JavaScript'>;
            window. alert('Otp invalid retry');
            window. location. href='otp.php';
            </script>");
            //set a tree time chance
            //do it before next review
        }
    }else{
        $debug->log("submit not set");
    }
?>