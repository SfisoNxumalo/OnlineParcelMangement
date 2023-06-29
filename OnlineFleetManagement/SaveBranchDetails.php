<?php

$Name = Filter_input(INPUT_POST, 'bname');
$Email = Filter_input(INPUT_POST, 'bemail');
$Address = Filter_input(INPUT_POST, 'baddress');
$Province = Filter_input(INPUT_POST, 'bprovince');

if(!empty($Name) || !empty($Email)|| !empty($Address) || !empty($Province))
{	
    session_start();
if(isset($_SESSION['Lusername']) )
{
    $_SESSION['Lcompany'];
    $_SESSION['Lusername'];
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
			$sql = "INSERT INTO tblbranch (NAME, EMAIL, ADDRESS, PROVINCE) values('$Name', '$Email', '$Address', '$Province')";		//SQL code that writes data into the database.
			
			if($conn->query($sql))		//when information is added to the databse successfully the messgage below is what the user will see.
			{
                           echo '<script>alert("Branch Details Saved")</script>';
                           
                            header( "Refresh:0; url=ViewBranch.php", true, 303);
                            
				
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
	echo "One of the fields is empty, Please provide the required information.";
	die();		//kills connection.
}
}
else
{
    echo header("Location: index.php");
}

?>

