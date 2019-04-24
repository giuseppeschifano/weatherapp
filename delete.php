

<?php

//including the database connection file
include("config.php");

    //getting id of the data from url
    $city = $_GET['city'];
    
    //deleting the row from table
    $sql = ( "DELETE FROM Weather WHERE city=:city");
    $query = $dbConn->prepare($sql);
    $query->execute(array(':city' => $city));
    
    //redirecting to the display page (index.php in our case)
    header("Location:index.php");

?>

