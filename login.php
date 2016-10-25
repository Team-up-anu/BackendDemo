<html>
<body>
<?php
	/* echo "<h2>Acount Information</h2>";
	echo "<br>";
	echo $_POST["account"];
	echo "<br>"; */
	$con = mysqli_connect("localhost","root","","teamup_db");
	if (!$con)
	{
		die('Could not connect: ' . mysql_error());
	}
	//mysql_select_db("teamup_db", $con);
	$result = mysqli_query($con,"SELECT * FROM Accounts WHERE Account='$_POST[account]'");
	$row = mysqli_fetch_array($result);
	if ($_POST["password"] == $row['Password'] && $_POST["account"] != null && $_POST["password"] != null)
	{
		echo "<script language=\"javascript\">location.href='teamupbody.php';</script>";
	} else if ($_POST["account"] == null || $_POST["password"] == null)
	{
		echo "sorry your account or password is wrong";
	} else
	{
		echo "sorry your account or password is wrong";
	}
	mysqli_close($con);
?>
</body>
</html>