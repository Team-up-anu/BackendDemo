<html>
<body>
<?php
	$con = mysql_connect("localhost","root","");
	if (!$con)
	{
		die('Could not connect: ' . mysql_error());
	}
	mysql_select_db("teamup_db", $con);
	mysql_query("INSERT INTO Sports_Event (Sporttype ,Eventname, Location, Participants, Date, Timebegin, Timeend) 
	VALUES ('$_POST[sport_create]', '$_POST[name_event]', '$_POST[name_place]', '$_POST[number_participant]', '$_POST[date_event]', '$_POST[time_start]', '$_POST[time_end]')");
/* 	mysql_query("INSERT INTO Accounts (Account, Password, number)
	VALUES ('$_POST[account]', '$_POST[password]', '001')");
	echo "<script language=\"javascript\">location.href='logininterface.php';</script>"; */
	
	
/* 	$result = mysql_query("SELECT * FROM Accounts WHERE Account='$_POST[account]'");
	$row = mysql_fetch_array($result);
	if ($_POST["password"] == $row['Password'])
	{
		echo "welcome!";
	} else
	{
		echo "sorry your account or password is wrong";
	} */
	mysql_close($con);
?>
</body>
</html>