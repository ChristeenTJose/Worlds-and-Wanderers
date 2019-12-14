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
			Book Sellers
		</nav>
		<section id="form">
			<?php
					$name=$_POST["name"];
					$password=$_POST["password"];
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
					$sql = "SELECT CUSTOMER_ID FROM CUSTOMER WHERE PASSWORD='".$password."' AND NAME='".$name."' AND CUSTOMER_ID IN (SELECT CUSTOMER_ID FROM BOOKSELLER)";
					$result = $conn->query($sql);
					if ($result->num_rows===1) 
					{	
    						echo "<h1>Welcome back to Worlds and Wanderers ".$name."</h1>";
    						echo "<br><h2>What do you want to do?</h2><br><br>";
							echo "<a href='function1.html'> <input type='button'class='welcomebuttons' value='Add a Warehouse'></a><br><br>Or<br><br>";
							echo "<a href='function2.html'><input class='welcomebuttons' type='button' value='Add a Book'></a><br><br>Or<br><br>";
							echo "<a href='sales.html'><input class='welcomebuttons' type='button' value='View Sales'></a><br><br>Or<br><br>";
							echo "<a href='add-phone-number.html'> <input type='button'class='welcomebuttons' value='Add Phone Number'></a><br><br>Or<br><br>";
							echo "<a href='../worlds-and-wanderers.html'> <input type='button'class='welcomebuttons' value='Back to Homepage'></a>";
							echo "<br><br><br><br><br><br>";
					} 
					else 
					{
    					echo "<br>Invalid username or password";
    					echo "<br><br><a href='../worlds-and-wanderers.html'> <input type='button'class='welcomebuttons' value='Back to Homepage'></a>";
    				}
					$conn->close();
			?>
		</section>
		<footer>
			<p>Proprietry software by Christeen T Jose 18BCB0043</p> 
		</footer>
	</body>
</html>