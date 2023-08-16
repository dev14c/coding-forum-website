 <?php
$showerror="false";
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    include 'dbconnect.php';
    $email=$_POST['loginemail'];
    $pass=$_POST['loginpass'];

    $sql="select * from users where User_email='$email'";
    $result=mysqli_query($conn,$sql);
    $numRows=mysqli_num_rows($result);
    if($numRows==1)
    {
        $row=mysqli_fetch_assoc($result);
        
            if(password_verify($pass,$row['User_Password']))
            {
                session_start();
                $_SESSION['loggedin']=true;
                $_SESSION['sno']=$row['Serial_NO'];

                $_SESSION['useremail']=$email;
                echo "logged in" . $email;
                header("Location:/forum/index.php?loggedin=true");
                // header("Location:/forum");
                exit();
                
            }
            else{
                header("Location:/forum/index.php?loggedin=false");
                // header("Location:/forum");
                exit();
                 
                //

                
                
             }
            
        }
        // header("Location:/forum/index.php");
        header("Location:/forum/index.php?loggedin=false");


    }


    

?> 


