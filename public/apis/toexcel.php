<?php


$type = $_POST["from_date"];
$type1 = $_POST["to_date"];
$type2 = $_POST["tank_id"];

if($type2 == "200321-60304"){
  $tank_name="Laboratory";
}else if($type2 == "200321-60297"){
    $tank_name="LTC";
}




    // require_once $_SERVER['DOCUMENT_ROOT'].'/lwb/imosys/DBConnect.php';
    // require_once $_SERVER['DOCUMENT_ROOT'].'/lwb/imosys/excel.php';
	// date_default_timezone_set("Africa/Blantyre");

    $servername = "localhost";
    $username = "root";
    $password = "2022@Intmosys";
    $db = 'mlwt';
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $db);


    // $db = new DbConnect();
    // $connection = $db->connect();

    // prepare headers information
    header("Content-Type: application/force-download");
    header("Content-Type: application/octet-stream");
    header("Content-Type: application/download");
   
    header("Content-Transfer-Encoding: binary");
    header("Pragma: no-cache");
    header("Expires: 0");

    xlsBOF();


   
    
    

        header("Content-Disposition: attachment; filename=\""."$tank_name"."_Tank_Report(".date("$type")." to ". date("$type1").").xls\"");
        xlsWriteLabel(0, 0, "tank levels");

        $query = "SELECT ExactTime,WaterLevel FROM tanks WHERE SerialNumber = '$type2' AND ";
        $query = $query."ExactTime >= '$type' AND ";
        $query = $query."ExactTime <= '$type1' ORDER BY Timespan ASC";
    

    xlsWriteLabel(1, 0, "Exact Time");
    xlsWriteLabel(1, 1, "Water Level");

    $i = 2;
    $result = mysqli_query($connection,$query);
    
    while($row = mysqli_fetch_assoc($result)){

        xlsWriteLabel($i, 0, $row['ExactTime']);
        xlsWriteLabel($i, 1, $row['WaterLevel']);
        $i++;
    }

    // end exporting
    xlsEOF();

    function xlsBOF() {
        echo pack("ssssss", 0x809, 0x8, 0x0, 0x10, 0x0, 0x0);
    }
    function xlsEOF() {
        echo pack("ss", 0x0A, 0x00);
    }
    function xlsWriteNumber($Row, $Col, $Value) {
        echo pack("sssss", 0x203, 14, $Row, $Col, 0x0);
        echo pack("d", $Value);
    }
    function xlsWriteLabel($Row, $Col, $Value) {
        $L = strlen($Value);
        echo pack("ssssss", 0x204, 8 + $L, $Row, $Col, 0x0, $L);
        echo $Value;
    } 
/*
require_once $_SERVER['DOCUMENT_ROOT'].'/dev/imosys/DBConnect.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/dev/imosys/excel.php';
date_default_timezone_set("Africa/Blantyre");

    $db = new DbConnect();
    $connection = $db->connect();


    date_default_timezone_set("Africa/Blantyre");
    // prepare headers information
    header("Content-Type: application/force-download");
    header("Content-Type: application/octet-stream");
    header("Content-Type: application/download");
    header("Content-Disposition: attachment; filename=\"Mtunthama1_".date("d-m-Y_H:i:s").".xls\"");
    header("Content-Transfer-Encoding: binary");
    header("Pragma: no-cache");
    header("Expires: 0");

    xlsBOF();

    xlsWriteLabel(0, 0, "Exact Time");
    xlsWriteLabel(0, 1, "Water Level");

    $i = 0;
    $query = "SELECT ExactTime,WaterLevel FROM tanks WHERE TankCode = 'C' ORDER BY ExactTime ASC";
    $result = mysqli_query($connection,$query);
    while($row = mysqli_fetch_assoc($result)){
        xlsWriteLabel($i, 0, $row['ExactTime']);
        xlsWriteLabel($i, 1, $row['WaterLevel']);
        $i++;
    }

    // end exporting
    xlsEOF();

    function xlsBOF() {
        echo pack("ssssss", 0x809, 0x8, 0x0, 0x10, 0x0, 0x0);
    }
    function xlsEOF() {
        echo pack("ss", 0x0A, 0x00);
    }
    function xlsWriteNumber($Row, $Col, $Value) {
        echo pack("sssss", 0x203, 14, $Row, $Col, 0x0);
        echo pack("d", $Value);
    }
    function xlsWriteLabel($Row, $Col, $Value) {
        $L = strlen($Value);
        echo pack("ssssss", 0x204, 8 + $L, $Row, $Col, 0x0, $L);
        echo $Value;
    } 
*/

?>
