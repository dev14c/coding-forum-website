<?php
$showError="false";
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    include 'dbconnect.php';
    $user_email=$_POST['signupEmail'];
    $pass=$_POST['signuppassword'];
    $cpass=$_POST['signupcpassword'];

    // Check Whether this mail exist
    $existSql="SELECT * FROM `users` WHERE User_email= '$user_email'";
    $result=mysqli_query($conn,$existSql);
    $numRows=mysqli_num_rows($result);
    if($numRows>0)
    {
        $showError="Email is already in use";


    }
    else{
        if($pass=$cpass)
        {
            $hash=password_hash($pass,PASSWORD_DEFAULT);
            $sql="INSERT INTO `users` (`User_email`, `User_Password`, `timestamp`) VALUES ('$user_email', '$hash', current_timestamp())";
            $result=mysqli_query($conn,$sql);
            if($result)
            {
                $showalert=true;
                header("Location: /forum/index.php?signupsuccess=true");
                exit();
            }
        }
        else
        {
            $showError="Passowrds not match";
            // header("Location: /forum/index.php?signupsuccess=false&error=$showError");

        }
    }
    header("Location: /forum/index.php?signupsuccess=false&error=$showError");
}
?>