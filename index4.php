<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
<!----------------- inji container --->

<div class='container'>

    <table class="timecard" width='100%' border='0'>
      <tr>
                <th width='10%'>S.no</th>
                <th width='40%'>Username</th>
                <th width='40%'>Name</th>
            </tr>
                 <tr>
                           <td>
<form action="action.php" method="post">
                            						Name:		<input  name="name" autocomplete="off" type="text" >


                                                				Event:				<input name="event" autocomplete="off" type="text" >

                                                      				Init date:	<input  name="init_date" autocomplete="off" type="text" >
                                                      				End date:	<input name="end_date" autocomplete="off" type="text" >

    <input type="submit" value="submit"/>
	</form>
                                                  </td>

                    </tr>
        <tr>
            <th width='10%'>S.no</th>
            <th width='40%'>Username</th>
            <th width='40%'>Name</th>
        </tr>
        <?php
   include("config.php");
   $query = "select * from event, participant, participant_event";


//Check if the session variable exists.
if(!isset($_SESSION['list_events' ])){
    //If it doesn't, create an empty array.
     $result = mysqli_query($con,$query);
     }else{
     $result =$_SESSION['list_events'] ;

     }


   $count = 1;
   while($row = mysqli_fetch_array($result) ){
    $id = $row['event_date'];
    $username = $row['event_name'];
    $name = $row['employee_name'];
  ?>
        <tr>
            <td><?php echo $count; ?></td>
            <td>
                <div contentEditable='true' class='edit' id='username_<?php echo $id; ?>'>
                    <?php echo $username; ?>
                </div>
            </td>
            <td>
                <div contentEditable='true' class='edit' id='name_<?php echo $id; ?>'>
                    <?php echo $name; ?>
                </div>
            </td>
        </tr>
        <?php
   $count ++;
  }
  ?>
    </table>
</div>
<!----------------- end container --->
</body>
</html>