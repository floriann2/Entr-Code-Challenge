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
			<form action= "entraction.php" method="POST">
				<fieldset>
					<legend>User Information</legend>
					<p>Name: <!--<span class="error">*--></p><input type="text" name="name"></span>
					<p>Company:</p><input type="text" name="company">
					<p>Which curated space are you most interested in renting? <!--<span class="error">*--></p></span>
					<input type="radio" name="venue" value="Hotel">Hotel
					<input type="radio" name="venue" value="Bar">Bar
					<input type="radio" name="venue" value="Cafe">Cafe
					<input type="radio" name="venue" value="Studio">Studio
					<input type="radio" name="venue" value="Park">Park
					<input type="radio" name="venue" value="Other">Other
					<!--<p>If you've selected 'Other', please indicate the venue type below:</p>
					<input type="text" name="venue1">--><br><br><br>
					<input type="submit" name="submit" value="Submit">
				</fieldset>
			</form>
		</body>
	</html>
