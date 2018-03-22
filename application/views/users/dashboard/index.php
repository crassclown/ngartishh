<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
    <title>Document</title>
</head>
<body ng-app='myapp'>
<h1>Login berhasil !</h1>
	<h2>Hai, <?php echo $this->session->userdata("email"); ?></h2>
	<a href="<?php echo base_url('c_loginusers/m_logout'); ?>">Logout</a>

    <div ng-controller='userCtrl'>
        <!-- User Records -->
        <table border='1' style='border-collapse: collapse;'>
        <thead>
        <tr>
            <th>Username</th>
            <th>Name</th>
            <th>Gender</th>
            <th>Email</th>
        </tr>
        </thead>
        <tbody>
        <tr ng-repeat='user in users'>
        <td>{{ user.title }}</td>
        <td>{{ user.desc }}</td>
        <td>{{ user.gender }}</td>
        <td>{{ user.email }}</td>
        </tr>
        </tbody>
    </table>
    </div>

    <!-- Script -->
    <script>
    var fetch = angular.module('myapp', []);

    fetch.controller('userCtrl', ['$scope', '$http', function ($scope, $http) {
    
    $scope.getUsers = function(){
        $http({
        method: 'get',
        url: '<?= base_url() ?>c_dashboard/m_getContents/'
        }).then(function successCallback(response) {
            // Assign response to users object
            $scope.users = response.data;
        }); 
    }
    $scope.getUsers();
    }]);

    </script>
</body>
</html>