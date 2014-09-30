<html>
<head>
	<title>New Performance</title>
	<link rel = "stylesheet" type = "text/css" href = "/myperformances/myperformances/myperformances/css/styles.css" />
	<script src= "http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<script type="text/javascript" src="/myperformances/myperformances/myperformances/javascript/disciplinechoice.js"></script>
</head>
<body>
	<form method="post" action="/myperformances/myperformances/myperformances/index.php/validation/validatedetails">
		<table>
			<th colspan="2"><h1>New Performance</h1></th>
			<tr>
				<td>Discipline</td>
				<td>
					<select id="discipline">
						<option value="Track">Track</option>
						<option value="Road">Road</option>
						<option value="XC">Cross Country</option>
					</select>
				</td>
			</tr>

			<!--The content of this area will vary depending on which discipline is selected.-->
			<tr>
				<td id="distancelabel">Distance (metres)</td>
				<td id="distanceinput"><input type="text" name="distanceinput" /></td>
			</tr>
			<tr>
				<td>Time</td>
				<td class="italics">
					hrs <input type="text" name="hrs" size="2" />
					mins 
					<select id="mins">
						<?php
							for($i = 0; $i < 60; $i++)
							{
								print "<option value='$i'>$i</option>";
							}
						?>
					</select>
					secs
					<select id="secs">
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
				<td><input type="text" name="eventname" /></td>
			</tr>
			<tr>
				<td>Location of event</td>
				<td><input type="text" name="eventlocation" /></td>
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
									print "<option value='$i'>$i</option>";
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
								print "<option value='$i'>$i</option>";									
							}
						?>
					</select>
					year
					<select name="year">
						<?php
							$date = intval(date("o")) - 10;
							for($i = $date; $i <= ($date + 10); $i++)
							{
								print "<option value='$i'>$i</option>";
							}
						?>													
				</td>
			</tr>	
			<tr>
				<td colspan="2">
					<section class='invalid_input'>
						<?php
							if(isset($dateerror))
							{
								print $dateerror . "<br />";
							}

							if(isset($textlengtherror))
							{
								print $textlengtherror . "<br />";
							}

							if(isset($textinputerror))
							{
								print $textinputerror . "<br />";
							}
						?>
					</section>
					<input type="submit" value="Submit" />
				</td>
			</tr>		
		</table>
	</form>
</body>
</html>