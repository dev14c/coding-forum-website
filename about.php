
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
        /* #ques{
            min-height: 433px;
        } */
        *{
    /* margin: 0; */
    /* padding: 0; */
    font-family: "Open Sans",sans-serif;
    box-sizing: border-box;
}

.containerabout{
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: #f1f1f1;
}

.about-section{
    background: url(pic.jpg) no-repeat left;
    background-size: 55%;
    background-color: #fdfdfd;
    overflow: hidden;
    padding: 100px 0;
} 

.inner-container{
    width: 55%;
    float: right;
    background-color: #fdfdfd;
    padding: 150px;
}

.inner-container h1{
    margin-bottom: 30px;
    font-size: 30px;
    font-weight: 900;
}

.text{
    font-size: 13px;
    color: #545454;
    line-height: 30px;
    text-align: justify;
    margin-bottom: 40px;
}

.skills{
    display: flex;
    justify-content: space-between;
    font-weight: 700;
    font-size: 13px;
}

@media screen and (max-width:1200px){
    .inner-container{
        padding: 80px;
    }
}

@media screen and (max-width:1000px){
    .about-section{
        background-size: 100%;
        padding: 100px 40px;
    }
    .inner-container{
        width: 100%;
    }
}

@media screen and (max-width:600px){
    .about-section{
        padding: 0;
    }
    .inner-container{
        padding: 60px;
    }
} */
    </style>
    <title>Welcome to iDiscuss - Coding Forums</title>
</head>

<body>
  <?php include 'partials/dbconnect.php';?>
    <?php include 'partials/header.php';?>

    <div class="containerabout">

        <div class="about-section">
            <div class="inner-container">
                <h1>About Us</h1>
            <p class="text">
            Welcome to Coders' Corner, the ultimate destination for coding enthusiasts to come together, share knowledge, and ignite their passion for programming. Our forum is dedicated to fostering a vibrant community where developers of all levels can connect, collaborate, and learn from each other.

At Coders' Corner, we believe that coding is more than just lines of text; it's a way of thinking and problem-solving that empowers individuals to shape the digital world. Whether you're a seasoned coder with years of experience or a newcomer eager to explore the realm of programming, you'll find a welcoming space here.

Our mission is to create a hub that goes beyond Q&A. We strive to facilitate insightful discussions, thought-provoking debates, and engaging tutorials that not only enhance coding skills but also inspire innovative thinking. We know that learning is a continuous journey, and our community is committed to supporting your growth every step of the way.

Join our diverse community where you can participate in discussions spanning various programming languages, development methodologies, and tech trends. From sharing your latest project to seeking advice on a challenging bug, Coders' Corner is the place to get valuable insights and feedback.

We invite you to be part of something bigger than just a forum; become a member of a network that thrives on curiosity, collaboration, and creativity. Let's embark on this coding adventure together, shaping the future of technology one keystroke at a time.

Welcome to Coders' Corner - where passion for coding meets the power of community.


            </p>
            <!-- <div class="skills">
                <span>Web Design</span>
                <span>Photoshop & Illustrator</span>
                <span>Coding</span> -->
            </div>
        </div>
    </div>
</div>
    <!-- <?php include 'partials/footer.php';?> -->
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