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
<li style=margin-right:10px;><a href="admin_logout.php">Logout</a></li>
<li><a class="active" href="admin_home.php">Admin</a></li>
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
		
		$sql = "CREATE TABLE IF NOT EXISTS pharmacist (
			pharmacist_id varchar(20) PRIMARY KEY,
			pharmacist_name varchar(20), 
			pharmacist_password varchar(20),
			pharmacist_address varchar(50),
			pharmacist_phone integer(15),
			pharmacist_email varchar(50)
		)";

		if ($conn->query($sql) === TRUE) {
		//echo "Table created successfully";
		} else {
		echo "Error creating table: " . $conn->error;
		}
		
		$pharmacistid = filter_input(INPUT_GET,'pharmacistid');
		$pharmacistname = filter_input(INPUT_GET,'name');
		$pharmacistpass = filter_input(INPUT_GET,'pass');
		$pharmacistnumber = filter_input(INPUT_GET,'number');
		$pharmacistemail = filter_input(INPUT_GET,'email');
		


		$sql = "INSERT INTO pharmacist (pharmacist_id, pharmacist_name, pharmacist_password, pharmacist_phone, pharmacist_email) 
		VALUES ('$pharmacistid', '$pharmacistname', '$pharmacistpass','$pharmacistnumber','$pharmacistemail')";


if ($conn->query($sql) === TRUE) {
    //echo "New record created successfully";
	echo "<div id='card'><p>New Pharmacist Successfully Added</p><form action='admin_home.php' method='get'><button type='submit' id='done'>Done</button></form></div>";
		
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

		$conn->close();
		
		?>

</body>
</html>
