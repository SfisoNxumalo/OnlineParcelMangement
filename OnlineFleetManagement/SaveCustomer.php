<?php

$name = Filter_input(INPUT_POST, 'uname');
$email = Filter_input(INPUT_POST, 'uemail');
$phone = Filter_input(INPUT_POST, 'contact');
$username = Filter_input(INPUT_POST, 'username');
$Password = Filter_input(INPUT_POST, 'password');

if(!empty($name) || !empty($email)|| !empty($phone) || !empty($username) || !empty($Password))
{	
    $pID = $_GET['id'];
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
			$sql = "INSERT INTO tblcustomers (NAME, EMAIL, CONTACT, USERNAME, PASSWORD) values('$name', '$email', '$phone', '$username', '$Password')";		//SQL code that writes data into the database.
			
			if($conn->query($sql))		//when information is added to the databse successfully the messgage below is what the user will see.
			{
                           echo '<script>alert("New user saved.")</script>';
                           
                            header( "Refresh:0; url=ViewUser.php", true, 303);
                            
				
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

?>

