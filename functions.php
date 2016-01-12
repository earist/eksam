<?php
	
	require_once("../config_global.php");
	$database = "if15_earis_3";
	session_start();
	
	function addComponent($component_name, $price){
		$mysqli = new mysqli($GLOBALS["servername"], $GLOBALS["server_username"], $GLOBALS["server_password"], $GLOBALS["database"]);
		$stmt = $mysqli->prepare("INSERT INTO components (id, component_name, price) VALUES (?, ?, ?)");
		$stmt->bind_param("iss", $id, $component_name, $price);
		
		//s�num
		$message= "";
		
		if($stmt->execute()){
			//kui on t�ene, INSERT �nnestus
			$message = "Sai edukalt lisatud";
			
			
		}else{
			//kui on v��r, kuvame errori
			echo $stmt->error;
		}
		return $message;
		
		$stmt->close();
		$mysqli->close();
	}

?>