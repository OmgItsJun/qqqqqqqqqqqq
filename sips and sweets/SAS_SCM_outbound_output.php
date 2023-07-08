<!DOCTYPE html>
<html>
  <head>
    <title>Form Output</title>
    <style>
        body {
          background-color: #ffc2d1;
        }

        .container-one,
        .container-two,
        .container-three {
        margin: 20px 0;
        }
        
        .container-three {
        text-align: center;
        }
        table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
        background-color: ;
        }
        
        table th {
        background-color: #ff8fab;
        padding: 10px;
        text-align: left;
        }
        
        table td {
        padding: 10px;
        border: 1px solid black;
        }
    
        .btn {
        display: inline-block;
        padding: 10px 20px;
        background-color: #4b4603;
        color: white;
        text-decoration: none;
        border-radius: 5px;
        margin-right: 10px;
        }
        
        .btn:hover {
        background-color: #9e6003;
        }
    </style>
  </head>
  <body>
    
    <div class='container-one'>
    
<?php

if (isset($_POST['rqtby']) && isset($_POST['itemN']) && isset($_POST['quantity']) && isset($_POST['itemR']) && isset($_POST['reqdate']) && isset($_POST['status']))  {
  
  
$rqtby = $_POST['rqtby'];
$itemN = $_POST['itemN'];
$quantity = $_POST['quantity'];
$itemR = $_POST['itemR'];
$reqdate = $_POST['reqdate'];
$status = $_POST['status'];
  
	    
			    
		echo "<table border='1'>
		      <th colspan='2'> Outbound Transaction </th>" ;
		
		echo "<tr>
			     <td> Requested By: </td>
			     <td>". $rqtby ."</td>
			    </tr>" ;
			    
    echo "<tr>
            <td> Item Name: </td>
            <td>". $itemN ."</div></td>
          </tr>";

    echo "<tr>
            <td> Quantity: </td>
            <td>". $quantity ."</td>
             </tr>" ;  
			    
		echo "<tr>
			     <td> Item Recipient: </td>
			     <td>". $itemR ."</td>
			    </tr>" ;
			    
		echo "<tr>
			     <td> Request Date: </td>
			     <td>". $reqdate ."</td>
			    </tr>" ;
			   
        echo "<tr>
                <td> Status: </td>
                <td>". $status ."</td>
               </tr>" ;
			    
		echo "</table>
		        </div>
            <br>
            
            <div class='container-two'>" ;
          
          include 'SAS_SCM_outbound_data.php';
          
		} 
		else {
          echo "<h1>No form data submitted.</h1>";
         }
    
  ?>

        <br> <br>
        </div>
        
        <div class="container-three">
          <a href='SAS_SCM_inventory_view.php' class='btn'>Go Back</a>
          <a href='SAS_SCM_outbound_results.php' class='btn'>View Entries</a>
          </div>
          
</body>
</html>
