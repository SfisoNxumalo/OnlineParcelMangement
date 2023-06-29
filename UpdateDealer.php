<?php

$DealerName = Filter_input(INPUT_POST, 'dname');
$DealerAddress = Filter_input(INPUT_POST, 'daddress');
$DealerEmail = Filter_input(INPUT_POST, 'demail');
$DealeContact = Filter_input(INPUT_POST, 'dcontact');
$DealerProvince = Filter_input(INPUT_POST, 'dprovince');

if(!empty($DealerName) || !empty($DealerAddress)|| !empty($DealerEmail) || !empty($DealeContact) || !empty($DealerProvince))
{	
    session_start();
                $pID = $_GET['id'];
                if(isset($_SESSION['Lusername']) )
                {
                    
                    $_SESSION['Lusername'];
                    $_SESSION['Lcompany'];
                            
                    if(!$_SESSION['Lcompany'] == "Dealer")
                    {
                            $host = "localhost";
                        $dbusername = "root";
                        $dbpassword = "";
                        $dbname = "parcel_management_db";

                        $conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);		//makes connection to the database, using the provided database information.

                        if(mysqli_connect_error())
                        {
                                die('Connect Error ('.mysqli_connect_errno().')'.mysqli_connect_error()); 		// Error message to be shown when connection to the database fails, "die" kills the connection.
                        }
                        else 	//if connection to the database is successful the php file will write data into the database.
                        { 
                            $_SESSION['Lcompany'];
                                $sql = "UPDATE tbldealer SET NAME = '$DealerName', ADDRESS ='$DealerAddress', EMAIL = '$DealerEmail', CONTACT = '$DealeContact', PROVINCE = '$DealerProvince' WHERE ID = '$pID'";		//SQL code that writes data into the database.

                                if($conn->query($sql))		//when information is added to the databse successfully the messgage below is what the user will see.
                                {
                                   echo '<script>alert("Dealer UPDATED")</script>';
                                   
                                    header( "Refresh:0; url=ViewDealer.php", true, 303);
                                    

                                }
                                else		//If information was not added this is what will be shown
                                {
                                        echo "Error: ". $sql . "<br>" . $conn->error;
                                }
                                $conn->close(); 	//This ends the connection between the database and the website.
                        }
                    }
                     else 
                     {
                            echo '<script>alert("Access Denied!")</script>';
                           
                            header( "Refresh:0; url=ViewParcel.php", true, 303);
                     }
                    
               }
                else
                {
                    echo header("Location: index.php");
                }
		
}
else 		
{
	echo "One of the fields is empty, Please provide the required information.";
	die();		//kills connection.
}

?>

