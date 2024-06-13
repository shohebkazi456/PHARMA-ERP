<?php

	error_reporting(0);

	include 'db_config.php';

	class NameRetrieve extends Database
	{

		public function retrieveFullname($username)
		{
			$con=$this->connect();

			$query=$con->query("select * from users where username='$username'");

			$res=mysqli_fetch_array($query);

			$fname=$res['fname'];

			$lname=$res['lname'];

			return $fullname=$fname." ".$lname;
		}

	} // end of db class

	$n = new NameRetrieve();
	$fullname=$n->retrieveFullname($username);

?>