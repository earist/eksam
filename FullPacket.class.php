<?php

	class FullPacket{
		private $connection;
		private $user_id;
		
		function __construct($mysqli, $user_id_from_session){
			// selle klassi muutuja
			$this->connection = $mysqli;
			$this->user_id = $user_id_from_session;
		}
		
		function createDropdown(){
			
			$html = '';
			
			$html .= '<select name="new_dd_selection">';
			
			//$html .= '<option selected>1</option>';
			$stmt = $this->connection->prepare("SELECT id, component_name FROM components");
			$stmt->bind_result($id, $component_name);
			$stmt->execute();
			
			//iga rea kohta
			while($stmt->fetch()){
				$html .= '<option value="'.$id.'">'.$component_name.'</option>';
			}

			$html .= '</select>';
			return $html;
		}
	}

?>