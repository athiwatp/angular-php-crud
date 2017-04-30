var app = angular.module('crudApp', []);

app.controller('crudController', function ($scope, $http) {

	//animate title
	document.querySelector('#mainTitle').className += 'animated bounceInUp';

	$scope.buttonName = "Add";

	$scope.displayUsers = function () {
		$http.get('select.php').then(response => {
			$scope.students = response.data;
		}).catch(error => {
			swal("Sorry!", "An error has occured. Check console.", "error")
			console.log(error);
		})
	}

	$scope.insertData = function () {
		if (!$scope.name || !$scope.email) {
			swal("Sorry!", "All fields are required", "error")
		} else {
			var userData = {
				'name': $scope.name, //ng-model of textbox name
				'email': $scope.email, //ng-model of textbox email
				'buttonName': $scope.buttonName, //ng-model of button
				'id': $scope.id //hidden id
			}

			$http.post('post_actions.php', userData).then(response => {
				if ($scope.buttonName == "Add") {
					swal("Good job!", "User has been added!", "success")
				} else {
					swal("Good job!", "User has been updated!", "success")
				}
				$scope.name = null; //reset textbox values
				$scope.email = null; //reset textbox values
				$scope.buttonName = "Add"; //Change textbox value to Add
				$scope.displayUsers(); //Update the users table
			}).catch(error => {
				swal("Sorry!", "An error has occured. Check console.", "error")
				console.log(error);
			})

		}

	}

	$scope.updateData = function (id, name, email) {
		$scope.id = id;
		$scope.name = name;
		$scope.email = email;
		$scope.buttonName = "Update";
	}

	$scope.deleteData = function (id) {
		swal({
				title: "Are you sure?",
				text: "You will not be able to recover this user!",
				type: "warning",
				showCancelButton: true,
				confirmButtonColor: "#DD6B55",
				confirmButtonText: "Yes, delete it!",
				cancelButtonText: "No, cancel pls!",
				closeOnConfirm: false,
				closeOnCancel: false
			},
			function (isConfirm) {
				if (isConfirm) {
					$http.post("delete.php", {
							'id': id
						})
						.then(response => {
							swal("Deleted!", "User has been deleted.", "success");
							$scope.displayUsers();
						})
						.catch(error => {
							swal("Sorry!", "An error has occured. Check console.", "error")
							console.log(error);
						})

				} else {
					swal("Cancelled", "Delete cancelled", "error");
				}
			});


	}
});