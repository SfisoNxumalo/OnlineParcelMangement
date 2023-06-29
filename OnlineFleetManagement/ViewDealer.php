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
        <div class="information" >
           
            <h1>Users</h1>
            <form>
                
                <div class="table-responsive" method="POST" action="">
                    <table class="content-table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Address</th>
                                <th>Email</th>
                                <th>Contact</th>
                                <th>Province</th>
                                <th>Option</th>
                            </tr>    
                        </thead>    
                         <tbody>
                        
        <?php
        session_start();
                
                if(isset($_SESSION['Lusername']) )
                {
                    
                  $_SESSION['Lusername'];
                    $ss=  $_SESSION['Lcompany'];
                   
                if($_SESSION['Lcompany'] == "Main" || $_SESSION['Lcompany'] == "Different Branch")
                {
                        $host = "localhost";
                    $dbusername = "root";
                    $dbpassword = "";
                    $dbname = "parcel_management_db";

                    $conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);


                        $sql = "SELECT * FROM tblDealer";		
                    $result = mysqli_query($conn, $sql);

                            if($conn->query($sql))		
                            {

                                while($row = mysqli_fetch_array($result))
                                {   //Creates a loop to loop through results

                                    $pID = $row['ID'];
                                    $DealerN = $row['NAME'];
                                    $DealerA = $row['ADDRESS'];
                                    $DealerE = $row['EMAIL'];
                                    $DealerC = $row['CONTACT'];
                                    $DealerP = $row['PROVINCE'];


                                    echo <<<_END

                                            <tr>
                                                  <td>$vv</td>
                                                  <td>$DealerA</td>
                                                  <td>$DealerE</td>
                                                  <td>$DealerC</td>
                                                  <td>$DealerP</td>
                                             <td>

                                                   <a href="EditDealer.php?id=$pID" class="btn btn-info" onclick="" name="edit"> Edit</a>


                                                    <a href="DeleteDealer.php?id=$pID"
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
                    echo <<<_END
                                        <script>alert("Access Denied! $ss")</script>;
                                _END; 
                    
                        
                    
                   
                           
                            header( "Refresh:0; url=ViewParcel.php", true, 303);
                }
                
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
