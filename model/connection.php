<?php
	class Connection
	{
		public function connect()
		{
			$con=new mysqli("localhost","root","","updateflipzia");
			return $con;
		}
	}
?>