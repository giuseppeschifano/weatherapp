

<?php

//including the database connection file
include_once("config.php");

//fetching data in descending order (lastest entry first)
$result = $dbConn->query("SELECT * FROM Weather ORDER BY city ASC");

?>

<html>
<head>    
    <title>Homepage</title>
</head>
 
<body>
	<hr>
	<br>
	<a href="form.html">Add New Weather Data</a>
	<br><br>
	<hr/>
	<br/><br/>
 
<table width='80%' border=0>
 
    <tr bgcolor='lightblue'>
        <td>City</td>
        <td>High°C</td>
        <td>Low°C</td>
        <td>Update</td>
	</tr>
	
    <?php     
		while($row = $result->fetch(PDO::FETCH_ASSOC)) {         
			echo "<tr>";
			echo "<td>".$row['city']."</td>";
			echo "<td>".$row['high']."</td>";
			echo "<td>".$row['low']."</td>";   
			
			echo "<td><a href=\"edit.php?city=$row[city]\">Edit</a> | <a href=\"delete.php?city=$row[city]\" onClick=\"return confirm('Are you sure you want to delete this city ?')\">Delete</a></td>"; 
			echo "</tr>";       
		}

	?>
	
	</table>
	
	</body>
	</html>
