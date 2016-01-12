<?php

	class FullPacket{
		private $connection;
		private $user_id;
		
		function __construct($mysqli, $user_id_from_session){
			// selle klassi muutuja
			$this->connection = $mysqli;
			$this->user_id = $user_id_from_session;
		}
	}

?>