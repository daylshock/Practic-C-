<?php
	define('DBSERVER', 'localhost'); 
	define('DBUSERNAME', 'root'); 
	define('DBPASSWORD', ''); 
	define('DBNAME', 'infoUser');
	
    $con = mysqli_connect(DBSERVER, DBUSERNAME, DBPASSWORD, DBNAME);
	
    if (mysqli_connect_errno()){
        echo "Failed to connect to DataBase: " . "error: ". mysqli_connect_error();
    }else
	{
		echo "Connect to DataBase";
	}
?>