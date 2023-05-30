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


<?php
        if($_SESSION["pharmacistid"] === ""){
          echo $_SESSION['pharmacistid'];
          echo "login";
          header("Location: home.php ");
        }
      ?>
		
	<ul>
<li id="titlehead"><p id="title"><a href="home.php">PharmaMatrix</a></p></li>
<li style=margin-right:10px;><a href="pharmacist_logout.php">Logout</a></li>
<li><a class="active" href="pharmacist_home.php">Pharmacist</a></li>
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
		
		$sql = "CREATE TABLE IF NOT EXISTS medicine (
			medicine_name varchar(50), 
			quanity integer(10),
			expiry_date date,
			amount integer(10)
		)";

		if ($conn->query($sql) === TRUE) {
		//echo "Table admin_database created successfully";
		} else {
		echo "Error creating table: " . $conn->error;
		}
		
		$medname = filter_input(INPUT_GET,'medname');
		$qty = filter_input(INPUT_GET,'qty');
		$exdate = filter_input(INPUT_GET,'exdate');
		$amt = filter_input(INPUT_GET,'amt');
		


		$sql = "INSERT INTO medicine (medicine_name, quanity, expiry_date, amount) 
		VALUES ('$medname', '$qty','$exdate','$amt')";
		

		if ($conn->query($sql) === TRUE) {
		//echo "New record created successfully";

		echo "<div id='card'><p>Medicine Successfully Added</p><form action='pharmacist_home.php' method='get'><button type='submit' 				id='done'>Done</button></form></div>";
		
		
		
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}

		$conn->close();
		
		?>

</body>
</html>
