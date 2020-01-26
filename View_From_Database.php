<?php
require_once("Include/DB.php");


?>
<!DOCTYPE>
<html>
	<head>
		<title>View Data From Database</title>
		<link rel="stylesheet" href="Include/style.css">

	</head>
	<style media="screen">
		
	/* fieldset{
			background-image: url("Include/images/ems1.jpg");
			background-repeat: repeat-x;
	}
	body{
			background-image: url("Include/images/2.jpg");
			background-repeat: repeat;
	} */
	</style>
	<body>
		<h2 class="success"><?php echo @$_GET["id"];?></h2>

		<div class="">
			<fieldset>
				<form class="" action="View_From_Database.php" method="GET">
					<input type="text" name="Search" placeholder="Search Here.......">
					<input type="submit" name="searchButton" value="Search Record">
				</form>
			</fieldset>
		</div>

		<?php 

			if(isset($_GET["searchButton"])){
				global $ConnectingDB;
				$Search = $_GET["Search"];
				$sql = "SELECT * FROM emp_record WHERE ename=:searcH OR ssn=:searcH OR dept=:searcH OR salary=:searcH OR homeaddress=:searcH";
				$stmt = $ConnectingDB->prepare($sql);
				$stmt->bindValue(':searcH',$Search);
				$stmt->execute();
				while ($DataRows=$stmt->fetch()){
					$Id = $DataRows["id"];
					$EName = $DataRows["ename"];
					$SSN = $DataRows["ssn"];
					$Dept= $DataRows["dept"];
					$Salary = $DataRows["salary"];
					$HomeAddress = $DataRows["homeaddress"];
					?>
					<table width="1000" border="5" align="center">

						<caption><span style="font-weight: bold; font-size: 30px; color:blue">Search Result</span></caption>
						<tr>
							<th>ID</th>
							<th>Name</th>
							<th>SSN</th>
							<th>Department</th>
							<th>Salary</th>
							<th>HomeAddress</th>
							<th>Search Again</th>
						</tr>
						<tr>
							<td><?php echo $Id; ?></td>
							<td><?php echo $EName; ?></td>
							<td><?php echo $SSN; ?></td>
							<td><?php echo $Dept; ?></td>
							<td><?php echo $Salary; ?></td>
							<td><?php echo $HomeAddress; ?></td>
							<td><a href="View_From_Database.php">Search Again</a></td>
						</tr>
					</table>

			<?php	}
			}

		?>
		<table width="1000" border="5" align="center">
			<caption > <span style="font-weight: bold; font-size: 30px; color:blue">View From Database</span></caption>
			<tr>
				<th>ID</th>
				<th>Name</th>
				<th>SSN</th>
				<th>Department</th>
				<th>Salary</th>
				<th>HomeAddress</th>
				<th>Update</th>
				<th>Delete</th>
			</tr>
			
		
<?php
	global $ConnectingDB;
	$sql = "SELECT * FROM emp_record";
	$stmt = $ConnectingDB->query($sql);
	while ($DataRows=$stmt->fetch()) {
		$Id = $DataRows["id"];
		$EName = $DataRows["ename"];
		$SSN = $DataRows["ssn"];
		$Department = $DataRows["dept"];
		$Salary = $DataRows["salary"];
		$HomeAddress = $DataRows["homeaddress"];
	
?>
<tr>
	<td><?php echo $Id; ?></td>
	<td><?php echo $EName; ?></td>
	<td><?php echo $SSN; ?></td>
	<td><?php echo $Department; ?></td>
	<td><?php echo $Salary; ?></td>
	<td><?php echo $HomeAddress; ?></td>
	<td><a href="Update.php?id=<?php echo $Id; ?>">Update</a></td>
	<td><a href="Delete.php?id=<?php echo $Id; ?>">Delete</a></td>
</tr>
<?php } ?>
</table>
<div>
	
</div>

	</body>
</html>
