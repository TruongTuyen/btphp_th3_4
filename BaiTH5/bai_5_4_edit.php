<?php session_start(); ?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8"/>
	<title>Bai 5.4 | Sua</title>
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
        
            $sql_data = "SELECT * FROM `user2` WHERE `user_id` = {$_GET['id']}";
            $query_data = mysql_query( $sql_data, $connect );
            
            $current_data = array();
            if( mysql_num_rows( $query_data ) > 0 ){
                $current_data = mysql_fetch_assoc( $query_data );
            }
            
            if( $_SERVER['REQUEST_METHOD'] == 'POST' ){
                $error = array();
                if( isset( $_POST[ 'username' ] ) ){
                    $username = mysql_real_escape_string( strip_tags( trim( $_POST[ 'username' ] ) ), $connect );
                }else{
                    $error[] = '<p>Vui long nhap ten nguoi dung</p>';
                }
                
                if( isset( $_POST[ 'level' ] ) ){
                    $level = mysql_real_escape_string( strip_tags( trim( $_POST[ 'level' ] ) ), $connect );
                }else{
                    $error[] = '<p>Vui long chon quyen</p>';
                }
                
                if( empty( $error ) ){
                    $sql = "UPDATE `user2` SET username = '{$username}', level = {$level}  WHERE `user_id` = {$_GET['id']}";
                    echo "QL: ". $sql;
                    $query = mysql_query( $sql, $connect );
                    if( mysql_affected_rows( $connect ) > 0 ){
                        header( 'location: bai_5_4.php' );
                    }else{
                        echo  '<p>Khong the sua du lieu</p>';
                    }
                }else{
                    echo '<div>';
                        echo implode( '', $error );
                    echo '</div>';
                }
                
            }
        ?>
        <?php if( !empty( $current_data ) ) { ?>
            <form method="post" action="">
                <input class="form-field" name="username" value="<?php echo (isset( $current_data['username'] ) && $current_data['username'] != '' ) ? $current_data['username'] : ''; ?>" type="text" placeholder="Ten nguoi dung" />
                <select name="level">
                    <option value="10" <?php if( isset( $current_data['level'] ) && $current_data['level'] == 10 ){ echo 'selected="selected"'; } ?>>Admin</option>
                    <option value="1" <?php if( isset( $current_data['level'] ) && $current_data['level'] == 1 ){ echo 'selected="selected"'; } ?>>Nguoi dung thuong</option>
                </select>
                <input name="submit" type="submit" value="Sua" />
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