<?php
class LogoutController
{
	public function actionSession()
	{
		setcookie(session_name(), '', 100);
		session_unset();
		session_destroy();
		$_SESSION = array();
		header("Location: /news");
		exit();
	}
}
?>