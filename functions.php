<?php
	
	require_once("../config_global.php");
	$database = "if15_earis_3";
	session_start();
	
	function addComponent($component_name, $price){
		$mysqli = new mysqli($GLOBALS["servername"], $GLOBALS["server_username"], $GLOBALS["server_password"], $GLOBALS["database"]);
		$stmt = $mysqli->prepare("INSERT INTO components (id, component_name, price) VALUES (?, ?, ?)");
		$stmt->bind_param("iss", $id, $component_name, $price);
		
		$message= "";
		if($stmt->execute()){
			$message = "Sai edukalt lisatud";
			
		}else{
			echo $stmt->error;
		}
		return $message;
		
		$stmt->close();
		$mysqli->close();
	}
	
	function getComponentInfo($keyword=""){
		$mysqli = new mysqli($GLOBALS["servername"], $GLOBALS["server_username"], $GLOBALS["server_password"], $GLOBALS["database"]);
		$stmt = $mysqli->prepare("SELECT id, component_name, price FROM components WHERE deleted IS NULL");
		$stmt->bind_result($id, $component_name, $price);
		$stmt->execute();

		$component_array = array ();
		while($stmt->fetch()){
			$component = new StdClass();
			$component->id = $id;
			$component->component_name = $component_name;
			$component->price = $price;
			array_push($component_array, $component);
		}
		
		return $component_array;
		$stmt->close();
		$mysqli->close();
	}
	
	function deleteComponent($id){
		$mysqli = new mysqli($GLOBALS["servername"], $GLOBALS["server_username"], $GLOBALS["server_password"], $GLOBALS["database"]);
		$stmt = $mysqli->prepare("UPDATE components SET deleted=NOW() WHERE id=?");
		$stmt->bind_param("i", $id);
		if($stmt->execute()){
			header("Location: table.php");
		}
		$stmt->close();
		$mysqli->close();
		
	}
	function updateComponent($id, $component_name, $price){
		$mysqli = new mysqli($GLOBALS["servername"], $GLOBALS["server_username"], $GLOBALS["server_password"], $GLOBALS["database"]);
		$stmt = $mysqli->prepare("UPDATE components SET component_name=?, price=? WHERE id=?");
		$stmt->bind_param("ssi", $component_name, $price, $id);
		if($stmt->execute()){
			//header("Location: table.php");
		}
		$stmt->close();
		$mysqli->close();
		
	}

?>