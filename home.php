<html>
<?php
// Start the session
session_start();
?>
<head>
<style>
#title{
background-color:#0d866c;
font-size:33px;
color:white;
margin-left:20px;
margin-top:20px;
margin-bottom:20px;
}
				
ul {
list-style-type: none;
margin: 0;
padding: 0;
overflow: hidden;
background-color: #0d866c;
}
			
li {
float: right;
}
#titlehead{
float: left;
}

li a {
display: block;
color: white;font-size:20px;
text-align: center;
padding: 16px 20px;
margin-top:10px;
text-decoration: none;
}

li a:hover:not(.active) {
background-color: #06d8e7;
}

.active {
background-color: #0dc29b;
}
			
#home_img{
padding-left:50px;
padding-bottom:10px;
}
			
#bottom_posts{				
display: grid;
grid-template-columns: auto auto auto;
padding: 10px;			
}
			
#img_title{				
display: grid;
grid-template-columns: auto auto auto;
padding: 5px;
}

#posts{
padding: 20px;
font-size: 30px;
text-align: center;
}
</style>
</head>

<body>
<ul>
<li id="titlehead"><p id="title"><a href="home.php">PharmaMatrix</a></p></li>
<li style=margin-right:10px;><a href="admin_login.php">Admin</a></li>
<li><a href="pharmacist_login.php">Pharmacist</a></li>
<li><a href="user_login.php">User</a></li>
<li><a class="active" href="home.php">Home</a></li>
</ul>
		
<div id=bottom_posts>
<div id=posts>
<h2 style="font-size:28px;"> Employee Details</h2>
<div id=img_title>
<img src="image\pharmacy.png">
<p style="font-size:20px;"> Easy to access the Employee details and manage them</p>
</div>
</div>
			
<div id=posts>
<h2 style="font-size:28px;">Medicines Details</h2>
<div id=img_title>
<img src="image\medicinemain.png">
<p style="font-size:20px;">Medicines can be added and updated easily</p>
</div>
</div>

<div id=posts>
<h2 style="font-size:28px;">User Friendly</h2>
<div id=img_title>
<img src="image\searchimg.png">
<p style="font-size:20px;">Any medicines can be accessed easily</p>
</div>
</div>
</div>

<?php
		
		$servername = "localhost";
		$username = "pharmamatrix";
		$password = "p123";

		// Create connection
		$conn = new mysqli($servername, $username, $password);
		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		} 

		// Create database
		$sql = "CREATE DATABASE IF NOT EXISTS pharmamatrix";
		if ($conn->query($sql) === TRUE) {
			//echo "Database created successfully";
			
		
		
		$conn->close();
		}
		?>
</body>
</html>