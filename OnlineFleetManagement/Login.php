<?php

$username = Filter_input(INPUT_POST, 'UserName');
$password = Filter_input(INPUT_POST, 'Password');




if(!empty($username) || !empty($password))
{	
    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "password";
    $dbname = "parcel_management_db";

    $conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);		//makes connection to the database, using the provided database information.

    if(mysqli_connect_error())
    {
            die('Connect Error ('.mysqli_connect_errno().')'.mysqli_connect_error()); 		// Error message to be shown when connection to the database fails, "die" kills the connection.
    }
    else 	//if connection to the database is successful the php file will write data into the database.
    { 

        $sql = "SELECT USERNAME, PASSWORD, WORKS_AT FROM tblusers WHERE USERNAME = '$username' AND PASSWORD = '$password'";		
        $result = mysqli_query($conn, $sql);

            if($conn->query($sql))		
            {

                $count = mysqli_num_rows($result);

                if($count != 0)
                {
                                      
                    session_start();
                    $pID = '';
                    
                    while($row = mysqli_fetch_array($result))
                    {
                        $pID = $row['WORKS_AT'];
                    }
                    
                        $_SESSION['Lusername'] = $username;
                        $_SESSION['Lcompany'] = $pID;
                  
                        header("Location: ViewParcel.php");
                }
                else
                {
                   echo '<script>alert("Login failed, User not found.")</script>';

                    header( "Refresh:0; url=index.php", true, 303);
                }     			
            }
            else
            {
                    echo "Error: ". $sql . "<br>" . $conn->error;
            }
            $conn->close(); 	 	//This ends the connection between the database and the website.
    }
}
else 		//if any info is missing on the "I GET INVOLVED" form, error message to be shown. 
{
	echo "One of the fields is empty, Please provide the required information.";
	die();		//kills connection.
}

function sanitizeString($var)
        {
            if(get_magic_quotes_gpc())
            {
                $var = stripslashes($var);
                $var = strip_tags($var);
                $var = htmlentities($var);
            }
            
            return $var;
        }

                ?>