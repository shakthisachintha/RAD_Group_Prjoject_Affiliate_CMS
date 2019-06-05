<?php

$url = $_POST['url'];
$name = $_POST['linkname'];
$desc = $_POST['desc'];

require 'db_connect.php';

$sql = "select MAX(id) as id from links;";
$res = $conn->query($sql);
$id = $res->fetch_assoc()['id'];
$id = (int) substr($id, 4);
$id = "LINK" . ($id + 1);

$sql = "insert into links values('$id','$url','$desc','$name');";
if ($conn->query($sql)) {
    $link= "<a id='$id' onclick='redirect(this.id)' href='#'> Click Here </a>";
    $myObj = new \stdClass();
    $myObj->id =$id;
    $myObj->link = $link;
    $myJSON = json_encode($myObj);
    echo $myJSON;
}
