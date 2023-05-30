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
<li style=margin-right:10px;><a class="active" href="admin_login.php">Admin</a></li>
<li><a href="pharmacist_login.php">Pharmacist</a></li>
<li><a href="user_login.php">User</a></li>
<li><a href="home.php">Home</a></li>
</ul>

<?php
		$adminid = filter_input(INPUT_POST,'adminid');
		$adminpass = filter_input(INPUT_POST,'adminpass');

		if($adminid=="ad01" && $adminpass=="123")
		{
            		$_SESSION["adminid"] = $adminid;
           		 header("Location: admin_home.php");
			
		}else{
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

            $sql = "SELECT * FROM admin_data WHERE admin_id='$adminid' AND admin_password='$adminpass'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $_SESSION["adminid"] = $adminid;
                header("Location: admin_home.php");
                
            }else {
                echo "<div id='card'><p>Invalid Id or Password!!!</p><p>Try again with valid Id and Password</p><form action='admin_login.php' method='get'><button 	type='submit' id='done'>Done</button></form></div>";

if($conn->connect_error){
		echo"<div id='card'><p>Session closed!!</p><form action='admin_login.php' method='get'><button type='submit' 		id='done'>Done</button></form></div>
				}
        }
?>
		
</body>
</body>
</html>



