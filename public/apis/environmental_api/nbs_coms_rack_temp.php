<?php  
 //filter.php
 if(isset($_POST['from_date'], $_POST['to_date']))  
 {    
    $servername = "localhost";
    $username = "root";
    $password = "2022@Intmosys";
    $db = 'nbs_bank';
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $db);

    $stime= $_POST['from_date'];
    $stime = date("Y-m-d", strtotime($stime));
    
    $ftime= $_POST['to_date'];
    $ftime = date("Y-m-d", strtotime($ftime));
    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }else{
  //  echo "Connected successfully";  

    $sql = "SELECT  CASE WHEN DATE(ExactTime) = '$stime' AND '$stime' = '$ftime' THEN TIME_FORMAT(ExactTime, '%H:%i') ELSE DATE_FORMAT(ExactTime, '%d-%m-%Y %H:%i') END AS created_at, VarA0 as value FROM tanks WHERE DATE(ExactTime) >= '$stime' AND DATE(ExactTime) <= '$ftime' and SerialNumber='200641-60238' ORDER BY ExactTime ASC";
    $result = $conn->query($sql);

    $data=array();

    foreach ($result as $row){
        $data[]=$row;
    }
    $conn->close();
    print json_encode($data);



    }
}

 ?>
