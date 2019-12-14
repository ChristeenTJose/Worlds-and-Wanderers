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
		<h1>Record of all your sales:</h1><br>
		<?php
					$name=$_POST["name"];
					$password=$_POST["password"];
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
					else
					{
						$sql="SELECT BS_ID FROM BOOKSELLER WHERE CUSTOMER_ID='".$CUSTOMER_ID."'";
						$result = $conn->query($sql);
						if ($result->num_rows === 1) 
						{
    						$row = $result->fetch_assoc();
    						$BS_ID=$row["BS_ID"];	
    						$sql = "SELECT SALES_ID,BR_CUSTOMER_ID FROM SALES WHERE BS_ID='".$BS_ID."' AND BS_CUSTOMER_ID='".$CUSTOMER_ID."'";
							$result = $conn->query($sql);
							if ($result->num_rows>0) 
							{	
    							$i=0;
    							while($row = $result->fetch_assoc()) 
    							{
        							$i+=1;
        							if($i==1)
        							echo "<hr>";
        							echo "<br>TIMESTAMP: ".$row["SALES_ID"];
        							$BR_CUSTOMER_ID=$row["BR_CUSTOMER_ID"];
        							$sql = "SELECT NAME FROM CUSTOMER WHERE CUSTOMER_ID='".$BR_CUSTOMER_ID."'";
        							$temp_result = $conn->query($sql);
									if($conn->query($sql)) 
									{
        								$temp_row = $temp_result->fetch_assoc();
        								echo "<br>CUSTOMER NAME: ".$temp_row["NAME"];
        							}
        							else
        							{
        								echo "<br>Error:<br>".$conn->error;
    									echo "<br><br><a href='../worlds-and-wanderers.html'> <input type='button'class='welcomebuttons' value='Back to Homepage'></a>";	
        							}
        							echo "<br><br>";
        							echo "<hr>";
        						}
        						echo "<br><br><a href='../worlds-and-wanderers.html'> <input type='button'class='welcomebuttons' value='Back to Homepage'></a>";
        						echo "<br><br><br>";
							} 
							else
							{
								echo "<br>No records found<br>";
    							echo "<br><br><a href='../worlds-and-wanderers.html'> <input type='button'class='welcomebuttons' value='Back to Homepage'></a>";
							}
						}
						else
						{
    						echo "<br>Error:<br>".$conn->error;
    						echo "<br><br><a href='../worlds-and-wanderers.html'> <input type='button'class='welcomebuttons' value='Back to Homepage'></a>";
						}
					}
					
			?>
		</section>
		<footer>
			<p>Proprietry software by Christeen T Jose 18BCB0043</p> 
		</footer>
	</body>
</html>