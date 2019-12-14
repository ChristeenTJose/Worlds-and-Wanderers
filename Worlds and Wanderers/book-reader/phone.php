<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8"/>
		<title>BOOK READERS
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
			Book Readers
		</nav>
		<section id="form">
			<?php
					$name=$_POST["name"];
					$password=$_POST["password"];
					$phone=$_POST["phone"];
					$CUSTOMER_ID=substr($name,0,3).substr($password,0,3);
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
					$sql="SELECT BR_ID FROM BOOKREADER WHERE CUSTOMER_ID='".$CUSTOMER_ID."'";
					$result = $conn->query($sql);
					if ($result->num_rows === 1) 
					{
    					$row = $result->fetch_assoc();
    					$BR_ID=$row["BR_ID"];
    					$sql = "INSERT INTO BR_CONTACT(CUSTOMER_ID,BR_ID,CONTACT_NUMBER)
						VALUES ('".$CUSTOMER_ID."','".$BR_ID."',".$phone.")";
						if ($conn->query($sql) === TRUE) 
						{
    						echo "<br><h1>Your new phone number has been added successfully</h1>";
    						echo "<br><br><a href='../worlds-and-wanderers.html'> <input type='button'class='welcomebuttons' value='Back to Homepage'></a>";
						} 
						else 
						{
    						echo "<br>Error:<br>" . $conn->error;
    						echo "<br><br><a href='../worlds-and-wanderers.html'> <input type='button'class='welcomebuttons' value='Back to Homepage'></a>";
						}
					} 
					else 
					{
    					echo "<br>Error:<br>".$conn->error;
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