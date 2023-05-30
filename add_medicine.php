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
			
* {
box-sizing: border-box;
}

input[type=text], select, textarea,input[type=password],input[type=email],input[type=number],input[type=date] {
margin-right:400px;
text-align:center;
width: 40%;
padding: 12px;
border: 1px solid #ccc;
border-radius: 4px;
resize: vertical;
}

label {
font-size:18px;
margin-left:450px;
padding: 12px 12px 12px 0;
display: inline-block;
}

input[type=submit] {
background-color: #0d866c;
color: white;
padding: 12px 20px;
border: none;
border-radius: 4px;
cursor: pointer;
float: right;
}

input[type=submit]:hover {
background-color: #06d8e7;
}

.container {
border-radius: 5px;
background-color: #fafafa;
padding: 20px;
}

.col-25 {
float: left;
width: 50%;
margin-top: 6px;
}

.col-75 {
float: left;
width: 50%;
margin-top: 6px;
}

/* Clear floats after the columns */
.row:after {
content: "";
display: table;
clear: both;
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

<h2 style="font-style:bold; font-size:30px;padding-left:30px;">Add Medicine</h2>
<div style="text-align:center;"> <img src="image\medicinemain.png">  </div>
<div class="container">
<form action="add_medicine_action.php" method = "get">
				
<div class="row">
<div class="col-25">
<label for="lname">Medicine Name</label>
</div>
<div class="col-75">
<input type="text" pattern=".{1,}" required name="medname" placeholder="Enter medicine name...">
</div>
</div>
				
<div class="row">
<div class="col-25">
<label for="lname">Quantity</label>
</div>
<div class="col-75">
<input type="text" pattern=".{1,}" required name="qty" placeholder="Quantity...">
</div>
</div>

<div class="row">
<div class="col-25">
<label for="lname">Expiry date</label>
</div>
<div class="col-75">
<input type="date" pattern=".{1,}" required name="exdate" placeholder=" Expiry date...">
</div>
</div>
				
<div class="row">
<div class="col-25">
<label for="lname">Amount</label>
</div>
<div class="col-75">
<input type="text" pattern=".{1,}" required name="amt" placeholder="Amount...">
</div>
</div>
				
<div class="row">
<input type="submit" style="margin-right:600px; margin-top:10px;" value="Submit">
</div>
</form>
</div>
</body>
</html>