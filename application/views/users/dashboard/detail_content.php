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
            </table>
            <?php
        }
    ?>
</body>
</html>