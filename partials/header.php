<?php
session_start();

echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
  <a class="navbar-brand" href="/forum">Coders'.' Corner</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/forum">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="about.php">About</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Top Categories
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">';
          $sql="SELECT caetgory_name,categeory_id FROM `categories` LIMIT 3";
          $result=mysqli_query($conn,$sql);
    while($row=mysqli_fetch_assoc($result)){

         echo' <a class="dropdown-item" href="threadlist.php?catid='. $row['categeory_id'] .'">'.$row['caetgory_name'] .'</a>';
    }
          
       echo '</div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="contact.php" >Contact</a>
      </li>
    </ul>
    <div class="row mx-2">';
    
    if(isset($_SESSION['loggedin']) &&  $_SESSION['loggedin']==true)
  {
    echo ' <form class="form-inline my-2 my-lg-0" method="get" action="search.php">
    <input class="form-control mr-sm-2" type="search" name="search" required  placeholder="Search" aria-label="Search">
    <button class="btn btn-success my-2 my-sm-0 data-toggle="modal"" type="submit">Search</button>
  <p class="text-light my-0 mx-2">Welcome '.$_SESSION['useremail']. '</p>
  <a href="partials/logout.php" class="btn btn-outline-success ml-2" >Logout</a>
  </form>';
  
  
  }
  
  else
  {
    
   echo ' <form class="form-inline my-2 my-lg-0 method="get" action="search.php"">
    <input class="form-control mr-sm-2" type="search" required placeholder="Search" aria-label="Search">
    <button class="btn btn-success my-2 my-sm-0" type="submit">Search</button>
    </form>
    <button class="btn btn-outline-success ml-2"data-toggle="modal" data-target="#loginModal">Login</button>
    <button class="btn btn-outline-success ml-2"data-toggle="modal" data-target="#signupModal">Signup</button>';
  }
    echo'</div>
  </div>
</nav>';
include 'partials/loginmodal.php'; 
include 'partials/signupmodal.php'; 
if (isset($_GET['loggedin']) && $_GET['loggedin']=="false") {
  echo '<div class="alert alert-warning alert-dismissible fade show my-0" id="loginerrorAlert" role="alert">
  <strong>Invalid:  </strong>  Passowrd or Email id is not match   
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
$_GET['loggedin']="";
}
if (isset($_GET['loggedin']) && $_GET['loggedin']=="true")
{
    echo '<div class="alert alert-success alert-dismissible  fade show my-0"  id="loginSuccessAlert" role="alert">
    <strong>Success </strong> Login Successfully  
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
}


if(isset($_GET['signupsuccess']) && $_GET['signupsuccess']=="true")
{
  echo '<div class="alert alert-success alert-dismissible  fade show my-0"   id="signupSuccessAlert" role="alert">
  <strong>Success</strong> You Can now login   
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
}
if(isset($_GET['signupsuccess']) && $_GET['signupsuccess']=="false")
{
  echo '<div class="alert alert-warning alert-dismissible  fade show my-0" id="signupErrorAlert" role="alert">
  <strong>Invalid</strong> Email id is already in use..Please use another mail id 
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
}

?>
<script>
    // Function to close the alert after a certain time (in milliseconds)
    function closeAlertAfterTimeout(alertId, timeout) {
        setTimeout(function () {
          // console.log("hello");   
          var alert = document.getElementById(alertId);
          if (alert) {
              // console.log(alert);

                alert.remove();
                window.location.href = "/forum";
                 // Remove the alert from the DOM
            }
        }, timeout);
    }

    // Call the function with your alert IDs and desired timeout (in milliseconds)
    closeAlertAfterTimeout("loginSuccessAlert", 2000);
    closeAlertAfterTimeout("loginerrorAlert", 2000);
    closeAlertAfterTimeout("signupSuccessAlert", 2000);
    closeAlertAfterTimeout("signupErrorAlert", 2000);
</script>