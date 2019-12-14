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
					$sql = "SELECT* FROM BOOKS WHERE NAME='".$name."'";
					$result = $conn->query($sql);
					if ($result->num_rows>0) 
					{	
    						// output data of each row
							echo "<h1>Books Found:</h1>";
							$i=0;
    						while($row = $result->fetch_assoc()) 
    						{
        						$i+=1;
        						if($i==1)
        						echo "<hr>";
        						echo "<br>NAME: ".$row["NAME"];
        						echo "<br>ID: ".$row["BOOK_ID"];
        						echo "<br>Price: ".$row["PRICE"];
        						echo "<br>Edition: ".$row["EDITION"];
        						echo "<br>Genre: ".$row["GENRE"];
        						echo "<br><br>";
        						echo "<hr>";
        					}
					} 
					else 
					{
    					echo "<br><h1>No books found</h1>";
    					$sql = "SELECT* FROM BOOKS WHERE NAME<>'".$name."'";
						$result = $conn->query($sql);
						if ($result->num_rows>0) 
						{	
    						echo "<h2>Some other available books are:</h2>";
    						$i=0;
    						while($row = $result->fetch_assoc()) 
    						{
        						$i+=1;
        						if($i==1)
        						echo "<hr>";
        						echo "<br>NAME: ".$row["NAME"];
        						echo "<br>ID: ".$row["BOOK_ID"];
        						echo "<br>Price: ".$row["PRICE"];
        						echo "<br>Edition: ".$row["EDITION"];
        						echo "<br>Genre: ".$row["GENRE"];
        						echo "<br><br>";
        						echo "<hr>";
        					}
						} 
    				}
    				echo "<br><h2>What do you want to do?</h2>";
					echo "<a href='purchase.html'><input type='button'class='welcomebuttons' value='Purchase a book'></a><br><br>Or<br><br>";
					echo "<a href='../worlds-and-wanderers.html'><input type='button'class='welcomebuttons' value='Back to Homepage'></a>";
					echo "<br><br><br><br><br><br>";
					$conn->close();
			?>
		</section>
		<footer>
			<p>Proprietry software by Christeen T Jose 18BCB0043</p> 
		</footer>
	</body>
</html>