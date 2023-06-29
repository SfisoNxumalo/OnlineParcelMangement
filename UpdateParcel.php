<?php

$ParcelName = Filter_input(INPUT_POST, 'pname');
$ParcelWeight = Filter_input(INPUT_POST, 'pweight');
$DeliveryDate = Filter_input(INPUT_POST, 'ddate');
$DeliveryAddress = Filter_input(INPUT_POST, 'daddress');
$SenderName = Filter_input(INPUT_POST, 'sname');
$SenderContact = Filter_input(INPUT_POST, 'scontact');
$SenderEmail = Filter_input(INPUT_POST, 'semail');
$ReceiverName = Filter_input(INPUT_POST, 'rname');
$ReceiverContact = Filter_input(INPUT_POST, 'rcontact');
$ReceiverEmail = Filter_input(INPUT_POST, 'remail');
$ParcelType = Filter_input(INPUT_POST, 'ptype');
$Status = "Pending";

if(!empty($ParcelName) || !empty($ParcelWeight)|| !empty($DeliveryDate) || !empty($DeliveryAddress) || !empty($SenderName) || !empty($SenderContact) || !empty($SenderEmail) || !empty($ReceiverName) || !empty($ReceiverContact) || !empty($ReceiverEmail) || !empty($ParcelType))
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
			$sql = "UPDATE tblparcel SET NAME ='$ParcelName', WEIGHT = '$ParcelWeight', DATE = '$DeliveryDate', ADDRESS = '$DeliveryAddress', SENDER_NAME = '$SenderName', SENDER_CONTACT = '$SenderContact', SENDER_EMAIL = '$SenderEmail', RECEIVER_NAME = '$ReceiverName', RECEIVER_EMAIL = '$ReceiverEmail', RECEIVER_CONTACT = '$ReceiverContact', PARCEL_TYPE = '$ParcelType' WHERE ID = '$pID'";		//SQL code that writes data into the database.
			
			if($conn->query($sql))		//when information is added to the databse successfully the messgage below is what the user will see.
			{
                           echo '<script>alert("Parcel Updated")</script>';
                           
                            header( "Refresh:0; url=ViewParcel.php", true, 303);
                           
				
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


/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

