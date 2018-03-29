<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail Content</title>
</head>
<body>
    <?php
        foreach($varambilusers as $vau){
            $sql = $this->db->query("SELECT category.Id as IdC, category.name as nameCat, category.desc as descCat FROM content_cat_detail LEFT JOIN category ON content_cat_detail.category_id = category.Id LEFT JOIN content ON content.Id = content_cat_detail.content_Id WHERE content.Id = '".$vau->Id."'");
            ?>
            <table>
            <tr>
                <td>Title</td>
                <td>:</td>
                <td><?php echo $vau->title;?></td>
            </tr>
            <tr>
                <td>Category Name</td>
                <td>:</td>
                
                <?php
                    foreach($sql->result_array() as $cat){
                        
                        ?>
                            <td><?php echo $cat['nameCat'];?></td>
                        <?php        
                    }
                ?>
            </tr>
            <tr>
                <td>Like</td>
                <td>:</td>
                <td>
                    <form action="" method="POST">
                        <input type="text" id="content_id" name="content_id" value="<?=$vau->Id;?>" />
                        <input type="hidden" id="user_id" name="user_id" value="<?=$vau->user_id;?>" />
                        <input type="button" id="like" name="like" value="Like" />
                    </form>
                </td>
            </tr>
            <tr>
                <td>Bookmark</td>
                <td>:</td>
                <td>
                    <form action="" method="POST">
                        <input type="text" id="content_id" name="content_id" value="<?=$vau->Id;?>" />
                        <input type="hidden" id="user_id" name="user_id" value="<?=$vau->user_id;?>" />
                        <input type="button" id="bookmark" name="bookmark" value="Bookmark" />
                    </form>
                </td>
            </tr>
            
            </table>

            <table>
                <tr>
                    <td><input type="hidden" name="content_id" id="content_id" value="<?=$vau->Id;?>"></td>
                </tr>
                <tr>
                    <td><input type="hidden" name="user_id" id="user_id" value="<?=$vau->Id;?>"></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td><textarea name="status" id="status" cols="25" rows="5"></textarea></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td align="right"><input type="button" id="submit_status" value="Posting Status"></td>
                </tr>
            </table>
        <hr/>
        <div id="list_status"></div>
            <?php
        }
    ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript">  
            	//insert book 
            $("#like").click(function(){
                
                    var content_id = $("#content_id").val();
                    var user_id = $("#user_id").val();
                    // var txtpassword = $("#txtpassword").val();
                
                    $.ajax({
                        url: "<?php echo base_url(); ?>" + "c_dashboard/m_like/",
                        type: 'post',
                        data: { "content_id": content_id, "user_id": user_id},
                        success: function(response) 
                        { 
                            console.log("Like");
                        }
                
                    });
            });
    </script>
    <script type="text/javascript">  
            	//insert book 
            $("#bookmark").click(function(){
                
                    var content_id = $("#content_id").val();
                    var user_id = $("#user_id").val();
                    // var txtpassword = $("#txtpassword").val();
                
                    $.ajax({
                        url: "<?php echo base_url(); ?>" + "c_dashboard/m_bookmarked/",
                        type: 'post',
                        data: { "content_id": content_id, "user_id": user_id},
                        success: function(response) 
                        { 
                            console.log("Bookmark");
                        }
                
                    });
            });
    </script>
</body>
</html>