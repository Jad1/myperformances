<html>
<head>
	<title>New Performance</title>
	<link rel = 'stylesheet' type = 'text/css' href = '/myperformances/myperformances/css/styles.css'>
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
		</table>
	</form>
</body>
</html>