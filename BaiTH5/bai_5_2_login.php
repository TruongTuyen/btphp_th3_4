<?php session_start(); ?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8"/>
	<title>Bai 5.2 | Login</title>
</head>
<?php
    $connect = mysql_connect( 'localhost', 'root', '' ) or die( mysql_error() );
    mysql_select_db( 'baitap_php_th5', $connect ) or die( mysql_error() );
?>
<body>
    <?php 
        if( isset( $_SESSION['is_user_logged_in'] ) && $_SESSION['is_user_logged_in'] == true ){
            header('location: bai_5_2.php' );
        }
        if( $_SERVER['REQUEST_METHOD'] == 'POST' ){
            $error = array();
            
            if( isset( $_POST['user'] ) ){
                $user = mysql_real_escape_string( strip_tags( trim( $_POST['user'] ) ), $connect );
            }else{
                $error[] = '<p>Vui long nhap vao ten dang nhap</p>';
            }
            
            if( isset( $_POST['pass'] ) ){
                $pass = mysql_real_escape_string( strip_tags( trim( $_POST['pass'] ) ), $connect );
            }else{
                $error[] = '<p>Vui long nhap vao mat khau</p>';
            }
            
            if( $user != '' && $pass != '' ){
                $pass = md5( $pass );
                $sql = "SELECT * FROM `user2` WHERE `username` = '{$user}' AND `password` = '{$pass}'";
                
                $query = mysql_query( $sql, $connect );
                if( mysql_num_rows( $query ) > 0 ){
                    $user_info = mysql_fetch_assoc( $query );
                    
                    if( !empty( $user_info ) ){
                        $_SESSION['is_user_logged_in'] = true;
                        $_SESSION['logged_in_level']  = (isset($user_info['level'])) ? $user_info['level'] : 1;
                        header('location: bai_5_2.php' );
                    }else{
                        $error[] = '<p>Nguoi dung khong hop le</p>';
                    }
                }else{
                    $error[] = '<p>Sai ten dang nhap hoac mat khau</p>';
                }
            }else{
                $error[] = '<p>Vui long nhap vao du thong tin</p>';
            }
            
        }
    
    ?>
    <div class="container">
        <div class="error_alert">
            <?php if( !empty( $error ) ){
                echo implode( '', $error );
            } ?>
        </div>
        <form method="post" action="">
            <input class="form-field" name="user" value="" placeholder="Ten dang nhap" />
            <input class="form-field" name="pass" value="" placeholder="Mat khau" />
            <input name="submit" type="submit" value="Dang nhap" />
        </form>
    </div>


</body>
</html>