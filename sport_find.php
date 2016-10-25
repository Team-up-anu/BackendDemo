<!doctype html>
<html>
<head>
<link rel="stylesheet"
	href="http://code.jquery.com/mobile/1.3.2/jquery.mobile-1.3.2.min.css">
<script src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
<script
	src="http://code.jquery.com/mobile/1.3.2/jquery.mobile-1.3.2.min.js"></script>
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBOfSTwM1cDJD6mP_U1az9dsfR-mDUvE4o&signed_in=true&callback=initMap"></script>
<meta charset="utf-8">
<style>
dt{
	color:rgb(66,134,245);
	font-size:1.3em;
	font-weight:bold;
	}
dd{
	font-size:1.1em;
	}
</style>
<script>
function popMap(){
	window.open('map.html','_blank','width=600 height=400')}
</script>
</head>

<body>
<?php
	/* echo "<h2>Acount Information</h2>";
	echo "<br>";
	echo $_POST["account"];
	echo "<br>"; */
	echo "$_POST[sport_find]";
	echo "<br>";
	echo "$_POST[date_event]";
	echo "<br>";
	echo "<br>";
	echo "<br>";
	echo "<br>";
	$a;
	$con = mysqli_connect("localhost","root","","teamup_db");
	if (!$con)
	{
		die('Could not connect: ' . mysql_error());
	}
	// mysql_select_db("teamup_db", $con);
	
	if ($_POST['date_event'] != null && $_POST['sport_find'] != null && $_POST['time_start'] != null && $_POST['time_end'] != null)
	{
		$all_result = mysqli_query($con, "SELECT * FROM Sports_Event WHERE (Date='$_POST[date_event]') AND (Sporttype='$_POST[sport_find]') AND (Timebegin >= '$_POST[time_start]') AND (Timeend <= '$_POST[time_end]')");	
		echo "<br>";
		$i = 0;
		while($all_row = mysqli_fetch_assoc($all_result))
		{
			// echo $all_row['Sporttype']. " " .$all_row['Eventname']. " " .$all_row['Date'] . " " . $all_row['Timebegin'] . " " . $all_row['Timeend'];
			// echo "<br />";
			$output[$i] = $all_row;
			$i = $i + 1;
		}
	} else if ($_POST['date_event'] == null && $_POST['sport_find'] != null && $_POST['time_start'] != null && $_POST['time_end'] != null)
	{
		$result1 = mysqli_query($con, "SELECT * FROM Sports_Event WHERE (Sporttype='$_POST[sport_find]') AND (Timebegin >= '$_POST[time_start]') AND (Timeend <= '$_POST[time_end]')");	
		echo "<br>";
		$i = 0;
		while($row1 = mysqli_fetch_assoc($result1))
		{
			// echo $row1['Sporttype']. " " .$row1['Eventname']. " " .$row1['Date'] . " " . $row1['Timebegin'] . " " . $row1['Timeend'];
			// echo "<br />";
			$output[$i] = $row1;
			$i = $i + 1;
		}
	} else if ($_POST['date_event'] != null && $_POST['sport_find'] == null && $_POST['time_start'] != null && $_POST['time_end'] != null)
	{
		$result2 = mysqli_query($con, "SELECT * FROM Sports_Event WHERE (Date='$_POST[date_event]') AND (Timebegin >= '$_POST[time_start]') AND (Timeend <= '$_POST[time_end]')");	
		echo "<br>";
		$i = 0;
		while($row2 = mysqli_fetch_assoc($result2))
		{
			// echo $row2['Sporttype']. " " .$row2['Eventname']. " " .$row2['Date'] . " " . $row2['Timebegin'] . " " . $row2['Timeend'];
			// echo "<br />";
			$output[$i] = $row2;
			$i = $i + 1;
		}
	} else if ($_POST['date_event'] != null && $_POST['sport_find'] != null && $_POST['time_start'] == null && $_POST['time_end'] == null)
	{
		$result3 = mysqli_query($con, "SELECT * FROM Sports_Event WHERE (Date='$_POST[date_event]')");	
		echo "<br>";
		$i = 0;
		while($row3 = mysqli_fetch_assoc($result3))
		{
			// echo $row3['Sporttype']. " " .$row3['Eventname']. " " .$row3['Date'] . " " . $row3['Timebegin'] . " " . $row3['Timeend'];
			// echo "<br />";
			$output[$i] = $row3;
			$i = $i + 1;
		}
	} else if ($_POST['date_event'] != null && $_POST['sport_find'] == null && $_POST['time_start'] == null && $_POST['time_end'] == null)
	{
		$result4 = mysqli_query($con, "SELECT * FROM Sports_Event WHERE (Date='$_POST[date_event]')");	
		echo "<br>";
		while($row4 = mysqli_fetch_assoc($result4))
		{
			// echo $row4['Sporttype']. " " .$row4['Eventname']. " " .$row4['Date'] . " " . $row4['Timebegin'] . " " . $row4['Timeend'];
			// echo "<br />";
			$output[$i] = $row4;
			$i = $i + 1;
		}
	} else if ($_POST['date_event'] == null && $_POST['sport_find'] != null && $_POST['time_start'] == null && $_POST['time_end'] == null)
	{
		$result5 = mysqli_query($con, "SELECT * FROM Sports_Event WHERE (Sporttype='$_POST[sport_find]')");	
		echo "<br>";
		$i = 0;
		while($row5 = mysqli_fetch_assoc($result5))
		{
			// echo $row5['Sporttype']. " " .$row5['Eventname']. " " .$row5['Date'] . " " . $row5['Timebegin'] . " " . $row5['Timeend'];
			// echo "<br />";
			$output[$i] = $row5;
			$i = $i + 1;
		}
	} else if ($_POST['date_event'] != null && $_POST['sport_find'] != null && $_POST['time_start'] != null && $_POST['time_end'] == null)
	{
		$result6 = mysqli_query($con, "SELECT * FROM Sports_Event WHERE (Date='$_POST[date_event]') AND (Sporttype='$_POST[sport_find]') AND (Timebegin >= '$_POST[time_start]')");	
		echo "<br>";
		$i = 0;
		while($row6 = mysqli_fetch_assoc($result6))
		{
			// echo $row6['Sporttype']. " " .$row6['Eventname']. " " .$row6['Date'] . " " . $row6['Timebegin'] . " " . $row6['Timeend'];
			// echo "<br />";
			$output[$i] = $row6;
			$i = $i + 1;
		}
	} else if ($_POST['date_event'] != null && $_POST['sport_find'] != null && $_POST['time_start'] == null && $_POST['time_end'] != null)
	{
		$result7 = mysqli_query($con, "SELECT * FROM Sports_Event WHERE (Date='$_POST[date_event]') AND (Sporttype='$_POST[sport_find]') AND (Timeend <= '$_POST[time_end]')");	
		echo "<br>";
		$i = 0;
		while($row7 = mysqli_fetch_assoc($result7))
		{
			// echo $row7['Sporttype']. " " .$row7['Eventname']. " " .$row7['Date'] . " " . $row7['Timebegin'] . " " . $row7['Timeend'];
			// echo "<br />";
			$output[$i] = $row7;
			$i = $i + 1;
		}
	} else if ($_POST['date_event'] == null && $_POST['sport_find'] == null && $_POST['time_start'] == null && $_POST['time_end'] == null)
	{
		$null_result = mysqli_query($con, "SELECT * FROM Sports_Event");	
		echo "<br />";
		$i = 0;
		while($null_row = mysqli_fetch_assoc($null_result))
		{
			// echo $null_row['Sporttype']. " " .$null_row['Eventname']. " " .$null_row['Date'] . " " . $null_row['Timebegin'] . " " . $null_row['Timeend'];
			// echo "<br />";
			$output[$i] = $null_row;
			$i = $i + 1;
		}
	}
	
	mysqli_close($con);
