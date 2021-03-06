<?php
	require_once("functions.php");
	
	$component_name="";
	$component_name_error="";
	$price="";
	$price_error="";
	
	if(isset($_POST["add_component"])){
		if ( empty($_POST["component_name"])){
			$component_name_error= "Palun sisesta komponendi nimi!";
		}else{
			$component_name = test_input($_POST["component_name"]);
		}
		if ( empty($_POST["price"]) ) {
				$price_error = "Palun sisesta komponendi hind!";
			}else{
				$price = test_input($_POST["price"]);
				}
		if($component_name_error == "" && $price_error == ""){

			$message = addComponent($component_name, $price);
			if($message != ""){
				
				$component_name = "";
				$price = "";
				
			}
		}
	}
	
	function test_input($data) {	
		$data = trim($data);	//võtab ära tühikud,enterid,tabid
		$data = stripslashes($data);  //võtab ära tagurpidi kaldkriipsud
		$data = htmlspecialchars($data);	//teeb htmli tekstiks, nt < läheb &lt
		return $data;
	}
?>

<html>
<head>
<meta charset="utf-8">
<title>Komponentide lisamine</title>
</head>
<body>
<p>Tere tulemast arvuti komponentide lehele!</p>
<p>Uute komponentide lisamiseks täida allolevad väljad.
Olemasolevate komponentide vaatamiseks vajuta <a href="http://localhost:5555/~earis/eksam/table.php">siia</a>. </p>

<h2>Lisa komponendid</h2>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
	<label for ="component_name">Arvuti komponendi nimi</label><br>
	<input id="component_name" name="component_name" placeholder="Komponent" type="text" value="<?php echo $component_name;?>" > <?=$component_name_error;?><br><br>
	<label for ="price">Arvuti komponendi hind</label><br>
	<input id="price" name="price" placeholder="Hind" type="text" value="<?php echo $price;?>"> <?=$price_error;?><br><br>
	<input type="submit" name="add_component" value="Sisesta"><br>
</form>
</body>
</html>