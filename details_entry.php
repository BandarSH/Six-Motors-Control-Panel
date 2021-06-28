		<?php
		$host = "localhost";
		$dbUsername = "root";
		$dbPassword ="";
		$dbName= "robot_arm_values";


		$conn = new mysqli($host,$dbUsername,$dbPassword,$dbName);

		if(mysqli_connect_error()){
			die ('Connect Error('.mysqli_connect_errno().')'.mysqli_connect_error());

		} else{

			$slider = $_POST ['demo'];
			$slider2 = $_POST ['demo2'];
			$slider3 = $_POST ['demo3'];
			$slider4 = $_POST ['demo4'];
			$slider5 = $_POST ['demo5'];
			$slider6 = $_POST ['demo6'];


			if(isset($_POST['save'])){

				$test = "INSERT INTO robot_arm_values (value1, value2, value3, value4, value5, value6) values(?,?,?,?,?,?)";
	         //Prepare statement

	          $stmt = $conn->prepare($test);
	      if ($stmt != false){
	             $stmt->bind_param("iiiiii", $slider,$slider2,$slider3,$slider4,$slider5,$slider6);
							 $stmt->execute();
							 echo "Values have been modified successfully!";
							 $stmt->close();
			         $conn->close();
						 } else{
	 	          print("Returns false");
						}





/*$stmt = $conn->prepare("INSERT Into robot_arm_values(value1, value2, value3, value4, value5, value6) values(?,?,?,?,?,?)");
$stmt->bind_param("iiiiii",$slider,$slider2,$slider3,$slider4,$slider5,$slider6);
$stmt->execute();
echo "Values have been modified successfully!";
$stmt->close();
$conn->close();*/
				} else if(isset($_POST['on'])){


					$my_query = "select * from on_values WHERE 1 ";
    			$result = mysqli_query($connection, $my_query);

    			$my_query = "INSERT INTO robot_arm_values (isOn) VALUES (1)";
    			$result = mysqli_query($connection, $my_query);


			}

		}

		?>
