<?php
	require_once("functions.php");
	
	if(isset($_GET["delete"])){
		deleteComponent($_GET["delete"]);
	}
	if(isset($_POST["save"])){
		updateComponent($_POST["id"], $_POST["component_name"], $_POST["price"]);
	}
	
	$component_array = getComponentInfo();
?>

<html>
<head>
<meta charset="utf-8">
<title>Komponentide andmetabel</title>
</head>
<h2>Komponentide andmetabel</h2>
<table border="1">
	<tr>
		<th>ID number</th>
		<th>Komponendi nimi</th>
		<th>Komponendi hind</th>
		<th>Kustuta</th>
		<th>Muuda</th>
	</tr>
	<?php
		for($i = 0; $i < count($component_array); $i++){
			
			if(isset($_GET["edit"]) && $component_array[$i]->id == $_GET["edit"]){
				
				echo "<tr>";
				echo "<form action='table.php' method='post'>";
				echo "<input type='hidden' name='id' value='".$component_array[$i]->id."'>";
				echo "<td>".$component_array[$i]->id."</td>";
				echo "<td><input type='text' name='component_name' value='".$component_array[$i]->component_name."'></td>";
				echo "<td><input type='text' name='price' value='".$component_array[$i]->price."'></td>";
				echo "<td><a href='table.php'>Cancel</a></td>";
				echo "<td><input type='submit' name='save'></td>";
				echo "</tr>";
				echo "</form>";
			}else{
				echo "<tr>";
				echo "<td>".$component_array[$i]->id."</td>";
				echo "<td>".$component_array[$i]->component_name."</td>";
				echo "<td>".$component_array[$i]->price."</td>";
				echo "<td><a href='?delete=".$component_array[$i]->id."'>X</a></td>";
				echo "<td><a href='?edit=".$component_array[$i]->id."'>muuda</a></td>";
				echo "</tr>";
			}
		}
	?>
</table>