<?php session_start(); ?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8"/>
	<title>Bai 5.3</title>
    
</head>
<?php 
    if( !isset( $_SESSION['is_user_logged_in'] ) ){
        header('location: bai_5_2_login.php' );
        exit;
    }else{
        if( $_SESSION['logged_in_level'] != 10  ){
            header('location: bai_5_2.php' );
            exit;
        }
    }
?>
<body>
    <?php
        $connect = mysql_connect( 'localhost', 'root', '' ) or die( mysql_error() );
        mysql_select_db( 'baitap_php_th5', $connect ) or die( mysql_error() );
        
        $sql = "SELECT * FROM `cate_news`";
        $query = mysql_query( $sql, $connect );
        
        $data = array();
        if( mysql_num_rows( $query ) > 0 ){
            while( $row = mysql_fetch_assoc( $query ) ){
                $data[] = $row;
            }
        }
    ?>
    <div class="container">
        <h3>Danh sach chuyen muc <a href="bai_5_3_addnew.php">Them moi</a></h3>
        <table class="cate_info">
            <tr>
                <th>STT</th>
                <th>Ten chuyen muc</th>
                <th>Sua</th>
                <th>Xoa</th>
            </tr>
            <?php 
                if( !empty( $data ) ){
                    $i = 1;
                    foreach( $data as $value ){
                        ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $value['cate_tittle']; ?></td>
                            <td><a href="bai_5_3_edit.php?id=<?php echo $value['cate_id']; ?>">Sua</a></td>
                            <td><a onclick="return confirm('Ban chac chan muon xoa!');" href="bai_5_3_delete.php?id=<?php echo $value['cate_id']; ?>">Xoa</a></td>
                        </tr>
                        <?php
                        $i++;
                    }
                }else{
                    echo "<tr><td col-span='4'>Khong co du lieu</td></tr>";
                }
            ?>
            
        </table>
    </div>


</body>
</html>