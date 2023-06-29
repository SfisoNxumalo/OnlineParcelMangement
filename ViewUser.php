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
        <div class="information" >
           
            <h1>Users</h1>
            <form>
                
                <div class="table-responsive" method="POST" action="">
                    <table class="content-table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Contact</th>
                                <th>Address</th>
                                <th>Works At</th>
                                <th>Company Address</th>
                                <th>Username</th>
                                <th>Password</th>
                                <th>Option</th>
                            </tr>    
                        </thead>    
                         <tbody>
                        
        <?php
      session_start();
//                
//                
                if(isset($_SESSION['Lusername']) )
                {
                    
                    $_SESSION['Lusername'];
                    $_SESSION['Lcompany'];
                    $host = "localhost";
		$dbusername = "root";
		$dbpassword = "";
		$dbname = "parcel_management_db";
		
		$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);
                $sql = "";
                if($_SESSION['Lcompany'] == "Dealer")
                {
                    $sql = "SELECT * FROM tblusers WHERE WORKS_AT = 'Dealer'";
                }
                else 
                {
                    $sql = "SELECT * FROM tblusers";
                }
                		
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
                                
                                
                                
                                echo <<<_END

                                        <tr>
                                              <td>$UserN</td>
                                              <td>$UserE</td>
                                              <td>$UserC</td>
                                              <td>$UserA</td>
                                              <td>$WorksA</td>    
                                              <td>$CompanyA</td>
                                            <td>$Username</td>
                                            <td>$Password</td> 
                                        
                                         <td>
                                
                                               <a href="EditUser.php?id=$pID" class="btn btn-info" onclick="" name="edit"> Edit</a>

    
                                                <a href="DeleteUser.php?id=$pID"
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