<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" 
    integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,600;0,800;1,400&family=Rubik:wght@300&display=swap" rel="stylesheet">

    <title>Welcome to iDiscuss - Coding Forums</title>
    <style>
    /* .container{
      min-height: 87vh;
    } */
    
    /* *{
      margin:0;
      padding:0;

    } */
    body
        {

            background-color: #e3fefd;
        }
    .containerbody
    {
      /* background:white; */
      
      font-size:14px;

      font-family: 'Poppins', sans-serif;
      /* font-family: 'Rubik', sans-serif;   */

    }
    .containermain
    {
      width:80%;
      
      /* top and left se space aati hai */
      margin:50px auto;
    }
    .contact-box{
    
    background: #fff; display: flex;
    }

   
.contact-left{
  /* flex basis means flex ko kitne percent me hafl krna hai */
flex-basis: 60%;
padding: 40px 60px;
}
.contact-right{
flex-basis: 40%;
color:white;
padding: 40px;
background:#1c00b5;
}
.containermain p
{
  margin-bottom:40px;
}
h1
{
  margin-bottom:10px;
}
.input-row{
display: flex; 
justify-content: space-between; 
margin-bottom: 20px;
}
.input-row .input-group{
   flex-basis: 45%;
} 
input{
width: 100%;
border: none;
border-bottom: 1px solid #ccc;
outline: none;
padding-bottom: 5px;
}
textarea{
width: 100%;
border: 1px solid #ccc;
outline: none;
padding: 10px;
box-sizing: border-box;
}
label{
margin-bottom: 6px;
display: block;
color: #1c00b5;
}
button{
background: #1c00b5;
width: 100px;
border: none;
outline: none;
color: #fff;
height: 35px;
border-radius: 30px;
margin-top: 20px;
box-shadow: 0px 5px 15px 0px rgba(28,0,181,0.3);
}
.contact-left h3{
color: #1c00b5;
font-weight: 600;
margin-bottom: 30
}
.contact-right h3
{
  color:white;
  font-weight:600;
  margin-bottom:30px;
}
tr td:first-child{ padding-right: 20px;
}
tr td{
padding-top: 20px;
}
@media screen and (max-width: 768px) {
    .contact-box {
        flex-direction: column;
    }

    .contact-left,
    .contact-right {
        flex: 100%;
    }
}


    </style>
  </head>
  <body>
  <?php include 'partials/dbconnect.php';?>
  <?php include 'partials/header.php';?>
  
  
  <?php
    $showalert=false;
    $method=$_SERVER['REQUEST_METHOD'];//ye btayega ki kya mara hai post ya get
    if($method=='POST'){
        $Name=$_POST['Name'];
        $Message=$_POST['Message'];
        $Subject=$_POST['Subject'];
        $Email=$_POST['Email'];
        $Phone=$_POST['Phone'];
        $sql="INSERT INTO `contact` (`Name`, `Phone`, `Email`, `Subject`, `Message`) VALUES ('$Name', '$Phone', '$Email', '$Subject', '$Message')";
        $result=mysqli_query($conn,$sql);
        $showalert=true;
        if($showalert){
          echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Success</strong> You request has been sended..We wil Soon Connect With you   
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
          </div>';
        }
        
      }
      ?>
      <div class="containerbody">
    <div class="containermain">
        <h1>Contact With Us</h1>
        <p>We Would love to respond to your queriesand help you succees.Feel frew to get in touchwith us.</p>
        <div class="contact-box">
          <div class="contact-left">
            <h3>Send your Request</h3>
            <form action="<?php echo $_SERVER["REQUEST_URI"] ?>"method="post">
              <div class="input-row">

                <div class="input-group">
                  <label for="Name">Name</label>
                  <input type="text" name="Name" placeholder="John" required>
                </div>
              

              <div class="input-group">
                <label for="Phone">Phone</label>
                <input type="text"name="Phone" placeholder="1234567" required>
              </div>
              </div>
              <div class="input-row">

                <div class="input-group">
                  <label for="Email">Email</label>
                  <input type="email" name="Email" placeholder="John@gmail.com" required>
                </div>
              

              <div class="input-group">
                <label for="Subject">Subject</label>
                <input type="text" name="Subject" placeholder="Title" required>
              </div>
            </div>

            <label for="Message">Message</label>
            <textarea name="Message" id="Message" cols="30"  rows="5" required placeholder="Your message"></textarea>

            <button type="submit">Send</button>


              
            </form>
          </div>
          <div class="contact-right">
    <h3>Reach us</h3>
    <table>
      <tr>
        <td>Email</td>
        <td>contactus@gmail.com</td>
      </tr>
      <tr>
        <td>Phone</td>
        <td>+91-949393939</td>
      </tr>
      <tr>
        <td>Adress</td>
        <td>212 Ground Floor Ajmer,7th cross<br>
        Some layout,Some Road,Korbangla <br>
        Ajmer 
</td>
      </tr>
    </table>
          </div>
        </div>
        <!-- <form action="#" method="POST">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="message">Message:</label>
            <textarea id="message" name="message" rows="4" required></textarea>

            <button type="submit">Submit</button>
        </form> -->
    </div>
</body>
</html>

</div>

  <!-- <?php include 'partials/footer.php';?>  -->
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html> 