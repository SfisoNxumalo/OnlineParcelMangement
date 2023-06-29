<?php
session_start();
if(isset($_SESSION['Lusername']) )
{
    $pID = $_GET['id'];

                 $_SESSION['Lusername'];
                    $_SESSION['Lcompany'];

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
			$sql = "DELETE FROM `tbldealer` WHERE ID = '$pID'"; //SQL code that writes data into the database.
			
			if($conn->query($sql))		//when information is added to the databse successfully the messgage below is what the user will see.
			{
                             
                           echo '<script>alert("deleted successfully")</script>';
                          
                           header( "Refresh:0; url=ViewDealer.php", true, 0);
    
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
    echo header("Location: index.php");
}
