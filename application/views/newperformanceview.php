<html>
<head>
	<title>New Performance</title>
	<link rel = 'stylesheet' type = 'text/css' href = '/myperformances/myperformances/myperformances/css/styles.css'>
	<script src= 'http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js'></script>
</head>
<body>
	<form method="post" action="/myperformances/myperformances/validate/validateperformance">
		<table>
			<th colspan="2"><h1>New Performance</h1></th>
			<tr>
				<td>Distance (metres)</td>
				<td><input type="text" id="distance" /></td>
			</tr>
			<tr>
				<td>Time</td>
				<td class="italics">
					hrs <input type="text" id="hrs" size="2" />
					mins <input type"text" id="mins" size="2" />
					secs
					<select name="secs">
						<?php
							for($i = 0; $i < 60; $i++)
							{
								print "<option value='$i'>$i</option>";
							}
						?>
					</select>				
				</td>
			</tr>
			<tr>
				<td>Name of event</td>
				<td><input type="text" id="eventname" /></td>
			</tr>
			<tr>
				<td>Location of event</td>
				<td><input type="text" id="eventlocation" /></td>
			</tr>			
			<tr>
				<td>Date of event</td>
				<td class="italics">
					day 
					<select name="day">
						<?php
							for($i = 1; $i <= 31; $i++)
							{
								//Add leading zero if value < 10
								if($i  < 10)
								{
									print "<option value=\"0 . $i\">$i</option>";
								}
								else
								{
									print "<option value='$i'>$i</option>";									
								}
							}
						?>
					</select>
					</select>													
					month
					<select name="month">
						<?php
							$trailingZero;
							for($i = 1; $i <= 12; $i++)
							{
								$trailingZero = "zero";
								//Add leading zero if $i is less than 10
								if($i  < 10)
								{
									$trailingZero .= $i;
									print "<option value='$trailingZero'>$i</option>";
								}
								else
								{
									print "<option value='$i'>$i</option>";									
								}
							}
						?>
					</select>
					year
					<select name="year">
						<?php
							$date = intval(date('o')) - 10;
							for($i = $date; $i <= ($date + 10); $i++)
							{
								print "<option value='$i'>$i</option>";
							}
						?>													
				</td>
			</tr>			
		</table>
	</form>
</body>
</html>