<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <style>
         body
        {

            background-color: #e3fefd;
        }
    /* #ques{
            min-height: 433px;
        } */
    </style>
    <title>Welcome to iDiscuss - Coding Forums</title>
</head>

<body>
    <?php include 'partials/dbconnect.php';?>
    <?php include 'partials/header.php';?>
    <?php
    $id=$_GET['threadid'];
    $sql="SELECT * FROM `threads` where thread_id=$id";
    $result=mysqli_query($conn,$sql);
    while($row=mysqli_fetch_assoc($result)){
        $title=$row['thread_title'];
        $desc=$row['thread_desc'];
        $thread_user_id=$row['thread_user_id'];

       
    //query  the users table to findout hte name of poster  orginal kisne thread post kiya hau usk name
        $sql2="SELECT User_email from `users` where Serial_NO=$thread_user_id";
        $result2=mysqli_query($conn,$sql2);
        $row2=mysqli_fetch_assoc($result2);
        $posted_by=$row2['User_email'];

        

    }
    ?>


    <!-- Slider starts here -->

 <?php
    $showalert=false;
    $method=$_SERVER['REQUEST_METHOD'];//ye btayega ki kya mara hai post ya get
    if($method=='POST'){
        $comment=$_POST['comment'];
        $sno=$_POST['sno'];
        $sql="INSERT INTO `comments` (`comment_content`, `thread_id`, `comment_time`, `comment_by`) VALUES ('$comment', '$id', current_timestamp(), '$sno')";
        $result=mysqli_query($conn,$sql);
        $showalert=true;
        if($showalert){
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success</strong> You Comment has been added    
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';
        }

    }
    ?>
    <!-- Category container starts here -->
    <div class="container my-4" id="ques">
        <div class="jumbotron">
            <h1 class="display-4"><?php echo $title;?></h1>
            <p class="lead"><?php echo $desc;?>  </p>
            <hr class="my-4">
            <p>This is a peer to peer form for sharing knowledge with each other.Warn About Adult Content.
                Do not spam.
                Do Not Bump Posts.
                Do Not Offer to Pay for Help.
                Do Not Offer to Work For Hire.
                Do Not Post About Commercial Products.</p>
            <!-- <a class="btn btn-success btn-lg" href="#" role="button">Learn more</a> -->
            <p><b>Posted by :<?php echo $posted_by ?></b></p>
        </div>
    </div>
    <!-- $_SERVER['REQUEST_URI']  means jo page khula hai submit krne pe usko hi load kreg vapis  -->
    <div class="container">
    <?php 

  
if(isset($_SESSION['loggedin']) &&  $_SESSION['loggedin']==true)
{

    echo '<div class="container">
    <h1 class="py-2">Post a Comment</h1>
        <form action="'. $_SERVER['REQUEST_URI']. '" method="post">
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Type Your comment</label>
                <textarea class="form-control" required id="comment" name="comment" rows="3"></textarea>
                <input type="hidden" name="sno" value="'. $_SESSION["sno"]. '">
            </div>
            <button type="submit" class="btn btn-success">Post Comment</button>
        </form>
    </div>';
    }
    else
    {
        echo '<div class="container">
        <h1 class="py-2">Post a Comment</h1>
        <p class="lead">You are not logged in .Please logged in to be able to post a comment </p> </div>';

    }
    
    ?>
    <div class="container">
        <h1 class="py-2">Discussions</h1>
         <?php
        //  commetn showing in the page
    $id=$_GET['threadid'];
    $sql="SELECT * FROM `comments` where thread_id=$id";
    $result=mysqli_query($conn,$sql);
    $noresult=true;
    while($row=mysqli_fetch_assoc($result)){
        $noresult=false;
        $id=$row['comment_id'];
        $content=$row['comment_content'];
        $comment_time=$row['comment_time'];
        $thread_user_id=$row['comment_by'];
    
        $sql2="SELECT User_email from `users` where Serial_NO=$thread_user_id";
        $result2=mysqli_query($conn,$sql2);
        $row2=mysqli_fetch_assoc($result2);
        
    
       echo '<div class="media my-3">
            <img src="default.png" class="mr-3" width="50px" alt="...">
            <div class="media-body">
            <p class="font-weight-bold my-0">'. $row2['User_email'] .'at '.$comment_time. '</p>
                '. $content .'
            </div>
        </div>';    

    }
    if($noresult)
    {
        
        echo '<div class="jumbotron jumbotron-fluid">
        <div class="container">
          <p class="display-4">No Comments Found</p>
          <p class="lead"><b> Be the first person to ask a question </b></p>
        </div>
      </div>';
    }
    ?> 
       




    <?php include 'partials/footer.php';?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
    </script>
</body>

</html>