?>
<div data-role="page" id="find_result" > 
<div  data-role="header" data-tap-toggle="false" data-position="fixed" data-theme="b" >
			<h1>Event list</h1>
</div>
<div>
<dl>
<dt class="result_sporttype">Sport type: <?php echo $output['0']['Sporttype']?> </dt>
<dd class="result_founder">Founder: <?php echo $output['0']['Sporttype']?></dd>
<dd class="result_sportname">Event name: <?php echo $output['0']['Eventname']?></dd>
<dd class="result_time">Date: <?php echo $output['0']['Date']?></dd>
<dd class="result_time">Time: <?php echo $output['0']['Timebegin']?></dd>
<dd class="result_location">Location: <?php echo $output['0']['Location']?><input type="button" value="show it in the map" onClick="popMap()" /></dd>
</dl>
</div><br/>
<div>
<dl>
<dt class="result_sporttype">Sport type: <?php echo $output['1']['Sporttype']?> </dt>
<dd class="result_founder">Founder: <?php echo $output['1']['Sporttype']?></dd>
<dd class="result_sportname">Event name: <?php echo $output['1']['Eventname']?></dd>
<dd class="result_time">Date: <?php echo $output['1']['Date']?></dd>
<dd class="result_time">Time: <?php echo $output['1']['Timebegin']?></dd>
<dd class="result_location">Location: <?php echo $output['1']['Location']?></dd>
</dl>
</div><br/>
<div>
<dl>
<dt class="result_sporttype">Sport type: <?php echo $output['2']['Sporttype']?> </dt>
<dd class="result_founder">Founder: <?php echo $output['2']['Sporttype']?></dd>
<dd class="result_sportname">Event name: <?php echo $output['2']['Eventname']?></dd>
<dd class="result_time">Date: <?php echo $output['2']['Date']?></dd>
<dd class="result_time">Time: <?php echo $output['2']['Timebegin']?></dd>
<dd class="result_location">Location: <?php echo $output['2']['Location']?></dd>
</dl>
</div><br/>
<div>
<dl>
<dt class="result_sporttype">Sport type: <?php echo $output['3']['Sporttype']?> </dt>
<dd class="result_founder">Founder: <?php echo $output['3']['Sporttype']?></dd>
<dd class="result_sportname">Event name: <?php echo $output['3']['Eventname']?></dd>
<dd class="result_time">Date: <?php echo $output['3']['Date']?></dd>
<dd class="result_time">Time: <?php echo $output['3']['Timebegin']?></dd>
<dd class="result_location">Location: <?php echo $output['3']['Location']?></dd>
</dl>
</div><br/>
<div>
<dl>
<dt class="result_sporttype">Sport type: <?php echo $output['4']['Sporttype']?> </dt>
<dd class="result_founder">Founder: <?php echo $output['4']['Sporttype']?></dd>
<dd class="result_sportname">Event name: <?php echo $output['4']['Eventname']?></dd>
<dd class="result_time">Date: <?php echo $output['4']['Date']?></dd>
<dd class="result_time">Time: <?php echo $output['4']['Timebegin']?></dd>
<dd class="result_location">Location: <?php echo $output['4']['Location']?></dd>
</dl>


<span>
	<?php 
		echo $output['0']['Sporttype']. " " .$output['0']['Eventname']. " " .$output['0']['Location']. " " .$output['0']['Date']. " " .$output['0']['Timebegin']. " " .$output['0']['Timeend'];
		
		echo $output['1']['Sporttype']. " " .$output['1']['Eventname']. " " .$output['1']['Location']. " " .$output['1']['Date']. " " .$output['1']['Timebegin']. " " .$output['1']['Timeend'];
	?>
</span>
</div><br/>
<div data-role="footer" data-tap-toggle="false" data-position="fixed" data-id="footernav"  data-theme="c">
			<div data-role="navbar">
				<ul>
					<li><a href="#" class="ui-btn-active ui-state-persist" data-icon="home">Find Events</a></li>
					<li><a href="#create_index" data-icon="home">Create Events</a></li>
					<li><a href="#recnet_index" data-icon="home">Recent Events</a></li>
					<li><a href="#profile_index" data-icon="home">Profile</a></li>
				</ul>
			</div>
		</div>
</div>

</body>
</html>
