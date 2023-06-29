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
                
                <li><a href="#">Branch<i class="fa-solid fa-building"></i></a>

                    <div class="dropdown-menu">
                        <ul>
                            <li><a href="AddBranch.html">Add Branch</a></li>
                            <li><a href="ViewBranch.php">View Branch</a></li>                
                        </ul>
                    </div>
                </li>
                
                <li><a href="#">Parcel<i class="fa-solid fa-box"></i></a>

                    <div class="dropdown-menu">
                        <ul>
                            <li><a href="AddParcel.html">Add Parcel</a></li>
                            <li><a href="ViewParcel.php">View Parcel</a></li>                
                        </ul>
                    </div>
                </li>
                <li><a href="Logout.php">Logout<i class="fa-solid fa-right-from-bracket"></i></a></li>
            </ul>
        </div>
        <div class="editdecor">
            <img src="images/editicon.jpg" class="editicon">
            <h1>Edit User Information</h1>
            
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
                
                $sql = "SELECT * FROM tblusers where ID = '$pID'";		
		$result = mysqli_query($conn, $sql);
                
			if($conn->query($sql))		
			{
                           
                            while($row = mysqli_fetch_array($result))
                            {   //Creates a loop to loop through results
                                
                                $pID = $row['ID'];
                                $UserN = $row['NAME'];
                                $UserE = $row['EMAIL'];
                                $UserC = $row['CONTACT'];
                                $UserA = $row['ADDRESS'];
                                $WorksA = $row['WORKS_AT'];
                                $CompanyA = $row['COMPANY_ADDRESS'];
                                $Username = $row['USERNAME'];
                                $Password = $row['PASSWORD'];
                            }	
                            
                            echo <<<_END

                                        <div class="dabody">

                                            <div class="formContainer">

                                                <div class="title">Update User</div>

                                                <form action="UpdateUser.php?id=$pID" method="POST">
                                                    <div class="user-details">
                                                        <div class="input-box">
                                                            <span class="f-detail">User Name:</span>
                                                            <input type="text" name="uname" placeholder="Enter user name" value="$UserN" required>       
                                                        </div>

                                                        <div class="input-box">
                                                            <span class="f-detail">Create Username</span>
                                                            <input type="text" name="username" placeholder="Create username" value="$Username" required>       
                                                        </div>

                                                        <div class="input-box">
                                                            <span class="f-detail">Create Password:</span>
                                                            <input type="text" name="password" placeholder="Create password" value="$Password" required>       
                                                        </div>

                                                        <div class="input-box">
                                                            <span class="f-detail">User Address:</span>
                                                            <input type="text" name="uaddress" placeholder="Enter user address" value="$UserA" required>          
                                                        </div>

                                                        <div class="input-box">
                                                            <span class="f-detail">User Email:</span>
                                                            <input type="email" name="uemail" placeholder="Enter user email" value="$UserE" required>          
                                                        </div>

                                                        <div class="input-box">
                                                            <span class="f-detail">User contact:</span>
                                                            <input type="text" name="ucontact" placeholder="Enter user contact" value="$UserC" required>          
                                                        </div>

                                                        <div class="input-box">
                                                            <span class="f-detail">Works at:</span>
                                                            <select class="input-bo" name="worksat" size="1">
                                                                <option value="empty">$WorksA </option>
                                                                <option value="Main Branch">Main Branch</option>
                                                                <option value="Different Branch">Different Branch</option>
                                                                <option value="Dealer">Dealer</option>
                                                            </select>            
                                                        </div>

                                                        <div class="input-box">
                                                            <span class="f-detail">Company Address:</span>
                                                            <input type="text" name="caddress" placeholder="Enter company address" value="$CompanyA" required>          
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
