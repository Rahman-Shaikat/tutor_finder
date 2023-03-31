<!DOCTYPE html>
<html>
<head>
	<title>Table with column head</title>
	<!--<style>
		table {
			border-collapse: collapse;
			width: 100%;
		}
		thead {
			display: table-header-group;
		}
		th {
			background-color: #f2f2f2;
			padding: 8px;
			text-align: center;
			transform: rotate(-90deg);
			transform-origin: left top 0;
			white-space: nowrap;
		}
		td {
			border: 1px solid #ddd;
			padding: 8px;
			text-align: center;
		}
	</style>-->
</head>
<body>
<div class="profile-img text-center">
<img class="animated rounded-circle" width="200" src="{{asset($student_data->image)}}" alt="{{$tutor_data->name}}">
    <p class="mt-2 text-light">{{$tutor_data->name}}</p>
</div>
	<table>
		<thead>
      <tr>
        <th>Name:</th>
    <td>Shamsur Rahman</td>
  </tr>
      <tr>
        <th>Gender:</th>
      <td>Male</td>
    </tr>
      <tr>
        <th>District:</th>
      <td>Dhaka</td>
    </tr>
      <tr>
        <th>Area:</th>
        <td>Cantonment</td>
      </tr>
      <tr>
        <th>Address:</th>
      <td>Road #08</td>
    </tr>
      <tr>
        <th>Medium:</th>
      <td>English</td>
    </tr>
      <tr>
        <th>Class:</th>
      <td>9</td>
    </tr>
      <tr>
        <th>Institution:</th>
      <td>Adamjee</td>
    </tr>
     </thead>
	</table>

</body>
</html>
