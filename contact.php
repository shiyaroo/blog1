<html>
<head>



<title> Blog task </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style type="text/css">
body {
  margin: 0;
    padding: 10px;
    width: 1000px;
margin-left: auto;
    margin-right: auto;
   font-family: Arial, Helvetica, sans-serif;
text-align: center;
height: auto;
}
//background-image: url('bg.jpg');
border-style: solid;
    border-width: 1px;
//

</style>
<link rel="stylesheet" href="style1.css" media="all">

</head>

<body>


<header>


<div class="topnav" >

        <a class="active" href="index.php">Home</a>
        <a href="Posts.php">Add Post</a>
        <a href="contact.php">Contact</a>
        <a href="register.php">Register</a>
       <div class="search-container">
    <form action="search.php">
  <input type="text" placeholder="Search.." name="search">

  <button type="submit" style="width: 30px; height: 30px; " > </button>
</form>

</div>
    </div>





</header>


<section style="float: right; text-align: center; color: black;
   height: 200px;
   width: 24%;
   margin: 0;
   border:------------ solid;
    border-color: red;
        border-width: 1px;
       padding: 10px; ">

<h2 style="text-align: center;">Recent Posts</h2>

    <div>
        <?php
        include("dbconnect.php");

        $query=" select * from info order by 1 DESC LIMIT 0,5";

        $run = mysql_query ($query);

        while ($row=mysql_fetch_array($run)){

            $id=$row['id'];
            $name=$row['name'];


            ?>


            <center>


                <h3><?php echo $name; ?></h3></a>
                <h3><?php echo $id; ?></h3></a>

                <a href="posts.php?id=<?php echo $id; ?>">


                    <img src='s.gif' width='140' height='80' /> </a>

            </center>
        <?php } ?>
    </div >
    <div>
        <center> <h2> Videos </h2></center>

        <video  width="300" height="250"   controls title="this video about israel">
            <source  src="natural.mp4" type="video/mp4">
        </video>



    </div>
</section>
<div class="container">




<h3><p> Here some information about us ,  where you can know who we are and how to contact us  !</p></h3>
<h3><p>PHONE NUMBER :+380633965886  </p></h3>
<div >

<h2>CONTACT US</h2>
<a href="https://www.facebook.com/shiyaroo.ali" target="blank" class="btn btn-info"><img src="pic/f.png" height="50" width="50" padding="10" ></a>

<a href="https://plus.google.com/u/1/115270900787917817178" target="blank" class="btn btn-info"><img src="pic/g.png" height="50" width="50" padding="10"  ></a>

<a href="https://www.youtube.com/user/rrodi1980" target="blank" class="btn btn-info"><img src="pic/u.png" height="50" width="50" padding="10" ></a>

<a href="https://www.instagram.com/shiyar.kurdish" target="blank" class="btn btn-info"><img src="pic/i.png" height="50" width="50" padding="10" ></a>

<a href="https://twitter.com/shiyaroo" target="blank" class="btn btn-info"><img src="pic/t.png" height="50" width="50" padding="10" ></a>

<a href="https://vk.com/shiyarkurdish" target="blank" class="btn btn-info"><img src="pic/vk.png" height="50" width="50" padding="10" ></a>




</div>

</body>
</html>
