<?php

	include("../DB Files/db_config.php");

	class RemoveUser extends Database
	{
		public function getId()
		{
			$id=$_GET['id'];
			return $id;
		}

		public function removeUser()
		{
			$con=$this->connect();
			
			$id=$this->getId();
			
			mysqli_query($con,"delete from users where user_id='$id'");

			header('location:remove_user.php');

		}

	}
	
	$ob = new RemoveUser();

	$ob->removeUser();

?>