<?php
class Error404Controller
{
	public function action404()
	{
		$title_view_404 = "404 - Страница не найдена";
		include_once(ROOT . '/views/404/404.php');
		exit();
	}
}
?>