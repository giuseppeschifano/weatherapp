
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>
</head>
<body>
	
</body>
</html>

<?php

//including the database connection file
include_once("config.php"); 

//checking if data has been entered
if ( isset($_POST['city'] )) { 
	$city = $_POST['city']; 
	$high = $_POST['high']; 
	$low = $_POST['low']; 
 
	// checking empty fields
	if(empty($city) || empty($high) || empty($low)) { 
 
		if(empty($city)) { 
			echo "<font color='darkslategrey'>Pliz fill out empty City field !!</font><br>"; 
			}; 
			if(empty($high)) { 
				echo "<font color='darkslategrey'>Pliz fill out empty High°C field !!</font><br>"; 
			};
			if(empty($low)) { 
				echo "<font color='darkslategrey'>Pliz fill out empty Low°C field !!</font><br>"; 
			};
			 
			//link to the previous page 
			echo "<a href='javascript:self.history.back();'>Go Back</a>"; 
 
		} else { 
 
		// if all the fields are filled out  
		//inserting data into table 
 
		$sql = "INSERT INTO Weather(city, high, low) VALUES(:city, :high, :low)"; 
 
		$query = $dbConn->prepare($sql); 
				 
		$query->bindparam(':city', $city); 
		$query->bindparam(':high', $high); 
		$query->bindparam(':low', $low); 
		$query->execute(); 
 
		//display success message
        echo "<font color='green'>Data added successfully.";
        echo "<br/><a href='index.php'>View Result</a>";

	};
};

?> 

