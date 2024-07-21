<?php
class Session
{
	private $request;

	public function __construct(& $request)
	{
		$this->request = $request;
		$this->checkRequestLogin();
		$this->checkRequestLogout();
	}
	public function checkRequestLogin()
	{
		if((!empty($_SESSION['AUTH']) && $_SESSION['AUTH'] == true) && ($this->request == '/login' || $this->request == '/register'))
		{
			header("Location: /news");
			exit();
		}
	}
	public function checkRequestLogout()
	{

		if((empty($_SESSION['AUTH'])) && ($this->request == '/logout'))
		{
			header("Location: /news");
			exit();
		}
	}
}	
	
?>