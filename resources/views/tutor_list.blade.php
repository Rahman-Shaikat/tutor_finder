<!DOCTYPE html>
<html>
<head>
	<title>Tutor List</title>
	<link rel="stylesheet" href="css/tlist.css">
</head>
<body>
	<h1>Tutor List</h1>
	<form>
		<label for="class">Select Class:</label>
		<select id="class">
			<option value="">All Classes</option>
			<option value="math">Math</option>
			<option value="science">Science</option>
			<option value="history">History</option>
		</select>
		<label for="location">Select Location:</label>
		<select id="location">
			<option value="">All Locations</option>
			<option value="new_york">New York</option>
			<option value="los_angeles">Los Angeles</option>
			<option value="chicago">Chicago</option>
		</select>
		<button type="submit">Filter</button>
	</form>
	<ul id="tutor-list">
		<li class="tutor-item math new_york">John Doe</li>
		<li class="tutor-item science los_angeles">Jane Smith</li>
		<li class="tutor-item math chicago">Bob Johnson</li>
		<li class="tutor-item history new_york">Karen Lee</li>
	</ul>
</body>
</html>
