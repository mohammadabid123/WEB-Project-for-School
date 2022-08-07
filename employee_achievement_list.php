<?php require_once("connect.php"); ?>
<?php



	$class = mysqli_query($con, "SELECT a.firstname ,a.lastname,b.ach_title,b.ach_text FROM employee a, employee_achievement b
	WHERE a.employee_id=b.achievement_id");
	
	$row_class = mysqli_fetch_assoc($class);
	
	
	
?>
<?php require_once("top.php"); ?>

<div class="panel panel-info">

	<div class="panel-heading">

		<h1 align = "center">Achievement List</h1>
	</div>
	
	<div class="panel-body">
	
		<?php if(isset($_GET["add"])) { ?>
			<div class="alert alert-success">
				New class has been successfully added!
			</div>
		<?php } ?>
		
		<?php if(isset($_GET["delete"])) { ?>
			<div class="alert alert-success">
				Selected class has been successfully removed!
			</div>
		<?php } ?>
		
		<?php if(isset($_GET["edit"])) { ?>
			<div class="alert alert-success">
				Selected class has been successfully updated!
			</div>
		<?php } ?>
		
		<?php if(isset($_GET["error"])) { ?>
			<div class="alert alert-danger">
				Selected class has not been deleted!
			</div>
		<?php } ?>
		
		<?php if(isset($_GET["erroradd"])) { ?>
			<div class="alert alert-danger">
				Could not add new class!
			</div>
		<?php } ?>
 	
		<table class="table table-bordered">
			<tr>
				<th>Empoyee Name</th>
				<th>Achievement Title</th>
				<th>Achievement Text</th>
			</tr>
			
			<?php do { ?>
			<tr>
				<td><?php echo $row_class["firstname"]; ?></td>
				<td><?php echo $row_class["ach_title"]; ?></td>
				<td><?php echo $row_class["ach_text"]; ?></td>

			</tr>
			<?php } while($row_class = mysqli_fetch_assoc($class)); ?>
			
		</table>
	
	
	</div>
	
</div>





<?php require_once("footer.php"); ?>