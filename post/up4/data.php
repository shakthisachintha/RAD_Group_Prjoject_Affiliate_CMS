<?php    
$time = $_POST['Time'];
$ip = $_POST['IP'];
$city = $_POST['City'];
$province = $_POST['Province'];
$country=$_POST['Country'];
$isp=$_POST['ISP'];
$link_id=$_POST['Link_id'];

//insert into click_rec(time,ip,city,province,country,isp) values($time,$ip,$city,$province,$country,$isp);

echo "suc";


$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
//echo "Connected successfully";


// Create database
$sql = "use emoneydr_main_base";
if ($conn->query($sql) === TRUE) {
    echo "Success Connect";
} else {
    echo "Error creating database: " . $conn->error;
}
//inser data into database
$sql="insert into link_clicks(id,ip,isp,city,country,province,date) values('$link_id','$ip','$isp','$city','$country','$province','$time')";

if($conn->query($sql)===TRUE){
    echo "Data Inserted";
}
else{
    echo "error".$conn->error;
}
$conn->close();
?>