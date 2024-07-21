<?php
	class Auth
	{
		public static function loginCheck(& $email_post)
		{
			$db = Db::getConnection();

			$sql_count_from_email = "SELECT count(*) FROM `users` WHERE `email` = ?";
			$sql_email_data = "SELECT * FROM `users` WHERE `email` = ?";

			$pattern = array($email_post);

			$result_email_count = $db->prepare($sql_count_from_email);
			$result_email_count->execute($pattern);

			$result_email_data = $db->prepare($sql_email_data);
			$result_email_data->execute($pattern);

			$email_count = $result_email_count->fetchColumn();
			$email_data = $result_email_data->fetch(PDO::FETCH_ASSOC);

				$result_list_login = array(
					'email_count' => $email_count,
					 'email_data'=> $email_data);
			return $result_list_login;
		}

		public static function registerCheck(& $username, & $email, & $password_hash)
		{
			$db = Db::getConnection();

			$sql_user = "SELECT count(*) FROM `users` WHERE `user` = ?";
			$result_user = $db->prepare($sql_user);
			$result_user->execute(array($username));
			$user_count = $result_user->fetchColumn();

			$sql_email = "SELECT count(*) FROM `users` WHERE `email` = ?";
			$result_email = $db->prepare($sql_email);
			$result_email->execute(array($email));
			$email_count = $result_email->fetchColumn();
			
			// $sql_password = "SELECT count(*) FROM `users` WHERE `password` = ?";
			// $result_password = $db->prepare($sql_password);
			// $result_password->execute(array($password_hash));
			// $pass_count = $result_password->fetchColumn();

				$result_list_register = array(
					'user_count' => $user_count,
					'email_count' => $email_count,);
			return $result_list_register;
		}

		public static function insertData(& $username, & $email, & $password_hash)
		{
			$db = Db::getConnection();

			$sql_insert_data = "INSERT INTO `users` (`user`, `email`, `password`, `status_admin`) VALUES (?, ?, ?, ?)";

			$pattern = array($username, $email, $password_hash, 0);

			$result_insert = $db->prepare($sql_insert_data);
			$result_insert_data = $result_insert->execute($pattern);

			return $result_insert_data;
		}

	}
	
?>