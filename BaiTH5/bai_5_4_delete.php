<?php session_start(); ?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8"/>
	<title>Bai 5.4 | Xoa</title>
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
        if( isset( $_GET['id'] ) && is_numeric( $_GET['id'] ) ){
    ?>
    <div class="container">
        <?php 
        
            $sql_data = "DELETE FROM `user2` WHERE `user_id` = {$_GET['id']}";
            $query_data = mysql_query( $sql_data, $connect );
            
            if( mysql_affected_rows( $connect ) ){
                header( 'location: bai_5_4.php' );
            }else{
                echo "Khong the xoa du lieu <a href='bai_5_4.php'>Quay lai</a>";
            }
            
        ?>
        
    </div>
    <?php }else{ ?>
        <p>Truy cap khong hop le</p>
    <?php } ?>


</body>
</html>