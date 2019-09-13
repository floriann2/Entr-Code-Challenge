<?php
include('db_connect.php');

if (isset($_POST['delete'])){
	
	$id_to_delete = mysqli_real_escape_string($conn, $_POST['id_to_delete']);
	$sql = "DELETE FROM bookings WHERE id = $id_to_delete";
	
	if (mysqli_query($conn, $sql)){
		
	}
	else{
		echo 'query error: ' . mysqli_error($conn);
	}
}

if(isset($_GET['id'])){
	
	$id = mysqli_real_escape_string($conn, $_GET['id']);
	
	$sql = "SELECT * FROM bookings WHERE id = $id";
	
	$result = mysqli_query($conn, $sql);
	
	$entry = mysqli_fetch_assoc($result);
	
	mysqli_free_result($result);
	mysqli_close($conn);
	
	//print_r($entry);
}

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Entr Code Challenge</title>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
	</head
	<div class="container center grey-text">
		<?php if($entry): ?>
			<!--<h4><?php echo $entry['name']; ?></h4>-->
			<p>Created by <?php echo $entry['name']; ?></p>
			<p>Created at <?php echo date($entry['created_at']); ?></p>
			<h5>Entry Details:</h5>
			<p>Company: <?php echo $entry['company']; ?></p>
			<p>Venue: <?php echo $entry['venue']; ?></p>
			
			<!--DELETE-->
			<form action="details.php" method="POST">
				<input type = "hidden" name="id_to_delete" value="<?php echo $entry['id']; ?>">
				<input type="submit" name="delete" value="Delete" class="btn brand z-depth-0"> 
			</form>
			
		<?php else: ?>
			<h5>No such entry exists.</h5>
		<?php endif ?>
	</div>
</html>