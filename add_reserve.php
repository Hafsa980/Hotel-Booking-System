<!DOCTYPE html>
<html lang = "en">
	<head>
		<title>Hotel Online Reservation</title>
		<meta charset = "utf-8" />
		<meta name = "viewport" content = "width=device-width, initial-scale=1.0" />
		<link rel = "stylesheet" type = "text/css" href = "css/style.css" />
	</head>
<body>
	<nav style = "background-color:rgba(0, 0, 0, 0.1);">
		<div>
			<div>
				<a>Hotel Online Reservation</a>
			</div>
		</div>
	</nav>	
	<ul id = "menu">
		<li><a href = "home.php">Home</a></li> |
		<li><a href = "aboutus.php">About us</a></li> |
		<li><a href = "contactus.php">Contact us</a></li> |
		<li><a href = "gallery.php">Gallery</a></li> |
		<li><a href = "dineandlounge.php">Dine and Lounge</a></li> |			
		<li><a href = "reservation.php">Make a reservation</a></li> |
	</ul>
	<div style = "margin-left:0;">
		<div>
			<div>
				<strong><h3>MAKE A RESERVATION</h3></strong>
				<br />
				<?php 
					require_once 'admin/connect.php';
					$query = $conn->query("SELECT * FROM `room` WHERE `room_id` = '$_REQUEST[room_id]'") or die(mysql_error());
					$fetch = $query->fetch_array();
				?>
				<div style = "height:300px; width:800px;">
					<div style = "float:left;">
						<img src = "photo/<?php echo $fetch['photo']?>" height = "300px" width = "400px">
					</div>
					<div style = "float:left; margin-left:10px;">
						<h3><?php echo $fetch['room_type']?></h3>
						<h3 style = "color:#00ff00;"><?php echo "USD ".$fetch['price'].".00";?></h3>
					</div>
				</div>
				<br style = "clear:both;" />
				<div>
					<form method = "POST" enctype = "multipart/form-data">
						<div>
							<label>Firstname</label>
							<input type = "text" name = "firstname" required = "required" />
						</div>
						<div>
							<label>Middlename</label>
							<input type = "text" name = "middlename" required = "required" />
						</div>
						<div>
							<label>Lastname</label>
							<input type = "text" name = "lastname" required = "required" />
						</div>
						<div>
							<label>Address</label>
							<input type = "text" name = "address" required = "required" />
						</div>
						<div>
							<label>Contact No</label>
							<input type = "text" name = "contactno" required = "required" />
						</div>
						<div>
							<label>Check in</label>
							<input type = "date" name = "date" required = "required" />
						</div>
						<br />
						<div>
							<button name = "add_guest"><i class = "glyphicon glyphicon-save"></i> Submit</button>
						</div>
					</form>
				</div>
				<div></div>
				<?php require_once 'add_query_reserve.php'?>
			</div>
		</div>
	</div>
	<br />
	<br />
	<div style = "text-align:right; margin-right:10px;">
		<label>&copy; Copyright 2023 </label>
	</div>
</body>
	
</html>