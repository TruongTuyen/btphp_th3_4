<?php session_start(); ?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8"/>
	<title>Bai 5.4 | Them moi</title>
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
    ?>
    <div class="container">
        <?php 
            if( $_SERVER['REQUEST_METHOD'] == 'POST' ){
                
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
                if( isset( $_POST[ 'password' ] ) ){
                    $password = mysql_real_escape_string( strip_tags( trim( $_POST[ 'password' ] ) ), $connect );
                }else{
                    $error[] = '<p>Vui long nhap mat khau</p>';
                }
                
                if( isset( $_POST[ 're-password' ] ) ){
                    $re_password = mysql_real_escape_string( strip_tags( trim( $_POST[ 're-password' ] ) ), $connect );
                }else{
                    $error[] = '<p>Vui long nhap lai mat khau</p>';
                }
                
                if( isset( $password ) && isset( $re_password ) && $password != $re_password ){
                    $error[] = '<p>Mat khau nhap lai khong khop</p>';
                }
                
                //
                if( empty( $error ) && isset( $username ) && isset( $password ) && isset( $level ) ){
                    $user_pass = md5( $password );
                    $sql = "INSERT INTO `user2`( username, password, level ) VALUE('{$username}', '{$user_pass}', {$level} )";
                    $query = mysql_query( $sql, $connect );
                    if( mysql_affected_rows( $connect ) > 0 ){
                        header( 'location: bai_5_4.php' );
                    }else{
                        $error[] = '<p>Khong the them moi du lieu</p>';
                    }
                }
                
                if( !empty( $error ) ){
                    echo '<div class="error_alert">';
                        echo implode( '', $error );
                    echo '</div>';
                }
            }
        ?>
        
        <form method="post" action="">
            <input class="form-field" name="username" value="" type="text" placeholder="Ten nguoi dung" />
            <input class="form-field" name="password" value="" type="password" placeholder="Mat khau" />
            <input class="form-field" name="re-password" value="" type="password" placeholder="Nhap lai mat khau" />
            <select name="level">
                <option value="10">Admin</optilectedon>
                <option value="1" selected="se">Nguoi dung thuong</option>
            </select>
            <input name="submit" type="submit" value="Them moi" />
        </form>
    </div>


</body>
</html>