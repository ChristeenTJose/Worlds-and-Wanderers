<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8"/>
		<title>BOOK SELLERS
		</title>
		<link rel="stylesheet" type="text/css" href="../css/styling.css">
	</head>
	<body link="white">
		<header>
			<a href="../worlds-and-wanderers.html" target="_self">
				<img id="logo" src="../images/logo.jpg" title="Home page" width=175 alt="Logo"/>
			</a>
			<img id="header" src="../images/header.PNG" title="&quot;Welcome to Worlds and Wanderers&quot;" width=400 alt="Worlds and Wanderers"/>
		</header>
		<nav>
			<a href="../worlds-and-wanderers.html">Log out</a>
		</nav>
		<section id="form">
			<?php
					$name=$_POST["name"];
					$price=$_POST["price"];
					$edition=$_POST["edition"];
					$genre=$_POST["genre"];
					$AUTHOR_NAME=$_POST["AUTHOR_NAME"];
					$AUTHOR_EMAIL=$_POST["AUTHOR_EMAIL"];
					$AUTHOR_PHONE=$_POST["AUTHOR_PHONE"];
					$W_CODE=$_POST["W_CODE"];	
					$BOOK_ID=substr($name,0,4)."*//*".substr($AUTHOR_NAME,0,4);
					$servername = "localhost";
					$username = "scott";
					$mysql_password = "tiger";
					$dbname="WORLDS_AND_WANDERERS";
					$conn = new mysqli($servername, $username, $mysql_password, $dbname);
					if ($conn->connect_error) 
					{
    					die("<br>Connection failed: " . $conn->connect_error);
    					echo "<br><br><a href='../worlds-and-wanderers.html'> <input type='button'class='welcomebuttons' value='Back to Homepage'></a>";
					}
					$sql = "INSERT INTO  BOOKS(BOOK_ID,NAME,PRICE,EDITION,GENRE,AUTHOR_NAME,AUTHOR_EMAIL,AUTHOR_PHONE,W_CODE)
					VALUES ('".$BOOK_ID."','".$name."',".$price.",'".$edition."','".$genre."','".$AUTHOR_NAME."','".$AUTHOR_EMAIL."',".$AUTHOR_PHONE.",'".$W_CODE."')";
					if ($conn->query($sql) === FALSE) 
					{
    					echo "<br>Kindly ensure that you have filled in the correct details<br>";
    					echo "<br>Error:<br>" . $conn->error;	
    					echo "<br><br><a href='../worlds-and-wanderers.html'> <input type='button'class='welcomebuttons' value='Back to Homepage'></a>";
					} 
					else 
					{
    					echo "<br><h1>Your book has been added successfully</h1>";
    					echo "<br><br><a href='../worlds-and-wanderers.html'> <input type='button'class='welcomebuttons' value='Back to Homepage'></a><br><br><br>";
					}
					$conn->close();
			?>
		</section>
		<footer>
			<p>Proprietry software by Christeen T Jose 18BCB0043</p> 
		</footer>
	</body>
</html>