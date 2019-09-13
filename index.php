<?php include('db_connect.php');?>
<!DOCTYPE html>
	<html>
		<head>
			<title>Entr Code Challenge</title>
			<link rel = "stylesheet" href = "entrstyle.css">
			<img src = "entr-logo-text.svg">
			<link rel="icon" href="logo" type="image/png" />
		</head>
		<body>
			<h1>Welcome!</h1>
			<h3>Please enter your details below, to be assigned to a group: </h3>
			<!--<p><span class="error">* required field</span></p>-->
			<form action= "entraction.php" method="post">
				<fieldset>
					<legend>User Information</legend>
					<p>Name: <!--<span class="error">*--></p><input type="text" name="name"></span>
					<p>Company:</p><input type="text" name="company">
					<p>Which curated space are you most interested in renting? <!--<span class="error">*--></p></span>
					<input type="radio" name="venue" value="hotel">Hotel
					<input type="radio" name="venue" value="bar">Bar
					<input type="radio" name="venue" value="cafe">Cafe
					<input type="radio" name="venue" value="studio">Studio
					<input type="radio" name="venue" value="park">Park
					<input type="radio" name="venue" value="other">Other
					<p>If you've selected 'Other', please indicate the venue type below:</p>
					<input type="text" name="venue"><br><br><br>
				<button id="submit">Submit</button>
				</fieldset>
			</form>
		</body>
	</html>