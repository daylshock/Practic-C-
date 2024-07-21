<?php
	session_start();
	require_once "connectdb.php";
	
	if(isset($_POST["id_article"]) && isset($_POST["title"]) && isset($_POST["description"]))
	{
		$id_article = trim($_POST["id_article"]);
		$title = strip_tags($_POST["title"]);
		$description = strip_tags($_POST["description"]);
			
		$selection_for_update  = "UPDATE `aritcle` SET `title` = '$title', `description` = '$description' WHERE `id_article` = '$id_article'";
		$check_id_article = mysqli_query($con, $selection_for_update);
			
		if (!$check_id_article) 
		{
			echo " Error: " . mysqli_error($con);
		}
		else
		{
			header("Location: ../admin_news.php");
		}
		mysqli_close($con); 
	}	  
?>