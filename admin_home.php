<html>
<?php
// Start the session
session_start();
?>
<head>
<style>
#title{
font-size:33px;						
color:rgb(255, 255, 255);				
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

.grid-container {
display: grid;
grid-template-columns: auto auto;
grid-gap: 20px;
padding: 10px;
}

.btn{
background-color: white;
border: none;			
color: #0a0909;				
padding-top:7px;			
text-align: center;				
margin-bottom:0px;				
font-size: 20px;			
}
			
.btn:hover{				
box-shadow: 0 12px 16px 0 rgba(7, 7, 7, 0.24), 0 17px 50px 0 rgba(14, 12, 12, 0.19);
}
</style>
</head>
<body>

<?php
        if($_SESSION["adminid"] === ""){
          echo $_SESSION['adminid'];
          echo "login";
          header("Location: home.php ");
        }
      ?>

<ul>
<li id="titlehead"><p id="title"><a href="home.php">PharmaMatrix</a></p></li>
<li style=margin-right:10px;><a href="admin_logout.php">Logout</a></li>
<li><a class="active" href="admin_home.php">Admin</a></li>
</ul>


		<h2 style="font-style:Bold; font-size:35px;padding-left:30px;">Admin Dashboard</h2>

		<div class="grid-container">

			<div style="text-align:right;"> <img src="image\adminmini.png">  </div>
			<div ><button type="button" class="btn" onclick="location.href='add_admin.php'">Add Admin</button></div>

			<div style="text-align:right;"><img src="image\pharmacistmini.png"></div>  
			<div ><button type="button" class="btn" onclick="location.href='add_pharmacist.php'">Add Pharmacist</button></div>

			<div style="text-align:right;"><img src="image\viewe.png"></div>  
			<div ><button type="button" class="btn" onclick="location.href='view_pharmacist.php'">View Pharmacist</button></div>

			<div style="text-align:right;"><img src="image\viewe.png"></div>  
			<div ><button type="button" class="btn" onclick="location.href='view_user.php'">View User</button></div>

			<div style="text-align:right;"><img src="image\delete.png"></div>  
			<div ><button type="button" class="btn" onclick="location.href='delete_admin.php'">Delete Admin</button></div>

			<div style="text-align:right;"><img src="image\delete.png"></div>  
			<div ><button type="button" class="btn" onclick="location.href='delete_pharmacist.php'">Delete Pharmacist</button></div>
		
		</div>
	</body>
</html>