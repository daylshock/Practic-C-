<?php
	session_start();
	require_once "connectdb.php";
	
	if(isset($_POST["id_article"]))
	{
		$id_article = $_POST["id_article"];
		// echo " delete id: " . $id_article;
		
		$selection_for_delete  = "DELETE FROM `aritcle` WHERE `id_article` = '$id_article'";
		$check_id_article = mysqli_query($con, $selection_for_delete);
		
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