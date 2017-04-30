<!DOCTYPE html>
<html lang="en" ng-app="crudApp">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="bower_components/sweetalert/dist/sweetalert.css">
	<link rel="stylesheet" type="text/css" href="bower_components/animate.css/animate.css">
</head>
<body ng-controller="crudController">
<br /> <br />

<div class="container" style="width: 500px;" ng-init="displayUsers()">
<h3 id="mainTitle" style="color: #096C74; text-align:center;">AngularJS and PHP CRUD</h3>
	<form role="form">
		<input type="hidden" ng-model="id">
		<label>Full Name:</label>
		<input type="text" ng-model="name" name="name" class="form-control" placeholder="Ex. John Cena"> <br />
		<label>Email:</label>
		<input type="text" ng-model="email" name="email" class="form-control" placeholder="Ex. yourmail@gmail.com">
		<br />
		<button type="button" ng-click="insertData()" class="btn btn-info">{{ buttonName }}</button>
	</form>
	<br />
	<label>Search:</label>
	<input type="search" class="form-control" ng-model="searchUser" placeholder="Live Search"> <br />

	<table class="table table-striped" id="tableContainer">
	<thead>
		<tr>
			<th>Name</th>
			<th>Email</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		<tr ng-repeat="student in students | filter:searchUser">
			<td>{{ student.name }}</td>
			<td>{{ student.email }}</td>
			<td>
			<button class="btn btn-info" ng-click="updateData(student.id, student.name, student.email)">Edit</button>
			<button class="btn btn-danger" ng-click="deleteData(student.id)">Delete</button>
			</td>
		</tr>
	</tbody>
	</table>		

</div>

	<script src="bower_components/sweetalert/dist/sweetalert.min.js"></script>
	<script src="js/angular.js"></script>
	<script src="js/app.js"></script>

</body>
</html>