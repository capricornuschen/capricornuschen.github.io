<!DOCTYPE html>
<html>
<body>
  
<?php

$config = parse_ini_file("config.ini");
 
// Create connection
$con=mysqli_connect($config["hostname"],$config["user"],$config["password"],$config["dbname"]);
 
// Check connection
if (mysqli_connect_errno())
{
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
 
// This SQL statement selects ALL from the table 'Locations'
//$sql = "SELECT * FROM diary where `baby_id`=\"".$_GET["id"]."\"";
 
//$sql = "select * from Price where `Time_ID`=".$_GET["id"];

//$sql = "select * from Time";

$DName = $_GET["DName"];
$sql2 = "delete from Settlement_Point where Name = '$DName'";

//echo "delete sql is :" . $sql2;
//echo "result = " . mysqli_query($con, $sql2);
// Check if there are results

if ($result = mysqli_query($con, $sql2))
{
	include_once('./deleteresult.html'); 
}

else include_once('./deletefailure.html');

// Close connections
//mysqli_close($result);
mysqli_close($con);
//echo json_encode($resultArray);

?>
  
</body>
</html>
