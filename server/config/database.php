<?php
	class Db
	{
		public static function getConnection()
		{
			$db_param_path = ROOT . '/config/db_param.php';
			$param = include($db_param_path);
			try
			{
				$dsn = "mysql:host={$param['host']};dbname={$param['dbname']}";
				$db = new PDO($dsn , $param['user'], $param['password']);
				$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				return $db;
			}
			catch(Exception $e)
			{
				echo " Failed connect to database! {$e->getMessage()} <br>"; 
			}
		}
	}
?>