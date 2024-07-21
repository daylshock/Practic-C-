<?php
	try 
	{
		$conn = new PDO("mysql:host=localhost;port=3306;dbname=infoUser","root", "");
		
		echo "Connect to database";

		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} 
	catch (Exception $e) 
	{
		echo "Failed connect to database! {$e->getMessage()}"; 
	}
?>