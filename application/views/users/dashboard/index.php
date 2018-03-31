<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>Home</title>
</head>
<!-- ng-app='myapp' -->
<body>
<h1>Login berhasil !</h1>
	<h2>Hai, <?php echo $this->session->userdata("email"); ?>
    <?php echo $this->session->userdata("Id"); ?></h2>
	<a href="<?php echo base_url('c_profile/m_users/'.$this->session->userdata('Id').''); ?>">Profile</a><br>
	<a href="<?php echo base_url('c_loginusers/m_logout'); ?>">Logout</a>
    <!-- ng-controller='userCtrl' -->
    <div>
        <!-- User Records -->
        <table border='1' style='border-collapse: collapse;' id="mydata">
            <thead>
                <tr>
                    <th>Content Id</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Total Like</th>
                    <th>Total Comment</th>
                    <th>Author</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="show_data">
                
            </tbody>
        </table>
    </div>

    <!-- Script -->
    <script>
    // var fetch = angular.module('myapp', []);

    // fetch.controller('userCtrl', ['$scope', '$http', function ($scope, $http) {
    
    // $scope.getUsers = function(){
    //     $http({
    //     method: 'get',
    //     url: '<?= base_url() ?>c_dashboard/m_getContents/'
    //     }).then(function successCallback(response) {
    //         // Assign response to users object
    //         $scope.users = response.data;
    //     }); 
    // }
    // $scope.getUsers();
    // }]);

    // $scope.bookmark = function(){
        
    // };
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function(){
        tampil_data_barang();   //pemanggilan fungsi tampil barang.
         
        // $('#mydata').dataTable();
          
        //fungsi tampil barang
        function tampil_data_barang(){
            $.ajax({
                type  : 'ajax',
                url   : '<?php echo base_url()?>c_dashboard/m_getContents',
                async : false,
                dataType : 'json',
                success : function(data){
                    var html = '';
                    var i;
                    for(i=0; i<data.length; i++){
                        html += '<tr>'+
                                '<td>'+data[i].idcontent+'</td>'+
                                '<td>'+data[i].title+'</td>'+
                                '<td>'+data[i].desc+'</td>'+
                                '<td>'+data[i].total_like+'</td>'+
                                '<td>'+data[i].total_comment+'</td>'+
                                '<td>'+data[i].namalengkap+'</td>'+
                                '<td>'+data[i].tgl_posting+'</td>'+
                                '<td><a href=<?=base_url('c_dashboard/m_detailContent/');?>'+data[i].idcontent+'/'+data[i].iduser+'>Detil</td>'+
                                // '<td><form id="bookmark" action="" method="POST"><input type="text" id="content_id" value='+data[i].idcontent+'><input type="text" id="user_id" value='+data[i].iduser+'><input type="button" value="Bookmark"></form></td>'+
                                '</tr>';
                    }
                    $('#show_data').html(html);
                }
 
            });
        }
 
    });
 
</script>
</body>
</html>
