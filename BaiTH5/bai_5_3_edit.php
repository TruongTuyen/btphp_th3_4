<?php session_start(); ?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8"/>
	<title>Bai 5.3 | Sua</title>
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
        
            $sql_data = "SELECT * FROM `cate_news` WHERE `cate_id` = {$_GET['id']}";
            $query_data = mysql_query( $sql_data, $connect );
            
            $current_data = array();
            if( mysql_num_rows( $query_data ) > 0 ){
                $current_data = mysql_fetch_assoc( $query_data );
            }
            
            if( $_SERVER['REQUEST_METHOD'] == 'POST' ){
                $error = array();
                if( isset( $_POST[ 'cate_name' ] ) ){
                    $cate_name = mysql_real_escape_string( strip_tags( trim( $_POST[ 'cate_name' ] ) ), $connect );
                    
                    $sql = "UPDATE `cate_news` SET cate_tittle = '{$cate_name}' WHERE `cate_id` = {$_GET['id']}";
                    $query = mysql_query( $sql, $connect );
                    if( mysql_affected_rows( $connect ) > 0 ){
                        header( 'location: bai_5_3.php' );
                    }else{
                        $error[] = '<p>Khong the sua du lieu</p>';
                    }
                }else{
                    $error[] = '<p>Vui long nhap ten chuyen muc</p>';
                }
            }
        ?>
        <?php if( !empty( $current_data ) ) { ?>
            
            <form method="post" action="">
                <input class="form-field" name="cate_name" value="<?php echo (isset( $current_data['cate_tittle'] ) && $current_data['cate_tittle'] != '' ) ? $current_data['cate_tittle'] : ''; ?>" placeholder="Ten chuyen muc" />
                <input name="submit" type="submit" value="Them moi" />
            </form>
        <?php }else{ ?>
            <p>Khong ton tai du lieu </p>
        <?php } ?>
    </div>
    <?php }else{ ?>
        <p>Truy cap khong hop le</p>
    <?php } ?>


</body>
</html>