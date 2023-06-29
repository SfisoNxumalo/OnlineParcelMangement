<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Edit Information - Parcel Managent System</title>
        <link rel="stylesheet" type="text/css" href="styledesign.css">
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css' />
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css' />
    <link rel="stylesheet" type="text/css" href="css/AddParcelStyle.css">
  <script src="https://kit.fontawesome.com/6e1efe0729.js" crossorigin="anonymous"></script>
    </head>
    <body>
      <div class="menu-bar">
            <h1 class="logo">Parcel<span>Management.</span></h1>
            <ul>
                <li><a href="#">Branch<i class="fa-solid fa-building"></i></a>

                    <div class="dropdown-menu">
                        <ul>
                            <li><a href="AddBranch.html">Add Branch</a></li>
                            <li><a href="ViewBranch.php">View Branch</a></li>                
                        </ul>
                    </div>
                </li>
                <li><a href="#">Dealer<i class="fa-solid fa-shop"></i></a>

                    <div class="dropdown-menu">
                        <ul>
                            <li><a href="AddDealer.html">Add Dealer</a></li>      
                            <li><a href="ViewDealer.php">View Dealer</a></li>       

                        </ul>
                    </div>
                </li>
                <li><a href="#">Users<i class="fa-solid fa-user"></i></a>

                    <div class="dropdown-menu">
                        <ul>
                            <li><a href="AddUser.html">Add User</a></li>
                            <li><a href="ViewUser.php">View Users</a></li>
                        </ul>
                    </div>
                </li>
                <li><a href="Logout.php">Logout<i class="fa-solid fa-right-from-bracket"></i></a></li>
            </ul>
        </div>
        <div class="editdecor">
            <img src="images/editicon.jpg" class="editicon">
            <h1>Edit Parcel Information</h1>
            
             <?php
             
             session_start();
if(isset($_SESSION['Lusername']) )
{
    $_SESSION['Lcompany'];
    $_SESSION['Lusername'];
    $pID = $_GET['id'];
        
                $host = "localhost";
		$dbusername = "root";
		$dbpassword = "";
		$dbname = "parcel_management_db";
		
		$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);
                
                $sql = "SELECT * FROM tblparcel where ID = '$pID'";		
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
                            }	
                            
                            echo <<<_END

                                        <div class="dabody">

                                            <div class="formContainer">

                                                <div class="title">Update Parcel</div>

                                                <form action="UpdateParcel.php?id=$pID" method="POST">
                                                    <div class="user-details">
                                                        <div class="input-box">
                                                            <span class="f-detail">Parcel Name:</span>
                                                            <input type="text" name="pname" placeholder="Enter the parcel name" value="$ParcelN" required>       
                                                        </div>

                                                        <div class="input-box">
                                                            <span class="f-detail">Parcel Weight in Kg:</span>
                                                            <input type="text" name="pweight" placeholder="Enter parcel weight" value="$ParcelW" required>          
                                                        </div>

                                                        <div class="input-box">
                                                            <span class="f-detail">Dispatch Date:</span>
                                                            <input type="date" name="ddate" value="$ParcelD" required>          
                                                        </div>

                                                        <div class="input-box">
                                                            <span class="f-detail">Delivery Address:</span>
                                                            <input type="text" name="daddress" placeholder="Enter the delivery address" value="$Address" required>          
                                                        </div>

                                                        <div class="input-box">
                                                            <span class="f-detail">Sender's Name:</span>
                                                            <input type="text" name="sname" placeholder="Enter sender's name" value="$SenderN" required>          
                                                        </div>

                                                        <div class="input-box">
                                                            <span class="f-detail">Sender's Contact:</span>
                                                            <input type="text" name="scontact" placeholder="Enter sender's contact number" value="$SenderC" required>          
                                                        </div>

                                                        <div class="input-box">
                                                            <span class="f-detail">Sender's Email:</span>
                                                            <input type="email" name="semail" placeholder="Enter your sender's email" value="$SenderE" required>          
                                                        </div>

                                                        <div class="input-box">
                                                            <span class="f-detail">Receiver's Name:</span>
                                                            <input type="text" name="rname" placeholder="Enter receiver's name" value="$ReceiverN" required>          
                                                        </div>
                                                        <div class="input-box">
                                                            <span class="f-detail">Receiver's Contact:</span>
                                                            <input type="text" name="rcontact" placeholder="Enter receiver's contact" value="$ReceiverC" required>          
                                                        </div>
                                                        <div class="input-box">
                                                            <span class="f-detail">Receiver's Email:</span>
                                                            <input type="email" name="remail" placeholder="Enter receiver's name" value="$ReceiverE" required>          
                                                        </div>

                                                        <div class="input-box">
                                                            <span class="f-detail">Please select a parcel type:</span>
                                                            <select class="input-bo" name="ptype"  size="1">
                                                                <option value="empty">$ParcelT</option>
                                                                <option value="Document">Document</option>
                                                                <option value="Box">Box</option>
                                                                <option value="Container">Container</option>

                                                            </select>            
                                                        </div>
                                                    </div>

                                                    <div class="btn-submit"> 
                                                        <input type="submit" class="buttonn" name="btnSubmit" value="Submit">
                                                    </div>
                                                </form>

                                            </div> 
                                        </div>
                                
                                _END;
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
            
            <form method="POST" action="AdminEquipmentRentalSystem.php">
                <div id="right"><input type="submit" name="view" value="Back" class="btn-view"></div>
            </form>
        </div>
        
    </body>
</html>
