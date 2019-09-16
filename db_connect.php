 <?php
 		$conn = mysqli_connect("", "", "", "entr_testdb");
			
		if (!$conn){
			echo 'Connection error: ' . mysqli_connect_error();
		}
 
 ?>
