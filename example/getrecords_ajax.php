<?php 
    

$name = $_POST['name'];

$desc = $_POST['myev'];

    $mysql_host= 'localhost:3307';
     $mysql_database='participant';
     $mysql_user="root";
     $mysql_password="123456";

    $result_array = array();
    $conn = mysqli_connect($mysql_host, $mysql_user,$mysql_password,$mysql_database);


    /* Check connection  */
    if ($conn->connect_error) {
         die("Connection to database failed: " . $conn->connect_error);
    }

  include("config.php");
    $sql = "select * from event, participant, participant_event where ";

    if ($name != ''){
    $sql.= "participant.employee_name like  '%$name%' ";

     }

     if (($init_date != '') and ($end_date!= '')){
         $sql .= " and event_date between  '%$init_date%' and '%$end_date%'";

         }

    file_put_contents("C:/Testrexx/hola.txt", $sql);

    //$sql = "select * from event, participant, participant_event";
    //$sql = $param;
    
    //$sql = "SELECT id, first_name, last_name, email FROM users ";
    $sql = "select * from event, participant, participant_event";
    $result = $conn->query($sql);
    /* If there are results from database push to result array */
    
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            array_push($result_array, $row);
        }
    }
    /* send a JSON encded array to client */

    console.log($result_array);
    echo (json_encode($result_array));
    //echo (json_encode($param));

    $conn->close();
