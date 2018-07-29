<html>
<head>

    <link rel="stylesheet" href="styleposts.css" media="all">
    <link rel="stylesheet" href="style1.css" media="all">

<title> Blog task </title>



</head>

<body>


<header>


<div class="topnav" >
      
        <a class="active" href="index.php">Home</a>
        <a href="register.php">Register</a>
        <a href="posts.php">Add Post</a>
        <a href="contact.php">Contact</a>

</div>




</header>

<section style="float: right; text-align: center;
   height: 200px;
   width: 24%;
   margin: 0;
   border:------------ solid;
    border-color: red;
        border-width: 1px;
       padding: 10px; ">



<div style=" text-align: center;    width: 200px;     overflow:auto;">


    <h3 >Recent Posts</h3>

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


                <h3 style="color: #a94442"><?php echo $name; ?></h3></a>
                <h3 style="color: #2196F3"><?php echo $id; ?></h3></a>

                <a href="posts.php?id=<?php echo $id; ?>">


                    <img src='s.gif' width='140' height='80' /> </a>

            </center>
        <?php } ?>
    </div >
    <div>
        <center> <h2> Videos </h2></center>

        <video  width="200" height="250"   controls title="this video about israel">
            <source  src="natural.mp4" type="video/mp4">
        </video>



    </div>
</div>




    <div style=" text-align: center; border-top: outset;    width: 200px;     overflow:auto; ">

    <h4 style="text-align: center; " >FOLLOW US</h4>
<a href="https://www.facebook.com/shiyaroo.ali" target="blank"><img src="pic/f.png" height="50" width="50" padding="10" ></a>

<a href="https://plus.google.com/u/1/115270900787917817178" target="blank"><img src="pic/g.png" height="50" width="50" padding="10"  ></a>

<a href="https://www.youtube.com/user/rrodi1980" target="blank"><img src="pic/u.png" height="50" width="50" padding="10" ></a>

<a href="https://www.instagram.com/shiyar.kurdish" target="blank"><img src="pic/i.png" height="50" width="50" padding="10" ></a>

<a href="https://twitter.com/shiyaroo" target="blank"><img src="pic/t.png" height="50" width="50" padding="10" ></a>

<a href="https://vk.com/shiyarkurdish" target="blank"><img src="pic/vk.png" height="50" width="50" padding="10" ></a>





</div>
</section></p>


  
<section  >
<div style="text-align:center;
height: auto; 
width: 73.5%;
 border-------solid;
  border-color: black;
      border-width: 1px;
      float: left; ">
	<h1 > Welcome To our blog  </h1>

<?php include  ("pagination.php"); ?>


</div>

</section>

</body>
</html>
