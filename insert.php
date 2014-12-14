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

$Name = $_GET["Name"];
$Location_Tag_ID = $_GET["Location_Tag_ID"];
$sql = "insert into Settlement_Point (Name,Location_Tag_ID) values ('$Name','$Location_Tag_ID')";

// Check if there are results
if ($result = mysqli_query($con, $sql))
{
	include_once('./insertresult.html'); 
}
else include_once('./insertfailure.html');

// Close connections
//mysqli_close($result);
mysqli_close($con);
//echo json_encode($resultArray);

?>
  
</body>
</html>
