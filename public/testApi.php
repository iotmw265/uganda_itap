<?php

 $servername = "localhost";
 $username = "root";
 $password = "2022@Intmosys";
 $dbname = "mlwt";
 // Create connection

 $conn = new mysqli($servername, $username, $password, $dbname);

 // Check connection

 if ($conn->connect_error) {

   die("Connection failed: " . $conn->connect_error);

}

try {

$TankCode = $_POST['TankCode'];
$Temperature1 = $_POST['Temperature1']; 
$Temperature2 = $_POST['Temperature2'];
$BatteryLevel = $_POST['BatteryLevel'];
$Airtime = $_POST['Airtime'];
$GSMSignal = $_POST['GSMSignal'];
$AssetId = $_POST['AssetId'];
$SerialNumber = $_POST['SerialNumber'];
$WaterLevel = $_POST['WaterLevel'];
$VarA0 = $_POST['VarA0'];
$VarB0 = $_POST['VarB0'];
$VarC0 = $_POST['VarC0'];
$VarD0 = $_POST['VarD0'];
$VarE0 = $_POST['VarE0'];
$VarF0 = $_POST['VarF0'];
$VarG0 = $_POST['VarG0'];
$VarH0 = $_POST['VarH0'];
$VarI0 = $_POST['VarI0'];
$VarJ0 = $_POST['VarJ0'];
$VarK0 = $_POST['VarK0'];
$VarL0 = $_POST['VarL0'];
$VarM0 = $_POST['VarM0'];
$VarN0 = $_POST['VarN0'];
$VarO0 = $_POST['VarO0'];
$VarP0 = $_POST['VarP0'];

if ($TankCode!="" ){



        $sql = "INSERT into tanks (TankCode , Temperature1, Temperature2, BatteryLevel, Airtime, GSMSignal, SerialNumber, WaterLevel, VarA0, VarB0, VarC0, VarD0, VarE0, VarF0, VarG0, VarH0, VarI0, VarJ0, VarK0, VarL0, VarM0, VarN0, VarO0, VarP0) 
        VALUES ('$TankCode', '$Temperature1', '$Temperature2', '$BatteryLevel', '$Airtime', '$GSMSignal', '$SerialNumber', '$WaterLevel','$VarA0','$VarB0','$VarC0','$VarD0', '$VarE0', '$VarF0','$VarG0','$VarH0','$VarI0','$VarJ0','$VarK0','$VarL0','$VarM0','$VarN0','$VarO0','$VarP0')";

        if($conn->query($sql)){

            echo json_encode('200');

        }

}

}

//catch exception
catch(Exception $e) {
echo 'Message: ' .$e->getMessage();
}

?>	
