<?php
	require_once("functions.php");
	require_once("packet.class.php");
	
	$FullPacket = new FullPacket ($mysqli, $_SESSION["logged_in_user_id"]);
	
?>
	<h2>Vali soovitud komponent</h2>
  <?php if(isset($add_new_component->error)): ?>
  
	<p style="color:red;">
		<?=$add_new_component->error->message;?>
	</p>
  
  <?php elseif(isset($add_new_component->success)): ?>
	
	<p style="color:green;" >
		<?=$add_new_component->success->message;?>
	</p>
	
  <?php endif; ?>
<form>
	<!-- siia järele tuleb rippmenüü -->
	<?=$FullPacket->createDropdown();?>
	<input type="submit">
</form>
<br><br>
<?=$FullPacket->get();?>