<?php

	error_reporting(0);

	class Database
	{

		private $host="localhost:3306";
		private $user="root";
		private $pass="";
		private $db="aspharma_db";

		public function connect()
		{
			$con=mysqli_connect($this->host,$this->user,$this->pass,$this->db);
			return $con;
		}

	} // end of db class


	//Below code is for Database connectivity checking


	// $ob = new Database();

	// $con=$ob->connect();

	// if($con)
	// {
	// 	echo "Connected";
	// }
	// else
	// {
	// 	echo "Not Connected";
	// }


?>