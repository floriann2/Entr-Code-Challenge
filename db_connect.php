 <?php
 		$conn = mysqli_connect("localhost", "florian", "61honest51", "entr_testdb");
			
		if (!$conn){
			echo 'Connection error: ' . mysqli_connect_error();
		}
 
 ?>