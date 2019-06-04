<?php



$name = $_POST['Name'];
$email = $_POST['Email'];
$phone = $_POST['Phone'];
$pay_method = $_POST['Pay'];
$pay_address=$_POST['Pay_Det'];
$date=$_POST['Date'];
$gigid=$_POST['Gigid'];
$gig_link=$_POST['Gig_link'];
$prof_link=$_POST['Prof_link'];


$statfile=fopen("stat.txt","r");
$total=(int)substr(fgets($statfile),19)+1;
fclose($statfile);

$statfile1=fopen("stat.txt","w");
$rec="Total Submittion : ".$total;
fwrite($statfile1,$rec);
fclose($statfile1);
$ref="SUB".$total;

//echo "suc";


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
  //  echo "Success Connect";
} else {
    echo "Error creating database: " . $conn->error;
}
//inser data into database
$sql="insert into fiverr_form values('$ref','$name','$email','$phone','$pay_method','$date','$gigid','$gig_link','$prof_link');";

if($conn->query($sql)===TRUE){
  //  echo "Data Inserted";
}
else{
    echo "error".$conn->error;
}
$conn->close();
echo $ref;
?>


