<?php
	session_start();
	
	require_once "connectdb.php";
	
	if(isset($_POST["title"]) && isset($_POST["date"]) && isset($_POST["description"]))
	{
		$title = strip_tags($_POST['title']);
		$date = strip_tags($_POST['date']);
		$description = strip_tags($_POST['description']);
		
		$insert_article = "INSERT INTO `aritcle` (`id_article`,`title`, `date`, `description`) VALUES (NULL, '$title', '$date', '$description')";
		$query = mysqli_query($con, $insert_article);
		
		if (!$query) 
		{
			echo mysqli_error($db_connect);
		}
		
		header("Location: ../admin_news.php");
		mysqli_close($con);
	}
	else
	{
		echo "errorPOST!!!";
	}
?>
