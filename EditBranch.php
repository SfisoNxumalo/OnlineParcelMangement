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
                <li><a href="#">Parcel<i class="fa-solid fa-box"></i></a>

                    <div class="dropdown-menu">
                        <ul>
                            <li><a href="AddParcel.html">Add Parcel</a></li>
                            <li><a href="ViewParcel.php">View Parcel</a></li>                
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
            <h1>Edit Branch Information</h1>
            
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
                
                $sql = "SELECT * FROM tblbranch where ID = '$pID'";		
		$result = mysqli_query($conn, $sql);
                
			if($conn->query($sql))		
			{
                           
                            while($row = mysqli_fetch_array($result))
                            {   //Creates a loop to loop through results
                                
                                $pID = $row['ID'];
                                $BranchN = $row['NAME'];
                                $BranchE = $row['EMAIL'];
                                $BranchA = $row['ADDRESS'];
                                $BranchP = $row['PROVINCE'];
                            }	
                            
                            echo <<<_END

                                    <div class="dabody">

                                        <div class="formContainer">

                                            <div class="title">Update Branch</div>

                                            <form action="UpdateBranch.php?id=$pID" method="POST">
                                                <div class="user-details">
                                                    <div class="input-box">
                                                        <span class="f-detail">Branch Name:</span>
                                                        <input type="text" name="bname" placeholder="Enter branch name" value="$BranchN" required>       
                                                    </div>

                                                    <div class="input-box">
                                                        <span class="f-detail">Branch Email:</span>
                                                        <input type="email" name="bemail" placeholder="Enter branch email" value="$BranchE" required>          
                                                    </div>

                                                    <div class="input-box">
                                                        <span class="f-detail">Address:</span>
                                                        <input type="text" name="baddress" placeholder="Enter branch address" value="$BranchA" required>          
                                                    </div>

                                                    <div class="input-box">
                                                        <span class="f-detail">Province:</span>
                                                        <select class="input-bo" name="bprovince" size="1">
                                                            <option value="empty"> $BranchP</option>
                                                            <option value="Eastern Cape">Eastern Cape</option>
                                                            <option value="Free State">Free State</option>
                                                            <option value="Gauteng">Gauteng</option>
                                                            <option value="KwaZulu-Natal">KwaZulu-Natal</option>
                                                            <option value="Limpopo">Limpopo</option>
                                                            <option value="Mpumalanga">Mpumalanga</option>
                                                            <option value="Northern Cape">Northern Cape</option>
                                                            <option value="North West">North West</option>
                                                            <option value="Western Cape">Western Cape</option>
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
        </div>
        
    </body>
</html>
