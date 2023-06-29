<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.

-->
<html>
    <head>
        <title>Admin - Parcel Managent System</title>
        <link rel="stylesheet" type="text/css" href="css/AddParcelStyle.css">
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css' />
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css' />
  <script src="https://kit.fontawesome.com/6e1efe0729.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="menu-bar">
            <h1 class="logo">Parcel<span>Management.</span></h1>
            <ul>
                <li><a href="#">Parcel<i class="fa-solid fa-box"></i></a>

                    <div class="dropdown-menu">
                        <ul>
                            <li><a href="AddParcel.html">Add Parcel</a></li>                
                        </ul>
                    </div>
                </li>
                <li><a href="Logout.php">Logout<i class="fa-solid fa-right-from-bracket"></i></a></li>
            </ul>
        </div>
        <div class="information" >
           
            <h1>Users</h1>
            <form>
                
                <div class="table-responsive" method="POST" action="">
                    <table class="content-table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>WEIGHT</th>
                                <th>DATE</th>
                                <th>ADDRESS</th>
                                <th>SENDER NAME</th>
                                <th>SENDER CONTACT</th>
                                <th>SENDER EMAIL</th>
                                <th>RECEIVER NAME</th>
                                <th>RECEIVER EMAIL</th>
                                <th>RECEIVER CONTACT</th>
                                <th>PARCEL TYPE</th>
                                <th>STATUS</th>
                                <th>Option</th>
                            </tr>    
                        </thead>    
                         <tbody>
                        
        <?php
        session_start();
                
                
                if(isset($_SESSION['Lusername']) )
                {

                $_SESSION['Lusername'];
                $ee = $_SESSION['usemail'];
    
                    $host = "localhost";
		$dbusername = "root";
		$dbpassword = "";
		$dbname = "parcel_management_db";
		
		$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);
                
                $sql = "SELECT * FROM tblparcel WHERE SENDER_EMAIL = '$ee'";		
		$result = mysqli_query($conn, $sql);
                
			if($conn->query($sql))		
			{
                           
                            while($row = mysqli_fetch_array($result))
                            {   //Creates a loop to loop through results
                                
                                $pID = $row['ID'];
                                $ParcelN = $row['NAME'];
                                $ParcelW = $row['WEIGHT'];
                                $ParcelD = $row['DATE'];
                                $Address = $row['ADDRESS'];
                                $SenderN = $row['SENDER_NAME'];
                                $SenderC = $row['SENDER_CONTACT'];
                                $SenderE = $row['SENDER_EMAIL'];
                                $ReceiverN = $row['RECEIVER_NAME'];
                                $ReceiverE = $row['RECEIVER_EMAIL'];
                                $ReceiverC = $row['RECEIVER_CONTACT'];
                                $ParcelT = $row['PARCEL_TYPE'];
                                $ParcelS = $row['STATUS'];
                                
                                echo <<<_END

                                        <tr>
                                              <td>$ParcelN</td>
                                              <td>$ParcelW</td>
                                              <td>$ParcelD</td>
                                              <td>$Address</td>
                                              <td>$SenderN</td>    
                                              <td>$SenderC</td>
                                            <td>$SenderE</td>
                                            <td>$ReceiverN</td> 
                                            <td>$$ReceiverE</td> 
                                            <td>$$ReceiverC</td> 
                                            <td>$ParcelT</td> 
                                            <td>$ParcelS</td> 
                                        
                                         <td>
                                
                                            
                                                <a href="DeleteParcel.php?id=$pID"
                                                class="btn btn-danger" onclick="return confirm('Are you sure want to remove this item?');" name="delete">Delete</a>
                                        </td>
                                        </tr>
                                _END; 
                            }			
			}
			else
			{
				echo "Error: ". $sql . "<br>" . $conn->error;
			}
			$conn->close(); 
                }
                else
                {
                   echo header("Location: index.php");
                }
                ?>
                
                        </tbody>
                    </table>
                </div>
                
                <br></br>
                
            </form>
            
        </div>
    </body>
</html>