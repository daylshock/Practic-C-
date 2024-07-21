<?php
return array(
	'news' => 'news/index',
	'id-article/([0-9]+)' => 'news/view/$1',
	'login' => 'auth/login',
	'register' => 'auth/register',
	'logout' => 'logout/session',
	'error404' => 'error404/404'
);
?>
