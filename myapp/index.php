<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel=“stylesheet” type=“text/css” href=“style.css” />
</head>
<body>
<div class='container'>

    <table width='100%' border='0'>
      <tr>
                <th width='10%'>S.no</th>
                <th width='40%'>Username</th>
                <th width='40%'>Name</th>
            </tr>
                 <tr>
                           <td>

                            								<input  autocomplete="off" type="text" >

                        </td>
                        <td>

                                                								<input  autocomplete="off" type="text" >

                                            </td>
                              <td>

                                                      								<input  autocomplete="off" type="text" >

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
   $result = mysqli_query($con,$query);
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
</body>
</html>