<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular-ui-bootstrap/2.5.0/ui-bootstrap-tpls.min.js"></script>

    <title>Home</title>
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
            <th>Title</th>
            <th>Description</th>
            <th>Total Like</th>
            <th>Total Comment</th>
            <th>Author</th>
            <th>Created At</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <tr ng-repeat='user in users'>
        <td><a href="<?=base_url('c_dashboard/m_detailContent/{{user.idcontent}}/{{user.user_id}}');?>">{{ user.title }}</a></td>
        <td>{{ user.desc }}</td>
        <td>{{ user.total_like }}</td>
        <td>{{ user.total_comment }}</td>
        <td>{{ user.namalengkap}}</td>
        <td>{{ user.tgl_posting }}</td>
        <td>
            <form id="form">
                <input type="text" name="content_id" id="content_id" value="{{ user.idcontent }}" />

                <input type="text" name="user_id" id="user_id" value="{{ user.user_id }}" />

                <input type="button" value="Bookmark" name="bookmark" id="btn_bookmark" />
            </form>
        </td>
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
    <script>  
            	//insert book 
            $("#btn_bookmark").click(function(){
                
                    var content_id  = $("#content_id").val();
                    var user_id     = $("#user_id").val();
                    // var txtpassword = $("#txtpassword").val();
                    console.log(content_id);
                    console.log(user_id);
                    $.ajax({
                        url: "<?=base_url('c_dashboard/m_bookmarked');?>",
                        type: 'post',
                        data: { "content_id": content_id, "user_id": user_id},
                        success: function(response) 
                        { 
                            console.log(response.status);
                        }
                
                    });
            });
    </script>
</body>
</html>