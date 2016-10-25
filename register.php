<html>
<body>
<?php
	$con = mysqli_connect("localhost","root","","teamup_db");
	if (!$con)
	{
		die('Could not connect: ' . mysql_error());
	}
	//mysql_select_db("teamup_db", $con);
	if ((strlen($_POST['password'])>2) && preg_match('/^[\w\.]+@\w+\.\w+$/i', $_POST['account']) && $_POST['firstname']!=null && $_POST['lastname']!=null){
		mysqli_query($con,"INSERT INTO Profile (Account, Password, Firstname, Lastname, Gender, Introduction, Sport, Occupation, Age) 
		VALUES ('$_POST[account]', '$_POST[password]', '$_POST[firstname]', '$_POST[lastname]', '$_POST[gender]', '$_POST[addinfo]', '$_POST[sportstype]', '$_POST[occupation]', '$_POST[age]')");
		mysqli_query($con,"INSERT INTO Accounts (Account, Password, number)
		VALUES ('$_POST[account]', '$_POST[password]', '001')");
		echo "<script language=\"javascript\">location.href='logininterface.php';</script>";
	} else {
		echo('please input right email, password, firstname and lastname');
	}
	//echo "<script language=\"javascript\">location.href='logininterface.php';</script>";
	
	
/* 	$result = mysql_query("SELECT * FROM Accounts WHERE Account='$_POST[account]'");
	$row = mysql_fetch_array($result);
	if ($_POST["password"] == $row['Password'])
	{
		echo "welcome!";
	} else
	{
		echo "sorry your account or password is wrong";
	} */
	mysqli_close($con);
?>
</body>
</html>