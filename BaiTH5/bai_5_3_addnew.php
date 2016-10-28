<?php session_start(); ?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8"/>
	<title>Bai 5.3 | Them moi</title>
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
                $error = array();
                if( isset( $_POST[ 'cate_name' ] ) ){
                    $cate_name = mysql_real_escape_string( strip_tags( trim( $_POST[ 'cate_name' ] ) ), $connect );
                    
                    $sql = "INSERT INTO `cate_news`( cate_tittle ) VALUE('{$cate_name}')";
                    $query = mysql_query( $sql, $connect );
                    if( mysql_affected_rows( $connect ) > 0 ){
                        header( 'location: bai_5_3.php' );
                    }else{
                        $error[] = '<p>Khong the them moi du lieu</p>';
                    }
                }else{
                    $error[] = '<p>Vui long nhap ten chuyen muc</p>';
                }
            }
        ?>
        <form method="post" action="">
            <input class="form-field" name="cate_name" value="" placeholder="Ten chuyen muc" />
            <input name="submit" type="submit" value="Them moi" />
        </form>
    </div>


</body>
</html>