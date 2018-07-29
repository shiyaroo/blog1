<?php 
	session_start(); 

	if (!isset($_SESSION['username'])) {
		$_SESSION['msg'] = "You must log in first";
		header('location: login.php');
	}

	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['username']);
		header("location: login.php");
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
    <link rel="stylesheet" href="styleposts.css" media="all">
    <link rel="stylesheet" href="style1.css" media="all">

</head>
<body>

	<div  >

		<!-- notification message -->
		<?php if (isset($_SESSION['success'])) : ?>
			<div class="error success" >
				<h3>
					<?php 
						echo $_SESSION['success']; 
						unset($_SESSION['success']);
					?>
				</h3>
			</div>
		<?php endif ?>

		<!-- logged in user information -->
		<?php  if (isset($_SESSION['username'])) : ?>
			<h2>Welcome <?php echo $_SESSION['username']; ?>
                <a href="logout.php?logout='1'" style=" padding: 7px;
	 font-size: 15px;
	 color: white;
	 background: #14c5ff;
	 border: none;
	 border-radius: 5px;     text-decoration: none; float: right;
" >logout</a> </h2>
		<?php endif ?>
	</div>
    <?php include('home.php') ?>


</body>
</html>