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
    $id=$_GET['catid'];
    $sql="SELECT * FROM `categories` where categeory_id=$id";
    $result=mysqli_query($conn,$sql);
    // echo $result;
    // var_dump($result);
    while($row=mysqli_fetch_assoc($result)){
        $catname=$row['caetgory_name'];
        $catdesc=$row['category_description'];

    }
    ?>


    <!-- Slider starts here -->
    <?php
    $showalert=false;
    $method=$_SERVER['REQUEST_METHOD'];//ye btayega ki kya mara hai post ya get
    if($method=='POST'){
        //INSERT INTO DB
        $th_title=$_POST['title'];
        $th_desc=$_POST['desc'];
        $sno=$_POST['sno'];
        $sql="INSERT INTO `threads` (`thread_title`, `thread_desc`, `thread_cat_id`, `thread_user_id`, `timestamp`) VALUES ('$th_title', '$th_desc',  '$id', '$sno', current_timestamp())";
        $result=mysqli_query($conn,$sql);
        $showalert=true;
        if($showalert){
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Success</strong> You thread has been added !please wait to somone respond   
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
            <h1 class="display-4">Welcome to <?php echo $catname;?> forums</h1>
            <p class="lead"><?php echo $catdesc;?> </p>
            <hr class="my-4">
            <p>This is a peer to peer form for sharing knowledge with each other.Warn About Adult Content.
                Do not spam.
                Do Not Bump Posts.
                Do Not Offer to Pay for Help.
                Do Not Offer to Work For Hire.
                Do Not Post About Commercial Products.</p>
            <!-- <a class="btn btn-success btn-lg" href="#" role="button">Learn more</a> -->
        </div>
    </div>

    <?php 

//   $_SERVER['REQUEST_URI']  means jo page khula hai submit krne pe usko hi load kreg vapis  
if(isset($_SESSION['loggedin']) &&  $_SESSION['loggedin']==true)
{

    echo '<div class="container">
    <h1 class="py-2">Start a Discussion</h1>
        <form action="'.$_SERVER["REQUEST_URI"] .  '" method="post">
        <div class="form-group">
        <label for="exampleInputEmail1">Problem title</label>
        <input type="text" class="form-control" id="title" required name="title" aria-describedby="emailHelp">
        <small id="emailHelp" class="form-text text-muted">Keep your title as short and crisp
        </small>
        </div>
        <div class="form-group">
        <label for="exampleFormControlTextarea1">Elaborate your concern</label>
        <textarea class="form-control" id="desc" required name="desc" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-success">Submit</button>
        <input type="hidden" name="sno" value="'. $_SESSION["sno"]. '">
        </form>
        </div>';
    }
    else
    {
        echo '<div class="container">
        <h1 class="py-2">Start a Discussion</h1>
        <p class="lead">You are not logged in .Please logged in before you start a discussion </p> </div>';

    }
    
    ?>
    <div class="container">
        <h1 class="py-2">Browse Questions</h1>
    <?php
    $id=$_GET['catid'];
    $sql="SELECT * FROM `threads` where thread_cat_id=$id";
    $result=mysqli_query($conn,$sql);
    // echo $result;
    $noresult=true;
    while($row=mysqli_fetch_assoc($result)){
        $noresult=false;
        $title=$row['thread_title'];
        $desc=$row['thread_desc'];
        $id=$row['thread_id'];
        $thread_time=$row['timestamp'];
        $thread_user_id=$row['thread_user_id'];

        $sql2="SELECT User_email from `users` where Serial_NO=$thread_user_id";
        $result2=mysqli_query($conn,$sql2);
        $row2=mysqli_fetch_assoc($result2);
        
    

    
       echo '<div class="media my-3">
            <img src="Images/default.png" class="mr-3" width="50px" alt="...">
            <div class="media-body">'.
            
                '<h5 class="mt-0"><a class="text-dark" href="threadss.php?threadid='. $id .'">'. $title .'<a/></h5>
                '. $desc .'
            </div>'.'<p class="font-weight-bold my-0">Asked by  '. $row2['User_email'].' at '.$thread_time. '</p>'.
        '</div>';    

    }
    if($noresult)
    {
        
        echo '<div class="jumbotron jumbotron-fluid">
        <div class="container">
          <p class="display-4">No Threads Found</p>
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
