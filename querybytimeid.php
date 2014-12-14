<!DOCTYPE html>
<html>
<head>
<style>
th	{
    background-color: black;
    color: white;
}
</style>
</head>
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

//$sql = $_GET["statement"];

$sql ="SELECT P.SP_ID, Name, Price, Date, Start_Time, End_Time FROM `Price` as P,`Settlement_Point` as S, `Time` as T where P.SP_ID = S.SP_ID and T.Time_ID = P.Time_ID and T.Time_ID =".$_GET["id"];


// Check if there are results
if ($result = mysqli_query($con, $sql))
{
    // If so, then create a results array and a temporary one
    // to hold the data
    $resultArray = array();
    $tempArray = array();
  
  $tableflag = 1;
  echo "<table border=\"1\"><tr>";            
 
    // Loop through each row in the result set
    while($row = $result->fetch_object())
    {
      if ($tableflag == 1) {
        $tableflag = 0;
        foreach ($row as $key => $value){
          echo "<th scope=\"row\"><strong>".$key."</strong></th>";
        }
        echo "</tr>";
      }
        // Add each row into our results array
        $tempArray = $row;
      echo "<tr>";
      foreach ($row as $value){
        echo "<td><strong>".$value."</strong></td>";
      }
      echo "</tr>";
      array_push($resultArray, $tempArray);
    }
 
    // Finally, encode the array to JSON and output the results
  //echo json_encode($resultArray);
  
  echo "</table>";
}


 
// Close connections
//mysqli_close($result);
mysqli_close($con);
//echo json_encode($resultArray);



?>
  
</body>
</html>