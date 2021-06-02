    <html> 
    <head>
       <script src="http://code.jquery.com/jquery-3.1.1.min.js"></script>
          <script src="js/search.js"></script>

       <title>AJAX jQuery Example with PHP MySQL</title> 
       <style type="text/css">
        body{
          font-family: Verdana, Geneva, sans-serif;
        }
      .container{
          width: 50%;
          margin: 0 auto;
      } 
     
     table, tr, th, td {
        border: 1px solid #e3e3e3;
        padding: 10px;
     }
     
    </style> 

    </head> 

    <body>
     
     <div class = "container" > 

        <h3><u>AJAX jQuery Example with PHP MySQL</u></h3>

        <p><strong>Click on button to display users records from database</strong></p>
        <table>
           <tr>
                                   <td>

                                    						Name:		<input id="name"  name="name" autocomplete="off" type="text" >


                                                        				Event:				<input id="myev" name="myev" autocomplete="off" type="text" >

                                                              				Init date:	<input   id="init_date" name="init_date" autocomplete="off" type="text" >
                                                              				End date:	<input id="end_date" name="end_date" autocomplete="off" type="text" >

            <input id="filter" type="button" />

                                                          </td>

                            </tr>
                            </table>
        
        <div id="records"></div> 
        
        <p>
            <input type="button" id = "getusers" value = "Fetch Records" />
        </p>
      
    </div> 



    </body>
    </html>