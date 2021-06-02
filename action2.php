


<?php
echo ("quit");
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$init_date =$_POST['init_date'];
$end_date =$_POST['end_date'];
$description= $_POST['event'];
$name= $_POST['name'];

session_start();

 include("config.php");
   $query = "select * from event, participant, participant_event where ";

   if ($name != ''){
   $query.= "participant.employee_name like  '%$name%' ";

    }

    if (($init_date != '') and ($end_date!= '')){
        $query .= " and event_date between  '%$init_date%' and '%$end_date%'";

        }

     echo($query);


   include("config.php");

   $result = mysqli_query($con,$query);
    $count = 1;
     while($row = mysqli_fetch_array($result) ){
      $id = $row['event_date'];
      $username = $row['event_name'];
      $name = $row['employee_name'];
      echo($id);
     }

//Check if the session variable exists.
if(!isset($_SESSION['list_events' ])){
    //If it doesn't, create an empty array.
    $_SESSION['list_events'] =   $result ;
     }
?>
