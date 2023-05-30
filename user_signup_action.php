<html>
<?php
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
color: white;
font-size:20px;
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
padding: 10px;
}

#posts{
padding: 20px;
font-size: 30px;
text-align: center;
}

#card{
background-color:#FFFFEF;
margin:150px;
height:150px;
border-radius:5px;
box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
text-align:center;
font-size:24px;
padding:25px;
margin-left:200px;
margin-right:200px;
}

#done{
background-color: #06d8e7;
color: white;
padding: 12px 20px;
border: none;
border-radius: 4px;
cursor: pointer;
}

</style>
</head>
<body>
<ul>
<li id="titlehead"><p id="title"><a href="home.php">PharmaMatrix</a></p></li>
<li style=margin-right:10px;><a href="admin_login.php">Admin</a></li>
<li><a href="user_login.php">Pharmacist</a></li>
<li><a class="active" href="user_login.php">User</a></li>
<li><a href="home.php">Home</a></li>
</ul>

<?php
		
		$servername = "localhost";
		$username = "pharmamatrix";
		$password = "p123";
		$dbname ="pharmamatrix";

		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		} 
		
		$sql = "CREATE TABLE IF NOT EXISTS user_database (
			user_id VARCHAR(10) PRIMARY KEY,
			user_name VARCHAR(20), 
			user_password VARCHAR(20),
			user_phone VARCHAR(11),
			user_email VARCHAR(50)
		)";

		if ($conn->query($sql) === TRUE) {
		//echo "Table created successfully";
		} else {
		echo "Error creating table: " . $conn->error;
		}
		
		$userid = filter_input(INPUT_GET,'userid');
		$username = filter_input(INPUT_GET,'name');
		$userpass = filter_input(INPUT_GET,'pass');
		$usernumber = filter_input(INPUT_GET,'number');
		$useremail = filter_input(INPUT_GET,'email');
		
		$sql = "SELECT * FROM user_database WHERE user_id = '$userid'";
		$result = $conn->query($sql);

		if(mysqli_num_rows($result)>0){
			echo "<div id='card'><p>User ID Already Exists</p><form action='user_signup.php' method='get'><button type='submit' id='done'>Try 		Again</button></form></div>";
		}else{
			$sql = "INSERT INTO user_database (user_id, user_name, user_password, user_phone, user_email) 
			VALUES ('$userid', '$username', '$userpass','$usernumber','$useremail')";


			if ($conn->query($sql) === TRUE) {
				//echo "New record created successfully";
				$_SESSION["userid"] = $userid;
				echo "<div id='card'><p>New user Successfully Added</p><form action='user_home.php' method='get'><button type='submit' id='done'>Done</button></form></div>";
					
			} else {
				echo "Error: " . $sql . "<br>" . $conn->error;
			}
		}
		$conn->close();
		
		?>

</body>
</html>
