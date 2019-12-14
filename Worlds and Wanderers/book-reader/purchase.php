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
					$BOOK_ID=$_POST["ID"];
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
    					$sql="SELECT PRICE,W_CODE FROM BOOKS WHERE BOOK_ID='".$BOOK_ID."'";
						$result = $conn->query($sql);
						if ($result->num_rows === 1) 
						{
    						$row = $result->fetch_assoc();
    						$PRICE=$row["PRICE"];
    						$CODE=$row["W_CODE"];
    						$sql="SELECT CUSTOMER_ID,BS_ID FROM WAREHOUSES WHERE CODE='".$CODE."'";
    						$result = $conn->query($sql);
    						if ($result->num_rows === 1) 
							{
								$row = $result->fetch_assoc();
								$sCUSTOMER_ID=$row["CUSTOMER_ID"];
								$BS_ID=$row["BS_ID"];
    							$sql = "INSERT INTO SALES(SALES_ID,BS_ID,BS_CUSTOMER_ID,BR_ID,BR_CUSTOMER_ID) VALUES (sysdate(),'".$BS_ID."','".$sCUSTOMER_ID."','".$BR_ID."','".$CUSTOMER_ID."')";
    							if ($conn->query($sql) === TRUE) 
								{
									$sql = "INSERT INTO ORDERS(CUSTOMER_ID,BR_ID,DATE_TIME,TOTAL_AMOUNT,BOOK_ID) VALUES ('".$CUSTOMER_ID."','".$BR_ID."',sysdate(),".$PRICE.",'".$BOOK_ID."')";
									if ($conn->query($sql) === TRUE) 
									{
    									echo "<br><h1>Your order has been placed successfully</h1>";
    									echo "<br><br><a href='../worlds-and-wanderers.html'> <input type='button'class='welcomebuttons' value='Back to Homepage'></a><br><br><br>";
    								}
    								else 
									{
    									echo "<br>Error:<br>" . $conn->error;
    									echo "<br><br><a href='../worlds-and-wanderers.html'> <input type='button'class='welcomebuttons' value='Back to Homepage'></a>";
									}
								}
								else 
								{
    								echo "<br>Error:<br>" . $conn->error;
    								echo "<br><br><a href='../worlds-and-wanderers.html'> <input type='button'class='welcomebuttons' value='Back to Homepage'></a>";
								}
							} 
							else 
							{
    							echo "<br>Error*:<br>" . $conn->error;
    							echo "<br><br><a href='../worlds-and-wanderers.html'> <input type='button'class='welcomebuttons' value='Back to Homepage'></a>";
							}
						}
						else 
						{
    						echo "<br>Error:<br>".$conn->error;
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