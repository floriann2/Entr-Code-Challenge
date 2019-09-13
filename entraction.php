
			<?php
			
				$conn = mysqli_connect("localhost", "florian", "61honest51", "entr_testdb");
			
				if (!$conn){
					echo 'Connection error: ' . mysqli_connect_error();
				}
				// write query for all entries
				$sql = 'SELECT *FROM bookings';

				
				// get the result set (set of rows)
				$result = mysqli_query($conn, $sql);
				// fetch the resulting rows as an array
				$entries = mysqli_fetch_all($result, MYSQLI_ASSOC);
				
				// free the $result from memory (good practise)
				mysqli_free_result($result);
							
				// close connection
				mysqli_close($conn);
				
				//explode(',', $entries[0]['name']);
			
				// define variables and set to empty values
				$name = $company = $venue = "";
				$errors = array("name" => "", "company" => "", "venue" => "");

				if (isset($_POST["submit"])) {
					if(empty($POST["name"])){
						$errors["name"] = "A name is required";
					}
					else{
						echo htmlspecialchars($_POST["name"]);
					}
					
					echo htmlspecialchars($_POST["company"]);
					
					if (empty($POST["space"])){
						$errors["space"] = "A venue is required";
					}
					else{
						echo htmlspecialchars($_POST["space"]);
					}
					if (array_filter($errors)){
						
					}
					else{
						$name = mysqli_real_escape_string($conn, $_POST['name']);
						$company = mysqli_real_escape_string($conn, $_POST['company']);
						$venue = mysqli_real_escape_string($conn, $_POST['venue']);
						
						$sql = "INSERT INTO bookings(name,company,venue) VALUES('$name', '$company', '$venue')";
						if(mysqli_query($conn, $sql)){
						}	
						else{
							echo 'query error: ' . mysqli_error($conn);
						}
					}
				
				}
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
									<h5><?php echo htmlspecialchars($entry['name']); ?></h5>
									<h5><?php echo htmlspecialchars($entry['company']); ?></h5>
									<h5><?php echo htmlspecialchars($entry['venue']); ?></h5>

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