
<?php

// including the database connection file
include_once("config.php");
 

if(isset($_POST['update']))
{    
    $city=$_POST['city'];
    $high=$_POST['high'];
    $low=$_POST['low'];    

    // checking empty fields
    if(empty($city) || empty($high) || empty($low)) {    
            
            if(empty($city)) {
                echo "<font color='red'>City field is empty.</font><br/>";
            }
            if(empty($high)) {
                echo "<font color='red'>High°C field is empty.</font><br/>";
            }
            if(empty($low)) {
                echo "<font color='red'>Low°C field is empty.</font><br/>";
            } 

        } else {    

        //updating the table

        $sql = "UPDATE Weather SET city=:city, high=:high, low=:low WHERE city=:city";
        $query = $dbConn->prepare($sql);
                
        $query->bindparam(':city', $city);
        $query->bindparam(':high', $high);
        $query->bindparam(':low', $low);
        $query->execute();
    
        //redirectig to the display page. In our case, it is index.php
        header("Location: index.php");
    }
}


//getting id from url
$city = $_GET['city'];
 

//selecting data associated with this particular id
$sql = "SELECT * FROM Weather WHERE city=:city";
$query = $dbConn->prepare($sql);
$query->execute(array(':city' => $city));
 
while($row = $query->fetch(PDO::FETCH_ASSOC))
{
    $city = $row['city'];
    $high = $row['high'];
    $low = $row['low'];
}
?>
<html>
<head>    
    <title>Edit Weather Data</title>
</head>
 
<body>
    
    <br>
    <hr>
    <br>
    <a href="index.php">Home</a>
    <br>
    <br>
    <hr>
    
    <form name="form1" method="post" action="edit.php">
        <table border="0">
            <tr> 
                <td>City</td>
                <td><input type="text" name="city" value="<?php echo $city;?>"></td>
            </tr>
            <tr> 
                <td>High</td>
                <td><input type="number" name="high" value="<?php echo $high;?>"></td>
            </tr>
            <tr> 
                <td>Low</td>
                <td><input type="number" name="low" value="<?php echo $low;?>"></td>
            </tr>
            <tr>
                <td><input type="hidden" name="city" value=<?php echo $_GET['city'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>

