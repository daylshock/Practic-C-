<?php
include_once(ROOT . '/models/News.php');

class NewsController 
{
	
	public function actionView($id)
	{
		$title = "Просмотр одной новости";

		$newsListId = array();
		$newsListId = News::getNewsListId($id);
		include_once(ROOT . '/views/news/index_id.php');
		exit();
	}
	public function actionIndex()
	{
		$title = "Главная";
		
		$newsList = array();
		$newsList = News::getNewsList();
		include_once(ROOT . '/views/news/index.php');
		exit();
	}
}
?>