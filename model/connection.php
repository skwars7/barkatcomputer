<?php
	class Connection
	{
		public function connect()
		{
			$con=new mysqli("localhost","root","","barkatdb");
			return $con;
		}
	}
?>