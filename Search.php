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
    }
    public function searchResult($sqlQueryConditions = array()){
        $sqlQuery = 'SELECT ';
        $sqlQuery .= array_key_exists("select",$sqlQueryConditions)?$sqlQueryConditions['select']:'*';
        $sqlQuery .= ' FROM orders';

        $sqlQuery = "select * from event, participant, participant_event";
        if(array_key_exists("where",$sqlQueryConditions)){
            $sqlQuery .= ' WHERE ';
            $i = 0;
            foreach($sqlQueryConditions['where'] as $key => $value){
                $pre = ($i > 0)?' AND ':'';
                $sqlQuery .= $pre.$key." = '".$value."'";
                $i++;
            }
        }        
        if(array_key_exists("search",$sqlQueryConditions)){
            $sqlQuery .= (strpos($sqlQuery, 'WHERE') !== false)?' AND (':' WHERE (';
            $i = 0;
            foreach($sqlQueryConditions['search'] as $key => $value){
                $pre = ($i > 0)?' OR ':' ';
                $sqlQuery .= $pre.$key." LIKE '%".$value."%'";
                $i++;
            }
			$sqlQuery .= ")";
        }        
        if(array_key_exists("order_by",$sqlQueryConditions)){
            $sqlQuery .= ' ORDER BY '.$sqlQueryConditions['order_by']; 
        }        
        if(array_key_exists("start",$sqlQueryConditions) && array_key_exists("limit",$sqlQueryConditions)){
            $sqlQuery .= ' LIMIT '.$sqlQueryConditions['start'].','.$sqlQueryConditions['limit']; 
        }elseif(!array_key_exists("start",$sqlQueryConditions) && array_key_exists("limit",$sqlQueryConditions)){
            $sqlQuery .= ' LIMIT '.$sqlQueryConditions['limit']; 
        }

        $sqlQuery = "select * from event, participant, participant_event";
		$searchResult = $this->db->query($sqlQuery);
        echo ($sqlQuery);
		print_r($searchResult);

        if($searchResult && $searchResult->num_rows > 0){
            while($row = $searchResult->fetch_assoc()){
             $searchData[] = $row;
          }

        }
        return !empty($searchData)?$searchData:false;
    }
}