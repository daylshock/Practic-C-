<?php
	class News
	{
		public static function getNewsListId(& $id)
		{
			$db = Db::getConnection();
			$id = intval($id);
			$pattern = array($id);
			$sql = "SELECT * FROM `aritcle` WHERE `id_article`= ?";
			$result = $db->prepare($sql);
			$result->execute($pattern);
			$newsListId = $result->fetch(PDO::FETCH_ASSOC);
			
			return $newsListId;
		}

		public static function getNewsList()
		{
			$db = Db::getConnection();

			$sql = "SELECT * FROM `aritcle`";
			$result = $db->prepare($sql);
			$result->execute();
			$newsList = $result->fetchAll();
			
			return $newsList;
		}
	}
	
?>