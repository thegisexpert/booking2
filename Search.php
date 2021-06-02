<?php
class Search{
 $mysql_host= 'localhost:3307';
  $mysql_database='participant';
  $mysql_user="root";
  $mysql_password="123456";


    public function __construct(){


        $mysql_host= 'localhost:3307';
         $mysql_database='participant';
         $mysql_user="root";
         $mysql_password="123456";
        $con = mysqli_connect($mysql_host, $mysql_user,$mysql_password,$mysql_database);
        // Check connection
        if (!$con) {
         die("Connection failed: " . mysqli_connect_error());
        }

        $this->db = $con;

         $sqlQuery = "select * from event, participant, participant_event";


        		$searchResult = $this->searchResult();
                echo ($sqlQuery);
        		print_r($searchResult);

    }
    public function searchResult($sqlQueryConditions = array()){
        echo ("here");



        $sqlQuery = "select * from event, participant, participant_event";


         $sqlQuery = "select * from event, participant, participant_event";


        $searchResult = mysqli_query($con,$sqlQuery);
        echo ($sqlQuery);

        if($searchResult && $searchResult->num_rows > 0){
                while($row = $searchResult->fetch_assoc()){
                  $searchData[] = $row;
                  }

               }
        return !empty($searchData)?$searchData:false;
        /**
		$searchResult = mysqli_query($this->db,$sqlQuery);
        echo ($sqlQuery);
		print_r($searchResult);

        if($searchResult && $searchResult->num_rows > 0){
            while($row = $searchResult->fetch_assoc()){
             $searchData[] = $row;
          }

        }
        return !empty($searchData)?$searchData:false;
        **/

}

}

$searchData = new searchData();
	$searchResult = $this->searchResult();
                echo ($sqlQuery);
        		print_r($searchResult);
?>