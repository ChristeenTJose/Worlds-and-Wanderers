<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8"/>
		<title>Signed up
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
					$address=$_POST["address"];
					$email=$_POST["email"];
					$CUSTOMER_ID=substr($name,0,3).substr($password,0,3);
					$BS_ID=substr($name,0,2)."0".substr($email,0,3);
					echo "<h1>Welcome to Worlds and Wanderers ".$name."</h1>";
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
					else
					{
						$sql = "SELECT CUSTOMER_ID FROM CUSTOMER WHERE PASSWORD='".$password."'";
						$result = $conn->query($sql);
						if ($result->num_rows > 0) 
						{	
    						$sql = "INSERT INTO  BOOKSELLER(CUSTOMER_ID,BS_ID,EMAIL,ADDRESS)
							VALUES ('".$CUSTOMER_ID."','".$BS_ID."','".$email."','".$address."')";
							if ($conn->query($sql) === TRUE) 
							{
    							echo "<br>Your account has been created successfully";
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
    							echo "<br>Error:<br>" . $conn->error;
    							echo "<br><br><a href='../worlds-and-wanderers.html'> <input type='button'class='welcomebuttons' value='Back to Homepage'></a>";
							}
    					}
						else 
						{
    						echo "<br>Invalid username or password";
    						echo "<br><br><a href='../worlds-and-wanderers.html'> <input type='button'class='welcomebuttons' value='Back to Homepage'></a>";
    					}
					}		
					$conn->close();
			?>
		</section id="form">
		<footer>
			<p>Proprietry software by Christeen T Jose 18BCB0043</p> 
		</footer>
	</body>
</html>