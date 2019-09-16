
	<?php
		include('db_connect.php');
	
		$conn = mysqli_connect("", "", "", "entr_testdb");
			
		if (!$conn){
			echo 'Connection error: ' . mysqli_connect_error();
		}
		// write query for all entries
			$sql = 'SELECT * FROM bookings';

				
		// get the result set (set of rows)
			$result = mysqli_query($conn, $sql);
		// fetch the resulting rows as an array
			$entries = mysqli_fetch_all($result, MYSQLI_ASSOC);
				
		// free the $result from memory (good practise)
		    mysqli_free_result($result);
							
				
		//explode(',', $entries[0]['name']);

	$name = $company = $venue = '';
	$errors = array('name' => '', 'company' => '', 'venue' => '');

	if(isset($_POST['submit'])){
		// check name
		$name = $_POST['name'];

		// check company
		$company = $_POST['company'];

		// check venue
		$venue = $_POST['venue'];

		if(array_filter($errors)){
			//display 'errors in form';
		} else {
			// escape sql chars
			$name = mysqli_real_escape_string($conn, $_POST['name']);
			$company = mysqli_real_escape_string($conn, $_POST['company']);
			$venue = mysqli_real_escape_string($conn, $_POST['venue']);
			// create sql
			$sql = "INSERT INTO bookings(name,company,venue) VALUES('$name','$company','$venue')";

			// save to db and check
			if(mysqli_query($conn, $sql)){
				// success
			} else {
				echo 'query error: '. mysqli_error($conn);
			}

			
		}

	} // end POST check
	// close connection
	mysqli_close($conn);

?>
<!DOCTYPE HTML>
	<html>
		<head>
			<title>Entr Coding Challenge</title>
			 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

		</head>
		<body>				
				<h4 class = "center grey-text">Entries</h4>
				<div class = "container">
				<div class = "row">
					<?php foreach ($entries as $entry): ?>
					
						<div class="col s6 m4">
							<div class="card z-depth-0">
							<div class="card-content center">
								<ul class="grey-text">
									<h5><?php echo htmlspecialchars($entry['name']); ?></h5>
									<h5><?php echo htmlspecialchars($entry['company']); ?></h5>
									<h5><?php echo htmlspecialchars($entry['venue']); ?></h5>
								</ul>
							</div>
							<div class="card-action right-align">
								<a class="brand-text" href="details.php?id=<?php echo $entry['id'] ?>">more info</a>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		
		</body>
	</html>
